<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AuthorityRepositoryInterface;
use App\Models\Authority;
use Exception;
use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    private $authorityRepositoryInterface;

    function __construct(AuthorityRepositoryInterface $authorityRepositoryInterface)
    {
        $this->authorityRepositoryInterface = $authorityRepositoryInterface;
    }

    public function index()
    {
        return view('admin.authorities.index');
    }

    public function create()
    {
        $authority = new Authority();
        return view('admin.authorities.create', compact('authority'));
    }

    public function store(Request $request)
    {
        try {
            $this->authorityRepositoryInterface->saveAuthority($request);
            return redirect()
                ->route('authorities.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('warning', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $authority = $this->authorityRepositoryInterface->getById($id);
        return view('admin.authorities.show', compact('authority'));
    }

    public function edit($id)
    {
        $authority = $this->authorityRepositoryInterface->getById($id);
        return view('admin.authorities.edit', compact('authority'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->authorityRepositoryInterface->updateAuthority($request, $id);
            return redirect()
                ->route('authorities.show', $id)
                ->with('success_update', tr('Successfully updated'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('warning', tr('Something went wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->authorityRepositoryInterface->deleteAuthority($id);
            return redirect()
                ->route('authorities.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('warning', tr('Something went wrong'));
        }
    }
}
