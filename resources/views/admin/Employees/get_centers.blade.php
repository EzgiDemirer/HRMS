<div class="col-md-4">
    <div class="form-group">
        <label>City / Center</label>

        <select name="city_id" id="city_id" class="form-control select2">
            <option value="">Select Employee City</option>

            @if(isset($other['centers']) && !empty($other['centers']))
                @foreach ($other['centers'] as $info)
                    <option
                        @if(old('city_id', $data->city_id ?? '') == $info->id) selected="selected" @endif
                        value="{{ $info->id }}">
                        {{ $info->name }}
                    </option>
                @endforeach
            @endif
        </select>

        @error('city_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

@section("script")
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
@endsection