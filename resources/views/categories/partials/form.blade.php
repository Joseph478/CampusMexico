
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
            <label>Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $categories->name) }}" placeholder="Ingrese nombre">
        </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
        <label>Descripción:</label>
        <textarea name="description" cols="20" rows="3" class="form-control" placeholder="Ingrese una descripción">{{ old('description', $categories->description) }}</textarea>
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


