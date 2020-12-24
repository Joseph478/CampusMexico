@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="participants">Participantes:</label>
        <select id="participants" class="form-control select-input" name="participants[]" multiple>
            @foreach($participants as $user)
                <option
                    value="{{ $user->id }}"
                    {{ collect(old('participants'))->contains($user->id) ? 'selected' : '' }}
                >
                    {{ $user->dni. " | " .$user->full_name. " | " .$user->email }}
                </option>
            @endforeach
        </select>
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
