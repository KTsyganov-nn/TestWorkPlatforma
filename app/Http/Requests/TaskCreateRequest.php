<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string',
            'description'=>'required|string',
            'date_start'=>'required|date',
            'date_end'=>'required|date|after_or_equal:date_start',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'=>"Поле заголовок должно быть заполненым",
            'description.required'=>"Поле Описание должно быть заполненым",
            'date_start.required'=>"Поле дата начала должно быть заполненым",
            'date_end.required'=>"Поле дата конца должно быть заполненым",
            'date_end.after_or_equal'=>"Поле дата конца не может быть раньше даты начала"

        ];
    }
}
