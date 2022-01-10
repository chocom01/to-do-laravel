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
        $roleRule = Auth::user()->hasRole('admin')
            ? Rule::exists('users', 'id')
            : Rule::in(Auth::id());

        return [
            'name' => "required|min:5|max:255",
            'user_id' => ['required', $roleRule],
            'status_id' => ['required', Rule::exists('statuses', 'id')],
            'priority_id' => ['required', Rule::exists('priorities', 'id')]
        ];
    }
}
