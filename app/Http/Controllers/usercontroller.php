<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login()
    {
        return view("user.login");
    }

    // // /**
    // //  * Show the form for creating a new resource.
    // //  */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userfields = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", Rule::unique("Users", "email")],
            "password" => ["required", "min:6", "confirmed"]
        ]);

        $userfields["password"] = bcrypt($userfields["password"]);

        $user = User::create($userfields);
        auth()->login($user);
        return redirect("/")->with("message", "user registered successfully");

    }

    /**
     * Display the specified resource.
     */
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with("message", "you are logged out");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function auth(Request $request)
    {
        $userfields = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "min:6"]
        ]);
        if (auth()->attempt($userfields)) {

            $request->session()->regenerate();
            return redirect("/")->with("message", "logged in successfully");

        }
        return back()->withErrors(["email" => "Invalid information"])->onlyInput("email");
    }

    /** b
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
