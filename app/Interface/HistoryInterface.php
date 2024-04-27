<?php

namespace App\Interface;

interface HistoryInterface
{
    public function getAll();
    public function getDetail($id);
    public function getById($id);
    public function store($data);
    public function edit($id, $data);
    public function destroy($id);
}
