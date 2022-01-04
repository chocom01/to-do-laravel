<select name="{{$column}}">
    @foreach ($object->$table->all() as $record)
        <option value="{{ $record->id }}" {{ old("$column", $object->$column ?? null) == $record->id ? 'selected' : '' }}>
            {{ ucwords($record->name) }}
        </option>
    @endforeach
</select>

