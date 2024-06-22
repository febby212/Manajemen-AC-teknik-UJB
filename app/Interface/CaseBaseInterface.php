<?php

namespace App\Interface;

interface CaseBaseInterface
{
    public function getAll();
    public function getByKdPenyakit();
    public function getById($id);
    public function store($data);
    public function edit($id, $data);
    public function destroy($id);
}
