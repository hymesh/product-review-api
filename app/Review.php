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

    protected $fillable = [
        'content', 'user_id', 'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
