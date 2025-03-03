<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public static function booted() 
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->slug = Str::slug($model->name);
        });
    }

    public static function filter($search)
    {
        return Category::where('name', 'like', "%{$search}%")
        ->orWhere('slug', 'like', "%{$search}%");
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
