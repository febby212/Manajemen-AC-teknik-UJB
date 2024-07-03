<?php

namespace App\Repo;

use App\Interface\HistoriIdentifikasiInterface;
use App\Models\HasilHistory;

class HistoriIdentifikasiRepo implements HistoriIdentifikasiInterface
{
    public function getAll()
    {
        return HasilHistory::with('dataACRel', 'userPredict')->orderBy('created_at', 'desc')->get();
    }

    public function getById($id)
    {
        return HasilHistory::where('id', $id)->firstOrFail();
    }

    public function getByKodePrediksi($kode_prediksi) {
        return HasilHistory::with('dataACRel', 'userPredict')->where('kode_prediksi', $kode_prediksi)->get();
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
