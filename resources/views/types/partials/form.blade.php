
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

<div class="row">
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control ','autocomplete' =>'off', 'placeholder' => 'Ingrese Nombre','required' => 'required']) !!}
        
        </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            <label>Description:</label>
            <textarea  name="description" class="form-control" value="{{ old('description', $type->description) }}" placeholder="Ingrese Descripción"></textarea>
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