@csrf

<div class="form-group">
<h4><strong>{{$classroom->name}}</strong></h4>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
    <label>Nombre</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $test->name) }}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Fecha Inicio</label>
        <input type="date" autocomplete="off" class="form-control" name="start_date" value="{{ old('start_date', $test->start_date) }}">
    </div>

    <div class="form-group col-md-6">
        <label>Fecha Termino</label>
        <input type="date" autocomplete="off" class="form-control" name="end_date" value="{{ old('end_date', $test->end_date) }}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
    <label>Cantidad Intentos</label>
    <input type="text" class="form-control" name="tried" value="{{ old('tried', $test->tried) }}">
    </div>

    <div class="form-group col-md-6">
        <label>Tipo Intento</label>
        <select class="form-control" name="save_tried" value="{{ old('save_tried', $test->save_tried) }}">
            <option value="0">Mas alta</option>
        <option value="1">Mas reciente</option>
        <option value="2">Promedio</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Nota Maxima</label>
        <input type="text" class="form-control" name="grade_max" value="{{ old('grade_max', $test->grade_max) }}">
    </div>

    <div class="form-group col-md-6">
        <label>Tiempo <small class="text-danger">(MINUTOS)</small></label>
        <input type="text" class="form-control" name="time" value="{{ old('time', $test->time) }}">
    </div>

</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Cant. preguntas</label>
        <input type="text" class="form-control" name="number_question" value="{{ old('number_question', $test->number_question) }}">
    </div>

    <div class="form-group col-md-6">
        <label>Tipo Examen</label>
        <select class="form-control" name="type" value="{{ old('type', $test->type) }}">
            <option value="0">Examen Regular</option>
            <option value="1">Examen Inicio</option>
            <option value="2">Encuesta</option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="is_qualified" value="1"
    {{ old('is_qualified', $test->is_qualified) == '1' ? 'checked' : '' }}>
    <label class="form-check-label">
        Desea que el examen sea promediable
    </label>
    </div>
</div>

<div class="form-group">
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="random" value="1"
    {{ old('random', $test->random) == '1' ? 'checked' : '' }}>
    <label class="form-check-label">
        Mezclar aleatoriamente las respuestas?
    </label>
    </div>
</div>

<div class="form-group">
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="view_answer" value="1"
    {{ old('view_answer', $test->view_answer) == '1' ? 'checked' : '' }}>
    <label class="form-check-label">
        Desea que el participante vea las respuestas al final de la evaluacion?
    </label>
    </div>
</div>


<input type="hidden" name="classroom_id" value="{{$classroom->id}}">
<button type="submit" class="btn btn-primary">{{ $btnText }}</button> ó
<a href="#">Cancelar</a>
