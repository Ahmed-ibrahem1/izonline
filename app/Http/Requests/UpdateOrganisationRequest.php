<?php

namespace App\Http\Requests;

use App\Models\Organisation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrganisationRequest extends FormRequest
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
            'name' => ['required','array'],
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string','max:255'],
            'description' => ['required', 'array'],
            'description.en' => ['required', 'string'],
            'description.ar' => ['required', 'string'],
            'attributes' => ['required', 'array'],
            'attributes.en' => ['required', 'string'],
            'attributes.ar' => ['required', 'string'],
            'image' => ['sometimes', 'image'],
            'cover' => ['required', 'image'],
            'website' => ['string',Rule::unique(Organisation::class)->ignore($this->organisation['id'])],
            'instagram' => ['string',Rule::unique(Organisation::class)->ignore($this->organisation['id']),],
            'facebook' => ['string',Rule::unique(Organisation::class)->ignore($this->organisation['id']),],
            'twitter' => ['string',Rule::unique(Organisation::class)->ignore($this->organisation['id']),],
        ];
    }


    public function forUpdate()
    {
        $attr = collect($this->validated())->except(['image','cover']);
        return $attr->toArray();
    }
}
