<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest{
    public function authorize(){
        return true;

    }

    public function rules(){
        $id = $this->id ?? '';

        $rules = [
            'name' => 'required|string|max:255|min:3',
            'email' => "required|email|unique:users,email,{$id},id",
            'password' => 'required|max:15|min:6'
        ];

        if($this->isMethod('put')){
            $rules['password'] = 'nullable|max:15|min:6';
            
        }

        return $rules;

    }

}
