<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListsRequest;
use App\Interfaces\ListsRepositoryInterface;
use App\Models\ListCategory;
use App\Models\Lists;
use Exception;

class PhotoController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepositoryInterface $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.photos.photos.index');
    }

    public function create()
    {
        $photos = new Lists();
        $photosCategories = ListCategory::query()
        ->where('list_type_id', ListType::PHOTO)
            ->get();
        return view('admin.photos.photos.create', compact('photosCategories', 'photos'));
    }

    public function store(ListsRequest $request, Lists $lists)
    {
        try {
            $this->listsRepository
                ->saveList($request, $lists);
            return redirect()
                ->route('photos.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $photos = $this->listsRepository
            ->getById($id);
        return view('admin.photos.photos.show', compact('photos'));
    }

    public function edit($id)
    {
        $photos = $this->listsRepository->getById($id);
        $photosCategories = ListCategory::query()
        ->where('list_type_id', ListType::PHOTO)
            ->get();
        return view('admin.photos.photos.edit', compact('photos', 'photosCategories'));
    }

    public function update(ListsRequest $request, $id)
    {
        try {
            $this->listsRepository
                ->updateList($request, $id);
            return redirect()
                ->route('photos.show', $id)
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
            $this->listsRepository
                ->deleteList($id);
            return redirect()
                ->route('photos.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }
}
