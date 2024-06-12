<?php

namespace App\Interface;

interface PenyetujuInterface
{
    public function getAll();
    public function countData();
    public function getByJabatan($jabatan);
    public function getById($id);
    public function store($data);
    public function edit($id, $data);
    public function destroy($id);
}
