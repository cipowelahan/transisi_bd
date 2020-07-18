<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Storage;

class CompanyController extends Controller {

    public function index() {
        $companies = Company::paginate(5);
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
        $company = Company::find($id);
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
        }
        $company->update($update);

        return redirect()->route('companies.show', $id);
    }

    public function destroy($id) {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('companies.index');
    }
}
