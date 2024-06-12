<?php

namespace App\Repo;

use App\Interface\PenyetujuInterface;
use App\Models\Penyetuju;

class PenyetujuRepo implements PenyetujuInterface
{
    public function getAll()
    {
        return Penyetuju::get();
    }

    public function countData() {
        return Penyetuju::count();
    }

    public function getByJabatan($jabatan) {
        return Penyetuju::where('jabatan', $jabatan)->first();
    }

    public function getById($id)
    {
        return Penyetuju::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return Penyetuju::create($data);
    }

    public function edit($id, $data)
    {
        return Penyetuju::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return Penyetuju::destroy($id);
    }
    
}
