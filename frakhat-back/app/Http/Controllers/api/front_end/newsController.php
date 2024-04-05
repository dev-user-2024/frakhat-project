<?php

namespace App\Http\Controllers\api\front_end;

use App\Http\Requests\commentNewsRequest;
use App\Models\adversting;
use App\Models\comment_news;
use App\Models\course;
use App\Models\gallery_news;
use App\Models\LikeNews;
use App\Models\news;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Comment\Database\Models\Comment;
use Modules\Language\Database\Models\Language;
use Modules\Post\Database\Models\Post;
use Modules\Post\Database\Models\PostTranslation;

class newsController{

    //News
    //TODO This for test
    public function index_news()
    {
        $index = PostTranslation::join('posts','posts.type','post_id')
            ->where('status', 'approved')
            ->join('category_translations', 'category_translations.language_id', 'post_translations.language_id')
            ->select('post_translations.title', 'post_translations.slug', 'post_translations.summary',
                'posts.image', 'posts.url' , 'posts.short_link', 'category_translations.title', 'category_translations.slug')
            ->take(3)
            ->get();

        return  Response::display($index);
    }

    public function favorite_news()
    {
        $favorite = PostTranslation::join('posts','posts.type','post_id')
            ->where('status', 'approved')
            ->orderBy('like_count','DESC')
            ->select('post_translations.title', 'post_translations.slug', 'post_translations.summary',
                'posts.image', 'post_translations.updated_at')
            ->take(3)
            ->get();


        return  Response::display($favorite);
    }

    public function visited_news()
    {
        $visited = PostTranslation::join('posts','posts.type','post_id')
            ->where('status', 'approved')
            ->orderBy('view_count','DESC')
            ->select('post_translations.title', 'post_translations.slug',
                'post_translations.summary', 'posts.image')
            ->take(3)
            ->get();


        return  Response::display($visited);
    }


    public function most_controversial()
    {

        $most = Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'controversial')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();


        return  Response::display($most);
    }

    public function hot_news()
    {
        $hot = Post::where('posts.status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('comments', 'comments.commentable_id', 'posts.id')
            ->where('comments.status', 'approved')
            ->select('post_translations.title', 'post_translations.slug', 'post_translations.summary',
                'posts.image', 'comments.commentable_id', DB::raw('count(comments.commentable_id) as total'))
            ->groupBy('comments.commentable_id')
            ->get();


        return  Response::display($hot);
    }

    public function writer_word()
    {
        $writers = Post::join('post_translations','post_translations.post_id','posts.id')
            ->where('status', 'approved')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
            'categoryables.category_id')
            ->where('category_translations.slug', 'از_زبان_نویسنده')
            ->select('post_translations.title', 'post_translations.slug',
                'post_translations.summary', 'posts.image',
                'category_translations.title','category_translations.slug')
            ->get();

        return  Response::display($writers);
    }

    public function adverting_sidebar()
    {
        $side_ad = adversting::where('position', 'sidebar')
            ->select('adverstings.image_url', 'adverstings.link_url')
            ->get();


        return  Response::display($side_ad);
    }

    public function adverting_sectionOne()
    {
        $sec1_ad = adversting::where('position', 'section_one')
            ->select('adverstings.image_url', 'adverstings.link_url')
            ->get();


        return  Response::display($sec1_ad);
    }

    public function adverting_sectionTwo()
    {
        $sec2_ad = adversting::where('position', 'section_two')
            ->select('adverstings.image_url', 'adverstings.link_url')
            ->get();


        return  Response::display($sec2_ad);
    }

    public function video_list()
    {
        $video = Post::where('posts.status', 'approved')
            ->where('posts.type', 'video')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->select('post_translations.title', 'post_translations.summary',
                'posts.image', 'post_translations.content')
            ->get();


        return  Response::display($video);
    }

    public function today_news()
    {
        $todays = Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->orderBy('post_translations.updated_at','DESC')
            ->select('post_translations.title', 'post_translations.slug', 'post_translations.summary',
                'posts.image', 'post_translations.updated_at')
            ->take(3)
            ->get();


        return  Response::display($todays);
    }

    public function gallery_news()
    {
        $gallery = Post::where('posts.status', 'approved')
            ->where('posts.type', 'image')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->select('posts.image', 'post_translations.slug')
            ->get();


        return  Response::display($gallery);
    }

    public function accidents_news()
    {
        $accidents = Post::join('post_translations','post_translations.post_id','posts.id')
            ->where('status', 'approved')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'accident')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();

        return  Response::display($accidents);
    }

    public function sports_news()
    {
        $sports = Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'ورزشی')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();

        return  Response::display($sports);
    }

    public function economical_news()
    {
        $ecos = Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'economical')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();

        return  Response::display($ecos);
    }

    public function social_news()
    {
        $social = Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'اجتماعی')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();

        return  Response::display($social);
    }

    public function province_news()
    {
        $province = Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'استانی')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();

        return  Response::display($province);
    }

    public function international_news()
    {
        $international= Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'بین الملل')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();

        return  Response::display($international);
    }

    public function scientific_news()
    {
        $scientific= Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'علمی')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();

        return  Response::display($scientific);
    }

    public function cultural_news()
    {
        $cultural= Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'فرهنگی')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();

        return  Response::display($cultural);
    }

    public function artistic_news()
    {
        $artistic= Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'هنری')
            ->select('post_translations.title', 'post_translations.slug',
                'posts.image')
            ->get();

        return  Response::display($artistic);
    }

    public function others_news()
    {
        $others= Post::where('status', 'approved')
            ->join('post_translations','post_translations.post_id','posts.id')
            ->join('categoryables', 'categoryables.categoryable_id', 'posts.id')
            ->join('category_translations', 'category_translations.category_id',
                'categoryables.category_id')
            ->where('category_translations.title', 'others')
            ->select('post_translations.title', 'posts.url')
            ->get();

        return  Response::display($others);
    }

}
