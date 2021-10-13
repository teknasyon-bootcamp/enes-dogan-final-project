<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $formColumns = [
        'name' => [
            'label' => 'Name',
            'type' => 'text',
        ],

    ];


    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function isFollowedByUser(){
        return FollowingCategory::where('user_id', auth()->user()->id)->where('category_id', $this->id)->first();
    }
}
