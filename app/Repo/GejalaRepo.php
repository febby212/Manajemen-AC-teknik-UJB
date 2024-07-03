<?php

namespace App\Repo;

use App\Interface\GejalaInterface;
use App\Models\Gejala;

class GejalaRepo implements GejalaInterface
{
    public function getAll()
    {
        return Gejala::OrderBy('kd_gejala')->orderBy('created_at', 'desc')->get();
    }

    public function getById($id)
    {
        return Gejala::where('id', $id)->firstOrFail();
    }

    public function getByKdGejala($kd_gejala) {
        return Gejala::where('kd_gejala', $kd_gejala)->first();
    }

    public function store($data)
    {
        return Gejala::create($data);
    }

    public function edit($id, $data)
    {
        return Gejala::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return Gejala::destroy($id);
    }
}
