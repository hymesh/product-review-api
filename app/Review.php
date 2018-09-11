<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $content
 * @property int $user_id
 * @property int $product_id
 */
class Review extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id', 'product_id',
    ];

    /**
     * Get the product that the review is for.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user who wrote the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
