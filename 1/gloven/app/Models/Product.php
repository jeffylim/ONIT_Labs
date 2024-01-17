<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['photo', 'title', 'url', 'short_desc', 'long_desc', 'price'];

    public function conditions(){
        return $this->belongsToMany(Condition::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
