@csrf

<div class="form-row">
    <div class="form-group col">
        <label for="enddate">Fecha de la asistencia:</label>
        <input type="text" class="form-control datepicker"
               value="{{ old('assistance_date', $assistance->assistance_date) }}" id="assistanceDate" name="assistance_date" placeholder="Ingrese fecha">
    </div>
    <fieldset class="form-group col">
        <label class="col-form-label">Modalidad:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio"
                   name="is_virtual" id="type1"
                   value="1"
                {{ (old('is_virtual', $assistance->is_virtual) == '1') ? 'checked' : '' }}
            >
            <label class="form-check-label" for="type1">
                Virtual
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio"
                   name="is_virtual" id="type2"
                   value="0"
                {{ (old('is_virtual', $assistance->is_virtual) == '0') ? 'checked' : '' }}
            >
            <label class="form-check-label" for="type2">
                Presencial
            </label>
        </div>
    </fieldset>
</div>

<div class="form-row">

</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary btn_submit_register">
                    <span class="btn-icon-wrapper pr-1 opacity-8">
                        <i class="fa fa-save"></i>
                    </span>
        {{ $btnText }}
    </button>
</div>
