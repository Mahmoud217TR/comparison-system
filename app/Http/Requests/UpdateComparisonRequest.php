<?php

namespace App\Http\Requests;

use App\Models\Comparison;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateComparisonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Comparison $comparison)
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'state' => ['required', Rule::in($comparison->states())],
        ];
    }
}
