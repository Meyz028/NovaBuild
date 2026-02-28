<?php

namespace Modules\Blog\Models;


use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HassTranslations;
use Modules\Media\Traits\InteractiveMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasSlug;
    // use InteractiveMedia;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    protected $table = 'categories';

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
}
