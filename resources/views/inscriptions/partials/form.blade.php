
<div class="box-body">

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Sorry!</strong> Tienes problemas con tu input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




@csrf
<div class="row">
    <label for="">Usuarios a Inscribir</label>
    <div class="input-group mb-3">

  {{--<select class="custom-select select-input" id="inputGroupSelect01">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{$user->dni. " | " .$user->full_name }}</option>
                        @endforeach
  </select>--}}
</div>
</div>



<div class="row my-4">
    <div class="col">
        <div>
            <button type="submit" class="btn btn-primary btn_submit_register">{{ $btnText }}</button>
        </div>
    </div>
</div>
</div>


