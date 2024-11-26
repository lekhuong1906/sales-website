<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    const STATUS_DEFAULT = 1;
    const STATUS_INVALID = 0;
    protected $useLocalized = true;

    protected $connection = 'mongodb';
    protected $collection = 'tags';
    protected $timestamped = true;

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    protected $attributes = [
        'name' => [],
        'description' => [],

    ];

    protected $casts = [
        'status' => 'integer',
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
    public function getDesAttribute($value)
    {
        if ($this->useLocalized) {
            $locale = app()->getLocale();
            return $this->attributes['des'][$locale] ?? null;
        }
        return $value;
    }

    /**
     * Disable localized accessor.
     */
    public function withoutLocalized()
    {
        $this->useLocalized = false;
        return $this;
    }


    //Scope
    /**
     * Get all tag valid
     * @param mixed $query
     * @return mixed
     */
    public function scopeGetListTagValid($query)
    {
        return $query->where('status', self::STATUS_DEFAULT)->orderBy('created_at', 'DESC');
    }

    /**
     * Get all tag invalid
     * @param mixed $query
     * @return mixed
     */
    public function scopeGetListTagInvalid($query)
    {
        return $query->where('status', self::STATUS_INVALID)->orderBy('updated_at', 'DESC');
    }
}
