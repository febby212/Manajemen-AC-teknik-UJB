<?php

namespace App\Interface;

interface TeknisiInterface
{
    public function getAll();
    public function countTeknisi();
    public function getById($id);
    public function store($data);
    public function edit($id, $data);
    public function destroy($id);
}
