<?php

namespace App\Interface;

interface SolusiInterface
{
    public function getAll();
    public function getById($id);
    public function getByPenyakit($penyakit);
    public function store($data);
    public function edit($id, $data);
    public function destroy($id);
}
