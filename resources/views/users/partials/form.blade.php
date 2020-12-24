    <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Llenar todos los campos</h5>
        <hr>
        <form class="">
            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">DOCUMENTO DE IDENTIDAD</label>
                <div class="col-sm-5">
                    <input name="text" type="text" class="form-control">
                </div>
            </div>
            <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">APELLIDOS</label>
                <div class="col-sm-5">
                    <input name="password" placeholder="PATERNO" type="text" class="form-control">
                </div>
                <div class="col-sm-5">
                    <input name="password" placeholder="MATERNO" type="text" class="form-control">
                </div>
            </div>
            <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">NOMBRES</label>
                <div class="col-sm-10">
                    <input name="password" type="text" class="form-control">
                </div>
            </div>

            <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">AREA</label>
                <div class="col-sm-10">
                    <input name="password" type="text" class="form-control" placeholder="Ejemplo: Mantenimiento Mina...">
                </div>
            </div>

            <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">CARGO</label>
                <div class="col-sm-10">
                    <input name="password" type="text" class="form-control" placeholder="Ejemplo: Operador de maquinaria pesada...">
                </div>
            </div>

            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">IMAGEN</label>
                <div class="col-sm-10"><input name="file" id="exampleFile" type="file" class="form-control-file">
                    <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                </div>
            </div>
            <div class="position-relative row form-group"><label for="checkbox2" class="col-sm-2 col-form-label">ROLES</label>
                <div class="col-sm-10">
                    <div class="position-relative">
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
            </div>
            <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2">
                    <button class="btn btn-secondary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
