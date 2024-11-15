<?php

namespace App\Repo;

use App\Interface\CaseBaseInterface;
use App\Models\CaseBase;

class CaseBaseRepo implements CaseBaseInterface
{
    public function getAll()
    {
        return CaseBase::orderBy('created_at', 'desc')->get();
    }

    public function getByKdPenyakit() {
        return CaseBase::get()->groupBy('kd_penyakit');
    }

    public function getById($id)
    {
        return CaseBase::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return CaseBase::create($data);
    }

    public function edit($id, $data)
    {
        return CaseBase::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return CaseBase::destroy($id);
    }
}
