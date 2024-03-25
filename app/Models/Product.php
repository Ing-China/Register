<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'quantity',
        'expired_date',
        'userid',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}


