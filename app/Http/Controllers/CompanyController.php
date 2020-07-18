<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Storage;

class CompanyController extends Controller {

    public function index(Request $request) {
        $companies = Company::when($request->filled('search'), function($q) use ($request) {
            $q->orWherehas('company', function($c) use ($request) {
                $c->where('nama', 'like', "%$request->search%");
            })
            ->orWhere('id', 'like', "%$request->search%")
            ->orWhere('nama', 'like', "%$request->search%")
            ->orWhere('email', 'like', "%$request->search%");
        })
        ->paginate(5);
        return view('company.index', ['companies' => $companies]);
    }

    public function create() {
        return view('company.create');
    }

    public function store(StoreCompanyRequest $request) {
        $pathLogo = Storage::disk('public')->putFileAs('company', $request->file('logo'), time().'.png');
        $company = $request->only('nama', 'email', 'website');
        $company['logo'] = $pathLogo;
        Company::create($company);
        return redirect()->route('companies.index');
    }

    public function show($id) {
        $company = Company::with('employees')->find($id);
        return view('company.show', ['company' => $company]);
    }

    public function edit($id) {
        $company = Company::find($id);
        return view('company.edit', ['company' => $company]);
    }
    
    public function update(UpdateCompanyRequest $request, $id) {
        $company = Company::find($id);
        try {
            $update = $request->only('nama', 'email', 'website');
            $company->update($update);
        } catch (\Exception $e) {
            $message = 'Terjadi Kesalahan';
            if ($e->getCode() == 23000) $message = 'Email sudah digunakan';
            return back()->withErrors(['update' => $message]);
        }

        if ($request->hasFile('logo')) {
            $pathLogo = Storage::disk('public')->putFileAs('company', $request->file('logo'), time().'.png');
            $update['logo'] = $pathLogo;
            Storage::disk('public')->delete($company->logo);
        }
        $company->update($update);

        return redirect()->route('companies.show', $id);
    }

    public function destroy($id) {
        $company = Company::find($id);
        $logo = $company->logo;
        $company->delete();
        Storage::disk('public')->delete($logo);
        return redirect()->route('companies.index');
    }
}
