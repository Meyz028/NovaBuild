<?php

namespace Modules\Projects\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Traits\InteractiveMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'description',
        'slug',
        'is_active',
    ];

    protected $table = 'categories_projects';

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


    public function projects(): HasMany
    {
        return $this->hasMany(Projects::class, 'category_id',);
    }
}
