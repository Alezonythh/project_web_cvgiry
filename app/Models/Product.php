<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image', 'pdf', 'category_id', 
        'spesifikasi_1', 'spesifikasi_2', 'spesifikasi_3', 'spesifikasi_4'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
