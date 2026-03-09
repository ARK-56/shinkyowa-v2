<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebInquiryRequest extends FormRequest
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
            "country_id" => ["required", "exists:countries,id"],
            "stock_id" => ["required", "exists:stocks,id"],
            "name" => ["required", "string"],
            "email" => ["required", "email"],
            "phone" => ["required", "integer"],
            "country" => ["required", "string"],
            "message" => ["string"],
        ];
    }

    public function messages()
    {
        return [
            "country_id.required" => "Country is required",
            "country_id.exists" => "Country does not exist",

            "stock_id.required" => "Stock Id is required",
            "stock_id.exists" => "Stock Id does not exist",

            "name.required" => "Full Name is required",
            "name.string" => "Full Name is not a valid string",

            "email.required" => "Email is required",
            "email.email" => "Email is not valid",

            "phone.required" => "Phone No is required",
            "phone.number" => "Phone No is not valid",

            "country.required" => "Country is required",
            "country.string" => "Country is not a valid string",

            "message.string" => "Message is not a valid string",
        ];
    }
}
