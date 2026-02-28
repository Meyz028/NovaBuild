<?php

namespace App\GraphQL\Queries;

use GraphQL\Error\Error;
use Modules\Blog\Models\Category;
use Modules\Blog\Models\Blog;

class Blogs
{
    /**
     * @param  array{}
     * $args
     *
     */
    public function __invoke(null $_, array $args): array
    {
        try{
            $page = $args['page'] ?? 1;
            $limit = $args ['limit'] ?? 10;
            $categorySlug = $args['categorySlug'] ?? null;

            $q = Blog::query()
                ->where('atcive', true)
                ->orderByDesc('published_at');

            $categoryQuery = Category::query()
                ->where('active', true);

            if ($categorySlug){
                $category = (clone $categoryQuery)
                    ->where('slug', $categorySlug)
                    ->first();

                if ($category){
                    $q->where('category_id', $category->id);
                } else{
                    throw new Error("Категорія не знайдена");
                }
            }

            $data = $q->paginate($limit, ['*'], 'page', $page);
            $filters = (clone $categoryQuery)
                ->where('active', true)
                ->orderBy('sort')
                ->orderBy('id')
                ->get();

            return [
                'data' => $data,
                'pagination' => [
                    'firstItem' => $data->firstItem(),
                    'lastItem' => $data->lastItem(),
                    'currentPage' => $data->currentPage(),
                    'lastPage' => $data->lastPage(),
                    'total' => $data->total(),
                ],
                'filters' => $filters
            ];
        } catch (\Throwable $th) {
            throw new Error($th->getMessage());
        }
    }
}
