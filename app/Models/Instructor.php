<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Instructor extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $translatable = ['name', 'biography', 'experience'];
    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany(Program::class, 'course_instructor');
    }
}
