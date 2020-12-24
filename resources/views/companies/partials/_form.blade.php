@csrf

<div class="form-row">
    <div class="form-group col-md-6">
        <label>RUC</label>
        <input type="number" name="ruc"
            class="form-control" value="{{ old('ruc', $company->ruc) }}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label>RAZON SOCIAL</label>
        <input type="text" name="name"
            class="form-control" value="{{ old('name', $company->name) }}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label>DIRECCION</label>
        <input type="text" name="address"
            class="form-control" value="{{ old('address', $company->address) }}">
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $btnText }}</button> ó
<a href="{{route('companies.index')}}">Cancelar</a>
