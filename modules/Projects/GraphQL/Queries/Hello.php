<?php

namespace Modules\Projects\GraphQL\Queries;

use GraphQL\Error\Error;
use Modules\Projects\Models\Category as CategoryModel;
use Modules\Projects\Models\Task;

class Hello
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        try {
            $task = Task::query()
            ->where('active', true)
            ->where('slug', $args['slug'])
            ->first();

            if (!$task) {
                throw new Error('Task not found');
            }

            return $task;
        } catch (\Throwable $th) {
            throw new Error($th->getMessage());
        }
    }
}
