<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Category extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public $translatable = ['title'];

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public static function tree()
    {
        $allCategories = Category::all();

        $rootCategories = $allCategories->whereNull('parent_id');

        self::getChildren($rootCategories, $allCategories);

        return $rootCategories;
    }

    private static function getChildren($categories, Collection $allCategories)
    {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id', $category->id);
            self::getChildren($category->children, $allCategories);
        }
    }

    public function parentsIds(bool $includeSelf = false)
    {
        $parents = $includeSelf ? [$this->id] : [];

        $tempCat = $this;
        while ($tempCat->parent_id) {
            $parents[] = $tempCat->parent_id;
            $tempCat = Category::find($tempCat->parent_id);
        }
        return $parents;
    }

    public function childrenIds(bool $includeSelf = false)
    {
        // query all children for getChildren method
        $allCategories = Category::all();
        // call getChildren to get children tree of current object
        self::getChildren([$this], $allCategories);

        $children = $includeSelf ? [$this->id] : [];

        $tempChildren = $this->children;
        while ($tempChildren) {
            foreach ($tempChildren as $tempChild) {
                array_push($children, $tempChild->id);
            }

            $n = [];
            foreach ($tempChildren as $tempChild) {
                foreach ($tempChild->children as $child)
                    array_push($n, $child);
            }

            $tempChildren = $n;
        }

        return $children;
    }

    public function parent()
    {
        return $this->BelongsTo(Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icon')->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('icon')
            ->width(512)
            ->height(512)
            ->sharpen(20)
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('icon');
    }
}
