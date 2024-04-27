<?php

namespace App\Interface;

interface TokenizeInterface
{
    public function getAll();
    public function getById($id);
    public function store($data);
    public function edit($id, $data);
    public function destroy($id);
    public function destroyByTeknisi($id);
    public function getToken($token);
    public function generateToken($data);
}
