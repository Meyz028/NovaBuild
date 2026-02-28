<?php

namespace Modules\Projects\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HassTranslations;
use Modules\Media\Traits\InteractiveMedia;
use Spatie\Translatable\HasTranslations;

class Task extends Model
{
    //use InteractiveMedia;
    use HasTranslations;

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'description',
        'is_active',
        'progress',
        'deadline',
    ];

     public array $translatable = [
         'name',
     ];
}
