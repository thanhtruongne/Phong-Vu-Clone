@if (isset($filter['filter']['status']))
<select name="status" class="input-sm form-control input-s-sm inline">
    @foreach ($filter['filter']['status'] as $key =>  $record)
        <option {{ request('status') == $key ? "selected" :  old('status') }} value="{{ $key }}">{{ $record }}</option>
    @endforeach
</select>
@endif
