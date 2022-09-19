<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contacts.index');
    }

    public function create()
    {
        $contacts = new Contact();
        return view('admin.contacts.create', compact('contacts'));
    }

    public function store(Request $request)
    {
        Contact::query()
            ->create([
                'oz' => [
                    'address' => $request->address_oz,
                    'reception' => $request->reception_oz,
                    'working_time' => $request->working_time_oz,
                ],
                'uz' => [
                    'address' => $request->address_uz,
                    'reception' => $request->reception_uz,
                    'working_time' => $request->working_time_uz,
                ],
                'ru' => [
                    'address' => $request->address_ru,
                    'reception' => $request->reception_ru,
                    'working_time' => $request->working_time_ru,
                ],
                'en' => [
                    'address' => $request->address_en,
                    'reception' => $request->reception_en,
                    'working_time' => $request->working_time_en,
                ],
                'phone' => $request->phone,
                'email' => $request->email,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        return redirect()
            ->route('contacts.index')
            ->with('success', tr('Successfully saved'));
    }

    public function show($id)
    {
        $contacts = Contact::query()
            ->findOrFail($id);
        return view('admin.contacts.show', compact('contacts'));
    }

    public function edit($id)
    {
        $contacts = Contact::query()
            ->findOrFail($id);
        return view('admin.contacts.edit', compact('contacts'));
    }

    public function update(Request $request, $id)
    {
        Contact::query()
            ->findOrFail($id)
            ->update([
                'oz' => [
                    'address' => $request->address_oz,
                    'reception' => $request->reception_oz,
                    'working_time' => $request->working_time_oz,
                ],
                'uz' => [
                    'address' => $request->address_uz,
                    'reception' => $request->reception_uz,
                    'working_time' => $request->working_time_uz,
                ],
                'ru' => [
                    'address' => $request->address_ru,
                    'reception' => $request->reception_ru,
                    'working_time' => $request->working_time_ru,
                ],
                'en' => [
                    'address' => $request->address_en,
                    'reception' => $request->reception_en,
                    'working_time' => $request->working_time_en,
                ],
                'phone' => $request->phone,
                'email' => $request->email,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        return redirect()
            ->route('contacts.show', $id)
            ->with('success', tr('Successfully saved'));
    }

    public function destroy($id)
    {
        Contact::query()
            ->findOrFail($id)
            ->delete();
        return redirect()
            ->route('contacts.index');
    }
}
