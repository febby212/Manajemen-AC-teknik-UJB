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
        return AcDesc::select('ruangan')->distinct()->get();
    }

    public function getByRuangan($ruangan) {
        return AcDesc::with('history', 'history.teknisiPerbaikan', 'merekAC')->where('ruangan', $ruangan)->get();
    }

    public function getRoomName($ruangan) {
        return AcDesc::where('ruangan', $ruangan)->select('ruangan')->distinct()->get();
    }

    public function countByRuangan($ruangan){
        return AcDesc::where('ruangan', $ruangan)->count();
    }

    public function getDetail($id)
    {
        return AcDesc::with('history.teknisiPerbaikan', 'merekAC')->where('id', $id)->firstOrFail();
    }

    public function getById($id)
    {
        return AcDesc::with('history', 'merekAC')->where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return AcDesc::create($data);
    }

    public function edit($id, $data)
    {
        return AcDesc::whereId($id)->update($data);
    }

    public function editByRuangan($ruangan, $data) {
        return AcDesc::where('ruangan', $ruangan)->update($data);
    }

    public function destroy($id)
    {
        return AcDesc::destroy($id);
    }

    public function destroyKelebihanAC($ruangan, $jumlahLama, $jumlahBaru) {
        return AcDesc::where('ruangan', $ruangan)->take($jumlahLama - $jumlahBaru)->get();
    }
}
