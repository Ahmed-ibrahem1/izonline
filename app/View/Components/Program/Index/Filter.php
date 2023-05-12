<?php

namespace App\View\Components\Program\Index;

use App\Models\Category;
use Illuminate\View\Component;

class Filter extends Component
{
    public $categories;
    public $sort;
    public $languages;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = $this->formatCategories();
        $this->sort = [
            'price-lowest' => trans('index-program.price-lowest'),
            'price-highest' => trans('index-program.price-highest'),
            'created_at' => trans('index-program.newest'),
        ];
        $this->languages = [
            'en' => config('languages.en.title'),
            'ar' => config('languages.ar.title'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.program.index.filter');
    }

    private function formatCategories()
    {
        $tree = Category::tree();

        $t = [];
        foreach ($tree as $cat) {
            $this->formatChildren($cat, '', $t);
        }
        return $t;
    }

    private function formatChildren($category, $prefix = '', &$t = [])
    {
        $t[$category->id] = $prefix . $category->title;

        foreach ($category->children as $child) {
            $this->formatChildren($child, $prefix . '- ', $t);
        }
    }
}
