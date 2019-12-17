<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnuncio extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'=>'required|min:3|max:255',
            'descripcion'=>'required|min:10|max:500',
            'precio'=>'required|numeric|min:0',
            'imagen'=>'nullable|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ];
    }
    
    //retorna los mensajes
    public function messages()
    {
        return [
            'titulo.required'=>'El titulo es obligatorio y debe tener mas de 3 caracteres',
            'titulo.min'=>'El titulo debe tener mas de 3 caracteres',
            'titulo.max'=>'El titulo se excede de caracteres max 255',
            'descripcion.required'=>'La descripcion es obligatorio y debe tener mas de 10 caracteres',
            'descripcion.min'=>'La descripcion debe tener mas de 10 caracteres',
            'descripcion.max'=>'La descripcion se excede de caracteres max 500',
            'precio.required'=>'El precio es obligatorio',
            'precio.min'=>'El precio debe ser positivo',
            'precio.numeric'=>'El precio debe ser numerico',
            'imagen.max'=>'La imagen no puede se mayor que 2048 kilobytes',
            'imagen.mimes'=>'La imagen debe de ser de tipo: jpg, jpeg, png, gif, webp',
            'imagen.image'=> 'Debe ser una imagen',
        ];
    }
}
