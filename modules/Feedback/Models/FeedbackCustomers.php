<?php

namespace Modules\Feedback\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackCustomers extends Model
{
    protected $table = 'feedback_customers';

    protected $fillable = [
        'name',
        'second_name',
        'email',
        'message',
        'rating',
    ];

    public array $translatable = [
        'name',
        'second_name',
        'message',
    ];
}
