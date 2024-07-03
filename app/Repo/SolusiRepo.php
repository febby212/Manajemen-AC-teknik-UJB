<?php

namespace App\Repo;

use App\Interface\SolusiInterface;
use App\Models\Solusi;

class SolusiRepo implements SolusiInterface
{
    public function getAll()
    {
        return Solusi::orderBy('created_at', 'desc')->get();
    }

    public function getById($id)
    {
        return Solusi::where('id', $id)->firstOrFail();
    }

    public function getByPenyakit($penyakit) {
        return Solusi::where('kd_penyakit', $penyakit)->get();
    }

    public function store($data)
    {
        return Solusi::create($data);
    }

    public function edit($id, $data)
    {
        return Solusi::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return Solusi::destroy($id);
    }
}
