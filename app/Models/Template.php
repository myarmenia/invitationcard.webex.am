<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function forms()
    {
        return $this->hasMany(Form::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
