<?php

namespace App\Http\Controllers\Contractor;

use App\Company;
use App\User;
use App\Contractor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contractor\StoreContractorRequest;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function store(StoreContractorRequest $request)
    {

        DB::beginTransaction();
        try {
            $fields = $request->validated();
            $fields['state'] = 0;
            $company = Company::firstOrCreate(
                ['ruc' => $fields['ruc1']],
                [
                    'name' => $fields['name_company'],
                ]
            );
            $contractor = User::create([
                'dni' => $fields['dni1'],
                'name' => $fields['name1'],
                'last_name' => $fields['last_name1'],
                'email' => $fields['email1'],
                'password' => Hash::make($fields['password1']),
                'state' => $fields['state'],
                'company_id' => $company->id,
            ]);
            $contractor->assignRole(['participante', 'contratista']);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return redirect('login')->withInfo('IGH se comunicara con ud. para la activción de su cuenta o enviar un correo a soporte@ighgroup.com');
    }
}
