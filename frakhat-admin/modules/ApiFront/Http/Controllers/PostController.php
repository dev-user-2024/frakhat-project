<?php

namespace Modules\ApiFront\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\ApiFront\Http\Resources\CategoryPostResource;
use Modules\ApiFront\Http\Resources\DetailPostResource;
use Modules\ApiFront\Http\Resources\LatestPostResource;
use Modules\ApiFront\Http\Resources\MenuResource;
use Modules\ApiFront\Http\Resources\PostResource;
use Modules\Category\Database\Models\Category;
use Modules\Menu\Database\Models\Menu;
use Modules\Menu\Database\Models\Section;
use Modules\Menu\Database\Models\Tab;
use Modules\Post\Database\Models\Post;

class PostController extends Controller
{
    public function getPostList($section)
    {
        $section1 = Section::where('title', $section)->first();
        $tabsSection = Tab::where('section_id', $section1->id)->get();

        $data['posts'] = [];

        foreach ($tabsSection as $tab) {
            $posts = Post::with(['postTranslations', 'user'])
                ->where('type', $tab->getRawOriginal('type'))
                ->where('status', 'approved')
                ->whereHas('categories', function ($query) use ($tab) {
                    $query->where('category_id', $tab->category_id);
                })->get();

            $tabPosts = [];
            foreach ($posts as $post) {
                $tabPosts[] = [
                    'id' => $post->id,
                    'title' => $post->postTranslations->first()->title,
                    'slug' => $post->postTranslations->first()->slug,
                    'summary' => $post->postTranslations->first()->summary,
                    'content' => $post->postTranslations->first()->content,
                    'image' => $post->image,
                    'url' => $post->url,
                    'short_link' => $post->short_link,
                    'code' => $post->code,
                    'like_count' => $post->like_count,
                    'view_count' => $post->view_count,
                    'user' => $post->user->fullName ?? '',
                    'created_at' => $post->created_at,
                    'videos' =>  $post->videos->first()->url ?? '',
                ];
            }

            $data['posts'][] = [
                'section' => 'section 1',
                'tab' => $tab->getRawOriginal('position'),
                'type' => $tab->getRawOriginal('type'),
                'title' => $tab->category->categoryTranslations->first()->title,
                'posts' => $tabPosts,
            ];
        }

        return new PostResource($data);
    }

    public function getPostDetails($id)
    {
        $post = Post::with('tags', 'categories')->findOrFail($id);

        return new DetailPostResource($post);
    }

    public function getLatestTextPosts($limit)
    {
        $post = Post::with(['postTranslations'])
            ->where('type', 'text')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();

        return LatestPostResource::collection($post);
    }

    public function getLatestImagePosts($limit)
    {
        $post = Post::with(['postTranslations'])
            ->where('type', 'image')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();

        return LatestPostResource::collection($post);
    }


    public function getPostOfCategory($categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            // Handle case when category is not found
            return response()->json(['message' => 'Category not found'], 404);
        }

        $posts = Post::join('categoryables', function ($join) use ($categoryId) {
            $join->on('categoryables.categoryable_id', '=', 'posts.id')
                ->where('categoryables.categoryable_type', '=', 'Modules\Post\Database\Models\Post');
        })
            ->join('categories', 'categories.id', '=', 'categoryables.category_id')
            ->join('post_translations', 'post_translations.post_id', '=', 'posts.id')
            ->where('categories.id', $categoryId)
            ->where('posts.status', 'approved')
            ->select('posts.id', 'post_translations.title', 'post_translations.slug', 'post_translations.summary', 'post_translations.content', 'posts.image', 'posts.url', 'posts.short_link', 'posts.code', 'posts.like_count', 'posts.view_count', 'posts.user_id', 'posts.created_at')
            ->get();
//        return  response()->json($posts);

        return new CategoryPostResource($posts);
    }

        public function getPostOfCategoryView($categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            // Handle case when category is not found
            return response()->json(['message' => 'Category not found'], 404);
        }

        $posts = Post::join('categoryables', function ($join) use ($categoryId) {
            $join->on('categoryables.categoryable_id', '=', 'posts.id')
                ->where('categoryables.categoryable_type', '=', 'Modules\Post\Database\Models\Post');
        })
            ->join('categories', 'categories.id', '=', 'categoryables.category_id')
            ->join('post_translations', 'post_translations.post_id', '=', 'posts.id')
            ->where('categories.id', $categoryId)
            ->where('posts.status', 'approved')
            ->select('posts.id', 'post_translations.title', 'post_translations.slug', 'post_translations.summary', 'post_translations.content', 'posts.image', 'posts.url', 'posts.short_link', 'posts.code', 'posts.like_count', 'posts.view_count', 'posts.user_id', 'posts.created_at')
            ->orderByDesc('posts.view_count') // Order by view count in descending order
            ->get();

        return new CategoryPostResource($posts);
    }



}
