@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <h6 class="card-title">{{ $btnTitle }}</h6>

        <div class="row align-items-center">

            <div class="col-md-4">
                <div class="kv-avatar">
                    <div class="file-loading">
                        <input
                            id="avatar"
                            name="avatar"
                            type="file"
                            class="form-control-file"
                            data-initial-preview="{{!($user->avatar() === NULL) ? $user->avatar() : "https://placehold.co/600x400?text=Selecione+Un+Avatar&font=lato"}}">
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dni">Dni</label>
                            <input id="dni" type="text" class="form-control " name="dni" value="{{ old('dni', $user->dni) }}" placeholder="Ingrese dni">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombres</label>
                            <input id="name" type="text" class="form-control " name="name" value="{{ old('name', $user->name) }}" placeholder="Ingrese solo Nombres">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input type="text" class="form-control " name="last_name"
                                   value="{{ old('last_name', $user->last_name) }}" placeholder="Ingrese Apellidos">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="area">Area</label>
                            <input type="text" class="form-control" name="area" value="{{ old('area', $user->area) }}" placeholder="Ingrese El Area">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">Cargo</label>
                            <input type="text" class="form-control" name="position" value="{{ old('position', $user->position) }}" placeholder="Ingrese El Cargo">
                        </div>
                    </div>
                </div>

            </div>

            <div class="col">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Correo Electrononico</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Ingrese Correo Electronico">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Ingrese Telefono">
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="col">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password"  placeholder="Ingrese Contraseña">
                            <input type="hidden"  name="id" value="{{ old('id', $user->id) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmed">Repetir contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation"  placeholder="Repita Contraseña">
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">IMAGEN</label>--}}
{{--            <div class="col-sm-10"><input name="file" id="exampleFile" type="file" class="form-control-file">--}}
{{--                <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary btn_submit_register">
                    <span class="btn-icon-wrapper pr-1 opacity-8">
                        <i class="fa fa-save"></i>
                    </span>
                    {{ $btnText }}
                </button>
            </div>
        </div>
    </div>
</div>
