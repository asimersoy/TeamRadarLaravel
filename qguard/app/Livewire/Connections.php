<?php

namespace App\Livewire;

class Connections extends Dashboard
{
    public function render()
    {
        $data = parent::render()->getData();

        return view('livewire.connections', $data)->layout('components.layout', ['title' => 'Connections']);
    }
}
