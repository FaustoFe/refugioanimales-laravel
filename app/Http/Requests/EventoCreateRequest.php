<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EventoCreateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return Auth::check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'titulo' => ['required', 'string', 'max:100'],
      'lugar' => ['required', 'string', 'max:100'],
      'fecha' => ['required', 'date', 'after:today'],
      'hora_ini' => ['required', 'date_format:H:i'],
      'hora_fin' => ['required', 'date_format:H:i', 'after:hora_ini'],
      'descripcion' => ['sometimes', 'nullable', 'string', 'max:500']
    ];
  }
}
