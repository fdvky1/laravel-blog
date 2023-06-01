<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Delete extends Component
{
    public $post;

    public function mount($id){
        $this->post = Post::find($id);
        if($this->post) {
            $this->post->delete();
            return redirect()->route('blogs');
        }
    }
}