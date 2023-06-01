<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class PostCreate extends Component
{
    public $post;
    public $body;

    protected $rules = [
        'post.title' => 'required|min:6',
        'body' => 'required|min:6',
    ];

    public function mount(){
        $this->post = new Post;
    }
    
    public function savePost(){
        $this->post->user_id = auth()->user()->id;
        $this->post->slug = Str::slug($this->post->title);
        $this->post->body = $this->body;
        $this->post->save();
        session()->flash('saved', 'ok');
        return redirect()->route('create');
    }

    public function render()
    {
        return view('livewire.post-create')
                ->extends('layouts.app')
                ->section('content');
    }
}