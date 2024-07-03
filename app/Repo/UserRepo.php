<?php

namespace App\Repo;

use App\Interface\UserInterface;
use App\Models\User;

class UserRepo implements UserInterface
{
    public function getAll()
    {
        return User::orderBy('created_at', 'desc')->get();
    }

    public function getById($id)
    {
        return User::where('id', $id)->firstOrFail();
    }

    public function getByIdTeknisi($teknisi_id) {
        return User::where('teknisi_id', $teknisi_id)->first();
    }

    public function store($data)
    {
        return User::create($data);
    }

    public function edit($id, $data)
    {
        return User::whereId($id)->update($data);
    }

    public function editByIdTeknisi($teknisi_id, $data) {
        return User::where('teknisi_id', $teknisi_id)->update($data);
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }
}
