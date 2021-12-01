<label> {{$slot}}
    <select name="{{$column}}">
        @foreach ($dropdownData[$table] ?? $task->$table->all() as $record)
            <option value="{{ $record->id }}"
                    {{ old("$column", $task->$column ?? null) == $record->id ? 'selected' : '' }}>
                {{ ucwords($record->name) }}
            </option>
        @endforeach
    </select>
</label>
