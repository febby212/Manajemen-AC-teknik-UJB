<?php

namespace App\Repo;

use App\Interface\HistoryInterface;
use App\Models\History;

class HistoryRepo implements HistoryInterface
{
    public function getAll()
    {
        return History::with('acDesc', 'teknisiPerbaikan', 'acDesc.merekAC', 'pembuatLaporan')->get();
    }

    public function getDetail($id){
        return History::with('acDesc', 'teknisiPerbaikan', 'acDesc.merekAC')->firstOrFail();
    }

    public function getById($id)
    {
        return History::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return History::create($data);
    }

    public function edit($id, $data)
    {
        return History::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return History::destroy($id);
    }
}
