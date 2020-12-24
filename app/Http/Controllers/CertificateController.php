<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Certificate;
use App\Http\Requests\certificate\CreateCertificateRequest;

class CertificateController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:certificate-list');
         $this->middleware('permission:certificate-create', ['only' => ['create','store']]);
         $this->middleware('permission:certificate-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:certificate-delete', ['only' => ['destroy']]);
    }

    public function index()
    {

        // $certificate=Certificate::query()
        // ->select(['id','name','description','template'])
        // ->orderBy('certificates.id','asc')
        // ->get();

        $certificate = Certificate::all()->sortBy("name");


        return view('certificates.index',compact('certificate'));
    }

    public function create(Certificate $certificate)
    {
        return view('certificates.create',compact('certificate'));
    }

    public function store(CreateCertificateRequest $request)
    {
        $certificate = new Certificate($request->except(['template']));
        $certificate->save();

        //Store Image
        if($request->hasFile('template') && $request->file('template')->isValid()){
            $certificate->addMediaFromRequest('template')->toMediaCollection('certificates');
        }

        $message = 'El Certificado: '. $certificate->name .' fue registrado correctamente';
        return redirect()->route('certificates.index')->with('success', $message);
    }

    public function show(Certificate $certificate)
    {
        return view('certificates.show',compact('certificate'));
    }

    public function edit(Certificate $certificate)
    {

        return view('certificates.edit',compact('certificate'));
    }

    public function update(CreateCertificateRequest $request,Certificate $certificate)
    {
        $certificates=Course::find($certificate->id);

        $fields = $request->validated();
        $certificate->update($fields);
        if ($request->hasFile('template')){
            $course->clearMediaCollection('certificates');
            $course->addMediaFromRequest('template')->toMediaCollection('certificates');
        }

        $message = 'El Certificado.  "'. $certificate->name .' fue actualizado correctamente';
        return redirect()->route('certificates.index')->with('success', $message);
    }

    public function destroy($id)
    {
        //
    }
}
