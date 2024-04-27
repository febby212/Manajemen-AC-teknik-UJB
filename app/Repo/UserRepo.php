<?php

namespace App\Repo;

use App\Interface\UserInterface;
use App\Models\User;

class UserRepo implements UserInterface
{
    public function getAll()
    {
        return User::get();
    }

    public function getById($id)
    {
        return User::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return User::create($data);
    }

    public function edit($id, $data)
    {
        return User::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }
}
