<?php

namespace App\Interface;

interface DataAcInterface
{
    public function getAll();
    public function getByGrouping();
    public function getById($id);
    public function store($data);
    public function edit($id, $data);
    public function destroy($id);
}
