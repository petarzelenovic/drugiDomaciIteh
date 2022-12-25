<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id','name', 'slug', 'description','price','user_id'];


        public function brand()
        {
            return $this->belongsTo(Brand::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
