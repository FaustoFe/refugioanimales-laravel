<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AnimalUpdateRequest extends FormRequest
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
      'nombre' => ['required', 'string', 'max:50'],
      'edad' => ['required'],
      'sexo' => ['required'],
      'castrado' => ['required'],
      'vacunas' => ['sometimes', 'nullable', 'string', 'max:300'],
      'descripcion' => ['sometimes', 'nullable', 'string', 'max:500'],
      'raza_id' => ["required", "integer", "exists:razas,id"]
    ];
  }
}
