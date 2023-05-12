<?php

namespace App\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Spatie\Translatable\HasTranslations;

class Program extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $translatable = [
        'title', 'description', 'objectives', 'aimed_at', 'learn_to', 'modules',
    ];

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getLanguage()
    {
        return Config::get('languages.' . $this->language)['title'];
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'course_instructor');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CourseFactory::new();
    }

    public function scopeFilter(EloquentBuilder $query, array $filters)
    {
        $query->when(isset($filters['category_id']) ? $filters['category_id'] : false, function (EloquentBuilder $query, $category_id) {
            $query->whereIn('category_id', Category::findOrFail($category_id)->childrenIds(true));
        });

        $query->when(isset($filters['language']) ? $filters['language'] : false, function (EloquentBuilder $query, $language) {
            $query->where('language', 'like', $language);
        });

        // TODO: add arabic search if website in arabic
        $query->when(isset($filters['search']) ? $filters['search'] : false, function (EloquentBuilder $query, $search) {
            $query->where('title->en', 'LIKE', '%' . $search . '%');
        });

        $query->when(isset($filters['sort']) && in_array($filters['sort'], ['price-lowest', 'price-highest', 'created_at']) ? $filters['sort'] : false, function (EloquentBuilder $query, $sort) {
            if ($sort === 'price-lowest')
                $query->orderBy('price', 'asc');
            elseif ($sort === 'price-highest')
                $query->orderBy('price', 'desc');
            elseif ($sort === 'created_at')
                $query->orderBy('created_at', 'desc');
        }, function (EloquentBuilder $query) {
            $query->orderBy('price', 'asc');
        });
    }

    public function priceEGP()
    {
        return $this->price * self::getCurrencyRate();
    }

    // Returns currency rate for the query, default $query = 'EUR_EGP'
    public static function getCurrencyRate(string $query = 'EUR_EGP')
    {
        $rate = cache()->remember($query, now()->addHour(), function () use ($query) {
            $resp = Http::get("https://free.currconv.com/api/v7/convert?q=$query&compact=ultra&apiKey=" . config('app.currency_converter_key'));
            return $resp->json($query);
        });

        // if api fails, $rate = null
        $rate = $rate ?? 17.81629;

        return $rate;
    }
}
