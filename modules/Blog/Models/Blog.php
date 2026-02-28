<?php

namespace Modules\Blog\Models;


use Illuminate\Database\Eloquent\Model;
use Modules\Media\Traits\InteractiveMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasSlug;
    //use InteractiveMedia;
    use HasTranslations;

    protected $table = 'blogs';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_active',
    ];

    public array $translatable = [
        'name',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingLanguage('en')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
