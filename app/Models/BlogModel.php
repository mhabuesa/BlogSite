<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    function category(){
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
    function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
