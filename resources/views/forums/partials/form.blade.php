<div class="box-body">
    @csrf
        <div class="form-group col">
            <div class="form-group">
                <label>Correo:</label>
                <input type="text" name="email" class="form-control" value="{{ old('email', $forum->email) }}" placeholder="Ingrese email">
            </div>
        </div>

        <div class="form-group col">
            <div class="form-group">
                <label for="temary">Escriba su Pregunta:</label>
                <textarea class="form-control" id="title" name="title" rows="6">{{ old('title', $forum->title) }}</textarea>
            </div>
        </div>
    <br>
    <div class="form-group col">
            <div>
                <button type="submit" class="btn btn-primary btn_submit_register">{{ $btnText }}</button>
            </div>
    </div>
    </div>
