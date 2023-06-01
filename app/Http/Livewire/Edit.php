<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    public $post;
    public $body;

    protected $rules = [
        'post.title' => 'required|min:6',
        'body' => 'required|min:6',
    ];
    
    public function mount($slug){
        $this->post = Post::where('id', $slug)->first();
        if($this->post) {
            $this->body = $this->post->body;
        }else{
            return redirect()->route('blogs');
        }
    }

    public function savePost(){
        $this->post->body = $this->body;
        $this->post->update();
        session()->flash('saved', 'ok');
        return redirect()->route('edit', $this->post->id);
    }

    public function render()
    {
        return view('livewire.post-create')
                ->extends('layouts.app')
                ->section('content');
    }
}