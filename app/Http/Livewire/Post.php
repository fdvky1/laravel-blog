<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post as BlogPost;
use Livewire\Component;

class Post extends Component
{
    public $post;
    public $body;

    public function mount($slug){
        $this->post = BlogPost::where('id', $slug)->first();
        if(!($this->post)) {
            return redirect()->route('blogs');
        }
    }

    function comment(){
        if (auth()->check()){
            $this->validate([
                'body'      => 'required',
            ]);
            $createComment = Comment::create([
                'body'      => $this->body,
                'user_id'     => auth()->user()->id,
                'post_id'  => $this->post->id
            ]);
            if($createComment){
                return redirect()->route('post', $this->post->id);
            }
        }else{
            redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.post')
                ->extends('layouts.app')
                ->section('content');
    }
}