<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Здесь можно реализовать логику авторизации пользователя
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fio' => 'required|string|max:255', // Поле FIO должно быть обязательным, строкой и не более 255 символов
            'phone' => 'required|string|max:20', // Поле телефон должно быть обязательным, строкой и не более 20 символов
            'email' => 'required|email|max:255', // Поле email должно быть обязательным, email и не более 255 символов
            'company' => 'nullable|string|max:255', // Поле компания может быть пустым или строкой и не более 255 символов
            'birthday' => 'nullable|date', // Поле дата рождения может быть пустым или датой
            'image' => 'nullable|url|max:255', // Поле изображение может быть пустым или URL и не более 255 символов
        ];
    }
}
