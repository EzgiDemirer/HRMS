<div class="col-md-4">
    <div class="form-group">

        <label>Governorate</label>

        <select name="governorate_id" id="governorate_id" class="form-control select2">
            <option value="">Select Employee Governorate</option>

            @if(isset($other['governorates']) && !empty($other['governorates']))
                @foreach ($other['governorates'] as $info)
                    <option
                        @if(old('governorate_id', $data->governorate_id ?? '') == $info->id) selected="selected" @endif
                        value="{{ $info->id }}">
                        {{ $info->name }}
                    </option>
                @endforeach
            @endif

        </select>

        @error('governorate_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror

    </div>
</div>


@section("script")

<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>

<script>

$(document).ready(function(){

    $('.select2').select2({
        theme: 'bootstrap4'
    });

});

</script>

@endsection