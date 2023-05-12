<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'parent_id' => ['nullable', Rule::notIn(request()->category->childrenIds(true))],

            'title' => ['required', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.ar' => ['required', 'string', 'max:255'],

            'featured' => ['boolean'],

            'icon' => ['sometimes', 'image'],
        ];
    }

    public function forUpdate()
    {
        $attr = collect($this->validated())->except(['icon']);
        $attr['featured'] = $this->safe()['featured'] ?? false;
        return $attr->toArray();
    }
}
