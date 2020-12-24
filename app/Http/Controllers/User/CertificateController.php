<?php

namespace App\Http\Controllers\User;

use App\Certificate;
use App\Classroom;
use App\Http\Controllers\Controller;
use App\Inscription;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\True_;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{

    function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $user->loadCount('scheduled')
            ->load('scheduled');


        return view('users.certificate', compact('user'));
    }

    public function create(Inscription $inscription)
    {
        $inscription->load(['participant', 'classroom']);

        $text = "Certificado \nDNI: ".$inscription->participant->dni." \nParticipante: ".$inscription->participant->full_name.
            "\nCargo: ".$inscription->participant->position."\nArea: " .$inscription->participant->area;
        $codeQR = QrCode::generate($text);
        $view = 'certificates.design';
        $pdf = PDF::loadView($view, compact('inscription', 'codeQR'))
            ->setPaper('a4', 'landscape');

        $filename = 'Certificado Del Curso '.  $inscription->classroom->name.'.pdf';
        return $pdf->download($filename);
    }


}
