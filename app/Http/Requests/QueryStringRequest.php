<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QueryStringRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'perPage' => Rule::in([10, 25, 50]),
            'orderBy' => Rule::in(['name', 'user_id', 'status_id', 'priority_id']),
            'sortBy' => Rule::in(['asc', 'desc'])
        ];
    }
}

