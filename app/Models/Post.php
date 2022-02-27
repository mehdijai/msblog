<?php

namespace App\Models;

use App\Models\Type;
use App\Models\User;
use App\Models\Module;
use App\Models\Category;
use Soundasleep\Html2Text;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $appends = ['brief'];

    public function getBriefAttribute()
    {
        $converted = Html2Text::convert($this->content, ['drop_links' => false]);
        $text = Str::replace($this->title, '', $converted);
        $text = Str::replace("\n", '', $text);
        $brief = Str::limit($text, 60, '...');

        return $brief;
    }

    protected $fillable = [
        'title',
        'thumbnail',
        'module_id',
        'archived',
        'seo_data',
        'slug',
        'content',
        'category_id',
        'user_id',
        'type_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    /**
     * Get the module that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }
}
