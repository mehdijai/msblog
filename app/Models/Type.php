<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $fillable = ['title'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'type_id', 'id');
    }
}
