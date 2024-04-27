<?php

namespace App\Http\Controllers\WEB\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    private $data = array();

    public function __construct()
    {
        $this->data['title'] = "Login";
        $this->data['dir_view'] = "auth.";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index')->with('info', 'Anda sudah login.');
        }

        $ref = $this->data;

        return view($this->data['dir_view'] . "login", compact('ref'));
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index')->with('info', 'Anda sudah login.');
        }

        $credentials = $request->validate([
            'username' => ['required', 'string', 'min:4'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard.index')->with('success', 'Halo, selamat datang ' . auth()->user()->name);
        }

        return back()->with('error', config('error', 'Nama pengguna atau password tidak sesuai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
