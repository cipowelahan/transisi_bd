<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employe;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;

class EmployeController extends Controller {

    public function index() {
        $employees = Employe::paginate(5);
        return view('employe.index', ['employees' => $employees]);
    }

    public function create() {
        $companies = Company::all();
        return view('employe.create', ['companies' => $companies]);
    }

    public function store(StoreEmployeRequest $request) {
        Employe::create($request->only('nama', 'email', 'company_id'));
        return redirect()->route('employees.index');
    }

    public function show($id) {
        $employe = Employe::with('company')->find($id);
        return view('employe.show', ['employe' => $employe]);
    }

    public function edit($id) {
        $companies = Company::all();
        $employe = Employe::with('company')->find($id);
        return view('employe.edit', ['employe' => $employe, 'companies' => $companies]);
    }

    public function update(UpdateEmployeRequest $request, $id) {
        $employe = Employe::find($id);
        try {
            $employe->update($request->only('nama', 'email', 'company_id'));
        } catch (\Exception $e) {
            $message = 'Terjadi Kesalahan';
            if ($e->getCode() == 23000) $message = 'Email sudah digunakan';
            return back()->withErrors(['update' => $message]);
        }
        return redirect()->route('employees.show', $id);
    }

    public function destroy($id) {
        $employe = Employe::find($id);
        $employe->delete();
        return redirect()->route('employees.index');
    }
}
