<?php

use Illuminate\Database\Seeder;
use App\Bank;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //NOTIFICACION, INVESTIGACION Y REPORTE DE INCIDENTES PELIGROSOS Y ACCIDENTES DE TRABAJO
        //1
        Bank::create([
            'title'=>'Suceso acaecido en el curso del trabajo o en relación con el trabajo, en el que la persona afectada no sufre lesiones corporales, o en el que éstas sólo requieren cuidados de primeros auxilios, es:',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Incidente',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Accidente de trabajo:',
            'is_question'=> 0,
            'parent_id'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Accidente leve',
            'is_question'=> 0,
            'parent_id'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	incidente mortal.',
            'is_question'=> 0,
            'parent_id'=> 1,
            'content_id'=> 1,
        ]);
        //PREGUNTA2-6
        Bank::create([
            'title'=>'¿Qué es un incidente peligroso?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Todo suceso potencialmente riesgoso que pudiera causar lesiones o enfermedades a las personas en su trabajo o a la población',
            'is_question'=> 0,
            'is_correct' => 1,
            'parent_id'=> 6,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Suceso temporal con riesgo bajo a causar lesiones o enfermedades a las personas en su trabajo o a la población',
            'is_question'=> 0,
            'parent_id'=> 6,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Toda acción del personal no capacitado.',
            'is_question'=> 0,
            'parent_id'=> 6,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas.',
            'is_question'=> 0,
            'parent_id'=> 6,
            'content_id'=> 1,
        ]);
        //PREGUNTA3-11
        Bank::create([
            'title'=>'Todo suceso repentino que sobrevenga por causa o con ocasión del trabajo y que produzca en el trabajador una lesión orgánica, una perturbación funcional, una invalidez o la muerte, es:',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Accidente de trabajo',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 11,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Accidente personal.',
            'is_question'=> 0,
            'parent_id'=> 11,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Incidente',
            'is_question'=> 0,
            'parent_id'=> 11,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas',
            'is_question'=> 0,
            'parent_id'=> 11,
            'content_id'=> 1,
        ]);
        //PREGUNTA4-16
        Bank::create([
            'title'=>'Clasificación de accidente:',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Accidente leve, accidente incapacitante, accidente mortal.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 16,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Accidente leve, incidente incapacitante, accidente mortal.',
            'is_question'=> 0,
            'parent_id'=> 16,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Accidente leve, accidente fuerte, accidente severo.',
            'is_question'=> 0,
            'parent_id'=> 16,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Incidente leve, accidente incapacitante, accidente severo.',
            'is_question'=> 0,
            'parent_id'=> 16,
            'content_id'=> 1,
        ]);
        //PREGUNTA5-21
        Bank::create([
            'title'=>'¿Cuáles son los accidentes incapacitantes?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Total temporal – Parcial permanente – Total permanente.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 21,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Parcial y total permanente',
            'is_question'=> 0,
            'parent_id'=> 21,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Total temporal – parcial total.',
            'is_question'=> 0,
            'parent_id'=> 21,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Total parcial – total permanente. ',
            'is_question'=> 0,
            'parent_id'=> 21,
            'content_id'=> 1,
        ]);
         //PREGUNTA6-26
        Bank::create([
            'title'=>'¿Por qué ocurren los accidentes?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Causas inmediatas, causas básicas, falta de control.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 26,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Causas inéditas',
            'is_question'=> 0,
            'parent_id'=> 26,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Falta de control en el trabajo',
            'is_question'=> 0,
            'parent_id'=> 26,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Casusas básicas en el área de trabajo',
            'is_question'=> 0,
            'parent_id'=> 26,
            'content_id'=> 1,
        ]);
        //PREGUNTA7-31
        Bank::create([
            'title'=>'¿Cuáles son las causas inmediatas?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Actos sub-estándares y condiciones sub-estándares.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 31,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Incidentes ',
            'is_question'=> 0,
            'parent_id'=> 31,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Actos estandarizados.',
            'is_question'=> 0,
            'parent_id'=> 31,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Actos y condiciones estandar.',
            'is_question'=> 0,
            'parent_id'=> 31,
            'content_id'=> 1,
        ]);

        //PREGUNTA8-36
        Bank::create([
            'title'=>'¿Cuáles son las causas básicas?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Factores personales y factores del trabajo.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 36,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Actos subestándares',
            'is_question'=> 0,
            'parent_id'=> 36,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Condiciones subestándares',
            'is_question'=> 0,
            'parent_id'=> 36,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 36,
            'content_id'=> 1,
        ]);
        //PREGUNTA9-41
        Bank::create([
            'title'=>'9.	¿Qué es falta de control?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Carencia de estándares y procedimientos',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 41,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'Recopilar evidencia. ',
            'is_question'=> 0,
            'parent_id'=> 41,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Respuesta inicial.',
            'is_question'=> 0,
            'parent_id'=> 41,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 41,
            'content_id'=> 1,
        ]);
        ///aumentamos
        //PREGUNTA10-46
        Bank::create([
            'title'=>'10.	¿Qué es un acto sub-estándar?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Es toda acción o práctica incorrecta ejecutada por el trabajador que puede causar un accidente.',
            'is_question'=> 0,
            'parent_id'=> 46,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Es toda condición en el entorno del trabajo que puede causar un accidente',
            'is_question'=> 0,
            'parent_id'=> 46,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Es toda acción correcta realizado por el trabajador.',
            'is_question'=> 0,
            'parent_id'=> 46,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Es toda acción o practica correcta del supervisor. ',
            'is_question'=> 0,
            'parent_id'=> 46,
            'content_id'=> 1,
        ]);
        //PREGUNTA11-51
        Bank::create([
            'title'=>'11.	¿Qué es una condición sub-estándar?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Es toda condición en el entorno del trabajo que puede causar un accidente.',
            'is_question'=> 0,
            'is_correct' => 1,
            'parent_id'=> 51,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Es toda acción o práctica incorrecta ejecutada por el trabajador que puede causar un accidente',
            'is_question'=> 0,
            'parent_id'=> 51,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Es toda condición segura en el área de trabajo.',
            'is_question'=> 0,
            'parent_id'=> 51,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Es toda acción incorrecta del supervisor que puede causar daño. ',
            'is_question'=> 0,
            'parent_id'=> 51,
            'content_id'=> 1,
        ]);
        //PREGUNTA12-56
        Bank::create([
            'title'=>'12.	Cuando nos referimos a limitaciones en experiencias, fobias y tensiones presentes en el trabajador, nos referimos a:',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Factores personales.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 56,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Factores laborales.',
            'is_question'=> 0,
            'parent_id'=> 56,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Factores sub-estandar.',
            'is_question'=> 0,
            'parent_id'=> 56,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Factores ',
            'is_question'=> 0,
            'parent_id'=> 56,
            'content_id'=> 1,
        ]);
        //PREGUNTA13-61
        Bank::create([
            'title'=>'13.	¿Cuáles son los tipos de evidencias?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Persona.',
            'is_question'=> 0,
            'parent_id'=> 61,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Posición.',
            'is_question'=> 0,
            'parent_id'=> 61,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Papeles.',
            'is_question'=> 0,
            'parent_id'=> 61,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas.',
            'is_question'=> 0,
            'parent_id'=> 61,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        //PREGUNTA14-66
        Bank::create([
            'title'=>'14.	¿Cuál es la responsabilidad del jefe inmediato?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Analizar cuál es el nivel de consecuencia y potencialidad del incidente, acto o condición sub estándar, para ello hace uso de la tabla Evaluación de Consecuencia y Potencialidad.',
            'is_question'=> 0,
            'parent_id'=> 66,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Realizar un análisis preliminar de las posibles causas que ocasionaron el incidente, acto o condición sub estándar. ',
            'is_question'=> 0,
            'parent_id'=> 66,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Determinar si requiere o no, investigación.',
            'is_question'=> 0,
            'parent_id'=> 66,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas',
            'is_question'=> 0,
            'parent_id'=> 66,
            'is_correct' => 1,
            'content_id'=> 1,
        ]);
         //PREGUNTA15-71
        Bank::create([
            'title'=>'15.	¿Cuál es la responsabilidad del reportante?',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Indicar el lugar, fecha y hora de ocurrencia. ',
            'is_question'=> 0,
            'parent_id'=> 71,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	La descripción del incidente, acto o condición sub-estándar, anotando la información importante que esclarezca y detalle de manera objetiva el suceso. ',
            'is_question'=> 0,
            'parent_id'=> 71,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Su nombre, firma y a quien comunica el reporte. El trabajador debe asegurarse que el jefe inmediato a quien entrega el reporte firme en el espacio correspondiente.',
            'is_question'=> 0,
            'parent_id'=> 71,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas.',
            'is_question'=> 0,
            'parent_id'=> 71,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        //PREGUNTA16-76
        Bank::create([
            'title'=>'16.	No utilizar una herramienta de manera adecuada es:',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Condición subestándar',
            'is_question'=> 0,
            'parent_id'=> 76,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Acto subestándar',
            'is_question'=> 0,
            'is_correct' => 1,
            'parent_id'=> 76,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Condición sub-estandar y Acto Sub-estándar ',
            'is_question'=> 0,
            'parent_id'=> 76,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna opción es correcta',
            'is_question'=> 0,
            'parent_id'=> 76,
            'content_id'=> 1,
        ]);

        //PREGUNTA17-81
        Bank::create([
            'title'=>'17.	Una vía dañada sin señalética es:',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'a.	Acto sub-estándar',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'b.	Incidente',
            'is_question'=> 0,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'c.	Condición sub-estándar',
            'is_question'=> 0,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'d.	Factores de trabajo ',
            'is_question'=> 0,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        ///Se Termino el Primer Examen de NOTIFICACION, INVESTIGACION Y REPORTE DE INCIDENTES PELIGROSOS Y ACCIDENTES DE TRABAJO

        //EXAMEN COMITÉ DE SEGURIDAD Y SALUD OCUPACIONAL
        //corregido
        //PREGUNTA1-86
        Bank::create([
            'title'=>'1.	Ley de Seguridad y Salud en el Trabajo.',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Ley N° 29783',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 86,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Ley N° 29000',
            'is_question'=> 0,
            'parent_id'=> 86,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	Ley N° 29300',
            'is_question'=> 0,
            'parent_id'=> 86,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	Ley N° 29700',
            'is_question'=> 0,
            'parent_id'=> 86,
            'content_id'=> 2,
        ]);
        //PREGUNTA2-91
        Bank::create([
            'title'=>'2.	¿Por quienes está constituido el Comité de Seguridad y Salud en el Trabajo?',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Representantes del empleador y de los trabajadores.',
            'is_question'=> 0,
            'is_correct' => 1,
            'parent_id'=> 91,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Solo por trabajadores.',
            'is_question'=> 0,
            'parent_id'=> 91,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	Sólo por representantes de la empresa',
            'is_question'=> 0,
            'parent_id'=> 91,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	Por gerencia.',
            'is_question'=> 0,
            'parent_id'=> 91,
            'content_id'=> 2,
        ]);
        //PREGUNTA3-96
        Bank::create([
            'title'=>'3.	¿Cuándo tener un Comité de Seguridad y Salud en el Trabajo o un supervisor?',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);

        Bank::create([
            'title'=>'a.	Los empleadores con 20 o más trabajadores a su cargo constituyen un CSST.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 96,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	No es obligatorio contar con un Comité de SST',
            'is_question'=> 0,
            'parent_id'=> 96,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	En los centros de trabajo con menos de 20 trabajadores no pueden nombran al Supervisor de Seguridad y Salud en el Trabajo.',
            'is_question'=> 0,
            'parent_id'=> 96,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 96,
            'content_id'=> 2,
        ]);
        //PREGUNTA4-101
        Bank::create([
            'title'=>'4.	¿Cuántas personas componen el CSST? ',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Entre 4 a 12 personas',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 101,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Entre 10 a 20 personas',
            'is_question'=> 0,
            'parent_id'=> 101,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	Entre 2 a 10 personas.',
            'is_question'=> 0,
            'parent_id'=> 101,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	Entre 2 a 12 personas.',
            'is_question'=> 0,
            'parent_id'=> 101,
            'content_id'=> 2,
        ]);
        //PREGUNTA5-106
        Bank::create([
            'title'=>'5.	¿Qué requisitos se debe cumplir para ser miembro del Comité de Seguridad y Salud en el Trabajo o un supervisor?',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Ser trabajador de la empresa / tener 18 años como mínimo / capacitación en SST ',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 106,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Basta con ser trabajador de la empresa.',
            'is_question'=> 0,
            'parent_id'=> 106,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	Ser mayor de 18 años / residir en la sede principal.',
            'is_question'=> 0,
            'parent_id'=> 106,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 106,
            'content_id'=> 2,
        ]);
         //PREGUNTA6-111
        Bank::create([
            'title'=>'6.	¿Cómo elige el empleador a sus representantes en el CSST?',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Según a su estructura organizacional y jerárquica designa a los titulares y suplente.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 111,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	El subgerente los designa aleatoriamente.',
            'is_question'=> 0,
            'parent_id'=> 111,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	El administrador en coordinación con gerencia.',
            'is_question'=> 0,
            'parent_id'=> 111,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta.',
            'is_question'=> 0,
            'parent_id'=> 111,
            'content_id'=> 2,
        ]);
        //PREGUNTA7-116
        Bank::create([
            'title'=>'7.	¿Cómo elige los trabajadores a sus representantes en el CSST?',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Mediante votación secreta y directa.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 116,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	En mutuo acuerdo en una reunión.',
            'is_question'=> 0,
            'parent_id'=> 116,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	Un trabajador se puede autodenominar representante.',
            'is_question'=> 0,
            'parent_id'=> 116,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta.',
            'is_question'=> 0,
            'parent_id'=> 116,
            'content_id'=> 2,
        ]);

        //PREGUNTA8-121
        Bank::create([
            'title'=>'8.	Indicar verdadero o falso:
            El empleador debe proporcionar al personal que conforma el Comité de Seguridad y Salud en el Trabajo o al Supervisor de Seguridad y Salud en el Trabajo, una tarjeta de identificación o un distintivo especial visible, que acredite su condición.
            ',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Verdadero',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 121,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Falso',
            'is_question'=> 0,
            'parent_id'=> 121,
            'content_id'=> 2,
        ]);

        //PREGUNTA9-124
        Bank::create([
            'title'=>'9.	¿Cuánto tiempo dura el mandato de los representantes de los trabajadores o del Supervisor de Seguridad y Salud en el Trabajo?',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Un año como mínimo y dos años como máximo',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 124,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Seis menes como mínimo y dos años como máximo',
            'is_question'=> 0,
            'parent_id'=> 124,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	Un año como mínimo y tres años como máximo',
            'is_question'=> 0,
            'parent_id'=> 124,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	No tiene tiempo límite',
            'is_question'=> 0,
            'parent_id'=> 124,
            'content_id'=> 2,
        ]);
        //PREGUNTA10-129
        Bank::create([
            'title'=>'10.	Indicar verdadero o falso:
            Los representantes del empleador ejercerán el mandato por plazo de dos años.
            ',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Falso',
            'is_question'=> 0,
            'parent_id'=> 129,
            'is_correct'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Verdadero',
            'is_question'=> 0,
            'parent_id'=> 129,
            'content_id'=> 2,
        ]);

        //PREGUNTA11-132
        Bank::create([
            'title'=>'11.	Indicar verdadero o falso
            Una de las funciones del CSST es aprobar el programa anual de capacitación de los trabajadores sobre seguridad y salud en el trabajo.
            ',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Verdadero',
            'is_question'=> 0,
            'is_correct' => 1,
            'parent_id'=> 132,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Falso',
            'is_question'=> 0,
            'parent_id'=> 132,
            'content_id'=> 2,
        ]);
        //PREGUNTA12-135
        Bank::create([
            'title'=>'12.	El comité está conformado por:',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	El presidente – el secretario – los miembros.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 135,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	El gerente – los miembros',
            'is_question'=> 0,
            'parent_id'=> 135,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	El presidente – el vocero - los miembros',
            'is_question'=> 0,
            'parent_id'=> 135,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	El supervisor – el vocero – los miembros',
            'is_question'=> 0,
            'parent_id'=> 135,
            'content_id'=> 2,
        ]);
        //PREGUNTA13-140
        Bank::create([
            'title'=>'13.	En las reuniones del comité conversarán temas de:',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Seguridad y salud en el trabajo.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 140,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Seguridad y señalética en trabajo.',
            'is_question'=> 0,
            'parent_id'=> 140,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	Temas sociales dentro del trabajo',
            'is_question'=> 0,
            'parent_id'=> 140,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 140,
            'content_id'=> 2,
        ]);
        //PREGUNTA14-145
        Bank::create([
            'title'=>'14.	Al término de cada sesión del Comité no es obligatorio levantar un Acta.',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Falso',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 145,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Verdadero',
            'is_question'=> 0,
            'parent_id'=> 145,
            'content_id'=> 2,
        ]);
         //PREGUNTA15-148
        Bank::create([
            'title'=>'15.	Es posible vacar a los representantes de CSST por la Inasistencia injustificada a tres (3) sesiones consecutivas del Comité de Seguridad y Salud en el Trabajo o a cuatro (4) alternadas, en el lapso de su vigencia.',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Verdadero ',
            'is_question'=> 0,
            'is_correct' =>0,
            'parent_id'=> 148,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Falso ',
            'is_question'=> 0,
            'parent_id'=> 148,
            'content_id'=> 2,
        ]);

        //PREGUNTA16-151
        Bank::create([
            'title'=>'16.	No es función del CSST el analizar y emitir informes de las estadísticas de los incidentes, accidentes y enfermedades ocupacionales ocurridas en el lugar de trabajo.',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	Falso ',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 151,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	Verdadero',
            'is_question'=> 0,
            'parent_id'=> 151,
            'content_id'=> 2,
        ]);

        //PREGUNTA17-154
        Bank::create([
            'title'=>'17.	¿Dónde y cuándo se dan las reuniones del Comité de Seguridad?',
            'is_question'=> 1,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'a.	El lugar de reuniones debe ser proporcionado por el empleador y deben realizarse dentro de la jornada de trabajo.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 154,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'b.	El lugar de las reuniones se da en la oficina del presidente y se realiza fuera del horario de trabajo.',
            'is_question'=> 0,
            'parent_id'=> 154,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'c.	El lugar de las reuniones puede darse en la oficina que el presidente designe y deben realizarse sólo el turnio diurno.',
            'is_question'=> 0,
            'parent_id'=> 154,
            'content_id'=> 2,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 154,
            'content_id'=> 2,
        ]);
        //
        //Termino del segundo examen COMITÉ DE SEGURIDAD Y SALUD OCUPACIONAL
        //Inicio del INSPECCIONES DE SEGURIDAD

        //PREGUNTA1-159
        Bank::create([
            'title'=>'1.	¿Qué es inspección?',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Proceso de observación directa que acopia datos sobre el trabajo, procesos, condiciones, medidas de protección y cumplimiento de dispositivos legales.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 159,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	La acción de indagar el hecho',
            'is_question'=> 0,
            'parent_id'=> 159,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Verificación del cumplimiento de los estándares establecidos en las disposiciones legales.',
            'is_question'=> 0,
            'parent_id'=> 159,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta.',
            'is_question'=> 0,
            'parent_id'=> 159,
            'content_id'=> 3,
        ]);
        //PREGUNTA2-164
        Bank::create([
            'title'=>'2.	Toda acción o práctica incorrecta ejecutada por el trabajador que puede causar un accidente, es:',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Acto sub-estándar.',
            'is_question'=> 0,
            'is_correct' => 1,
            'parent_id'=> 164,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Inspección',
            'is_question'=> 0,
            'parent_id'=> 164,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Verificación',
            'is_question'=> 0,
            'parent_id'=> 164,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Condición sub-estándar ',
            'is_question'=> 0,
            'parent_id'=> 164,
            'content_id'=> 3,
        ]);
        //PREGUNTA3-169
        Bank::create([
            'title'=>'3.	Toda condición en el entorno del trabajo que puede causar un accidente, es:',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);

        Bank::create([
            'title'=>'a.	Condición sub-estándar',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 169,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Inspección.',
            'is_question'=> 0,
            'parent_id'=> 169,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Acto sub-estándar.',
            'is_question'=> 0,
            'parent_id'=> 169,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas. ',
            'is_question'=> 0,
            'parent_id'=> 169,
            'content_id'=> 3,
        ]);
        //PREGUNTA4-174
        Bank::create([
            'title'=>'4.	Las inspecciones de seguridad permiten:',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Detectar y controlar condiciones subestándares',
            'is_question'=> 0,
            'parent_id'=> 174,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Verifican procedimientos y normas de trabajo, determinando acciones de control preventivas o correctivas.',
            'is_question'=> 0,
            'parent_id'=> 174,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Fomentan la interacción de la seguridad y salud en el trabajo con otras áreas de la empresa.',
            'is_question'=> 0,
            'parent_id'=> 174,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 174,
            'content_id'=> 3,
        ]);
        //PREGUNTA5-179
        Bank::create([
            'title'=>'5.	Indicar verdadero o falso:
            Las inspecciones de SST nos permite descubrir causas de posibles accidentes (que pueden involucrar perdidas en personas, equipo, material y medio ambiente)
            ',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Verdadero',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 179,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Falso',
            'is_question'=> 0,
            'parent_id'=> 179,
            'content_id'=> 3,
        ]);
         //PREGUNTA6-182
        Bank::create([
            'title'=>'6.	Se realizan visitas de inspección para:',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Para Identificar actos y condiciones peligrosas que puedan generar accidentes y/o daños.',
            'is_question'=> 0,
            'parent_id'=> 182,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Para verificar la eficiencia de las acciones correctivas.',
            'is_question'=> 0,
            'parent_id'=> 182,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Para optimizar el desarrollo de los procesos y procedimientos.',
            'is_question'=> 0,
            'parent_id'=> 182,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas',
            'is_question'=> 0,
            'is_correct'=>1,
            'parent_id'=> 182,
            'content_id'=> 3,
        ]);
        //PREGUNTA7-187
        Bank::create([
            'title'=>'7.	Indicar verdadero o falso: El Comité de Seguridad y Salud en el Trabajo tiene como una de sus funciones “Realizar inspecciones periódicas en las áreas administrativas, áreas operativas, instalaciones, maquinaria y equipos, a fin de reforzar la gestión preventiva',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Verdadero',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 187,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Falso ',
            'is_question'=> 0,
            'parent_id'=> 187,
            'content_id'=> 3,
        ]);

        //PREGUNTA8-190
        Bank::create([
            'title'=>'8.	¿Cuáles son los tipos de inspecciones?',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	No planeadas',
            'is_question'=> 0,
            'parent_id'=> 190,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Planeadas ',
            'is_question'=> 0,
            'parent_id'=> 190,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Pre operacionales',
            'is_question'=> 0,
            'parent_id'=> 190,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 190,
            'content_id'=> 3,
        ]);

        //PREGUNTA9-195
        Bank::create([
            'title'=>'9.	¿Cuáles son los pasos de la inspección?',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Programación – Planificación previa – ejecución de la inspección – informe – seguimiento.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 195,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Reunión – designación de área de inspección - seguimiento.',
            'is_question'=> 0,
            'parent_id'=> 195,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Programación - designación de área de inspección – seguimiento – resultados.',
            'is_question'=> 0,
            'parent_id'=> 195,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta.',
            'is_question'=> 0,
            'parent_id'=> 195,
            'content_id'=> 3,
        ]);
        //PREGUNTA10-200
        Bank::create([
            'title'=>'10.	En que paso de la inspección es recomendable observar las condiciones de higiene industrial presentadas como la presencia de ruido, polvo, gases, vibración, entre otros agentes.',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Ejecución de la inspección.',
            'is_question'=> 0,
            'parent_id'=> 200,
            'is_correct'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Informe',
            'is_question'=> 0,
            'parent_id'=> 200,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	seguimiento.',
            'is_question'=> 0,
            'parent_id'=> 200,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 200,
            'content_id'=> 3,
        ]);

        //PREGUNTA11-205
        Bank::create([
            'title'=>'11.	¿Qué hacer cuando observa que alguien trabaja de manera insegura o comete algún acto subestándar?',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Comente acerca de lo que estaba haciendo el trabajador de manera insegura.',
            'is_question'=> 0,
            'parent_id'=> 205,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Exprese su preocupación por la consecuencia de trabajar de esa manera; no por el incumplimiento a una norma, sino por el daño que podría sufrir.',
            'is_question'=> 0,
            'parent_id'=> 205,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Obtenga el compromiso del trabajador para trabajar de manera segura en el futuro.',
            'is_question'=> 0,
            'parent_id'=> 205,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas ',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 205,
            'content_id'=> 3,
        ]);

        //PREGUNTA12-210
        Bank::create([
            'title'=>'12.	Indicar verdadero o falso:
            Las inspecciones de seguridad son una excelente herramienta para entrar en contacto con el trabajador y reconocer y/o motivar el comportamiento seguro
            ',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Verdadero',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 210,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Falso',
            'is_question'=> 0,
            'parent_id'=> 210,
            'content_id'=> 3,
        ]);

        //PREGUNTA13-213
        Bank::create([
            'title'=>'13.	Indicar verdadero o falso:
            Al inicio del recorrido se completa el formato de inspecciones (informe)
            ',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Falso',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 213,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Verdadero',
            'is_question'=> 0,
            'parent_id'=> 213,
            'content_id'=> 3,
        ]);

        //PREGUNTA14-216
        Bank::create([
            'title'=>'14.	Las inspecciones de seguridad y salud en el trabajo están dirigidas a:',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Descubrir – analizar – controlar',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 216,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Crear – ejecutar',
            'is_question'=> 0,
            'parent_id'=> 216,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Analizar – crear - informar',
            'is_question'=> 0,
            'parent_id'=> 216,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas',
            'is_question'=> 0,
            'parent_id'=> 216,
            'content_id'=> 3,
        ]);
            //PREGUNTA15-221
        Bank::create([
            'title'=>'15.	En el siguiente texto complete: Las inspecciones _____________ es aquella que se realizar repentinamente, sin programación y no es comunicada',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	No planeadas',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 221,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Todas son correctas',
            'is_question'=> 0,
            'parent_id'=> 221,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	No pensadas',
            'is_question'=> 0,
            'parent_id'=> 221,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Pre operacionales',
            'is_question'=> 0,
            'parent_id'=> 221,
            'content_id'=> 3,
        ]);

        //PREGUNTA16-226
        Bank::create([
            'title'=>'16.	¿En qué momento se realiza las inspecciones pre-operacionales?',
            'is_question'=> 1,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'a.	Antes de usar un equipo',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 226,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'b.	Durante operatividad del equipo',
            'is_question'=> 0,
            'parent_id'=> 226,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'c.	Después de usar el equipo',
            'is_question'=> 0,
            'parent_id'=> 226,
            'content_id'=> 3,
        ]);
        Bank::create([
            'title'=>'d.	Cuando el operario se encuentre laborando ',
            'is_question'=> 0,
            'parent_id'=> 226,
            'content_id'=> 3,
        ]);
            ///Termino del  3er Examen
            //
            //Comienzo del 4to Examen IPERC

            //PREGUNTA1-231
        Bank::create([
            'title'=>'1.	Definición de peligro:',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Fuente o situación con un potencial para causar daños y deterioro a la salud de las personas, a la propiedad, proceso o al ambiente.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 231,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Situación de daños sólo en las personas.',
            'is_question'=> 0,
            'parent_id'=> 231,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Fuentes potencia de causar deterioro sólo en el ambiente.',
            'is_question'=> 0,
            'parent_id'=> 231,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Fuente o situación con un potencial para causar daños sólo a las maquinarias.',
            'is_question'=> 0,
            'parent_id'=> 231,
            'content_id'=> 4,
        ]);
        //PREGUNTA2-236
        Bank::create([
            'title'=>'2.	Combinación de la probabilidad de que ocurra un evento o exposición peligrosa y la severidad del daño o deterioro de la salud de las personas, a la propiedad, proceso o al ambiente; que puede causar el evento o la exposición, es:',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Riesgo',
            'is_question'=> 0,
            'is_correct' => 1,
            'parent_id'=> 236,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Peligro',
            'is_question'=> 0,
            'parent_id'=> 236,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	IPERC',
            'is_question'=> 0,
            'parent_id'=> 236,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Situación.',
            'is_question'=> 0,
            'parent_id'=> 236,
            'content_id'=> 4,
        ]);
        //PREGUNTA3-241
        Bank::create([
            'title'=>'¿Qué significa IPERC?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);

        Bank::create([
            'title'=>'a)	Identificación de Peligros, Evaluación de Riesgos, determinación de controles.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 241,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Evaluación de riesgos.',
            'is_question'=> 0,
            'parent_id'=> 241,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Controles para el trabajo.',
            'is_question'=> 0,
            'parent_id'=> 241,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Evaluación del peligro',
            'is_question'=> 0,
            'parent_id'=> 241,
            'content_id'=> 4,
        ]);
        //PREGUNTA4-246
        Bank::create([
            'title'=>'¿Cuándo se debe realizar el IPERC BASE? ',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Cuando se identifica una nueva tarea y debe ser revisado una vez al año o cuando la tarea tenga alguna variación.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 246,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Todos los días antes de iniciar las actividades.',
            'is_question'=> 0,
            'parent_id'=> 246,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Cuando desee el supervisor.',
            'is_question'=> 0,
            'parent_id'=> 246,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Una vez a la semana.',
            'is_question'=> 0,
            'parent_id'=> 246,
            'content_id'=> 4,
        ]);
        //PREGUNTA5-251
        Bank::create([
            'title'=>'¿Qué es una tarea rutinaria?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Tarea previamente planificada, definida, establecida y que se encuentra descrita en un documento.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 251,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Tarea no planificada y ni definida,',
            'is_question'=> 0,
            'parent_id'=> 251,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Tarea que no ha sido previamente planificada, definida, establecida, y que no cuenta con un procedimiento o documento de trabajo.',
            'is_question'=> 0,
            'parent_id'=> 251,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Tarea previamente planificada, definida, establecida pero no es necesario que este en el documento.',
            'is_question'=> 0,
            'parent_id'=> 251,
            'content_id'=> 4,
        ]);
         //PREGUNTA6-256
        Bank::create([
            'title'=>'¿Qué es una tarea no rutinaria?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Tarea que no ha sido previamente planificada, definida, establecida, y que no cuenta con un procedimiento o documento de trabajo.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 256,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Tarea ha sido previamente planificada, ',
            'is_question'=> 0,
            'parent_id'=> 256,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Tarea previamente planificada, definida, establecida.',
            'is_question'=> 0,
            'parent_id'=> 256,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 256,
            'content_id'=> 4,
        ]);

        //PREGUNTA7-261
        Bank::create([
            'title'=>'¿Cuáles son los pasos para elaborar el IPERC?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Establecer el contexto, identificar los peligros, analizar los riesgos, evaluar los riesgos, controlar los riesgos.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 261,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Observar y verificar',
            'is_question'=> 0,
            'parent_id'=> 261,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Eliminación - Situación- Ingeniería. ',
            'is_question'=> 0,
            'parent_id'=> 261,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Identificar peligro y observar situación.',
            'is_question'=> 0,
            'parent_id'=> 261,
            'content_id'=> 4,
        ]);

        //PREGUNTA8-266
        Bank::create([
            'title'=>'¿Cuál es el orden de la jerarquía de control de riesgos?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Eliminación – sustitución – ingeniería – administración – EPP',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 266,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Observación – ingeniería – EPP.',
            'is_question'=> 0,
            'parent_id'=> 266,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Sustitución y EPPs',
            'is_question'=> 0,
            'parent_id'=> 266,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Sustitución y observación.s',
            'is_question'=> 0,
            'parent_id'=> 266,
            'content_id'=> 4,
        ]);

        //PREGUNTA9-271
        Bank::create([
            'title'=>'Los trabajadores deben tomar como referencia el IPERC Base, para realizar el IPERC Continuo, de manera que tengan una identificación previa de: ',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Los peligros / aspectos y evaluación de riesgos / impactos y controles.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 271,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Situación / acción / control',
            'is_question'=> 0,
            'parent_id'=> 271,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Situación / control / riesgo',
            'is_question'=> 0,
            'parent_id'=> 271,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Evaluación de riesgos / inspección',
            'is_question'=> 0,
            'parent_id'=> 271,
            'content_id'=> 4,
        ]);
        //PREGUNTA10-276
        Bank::create([
            'title'=>'¿Cuándo y en donde se debe hacer el IPERC - Continuo?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Durante el desarrollo de las tareas en donde sea.',
            'is_question'=> 0,
            'parent_id'=> 276,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Al finalizar las tareas en el campamento.',
            'is_question'=> 0,
            'parent_id'=> 276,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Al inicio de cada tarea en el frente de trabajo.',
            'is_question'=> 0,
            'parent_id'=> 276,
            'is_correct'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Al inicio de la tarea en el bus de transporte mientras vamos al frente de trabajo.',
            'is_question'=> 0,
            'parent_id'=> 276,
            'content_id'=> 4,
        ]);

        //PREGUNTA11-281
        Bank::create([
            'title'=>'¿Cuál es el concepto de RIESGO RESIDUAL?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Es la consecuencia de un accidente.',
            'is_question'=> 0,
            'parent_id'=> 281,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Todo aquello que nos puede causar daño.',
            'is_question'=> 0,
            'parent_id'=> 281,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Es el riesgo Remanente que existe después de que se hayan tomado las medidas de seguridad.',
            'is_question'=> 0,
            'parent_id'=> 281,
            'is_correct'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Todo lo que nos rodea.',
            'is_question'=> 0,
            'parent_id'=> 281,
            'content_id'=> 4,
        ]);

        //PREGUNTA12-286
        Bank::create([
            'title'=>'¿Qué importancia tiene la Matríz de Evaluación de Riesgos en el IPERC?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Nos ayuda a valorar y determinar los niveles de riesgo de los peligros en cada paso de las tareas mediante la Severidad y la Frecuencia.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 286,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	No tiene importancia porque todos los riesgos son iguales.',
            'is_question'=> 0,
            'parent_id'=> 286,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Nos ayuda a identificar los peligros.',
            'is_question'=> 0,
            'parent_id'=> 286,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Ninguna de las anteriores.',
            'is_question'=> 0,
            'parent_id'=> 286,
            'content_id'=> 4,
        ]);

        //PREGUNTA13-291
        Bank::create([
            'title'=>'13.	¿Cuál es la diferencia entre IPERC Continuo y ATS?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Es lo mismo.',
            'is_question'=> 0,
            'parent_id'=> 291,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	El IPERC Continuo se utiliza para Tareas Rutinarias y el ATS para Tareas NO Rutinarias.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 291,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	El IPERC continuo remplaza al AST.',
            'is_question'=> 0,
            'parent_id'=> 291,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Todas son correctas.o',
            'is_question'=> 0,
            'parent_id'=> 291,
            'content_id'=> 4,
        ]);

        //PREGUNTA14-296
        Bank::create([
            'title'=>'¿Cuál es el concepto de RIESGO?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Todo aquello que nos puede causar daño.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 296,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Probabilidad de que un peligro se materialice en determinadas condiciones y genere daños a las personas, equipos y al ambiente.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 296,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Es la ocurrencia de accidentes con daño.',
            'is_question'=> 0,
            'parent_id'=> 296,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Ninguna es correcta.',
            'is_question'=> 0,
            'parent_id'=> 296,
            'content_id'=> 4,
        ]);
            //PREGUNTA15-301
        Bank::create([
            'title'=>'¿Por qué es importante utilizar el IPERC?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Nos ayuda a Identificar los peligros en nuestras áreas de trabajo.',
            'is_question'=> 0,
            'parent_id'=> 301,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Nos ayuda a Evaluar y determinar los niveles de riesgo a los cuales estoy expuesto.',
            'is_question'=> 0,
            'parent_id'=> 301,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'
            c)	Nos permite implementar medidas de control sobre los riesgos y que nuestro trabajo sea más seguro.',
            'is_question'=> 0,
            'parent_id'=> 301,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Todas son correctas.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 301,
            'content_id'=> 4,
        ]);

        //PREGUNTA16-306
        Bank::create([
            'title'=>'¿Qué es el IPERC – Continuo y quién debe usarlo?',
            'is_question'=> 1,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'a)	Herramienta de Gestión que debemos utilizar para Controlar los Riesgos y deben hacerlos todo el personal involucrado en una tarea.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 306,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'b)	Una hoja que nos demora más el inicio de nuestro trabajo y lo hacen solo los que tienen tiempo.',
            'is_question'=> 0,
            'parent_id'=> 306,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'c)	Un documento que lo llena el capataz y el trabajador lo firma.',
            'is_question'=> 0,
            'parent_id'=> 306,
            'content_id'=> 4,
        ]);
        Bank::create([
            'title'=>'d)	Todas son correctas.',
            'is_question'=> 0,
            'parent_id'=> 306,
            'content_id'=> 4,
        ]);

    }
}
