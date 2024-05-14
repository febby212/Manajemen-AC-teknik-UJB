<?php

namespace App\Repo;

use App\Interface\DataAcInterface;
use App\Models\AcDesc;

class DataAcRepo implements DataAcInterface
{
    public function getAll()
    {
        return AcDesc::with('history', 'merekAC')->get();
    }

    public function getByGrouping() {
        return AcDesc::with('history', 'merekAC')->get()->groupBy('ruangan');
    }

    public function getDetail($id)
    {
        return AcDesc::with('history', 'merekAC')->where('id', $id)->firstOrFail();
    }

    public function getById($id)
    {
        return AcDesc::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return AcDesc::create($data);
    }

    public function edit($id, $data)
    {
        return AcDesc::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return AcDesc::destroy($id);
    }
}
