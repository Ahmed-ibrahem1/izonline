<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
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
            'parent_id' => ['nullable', Rule::exists(Category::class, 'id')],

            'title' => ['required', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.ar' => ['required', 'string', 'max:255'],

            'featured' => ['boolean'],

            'icon' => ['required', 'image'],
        ];
    }

    public function forStore()
    {
        $attr = collect($this->validated())->except(['icon']);
        $attr['featured'] = $this->safe()['featured'] ?? false;
        return $attr->toArray();
    }
}
