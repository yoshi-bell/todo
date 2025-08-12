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
}
