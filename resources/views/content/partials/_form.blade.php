@csrf

<div class="form-row">
    <div class="form-group col">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control"
            value="{{ old('name', $content->name) }}" id="name" name="name" placeholder="Ingrese el nombre del {{ $type->name }}">
    </div>

    @if($type->id == '1')
        <div class="form-group col">
            <label for="order">orden:</label>
            <input type="number" class="form-control" min="1"
                value="{{ old('order', $content->order) }}" id="order" name="order" placeholder="Ingrese el nro de orden">
        </div>
    @endif

</div>
@if($type->id != '1')
    <div class="form-row">
        <div class="form-group col">
            <label for="contentLink">Enlace:</label>
            <input type="text" class="form-control"
                value="{{ old('name', $content->content_link) }}" id="contentLink" name="content_link" placeholder="Ingrese el enlace del {{ $type->name }}">
        </div>
    </div>
@endif

@if($type->id != '1')
    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input  id="fileDocument"
        data-initial-preview="{{!($content->attachment() === NULL) ? $content->attachment() : ""}}"
        name="attachment" data-allowed-file-extensions='["csv", "txt","pdf","xlsx","docx","pptx"]'
                class="form-control-file"  type="file"  data-show-preview="false" >
    </div>
@endif

@if($type->id == 1)
    <div class="form-group">
        <label for="description">Descripción:</label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $content->description) }}</textarea>
    </div>
@endif

<div class="form-group">
    <button type="submit" class="btn btn-primary btn_submit_register">
                    <span class="btn-icon-wrapper pr-1 opacity-8">
                        <i class="fa fa-save"></i>
                    </span>
        {{ $btnText }}
    </button>
</div>
