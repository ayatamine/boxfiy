<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'ticket_category_id'=> 'required|exists:ticket_categories,id',
            'order_id' =>'sometimes|nullable|integer',
            'title'=>'required|string|max:192',
            'content' =>'required|string',
        ];
    }
}
