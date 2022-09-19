<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.messages.index');
    }

    public function create()
    {
        return view('admin.messages.create');
    }

    public function store(Request $request)
    {
        Message::query()
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
                'key' => $request->key,
            ]);
        return redirect()
            ->route('messages.index')
            ->with('success', tr('Successfully saved'));
    }

    public function show($id)
    {
        $messages = Message::query()
            ->findOrFail($id);
        return view('admin.messages.show', compact('messages'));
    }

    public function edit($id)
    {
        $messages = Message::query()
            ->findOrFail($id);
        return view('admin.messages.edit', compact('messages'));
    }

    public function update(Request $request, $id)
    {
        Message::query()
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
                'key' => $request->key,
            ]);
        return redirect()
            ->route('messages.show', $id)
            ->with('success', tr('Successfully saved'));
    }

    public function destroy($id)
    {
        Message::query()
            ->findOrFail($id)
            ->delete();
        return redirect()
            ->route('messages.index');
    }
}
