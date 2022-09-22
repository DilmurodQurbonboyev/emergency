<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Lists;
use App\Helpers\ListType;
use App\Models\MCategory;
use App\Models\Management;
use Illuminate\Http\Request;
use App\Models\ListCategory;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function leader($slug)
    {
        $category = MCategory::query()
            ->where('slug', $slug)
            ->where('status', 2)
            ->with(
                [
                    'translations' => function ($query) {
                        $query->where('locale', app()->getLocale());
                    },
                ]
            )
            ->first();

        if ($category->id == 1) {
            $view = 'frontend.regional';
        }else {
            $view = 'frontend.management';
        }

        $leaders = Management::query()
            ->where('m_category_id', $category->id)
            ->orderBy('order')
            ->where('status', 2)
            ->paginate(12);
        return view($view, compact('leaders', 'category'));
    }


    public function category($slug)
    {
        $view = null;
        $category = ListCategory::query()
            ->where('slug', $slug)
            ->where('status', 2)
            ->with(
                [
                    'translations' => function ($query) {
                        $query->where('locale', app()->getLocale());
                    }
                ]
            )
            ->first();

        if (is_null($category)) {
            return view('frontend.errors.404');
        }

        switch ($category->list_type_id) {
            case ListType::NEWS:
                $view = 'frontend.news';
                break;
            case ListType::PAGE:
                $view = 'frontend.pages';
                break;
            case ListType::PHOTO:
                $view = 'frontend.photoGallery';
                break;
            case ListType::VIDEO:
                $view = 'frontend.videoGallery';
                break;
            case ListType::USEFUL:
                $view = 'frontend.link';
                break;
            default:
                break;
        }

        $lists = Lists::query()
            ->select([
                'lists.id',
                'lists_translations.title',
                'lists_translations.description',
                'lists_translations.content',
                'lists_translations.pdf_title',
                'lists_translations.pdf',
                'lists.anons_image',
                'lists.body_image',
                'lists.date',
                'lists.slug',
                'lists.count_view',
                'lists.media_type',
                'lists.link_type',
                'lists.link',
                'lists.video_code',
                'lists.show_on_slider',
                'list_category_translations.title as category_title'
            ])
            ->join('lists_translations', 'lists.id', '=', 'lists_translations.lists_id')
            ->join('list_categories', 'lists.lists_category_id', '=', 'list_categories.id')
            ->join('list_category_translations', 'list_categories.id', '=', 'list_category_translations.list_category_id')
            ->where('lists_translations.title', '!=', null)
            ->where('lists_translations.locale', '=', app()->getLocale())
            ->where('list_category_translations.title', '!=', null)
            ->where('list_category_translations.locale', '=', app()->getLocale())
            ->where('lists.list_type_id', $category->list_type_id)
            ->where('lists.lists_category_id', $category->id)
            ->where('lists.status', 2)
            ->orderBy('lists.date', 'desc')
            ->orderBy('lists.order')
            ->paginate(12);

        return view ($view, compact('lists', 'category'));
    }

    public function news($slug)
    {
        $list = Lists::query()
            ->where('slug', $slug)
            ->with(
                [
                    'translations' => function ($query) {
                        $query->where('locale', app()->getLocale());
                    }
                ]
            )
            ->first();

        if (is_null($list)) {
            return view('frontend.errors.404');
        }

        $listKey = 'news_' . $list->id;
        if (!session()->has($listKey)) {
//            $list->increment('count_view');
            $list->count_view++;
            $list->saveQuietly();

            session()->put($listKey, 1);
        }

        return view("frontend.detail", compact('list'));
    }

    public function pages($slug)
    {
        $list = Lists::query()
            ->where('slug', $slug)
            ->with(
                [
                    'translations' => function ($query) {
                        $query->where('locale', app()->getLocale());
                    }
                ]
            )
            ->first();

        if (is_null($list)) {
            return view('frontend.errors.404');
        }

        $listKey = 'pages_' . $list->id;
        if (!session()->has($listKey)) {
            $list->count_view++;
            $list->saveQuietly();
            session()->put($listKey, 1);
        }

        return view("frontend.detail", compact('list'));
    }

    public function about($slug)
    {
        $list = Lists::query()
            ->where('slug', $slug)
            ->with(
                [
                    'translations' => function ($query) {
                        $query->where('locale', app()->getLocale());
                    }
                ]
            )
            ->first();

        if (is_null($list)) {
            return view('frontend.errors.404');
        }

        $listKey = 'about_' . $list->id;
        if (!session()->has($listKey)) {
            $list->count_view++;
            $list->saveQuietly();
            session()->put($listKey, 1);
        }

        return view("frontend.about", compact('list'));
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $lists = Lists::query()->where('list_type_id', 1)->whereTranslationLike('title', '%' . $search . '%')
            ->orWhereTranslationLike('content', '%' . $search . '%')
            ->paginate(20);
        return view("frontend.search", compact('lists'));
    }

    public function rss(): Response
    {
        $posts = Lists::query()->where('list_type_id', ListType::NEWS)->latest()->get();
        return response()->view('frontend.rss', compact('posts'))->header('Content-Type', 'text/xml');
    }
}
