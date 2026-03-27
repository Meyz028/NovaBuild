<?php

namespace Modules\Projects\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Translatable\HasTranslations;

class ProjectFeedback extends Model
{
    use HasSlug;
    use HasTranslations;

    protected $fillable = [
        'name',
        'second_name',
        'phone_number',
        'rating',
    ];

    protected $table = 'project_feedback';

    public array $translatable = [
        'name',
        'second_name',
    ];

    public function projects_feedback(): HasOne
    {
        return $this->hasOne(Projects::class, 'feedback_id');
    }
}
