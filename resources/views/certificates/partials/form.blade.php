
<div class="box-body">

<div class="form-group col-md-4">

        <label for="template">Seleccione un modelo</label>
        <input type="file" class="form-control-file" id="image"
                data-initial-preview="{{!($certificate->image() === NULL) ? $certificate->template() : "https://placehold.co/800x600?text=Selecione+Una+Imagen&font=lato" }}"
                name="template">
        </input>
        </div>


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
            <textarea  name="description" class="form-control" value="{{ old('description', $certificate->description) }}" placeholder="Ingrese Descripción"></textarea>
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
