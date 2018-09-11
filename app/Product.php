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

    protected $fillable = [
        'name', 'description', 'price'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
