<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskValidationRequest extends FormRequest
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
        $postRule = $this->method() === "POST" ? 'required' : '';

        return [
            'name' => "$postRule|max:255",
            'user_id' => [$postRule, Rule::exists('users', 'id')],
            'status_id' => [$postRule, Rule::exists('statuses', 'id')],
            'priority_id' => [$postRule, Rule::exists('priorities', 'id')]
        ];
    }
}
