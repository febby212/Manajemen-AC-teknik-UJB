<?php

namespace App\Repo;

use App\Interface\MerekAcInterface;
use App\Models\MerekAC;

class MerekAcRepo implements MerekAcInterface
{
    public function getAll()
    {
        return MerekAC::with('Ac')->orderBy('created_at', 'desc')->get();
    }

    public function getById($id)
    {
        return MerekAC::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return MerekAC::create($data);
    }

    public function edit($id, $data)
    {
        return MerekAC::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return MerekAC::destroy($id);
    }
}
