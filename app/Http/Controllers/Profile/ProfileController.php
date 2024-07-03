<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repo\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    private $data = array();
    private UserRepo $user;
    public function __construct(UserRepo $user)
    {
        $this->data['title'] = 'Profile';
        $this->data['dir_view'] = 'fitur.profile.index';
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ref = $this->data;
        $data = $request->user();
// dd($data);
        return view($this->data['dir_view'], compact('ref', 'data'));
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
        $id = decrypt($id);
        $data = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()->uncompromised()]
        ]);
        $hashed = Hash::make($data['password']);
        // dd($hashed);
        try {
            $this->user->edit($id, ['password' => $hashed]);
            return redirect()->route('dashboard.index')->with('success', 'Berhasil mengubah password');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                dd($th->getMessage());
            }
            return back()->with('error', 'Terjadi kesalahan saat mengubah password');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
