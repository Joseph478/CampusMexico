<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificado raura minsur</title>
    <style>
        html {
            margin: 0;
        }
        .user, .dni, .curso, .fecha, .codigo, .estado {
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            height: auto;
            width: 70%;
            color: #373435;
        }
        .title {
            font-family: Calibri,sans-serif;
            text-transform: uppercase;
            text-align: center;

        }

        .user {
            font-family: serif;
            text-transform: uppercase;
            text-align: center;
            top: 260px;
            left: 15%;
            font-size: 40px;
            font-weight: 600;
        }

        .dni {
            font-family: Calibri,sans-serif;
            top: 340px;
            left: 62%;
            width: 25%;
            font-size: 28px;
            font-weight: 600;
        }

        .estado {
            top: 380px;
            left: 15%;
            font-size: 24px;
            text-transform: capitalize !important;
        }

        .curso {
            top: 425px;
            left: 8%;
            width: 84%;
            font-weight: bold;
            font-size: 40px;
        }

        .fecha {
            font-family: sans-serif;
            top: 730px;
            left: 60px;
            color: #373435;
            font-size: 15px;
        }

        .codigo {
            font-family: sans-serif;
            top: 90px;
            left: 90%;
            font-weight: bold;
        }
    </style>

</head>
<body>
    <div style="position: fixed; left: 0; top: -265px; right: 0; bottom: 0px; text-align: center;z-index: -1000;">
        @if($inscription->participant->company_id == 2)
            <img src="https://www.ighgroup.com/campusperurail/img/certificates/CERTIFICADO-PERURAIL1.png" style="width: 100%; margin-top: 25%;">
        @else
            <img src="https://www.ighgroup.com/campusperurail/img/certificates/CERTIFICADO-TRANS1.png" style="width: 100%; margin-top: 25%;">
        @endif
    </div>
    <spam class="codigo">{{ $inscription->id }}</spam>
    <spam class="user">{{ $inscription->participant->full_name }}</spam>
    <spam class="dni">{{ $inscription->participant->dni }}</spam>
    @if($inscription->grade < $inscription->grade_min)
        <spam class="title estado">por haber <spam style="text-transform: uppercase !important; font-weight: bold">participado en el curso</spam></spam>
    @else
        <spam class="title estado">por haber <spam style="text-transform: uppercase !important; font-weight: bold">aprobado el curso</spam></spam>

    @endif
    <spam class="title curso">{{ $inscription->classroom->name }}</spam>
    <spam class="fecha">{{ $inscription->classroom->startDatetimeLong() }}</spam>
    <img src="data:image/svg+xml;base64,{{ base64_encode($codeQR) }}" style=" position: absolute; top: 672px; right: 120px; margin: 0; padding: 0">
</body>
</html>
