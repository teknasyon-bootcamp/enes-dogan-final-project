<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'category_id', 'user_id', 'is_draft'];

    public $formColumns = [
        'title' => [
            'label' => 'Title',
            'type' => 'text',

        ],
        'body' => [
            'label' => 'Body',
            'type' => 'html',
        ],
        'category_id' => [
            'label' => 'Category',
            'type' => 'relationship',
            'relation_column' => 'name',
            'model' => Category::class
        ],
        'user_id' => [
            'label' => 'User',
            'type' => 'relationship',
            'relation_column' => 'name',
            'model' => User::class
        ],
        'is_draft' => [
            'label' => 'Save as draft',
            'type' => 'checkbox',
        ]
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPreviewContentAttribute()
    {
        return implode(' ', array_slice(explode(' ', $this->body), 0, 10)) . '...';
    }
}
