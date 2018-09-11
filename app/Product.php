<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $price
 */
class Product extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price'
    ];

    /**
     * Get all of the reviews for the product.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
