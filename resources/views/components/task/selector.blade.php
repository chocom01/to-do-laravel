<select class="bg-white" name="{{$column}}">
    @foreach ($records as $record)
        <option value="{{ $record->id }}" {{ old("$column", $task->$column ?? null) == $record->id ? 'selected' : '' }}>
            {{ ucwords($record->name) }}
        </option>
    @endforeach

    @error($column)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</select>

