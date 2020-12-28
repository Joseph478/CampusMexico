<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificado raura minsur</title>
    <style>
        html {
            margin: 0;
        }
        .user, .dni, .curso, .fecha, .codigo, .estado, .horas {
            position: absolute;
            left: 10px;
            height: auto;
            width: 70%;
            color: #373435;
        }
        .title {
            font-family: Calibri,sans-serif;
            text-transform: uppercase;

        }

        .user {
            font-family: serif;
            text-transform: uppercase;
            top: 260px;
            left: 8%;
            width: 84%;
            font-size: 34px;
            font-weight: 600;
            color: #83141B;
        }

        .dni {
            font-family: Calibri,sans-serif;
            top: 345px;
            left: 27%;
            width: 25%;
            font-size: 28px;
            font-weight: 600;
        }

        .estado {
            top: 380px;
            left: 8%;
            font-size: 24px;
            text-transform: capitalize !important;
        }

        .curso {
            top: 430px;
            left: 8%;
            width: 60%;
            font-weight: bold;
            font-size: 32px;
            color: #83141B;
        }

        .horas {
            font-family: sans-serif;
            top: 580px;
            left: 8%;
            color: #3c3c3c;
            font-size: 18px;
        }

        .fecha {
            font-family: sans-serif;
            top: 600px;
            left: 8%;
            color: #3c3c3c;
            font-size: 17px;
        }

        .codigo {
            font-family: sans-serif;
            top: 10px;
            left: 8%;
            font-weight: bold;
            color: #83141B;
        }
    </style>

</head>
<body>
    <div style="position: fixed; left: 0; top: -265px; right: 0; bottom: 0px; text-align: center;z-index: -1000;">
        <img src="https://www.ighgroup.com/campusperurail/img/certificates/certi.jpg" style="width: 100%; margin-top: 25%;">
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
    <spam class="horas">Con una duración de 02 horas lectivas.</spam>
    <spam class="fecha">El dia {{ $inscription->classroom->startDatetimeLong() }}</spam>
    <img src="data:image/svg+xml;base64,{{ base64_encode($codeQR) }}" style=" position: absolute; top: 350px; right: 265px; margin: 0; padding: 0">
</body>
</html>
