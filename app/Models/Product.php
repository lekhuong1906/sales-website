<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    const STATUS_DEFAULT = 1;
    protected $useLocalized = true;
    protected $connection = 'mongodb';
    protected $collection = 'products';
    protected $timestamped = true;

    protected $fillable = [
        'name',
        'description',
        'images',
        'price',
        'tags',
        'stock',
        'status',
        'commands'
    ];
    protected $attributes = [
        'tag' => [],
        'commands' => [],
    ];
    protected $casts = [
        'tag' => null,
        // 'status' => self::STATUS_DEFAULT,
    ];

    /**
     * Get field Name by localized.
     */
    public function getNameAttribute($value)
    {
        if ($this->useLocalized) {
            $locale = app()->getLocale();
            return $this->attributes['name'][$locale] ?? null;
        }
        return $value;
    }

    /**
     * Get field Description by localized.
     */
    public function getDescriptionAttribute($value)
    {
        if ($this->useLocalized) {
            $locale = app()->getLocale();
            return $this->attributes['description'][$locale] ?? null;
        }
        return $value;
    }

    /**
     * Get images url attribute.
     */
    public function getImagesAttribute()
    {
        return collect($this->attributes['images'])->map(function ($image) {
            return asset($image);  // Return the asset URL for each image
        });
    }

    /**
     * Disable localized accessor.
     */
    public function withoutLocalized()
    {
        $this->useLocalized = false;
        return $this;
    }

    /**
     * Get list product valid
     * @param mixed $query
     * @return mixed
     */
    public function scopeGetListProductValid($query)
    {
        return $query->where('status', self::STATUS_DEFAULT)->orderBy('created_at', 'desc');
    }
}
