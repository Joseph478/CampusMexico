<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\SaveCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
        // Relacion de todas las empresas activas e inactivas
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $company = new Company();
        return view('companies.create', compact('company'));
    }

    public function store(SaveCompanyRequest $request)
    {
        // validacion de lso campos requeridos
        $field = $request->validated();
        // Alamacenar los datos validaos en sistema
        $company = Company::create($field);
        $message = 'La Empresa  con Ruc: ' . $company->ruc .  ' y nombre: '. $company->name.' fue registrado correctamente';
        return redirect()->route('companies.index')->with('success',$message);
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(SaveCompanyRequest $request, Company $company)
    {
        $fields = $request->validated();
        $company->update($fields);
        $message ='La Empresa  con Ruc: ' . $company->ruc .  ' y nombre: '. $company->name.' fue actuliazada correctamente.';
        return redirect()->route('companies.index')->with('success',$message);

    }

    public function destroy(Company $company)
    {
        //
    }
}
