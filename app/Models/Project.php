<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title',
        'slug',
        'thumb',
        'description',
        'tech',
        'github',
        'link'
    ];

    public function generateSlug($title): string
    {
        return Str::slug($title, '-');
    }
}
