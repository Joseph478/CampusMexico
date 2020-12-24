<h3 class="card-title">Ingrese los datos de la programación</h3>
@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="course">Curso</label>
        <select id="course" class="form-control select-input" name="course_id">
            @foreach($courses as $course)
                <option
                    value="{{ $course->id }}"
                    {{ old('course_id', $classroom->course_id) == $course->id ? 'selected' : '' }}
                >
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="selectCompany">Facilitador</label>
        <select id="selectCompany" class="form-control select-input" name="user_id">
            @foreach($facilitators as $facilitator)
                <option
                    value="{{ $facilitator->id }}"
                    {{ old('user_id', $classroom->user_id) == $facilitator->id ? 'selected' : '' }}
                >
                    {{ $facilitator->full_name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <fieldset class="form-group col">
        <label class="col-form-label">Tipo:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio"
                name="type" id="type1"
                value="regular"
                {{ (old('type', $classroom->type) == 'regular' || old('type', $classroom->type) == 'REGULAR') ? 'checked' : '' }}
            >
            <label class="form-check-label" for="type1">
                Regular
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio"
                name="type" id="type2"
                value="extraordinario"
                {{ (old('type', $classroom->type) == 'extraordinario' || old('type', $classroom->type) == 'EXTRAORDINARIO') ? 'checked' : '' }}
            >
            <label class="form-check-label" for="type2">
                Extraordinario
            </label>
        </div>
    </fieldset>
    <fieldset class="form-group col">
        <label class="col-form-label">Modalidad:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio"
                name="modality" id="modality1" value="virtual"
                {{ old('modality', $classroom->modality) == 'virtual' ? 'checked' : '' }}
            >
            <label class="form-check-label" for="modality1">
                Virtual
            </label>
        </div>
        <div class="form-check">
            <input
                class="form-check-input" type="radio"
                name="modality" id="modality2" value="presencial"
                {{ old('modality', $classroom->modality) == 'presencial' ? 'checked' : '' }}
            >
            <label class="form-check-label" for="modality2">
                Presencial
            </label>
        </div>
        <div class="form-check">
            <input
                class="form-check-input" type="radio"
                name="modality" id="modality3" value="semipresencial"
                {{ old('modality', $classroom->modality) == 'semipresencial' ? 'checked' : '' }}
            >
            <label class="form-check-label" for="modality3">
                Semipresencial
            </label>
        </div>

    </fieldset>
</div>

<div class="form-group">
    <div class="form-check">
        <input
            class="form-check-input" type="checkbox" id="isFree"
            name="is_free" value="1"
            {{ old('is_free', $classroom->is_free) == '1' ? 'checked' : '' }}
        >
        <label class="form-check-label" for="isFree">
            ¿Es gratuito?
        </label>
    </div>
</div>

<div class="form-group">
    <div class="form-check">
        <input
            class="form-check-input" type="checkbox" id="testBeginRequired"
            name="test_begin_required" value="1"
            {{ old('test_begin_required', $classroom->test_begin_required) == '1' ? 'checked' : '' }}
        >
        <label class="form-check-label" for="testBeginRequired">
            ¿Tiene examen de entrada obligatorio?
        </label>
    </div>
</div>

<div class="form-row">
    <div class="form-group col">
        <label for="startdate" >Fecha y Hora del Curso:</label>
        <input type="text" class="form-control datetimepicker"
            value="{{ old('start_datetime', $classroom->start_datetime) }}" id="startdate" name="start_datetime" placeholder="Ingrese fecha y hora">
    </div>
    <div class="form-group col">
        <label for="enddate">Fecha de finalización:</label>
        <input type="text" class="form-control datepicker"
            value="{{ old('end_datetime', $classroom->end_datetime) }}" id="enddate" name="end_datetime" placeholder="Ingrese fecha">
    </div>
    <div class="form-group col">
        <label for="vacancies">Vacantes:</label>
        <input type="number" class="form-control"
            value="{{ old('vacancies', $classroom->vacancies) }}" id="vacancies" name="vacancies" placeholder="Ingrese cantidad de vacantes">
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary btn_submit_register">
                    <span class="btn-icon-wrapper pr-1 opacity-8">
                        <i class="fa fa-save"></i>
                    </span>
        {{ $btnText }}
    </button>
</div>
