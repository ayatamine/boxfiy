<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserProfile extends Component
{
       /** @var string */
       public $full_name = '';

       /** @var string */
       public $username = '';
   
       /** @var string */
       public $email = '';
   
       /** @var string */
       public $oldpassword = '';

       /** @var string */
       public $newpassword = '';
   
       /** @var string */
       public $passwordConfirmation = '';
       public $user;
    public function mount(){
        
        // $this->form->fill([
        //     'full_name' => '',
        //     'username' => ['required','unique:users'],
        //     'email' => ['required', 'email', 'unique:users'],
        //     'newpassword' => ['required', 'min:8', 'same:passwordConfirmation'],
        // ]);
        $this->user = auth()->user();
        $this->username = $this->user->username;
        $this->full_name = $this->user->name;
        $this->email = $this->user->email;
    }
    // public function getModelForm(){
    //     return User::class;
    // }
    public function updateProfile()
    {
        $this->validate([
            // 'name' => ['required'],
            'full_name' => ['required'],
            'username' => ['required','unique:users,username,'.auth()->user()->id],
            'email' => ['required', 'email', 'unique:users,email,'.auth()->user()->id],
            'oldpassword' => ['required_with:newpassword', 'min:8'],
            'newpassword' => ['sometimes','nullable', 'min:8', 'same:passwordConfirmation'],
        ]);
        if($this->oldpassword && !Hash::check($this->oldpassword, $this->user->password)){
            $this->addError('oldpassword', 'The Old password is not correct , please verify');
            return;
        }

        $this->user->update([
            'email' => $this->email,
            'username' => $this->username,
            'name' => $this->full_name,
            'password' => Hash::make($this->newpassword),
        ]);
        session()->flash('success','The profile data updated successfully');
       
    }
    public function render()
    {
        return view('livewire.user-profile')->extends('layouts.app');
    }
}
