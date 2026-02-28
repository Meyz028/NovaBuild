<?php

namespace App\GraphQL\Queries;

use GraphQL\Error\Error;
use Modules\Blog\Models\Blog as BlogModel;

class Blog
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args): BlogModel
    {
        try {
            $blog = BlogModel::query()
                ->where('active', true)
                ->where('slug', $args['slug'])
                ->first();

            if (!$blog) {
                throw new Error('Blog not found');
            }

            return $blog;
        } catch (\Throwable $th) {
            throw new Error($th->getMessage());
        }
    }
}
