<?php

namespace App\Repo;

use App\Interface\TokenizeInterface;
use App\Models\TokenizeModel;

class TokenizeRepo implements TokenizeInterface
{
    public function getAll()
    {
        return TokenizeModel::with('teknisi')->get();
    }

    public function getAllWithTrash() {
        return TokenizeModel::with('teknisi')->withTrashed()->get();
    }

    public function getById($id)
    {
        return TokenizeModel::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return TokenizeModel::create($data);
    }

    public function edit($id, $data)
    {
        return TokenizeModel::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return TokenizeModel::destroy($id);
    }

    public function destroyByTeknisi($id)
    {
        return TokenizeModel::where('teknisi_id', $id)->delete();
    }

    public function getToken($token)
    {
        return TokenizeModel::with('teknisi')->where('token', $token)->where('used', false)->first();
    }

    public function generateToken($data)
    {
        return TokenizeModel::create($data);
    }

    
}
