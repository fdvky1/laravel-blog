<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class Delete extends Component
{
    public $post;

    public function mount($id){
        $this->post = Post::find($id);
        if($this->post) {
            $this->post->delete();
            Comment::where('post_id', $id)->delete();
            return redirect()->route('blogs');
        }
    }
}