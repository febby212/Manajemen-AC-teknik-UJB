<?php

namespace App\Interface;

interface GejalaInterface
{
    public function getAll();
    public function getById($id);
    public function getByKdGejala($kd_gejala);
    public function store($data);
    public function edit($id, $data);
    public function destroy($id);
}
