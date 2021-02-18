<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;


    public $confirmDelete;

    public $name;
    public $email;

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email|unique:users',
    ];

    public function render()
    {
        return view('livewire.user-component', [
            'users' => User::latest()->orderBy('id')->paginate(4),
        ]);
    }

    public function confirmDelete($id)
    {
        $this->confirmDelete = $id;
    }

    public function cancelDelete()
    {
        $this->reset('confirmDelete');
    }

    public function delete(User $user)
    {
        // $id = $user->id;
        $user->delete();
        
        // $this->users = $this->users->except($id);

        session()->flash('message', 'User deleted.');
    }

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('12345678')
        ]);

        $this->resetFields();

        // $this->users = $this->users->prepend($user);

        session()->flash('message', 'User Saved.');
    }

    public function resetFields()
    {
        $this->reset('name', 'email');
    }
}
