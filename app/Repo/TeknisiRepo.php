<?php

namespace App\Repo;

use App\Interface\TeknisiInterface;
use App\Models\Teknisi;

class TeknisiRepo implements TeknisiInterface
{
    public function getAll()
    {
        return Teknisi::with('token', 'teknisiUser','historyPerbaikan')->get();
    }

    public function getById($id)
    {
        return Teknisi::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return Teknisi::create($data);
    }

    public function edit($id, $data)
    {
        return Teknisi::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return Teknisi::destroy($id);
    }
}
