<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'link',
        'type_id'
    ];

    public function generateSlug($title): string
    {
        return Str::slug($title, '-');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    
}
