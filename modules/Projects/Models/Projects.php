<?php

namespace Modules\Projects\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Projects extends Model implements HasMedia
{
    use HasSlug;
    use HasTranslations;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_active',
    ];

    protected $table = 'projects';

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

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')->nonQueued();
    }

    public function getImageAttribute(): array|null|string
    {
        return $this->getMedia('image')->map(function ($mediaObject) {
            return $mediaObject->getUrl();
        })->toArray()[0] ?? null;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function feedback(): BelongsTo
    {
        return $this->belongsTo(ProjectFeedback::class, 'feedback_id', 'id');
    }

    public function task(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'project_task', 'project_id', 'task_id');
    }
}
