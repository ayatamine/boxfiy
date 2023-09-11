<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Events\UserLoggedIn;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();
        
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }else{
            $user = Auth::user();
            if($user && $user->account_status == false)
            {
                Auth::logout();
                $this->dispatchBrowserEvent('account-suspended');
                return;
            }
           
        }

        //fetch user orders
        event(new UserLoggedIn(Auth::user()));
        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
