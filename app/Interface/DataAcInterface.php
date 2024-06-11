<?php

namespace App\Interface;

interface DataAcInterface
{
    public function getAll();
    public function getByRuangan($ruangan);
    public function getRoomName($ruangan);
    public function countByRuangan($ruangan);
    public function getById($id);
    public function store($data);
    public function edit($id, $data);
    public function editByRuangan($ruangan, $data);
    public function destroy($id);
    public function destroyKelebihanAC($ruangan, $jumlahLama, $jumlahBaru);
}
