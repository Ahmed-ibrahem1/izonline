<?php

namespace App\Models;

use Database\Factories\OrganisationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Organisation extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $translatable = [
        'name', 'description', 'attributes',
    ];

    protected $guarded = [];


    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return OrganisationFactory::new();
    }
}
