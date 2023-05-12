<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Rules\PhoneNumber;

use function GuzzleHttp\Promise\all;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return request()->user()?->can('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [

            'username' => ['required', 'alpha_dash', 'max:255', Rule::unique(User::class)->ignore($this->user['id'])],
            'password' => ['sometimes', Password::min(8)->letters()->numbers()],
            'first_name' => ['required', 'max:255'],
            'middle_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user['id'])],
            'phone_number' => ['sometimes', new PhoneNumber],
        ];
    }

    public function forUpdate()
    {
        $attr = collect($this->validated());
        return $attr->toArray();
    }
}
