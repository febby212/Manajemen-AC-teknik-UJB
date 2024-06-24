<?php

namespace App\Interface;

interface HistoriIdentifikasiInterface
{
    public function getAll();
    public function getById($id);
    public function getByKodePrediksi($kode_prediksi);
    public function store($data);
    public function edit($id, $data);
    public function destroy($id);
}
