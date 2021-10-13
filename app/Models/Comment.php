<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'news_id', 'body', 'is_anonymous'];

    public $formColumns = [
        'user_id' => [
            'label' => 'User',
            'type' => 'relationship',
            'relation_column' => 'name',
            'model' => User::class
        ],
        'news_id' => [
            'label' => 'News Title',
            'type' => 'relationship',
            'relation_column' => 'title',
            'model' => News::class
        ],
        'body' => [
            'label' => 'Content',
            'type' => 'html'
        ],
        'is_anon' => [
            'label' => 'Anonymous',
            'type' => 'checkbox'
        ]

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
