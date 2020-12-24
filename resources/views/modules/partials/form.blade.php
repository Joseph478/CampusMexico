<div class="box-body">
    @csrf
        <div class="form-group col">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $module->name) }}" placeholder="Ingrese Nombre">
            </div>
        </div>

        <div class="form-group col">
            <div class="form-group">
                <label for="temary">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="6">{{ old('description', $module->description) }}</textarea>
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
