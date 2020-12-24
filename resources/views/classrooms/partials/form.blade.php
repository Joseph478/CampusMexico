
<div class="box-body">

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Sorry!</strong> Tienes problemas con tu input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




@csrf
<div class="row">
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
        {!! Form::label('course_id', 'Curso') !!}
        {!! Form::select('course_id', $course, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
        {!! Form::label('user_id', 'Facilitador') !!}
        {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6">
    <div class="form-group">
        {!! Form::label('type', 'Tipo Classroom') !!}
        <br>
        <select class="btn btn-secondary dropdown-toggle " class="form-control" name="type" type="text" id="type">
        <option value="corriente">Regular</option>
        <option value="Extraordinario">Extraordinario</option>
        </select>
    </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
        {!! Form::label('start_datetime',null,['style'=>'position:relative;left:-259px'], 'Fecha Inicio') !!}
        {!! Form::text('start_datetime', null, ['class' => 'form-control ','id'=>'datetimepicker1','style'=>'position:relative;left:-259px' ,'autocomplete' =>'off', 'placeholder' => 'Ingrese fecha','required' => 'required']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
        {!! Form::label('end_datetime', 'Fecha Fin') !!}
        {!! Form::text('end_datetime', null, ['class' => 'form-control ','id'=>'datetimepicker1','autocomplete' =>'off', 'placeholder' => 'Ingrese fecha','required' => 'required']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            <label>Plataforma:</label>
            <input type="text" name="platform" class="form-control" value="{{ old('platform', $classroom->platform) }}" placeholder="Ingrese Plataforma">
        </div>
    </div>

</div>
<div class="row">
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            <label>Plataforma ID:</label>
            <input type="text" name="platform_id" class="form-control" value="{{ old('platform_id', $classroom->platform_id) }}" placeholder="Ingrese su ID">
        </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            <label>Contraseña:</label>
            <input type="text" name="platform_password" class="form-control" value="{{ old('platform_password', $classroom->platform_password) }}" placeholder="Ingrese Contraseña ">
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            <label>Plataforma Link:</label>
            <input type="text" name="platform_link" class="form-control" value="{{ old('platform_link', $classroom->platform_link) }}" placeholder="Ingrese su Link">
        </div>
    </div>

</div>


<div class="row my-4">
    <div class="col">
        <div>
            <button type="submit" class="btn btn-primary btn_submit_register">{{ $btnText }}</button>
        </div>
    </div>
</div>
</div>


