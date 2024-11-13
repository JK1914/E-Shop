<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // public function getCategory(){
    //     return $category = Category::find($this->category_id);        
    // }

    protected $fillable = ['name', 'code', 'price', 'category_id', 'description', 'image'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount(){
        if(!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;                           
    }
}