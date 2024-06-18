<?php

namespace App\Repo;

use App\Interface\HistoryInterface;
use App\Models\History;
use Illuminate\Database\Eloquent\Collection;

class HistoryRepo implements HistoryInterface
{
    public function getAll()
    {
        return History::with('acDesc', 'teknisiPerbaikan', 'acDesc.merekAC', 'pembuatLaporan')->get();
    }

    public function getAllExport() : Collection {
        return History::with('acDesc', 'teknisiPerbaikan', 'acDesc.merekAC', 'pembuatLaporan')->get();
    }

    public function getDetail($id){
        return History::with('acDesc', 'teknisiPerbaikan', 'acDesc.merekAC')->where('ac_desc_id', $id)->get();
    }

    public function getById($id)
    {
        return History::with('acDesc', 'teknisiPerbaikan', 'acDesc.merekAC', 'pembuatLaporan')->where('id', $id)->firstOrFail();
    }

    public function getByIdDataAC($id) {
        return History::where('ac_desc_id', $id)->first();
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
