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
            'title'=>'Acto sub-estándar',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'Incidente',
            'is_question'=> 0,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'Condición sub-estándar',
            'is_question'=> 0,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'Factores de trabajo ',
            'is_question'=> 0,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        ///Se Termino el Primer Examen de NOTIFICACION, INVESTIGACION Y REPORTE DE INCIDENTES PELIGROSOS Y ACCIDENTES DE TRABAJO
    }
}
