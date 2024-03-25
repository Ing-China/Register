<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'userid'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
