<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ManagePosts extends Component
{
    public $posts, $title, $body, $post_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.manage-posts');
    }


    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm()
    {
        $this->title = '';
        $this->body = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'body' => $this->body,
        ]);
        session()->flash('message', $this->post_id ? 'Post updated.' : 'Post created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $user = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $user->title;
        $this->body = $user->body;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post deleted.');
    }
}
