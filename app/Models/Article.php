<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'price',
        'image',
        'category_id',
    ];

    public function imageUrl()
    {
        return Storage::disk('public')->url($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
