<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListsRequest;
use App\Interfaces\ListsRepositoryInterface;
use App\Models\ListCategory;
use App\Models\Lists;
use Exception;

class VideoController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepositoryInterface $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.videos.videos.index');
    }

    public function create()
    {
        $videos = new Lists();
        $videosCategories = ListCategory::query()
            ->where('list_type_id', ListType::VIDEO)
            ->get();
        return view('admin.videos.videos.create', compact('videosCategories', 'videos'));
    }

    public function store(ListsRequest $request, Lists $lists)
    {
        try {
            $this->listsRepository
                ->saveList($request, $lists);
            return redirect()
                ->route('videos.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $videos = $this->listsRepository
            ->getById($id);
        return view('admin.videos.videos.show', compact('videos'));
    }

    public function edit($id)
    {
        $videos = $this->listsRepository
            ->getById($id);
        $videosCategories = ListCategory::query()
            ->where('list_type_id', ListType::VIDEO)
            ->get();
        return view('admin.videos.videos.edit', compact('videos', 'videosCategories'));
    }

    public function update(ListsRequest $request, $id)
    {
        try {
            $this->listsRepository
                ->updateList($request, $id);
            return redirect()
                ->route('videos.show', $id)
                ->with('success_update', tr('Successfully updated'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteList($id);
            return redirect()
                ->route('videos.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }
}
