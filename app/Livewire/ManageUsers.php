<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class ManageUsers extends Component
{
    // public $users;
    // public $name;
    // public $email;
    // public $selectedUserId;

    public $users, $name, $email, $user_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.manage-users');
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
        $this->name = '';
        $this->email = '';
        // $this->mobile = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            // 'mobile' => 'required',
        ]);

        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => 123456,
            // 'mobile' => $this->mobile,
        ]);
        session()->flash('message', $this->user_id ? 'User updated.' : 'User created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        // $this->mobile = $user->mobile;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User deleted.');
    }
}
