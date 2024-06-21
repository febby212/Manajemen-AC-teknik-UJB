<?php

namespace App\Repo;

use App\Interface\HistoriIdentifikasiInterface;
use App\Models\HasilHistory;

class HistoriIdentifikasiRepo implements HistoriIdentifikasiInterface
{
    public function getAll()
    {
        return HasilHistory::with('dataACRel', 'userPredict')->get();
    }

    public function getById($id)
    {
        return HasilHistory::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return HasilHistory::create($data);
    }

    public function edit($id, $data)
    {
        return HasilHistory::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return HasilHistory::destroy($id);
    }
}
