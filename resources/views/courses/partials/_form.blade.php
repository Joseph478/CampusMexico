@csrf

<div class="form-row">
    <div class="form-group col-md-4">
        <div class="kv-avatar">
        <input type="file" class="form-control-file" id="image"
        data-initial-preview="{{!($course->image() === NULL) ? $course->image() : "https://placehold.co/600x400?text=Selecione+Una+Imagen&font=lato" }}"
        name="image">
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control"
            id="name"
            name="name"
            placeholder="Nombre del curso"
            value="{{ old('name', $course->name) }}">
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <select id="category" class="form-control select-input" name="category_id">
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="selectCompany">Empresa</label>
            <select id="selectCompany" class="form-control select-input" name="company_id">
                <option value="">---------</option>
                @foreach($companies as $company)

                    <option
                        value="{{ $company->id }}"
                        {{ old('company_id', $course->company_id) == $company->id ? 'selected' : '' }}
                    >
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">
                Si el curso es dictado por IGH dejar en blanco.
            </small>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col">
        <label for="gradeMin">Nota Minima:</label>
        <input type="text" class="form-control"
            value="{{ old('grade_min', $course->grade_min) }}" id="gradeMin" name="grade_min" placeholder="Ingrese la nota minima para Aprobar">
    </div>
    <div class="form-group col">
        <label for="hour">Horas Capacitadas:</label>
        <input type="text" class="form-control"
            value="{{ old('hour', $course->hour) }}" id="hour" name="hour" placeholder="Ingrese las horas totales dictadas">
    </div>
    <div class="form-group col">
        <label for="validity">Validez del certificado:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <input type="text" class="form-control"
                    value="{{old('validity', $course->validity)}}" id="validity" name="validity" placeholder="Ingrese vigencia">
            </div>
            <select class="form-control" name="type_validity">
                <option value="1" {{ old('type_validity', $course->type_validity) == '1' ? 'selected' : '' }}>Años</option>
                <option value="2" {{ old('type_validity', $course->type_validity) == '2' ? 'selected' : '' }}>Meses</option>
                <option value="3" {{ old('type_validity', $course->type_validity) == '3' ? 'selected' : '' }}>Dias</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="description">Descripción:</label>
    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $course->description) }}</textarea>
</div>

<div class="form-group">
    <label for="temary">Contenido:</label>
    <textarea class="form-control" id="temary" name="temary" rows="6">{{ old('temary', $course->temary) }}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary btn_submit_register">
                    <span class="btn-icon-wrapper pr-1 opacity-8">
                        <i class="fa fa-save"></i>
                    </span>
        {{ $btnText }}
    </button>
</div>
