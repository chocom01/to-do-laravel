<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
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
        $requiredRule = Rule::requiredIf($this->method() === "POST");

        return [
            'name' => "$requiredRule|min:5|max:255",
            'user_id' => [$requiredRule, Rule::in(Auth::id())],
            'status_id' => [$requiredRule, Rule::exists('statuses', 'id')],
            'priority_id' => [$requiredRule, Rule::exists('priorities', 'id')]
        ];
    }
}
