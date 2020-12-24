@csrf

<div class="form-row">
    <div class="form-group col">
        <label for="enddate">Fecha de la reunión:</label>
        <input type="text" class="form-control datepicker"
               value="{{ old('meeting_date', $meeting->meeting_date) }}" id="meetingDate" name="meeting_date" placeholder="Ingrese fecha">
    </div>
    <div class="form-group col">
        <label for="platform" >Plataforma:</label>
        <input type="text" class="form-control"
               value="{{ old('platform', $meeting->platform) }}" id="platform" name="platform" placeholder="Ingrese plataforma">
    </div>
</div>

<div class="form-row">
    <div class="form-group col">
        <label for="platformId">id de la reunión:</label>
        <input type="text" class="form-control"
               value="{{ old('platform_id', $meeting->platform_id) }}" id="platformId" name="platform_id" placeholder="Ingrese id de la sala">
    </div>
    <div class="form-group col">
        <label for="platformPassword">contraseña:</label>
        <input type="text" class="form-control"
               value="{{ old('platform_password', $meeting->platform_password) }}" id="platformPassword" name="platform_password" placeholder="Ingrese contraseña de la sala">
    </div>
</div>

<div class="form-group">
    <label for="platformLink">Enlace para ingresar a la reunión:</label>
    <input type="url" class="form-control"
           value="{{ old('platform_url', $meeting->platform_url) }}" id="platformUrl" name="platform_url"
           placeholder="Ingrese enlace de la sala virtual">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary btn_submit_register">
                    <span class="btn-icon-wrapper pr-1 opacity-8">
                        <i class="fa fa-save"></i>
                    </span>
        {{ $btnText }}
    </button>
</div>
