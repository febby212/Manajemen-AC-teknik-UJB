<?php

namespace App\Repo;

use App\Interface\GejalaInterface;
use App\Models\Gejala;

class GejalaRepo implements GejalaInterface
{
    public function getAll()
    {
        return Gejala::OrderBy('kd_gejala')->get();
    }

    public function getById($id)
    {
        return Gejala::where('id', $id)->firstOrFail();
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
