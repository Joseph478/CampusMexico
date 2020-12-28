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
        //EXAMEN ENTRADA
        //1
        Bank::create([
            'title'=>' El comportamiento es: ',
            'is_question'=> 1,
            'type'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'Es lo que la persona hace o dice (actos).',
            'is_question'=> 0,
            'parent_id'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>' Aquello que se puede ver o escuchar',
            'is_question'=> 0,
            'parent_id'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>' Son observables y cuantificables',
            'is_question'=> 0,
            'parent_id'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>' Todas son correctas',
            'is_question'=> 0,
            'is_correct' =>1,
            'parent_id'=> 1,
            'content_id'=> 1,
        ]);
        //PREGUNTA2-6
        Bank::create([
            'title'=>' Los activadores',
            'is_question'=> 1,
            'type'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>' Desencadenan, estimulan, activan, motivan o direccionan el comportamiento',
            'is_question'=> 0,
            'parent_id'=> 6,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>' Se producen después del comportamiento',
            'is_question'=> 0,
            'parent_id'=> 6,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>' Son situaciones, eventos o sucesos.',
            'is_question'=> 0,
            'parent_id'=> 6,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	A y C son correctas.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 6,
            'content_id'=> 1,
        ]);
        //PREGUNTA3-11
        Bank::create([
            'title'=>'	El comportamiento se desarrolla de la siguiente manera: ',
            'is_question'=> 1,
            'type'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Antecedentes – Consecuencia - Comportamiento',
            'is_question'=> 0,
            'parent_id'=> 11,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Antecedentes – Reforzadores - Consecuencia',
            'is_question'=> 0,
            'parent_id'=> 11,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Activadores – Comportamiento - Consecuencia',
            'is_question'=> 0,
            'parent_id'=> 11,
            'is_correct'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Activadores – Reforzadores - Consecuencia',
            'is_question'=> 0,
            'parent_id'=> 11,
            'content_id'=> 1,
        ]);
        //PREGUNTA4-16
        Bank::create([
            'title'=>'	Sobre las consecuencias, marque la alternativa correcta:',
            'is_question'=> 1,
            'type'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Sustitución que ocurre luego del comportamiento.',
            'is_question'=> 0,
            'parent_id'=> 16,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Es el efecto del comportamiento.',
            'is_question'=> 0,
            'parent_id'=> 16,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Influye en la repetición del comportamiento.',
            'is_question'=> 0,
            'parent_id'=> 16,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Todas son correctas',
            'is_question'=> 0,
            'parent_id'=> 16,
            'is_correct'=>1,
            'content_id'=> 1,
        ]);
        //PREGUNTA5-21
        Bank::create([
            'title'=>'	Las consecuencias pueden ser evaluadas por:',
            'is_question'=> 1,
            'type'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Significado',
            'is_question'=> 0,
            'parent_id'=> 21,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Tiempo',
            'is_question'=> 0,
            'parent_id'=> 21,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Consistencia',
            'is_question'=> 0,
            'parent_id'=> 21,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Todas son correcta.',
            'is_question'=> 0,
            'parent_id'=> 21,
            'is_correct'=>1,
            'content_id'=> 1,
        ]);
         //PREGUNTA6-26
        Bank::create([
            'title'=>'	SBC se caracteriza por:',
            'is_question'=> 1,
            'type'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Se focaliza en lo positivo.',
            'is_question'=> 0,
            'parent_id'=> 26,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Cada trabajador observa y retroalimenta a sus compañeros.',
            'is_question'=> 0,
            'parent_id'=> 26,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Cada trabajador es observado y retroalimentado por sus compañeros.',
            'is_question'=> 0,
            'parent_id'=> 26,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Todas son correctas.',
            'is_question'=> 0,
            'parent_id'=> 26,
            'is_correct'=>1,
            'content_id'=> 1,
        ]);
        //PREGUNTA7-31
        Bank::create([
            'title'=>'	NO es un ESTADO CRÍTICO:',
            'is_question'=> 1,
            'type'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Prisa',
            'is_question'=> 0,
            'parent_id'=> 31,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>' Fatiga',
            'is_question'=> 0,
            'parent_id'=> 31,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Línea de fuego',
            'is_question'=> 0,
            'parent_id'=> 31,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Frustración',
            'is_question'=> 0,
            'parent_id'=> 31,
            'content_id'=> 1,
        ]);

        //PREGUNTA8-36
        Bank::create([
            'title'=>'	En el proceso de SBC es necesario: ',
            'is_question'=> 1,
            'type'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Observar a sí mismo',
            'is_question'=> 0,
            'parent_id'=> 36,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Observar a los demás',
            'is_question'=> 0,
            'parent_id'=> 36,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Comunicar ',
            'is_question'=> 0,
            'parent_id'=> 36,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Todas son correctas',
            'is_question'=> 0,
            'parent_id'=> 36,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        //PREGUNTA9-41
        Bank::create([
            'title'=>'	Cuando observo un acto inseguro debo: ',
            'is_question'=> 1,
            'type'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Retirarme del lugar-',
            'is_question'=> 0,
            'parent_id'=> 41,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Establecer un comportamiento y la consecuencia. ',
            'is_question'=> 0,
            'parent_id'=> 41,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Avisarle al supervisor.',
            'is_question'=> 0,
            'parent_id'=> 41,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Ninguna es correcta.',
            'is_question'=> 0,
            'parent_id'=> 41,
            'content_id'=> 1,
        ]);
        ///aumentamos
        //PREGUNTA10-46
        Bank::create([
            'title'=>'	¿Qué debo hacer cuando observo un acto seguro?',
            'is_question'=> 1,
            'type'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Agradecer por su comportamiento seguro',
            'is_question'=> 0,
            'parent_id'=> 46,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Compartir con los demás el comportamiento seguro.',
            'is_question'=> 0,
            'parent_id'=> 46,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Ay B son correctas.',
            'is_question'=> 0,
            'parent_id'=> 46,
            'is_correct'=>1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Ignorar su comportamiento seguro.',
            'is_question'=> 0,
            'parent_id'=> 46,
            'content_id'=> 1,
        ]);

        //
        //Termino del EXAMEN ENTRADA
        //Inicio del EXAMEN DE SALIDA

        //PREGUNTA1-51
        Bank::create([
            'title'=>'	La competencia está formado por:',
            'is_question'=> 1,
            'type'=>0,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Conocimientos',
            'is_question'=> 0,
            'parent_id'=> 51,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Aptitud física y mental',
            'is_question'=> 0,
            'parent_id'=> 51,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Actitudes',
            'is_question'=> 0,
            'parent_id'=> 51,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Todas son correctas',
            'is_question'=> 0,
            'parent_id'=> 51,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        //PREGUNTA2-56
        Bank::create([
            'title'=>'	El análisis funcional del ABC explica el comportamiento a través de:',
            'is_question'=> 1,
            'type'=> 0,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Antecedentes o activadores',
            'is_question'=> 0,
            'parent_id'=> 56,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Comportamiento',
            'is_question'=> 0,
            'parent_id'=> 56,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Consecuencia',
            'is_question'=> 0,
            'parent_id'=> 56,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Todas son correctas',
            'is_question'=> 0,
            'parent_id'=> 56,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        //PREGUNTA3-61
        Bank::create([
            'title'=>'	Desencadenan, estimulan, activan, motivan o direccionan el comportamiento',
            'is_question'=> 1,
            'type'=> 0,
            'content_id'=> 1,
        ]);

        Bank::create([
            'title'=>'	Reforzador',
            'is_question'=> 0,
            'parent_id'=> 61,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Consecuencia',
            'is_question'=> 0,
            'parent_id'=> 61,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Activador',
            'is_question'=> 0,
            'parent_id'=> 61,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 61,
            'content_id'=> 1,
        ]);
        //PREGUNTA4-66
        Bank::create([
            'title'=>'	influyen en la probabilidad de que ese comportamiento se repita o desaparezca en el futuro:',
            'is_question'=> 1,
            'type'=>0,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Reforzador',
            'is_question'=> 0,
            'parent_id'=> 66,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Consecuencia',
            'is_question'=> 0,
            'parent_id'=> 66,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Activador',
            'is_question'=> 0,
            'parent_id'=> 66,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Ninguna es correcta',
            'is_question'=> 0,
            'parent_id'=> 66,
            'content_id'=> 1,
        ]);
        //PREGUNTA5-71
        Bank::create([
            'title'=>'	La consecuencia que más refuerza un comportamiento es:',
            'is_question'=> 1,
            'type'=> 0,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Positiva – Inmediata - Cierta',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 71,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Negativa – Inmediata - Cierta',
            'is_question'=> 0,
            'parent_id'=> 71,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Positiva – Lejana - Cierta',
            'is_question'=> 0,
            'parent_id'=> 71,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Negativa – Inmediata - Cierta',
            'is_question'=> 0,
            'parent_id'=> 71,
            'content_id'=> 1,
        ]);
         //PREGUNTA6-76
        Bank::create([
            'title'=>'	Características de la gestión de SBC:',
            'is_question'=> 1,
            'type'=> 0,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Se focaliza en lo positivo',
            'is_question'=> 0,
            'parent_id'=> 76,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Cada trabajador observa y retroalimenta a sus compañeros.',
            'is_question'=> 0,
            'parent_id'=> 76,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Cada trabajador es observado y retroalimentado por sus compañeros.',
            'is_question'=> 0,
            'parent_id'=> 76,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Todas son correctas.',
            'is_question'=> 0,
            'is_correct'=>1,
            'parent_id'=> 76,
            'content_id'=> 1,
        ]);
        //PREGUNTA7-81
        Bank::create([
            'title'=>'	NO es un ERROR CRÍTICO:',
            'is_question'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Ojos no en la tarea',
            'is_question'=> 0,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Exceso de confianza',
            'is_question'=> 0,
            'parent_id'=> 81,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Línea de fuego',
            'is_question'=> 0,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Pérdida del equilibrio, tracción o agarre',
            'is_question'=> 0,
            'parent_id'=> 81,
            'content_id'=> 1,
        ]);

        //PREGUNTA8-86
        Bank::create([
            'title'=>'	En el proceso de SBC es necesario: ',
            'is_question'=> 1,
            'type'=> 0,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Observar a sí mismo',
            'is_question'=> 0,
            'parent_id'=> 86,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Observar a los demás',
            'is_question'=> 0,
            'parent_id'=> 86,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Comunicar ',
            'is_question'=> 0,
            'parent_id'=> 86,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Todas son correctas',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 86,
            'content_id'=> 1,
        ]);

        //PREGUNTA9-91
        Bank::create([
            'title'=>'	Cuando observo un comportamiento inseguro debo: ',
            'is_question'=> 1,
            'type'=> 0,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Acercarme y hablar con mi compañero para sensibilizarlo.',
            'is_question'=> 0,
            'is_correct'=> 1,
            'parent_id'=> 91,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Desarrollar un nuevo modo de trabajo.',
            'is_question'=> 0,
            'parent_id'=> 91,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Comprometer al trabajador firmando una declaración jurada.',
            'is_question'=> 0,
            'parent_id'=> 91,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Lograr la comprensión del trabajador acerca de la sanción que recibirá.',
            'is_question'=> 0,
            'parent_id'=> 91,
            'content_id'=> 1,
        ]);
        //PREGUNTA10-96
        Bank::create([
            'title'=>'	Cuando observo un comportamiento seguro, debo',
            'is_question'=> 1,
            'type'=> 0,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Felicitar al trabajador por su comportamiento seguro.',
            'is_question'=> 0,
            'parent_id'=> 96,
            'is_correct'=> 1,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Sancionar al trabajador.',
            'is_question'=> 0,
            'parent_id'=> 96,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Tomarlo como algo normal y seguir con el trabajo',
            'is_question'=> 0,
            'parent_id'=> 96,
            'content_id'=> 1,
        ]);
        Bank::create([
            'title'=>'	Ignorar al trabajador.',
            'is_question'=> 0,
            'parent_id'=> 96,
            'content_id'=> 1,
        ]);

    }
}
