<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::query()
            ->select([
                'stats.id',
                'stats.image',
                'stats.year',
                'stats.count',
                'stat_translations.title as title',
            ])
            ->join('stat_translations', 'stats.id', '=', 'stat_translations.stat_id')
            ->where('stat_translations.title', '!=', null)
            ->where('stat_translations.locale', '=', app()->getLocale())
            ->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        $stat = new Stat();
        return view('admin.stats.create', compact('stat'));
    }

    public function store(Request $request)
    {
        Stat::query()
            ->create([
                'oz' => [
                    'title' => $request->title_oz,
                ],
                'uz' => [
                    'title' => $request->title_uz,
                ],
                'ru' => [
                    'title' => $request->title_ru,
                ],
                'en' => [
                    'title' => $request->title_en,
                ],
                'year' => $request->year,
                'count' => $request->count,
                'image' => $request->image,
            ]);
        return redirect()
            ->route('stats.index')
            ->with('success', tr('Successfully saved'));
    }

    public function show($id)
    {
        $stat = Stat::query()->findOrFail($id);
        return view('admin.stats.show', compact('stat'));
    }

    public function edit($id)
    {
        $stat = Stat::query()->findOrFail($id);
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, $id)
    {
        Stat::query()
            ->findOrFail($id)
            ->update([
                'oz' => [
                    'title' => $request->title_oz,
                ],
                'uz' => [
                    'title' => $request->title_uz,
                ],
                'ru' => [
                    'title' => $request->title_ru,
                ],
                'en' => [
                    'title' => $request->title_en,
                ],
                'year' => $request->year,
                'count' => $request->count,
                'image' => $request->image,
            ]);
        return redirect()
            ->route('stats.show', $id)
            ->with('success', tr('Successfully saved'));
    }

    public function destroy($id)
    {
        Stat::query()
            ->findOrFail($id)
            ->delete();
        return redirect()
            ->route('stats.index');
    }
}
