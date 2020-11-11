<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\SumsTen;

class StoreOrderRequest extends FormRequest
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

        if ($this->paymentMethod == 'credit') {
            $rules = [
                'cart'=>['required'],
                'paymentMethod'=>['required'],
                'cardNumber'=>'required',
                'expiration'=>'required',
                'name'=>'required',
                'security'=>['required', new SumsTen]
            ];
        } else if ($this->paymentMethod=='cash'){
            $rules = [
                'cart'=>['required'],
            ];
        } else {
            $rules = [
                'paymentMethod'=>'required|in:cash,credit'
            ];   
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute is empty!',
            'in' => 'The :attribute must be one of the follwoing: :values'
        ];
    }
}
