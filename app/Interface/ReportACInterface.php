<?php

namespace App\Interface;

interface ReportACInterface
{
    public function getAll();
    public function getById($id);
    public function getByIdDescAC($ac_desc_id);
    public function store($data);
    public function edit($id, $data);
    public function editByIdDescAC($ac_desc_id, $data);
    public function destroy($id);
}
