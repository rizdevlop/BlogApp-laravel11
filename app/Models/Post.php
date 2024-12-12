<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // Tambahkan 'author_id' dan 'category_id' di $fillable
    protected $fillable = ['title', 'author_id', 'category_id', 'slug', 'body'];

    // Eager load relasi 'author' dan 'category'
    protected $with = ['author', 'category'];

    // Relasi ke tabel users
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relasi ke tabel categories
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
