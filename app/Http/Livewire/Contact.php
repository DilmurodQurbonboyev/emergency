<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        $query = \App\Models\Contact::query()->orderByDesc('id');
        $contacts = $query->get();
        return view('livewire.contact', compact('contacts'));
    }
}
