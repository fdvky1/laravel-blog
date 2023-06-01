<?php

namespace App\Http\Livewire;

use App\Models\Post as BlogPost;
use Livewire\Component;

class Blogs extends Component
{

    public function render()
    {
        return view('livewire.blogs')
                ->extends('layouts.app')
                ->section('livewire.content');
    }
}