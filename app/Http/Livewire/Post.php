<?php

namespace App\Http\Livewire;

use App\Models\Post as BlogPost;
use Livewire\Component;

class Post extends Component
{
    public $post;

    public function mount($slug){
        $this->post = BlogPost::where('id', $slug)->first();
        if(!($this->post)) {
            return redirect()->route('blogs');
        }
    }

    public function render()
    {
        return view('livewire.post')
                ->extends('layouts.app')
                ->section('content');
    }
}