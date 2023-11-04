<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Ostan;
use App\Models\Shahrestan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $ostans=Ostan::all();
        $shahrestans=Shahrestan::where('ostan',1)->get();
        return view('site.auth.register',compact('ostans','shahrestans'));
        /*return view('site.auth.register');
        return view('auth.register');*/
    }
    public function createAdmin(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
//        dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'ostan_id' => ['required', 'string', 'max:255'],
            'shahrestan_id' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'min:10','max:11','unique:users'],
/*            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],*/
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'ostan_id' => $request->ostan_id,
            'shahrestan_id' => $request->shahrestan_id,
            'phone_number' => $request->phone_number,
        ]);
        /*event(new Registered($user));
        Auth::login($user);*/
        return redirect()->route('register.confirm');
//        return redirect(RouteServiceProvider::HOME);
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    public function registerConfirm()
    {
        return view('site.auth.confirm');
    }
}
