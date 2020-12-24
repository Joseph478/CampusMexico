


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



<div class="box-body">
@csrf
<div class="form-row" >
    <div class="form-group col">
        <div class="form-group">
            <label>Preguntas:</label>
            <input type="text" name="title" class="form-control" value="{{ old('name', $banks->title) }}" placeholder="Ingrese titulo">
        </div>
    </div>
    <div class="form-group col">
        <div class="form-group">
        {!! Form::label('content_id', 'Contenido') !!}
        {!! Form::select('content_id', $contents, null, ['class' => 'form-control']) !!}

        </select>
        </div>
    </div>
</div>


<br>

<div class="row my-4">
    <div class="col">
        <div>
            <button type="submit" class="btn btn-primary btn_submit_register">{{ $btnText }}</button>
        </div>
    </div>
</div>
</div>


