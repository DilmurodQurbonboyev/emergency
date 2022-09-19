<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ListCategory;
use App\Models\Lists;
use App\Helpers\ListType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.index');
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

        if ($category->id == 6) {
            $lists = Lists::query()
                ->join('lists_translations', 'lists.id', '=', 'lists_translations.lists_id')
                ->where('lists_translations.title', '!=', null)
                ->where('lists_translations.locale', '=', app()->getLocale())
                ->where('lists.list_type_id', $category->list_type_id)
                ->orderBy('lists.date', 'desc')
                ->orderBy('lists.order')
                ->orderBy('lists.id', 'desc')
                ->where('lists.status', 2)
                ->paginate(12);
            return view($view, compact('lists', 'category'));
        }
        $lists = Lists::query()
            ->join('lists_translations', 'lists.id', '=', 'lists_translations.lists_id')
            ->where('lists_translations.title', '!=', null)
            ->where('lists_translations.locale', '=', app()->getLocale())
            ->where('lists.list_type_id', $category->list_type_id)
            ->where('lists.lists_category_id', $category->id)
            ->orderBy('lists.date', 'desc')
            ->orderBy('lists.order')
            ->orderBy('lists.id', 'desc')
            ->where('lists.status', 2)
            ->paginate(12);
        return view($view, compact('lists', 'category'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $lists = Lists::query()->where('list_type_id', 1)->whereTranslationLike('title', '%' . $search . '%')
            ->orWhereTranslationLike('content', '%' . $search . '%')
            ->paginate(20);
        return view("frontend.search", compact('lists'));
    }

    public function rss()
    {
        $posts = Lists::query()->where('list_type_id', ListType::NEWS)->latest()->get();
        return response()->view('frontend.rss', compact('posts'))->header('Content-Type', 'text/xml');
    }
}
