<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'content'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
        // return $this->belongsTo('App\Models\Category');でも機能は同じ
        // クラス名定数Category::classを使うほうがメリットが大きい
    }
    public function scopeCategorySearch($query,$category_id)
    {
        if(!empty($category_id)){
            $query->where('category_id',$category_id);
        }
    }
    public function scopeKeywordSearch($query,$keyword)
    {
        if(!empty($keyword)){
            $query->where('content','like' , '%' .$keyword . '%');
        }
    }
}
