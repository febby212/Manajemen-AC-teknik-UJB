<?php

namespace App\Repo;

use App\Interface\ReportACInterface;
use App\Models\ReportDamageAC;

class ReportACRepo implements ReportACInterface
{
    public function getAll()
    {
        return ReportDamageAC::with('reportedData', 'reportHistory')->get();
    }

    public function countReport() {
        return ReportDamageAC::count();
    }

    public function latesReport($jumlah_data) {
        return ReportDamageAC::with('reportedData', 'reportHistory')->orderBy('created_at', 'desc')->take($jumlah_data)->get();
    }
    
    public function getById($id)
    {
        return ReportDamageAC::where('id', $id)->firstOrFail();
    }

    public function getByIdDescAC($ac_desc_id) {
        return ReportDamageAC::where('ac_desc_id', $ac_desc_id)->get();
    }

    public function store($data)
    {
        return ReportDamageAC::create($data);
    }

    public function edit($id, $data)
    {
        return ReportDamageAC::whereId($id)->update($data);
    }

    public function editByIdDescAC($ac_desc_id, $data) {
        return ReportDamageAC::where('ac_desc_id', $ac_desc_id)->update($data);
    }

    public function destroy($id)
    {
        return ReportDamageAC::destroy($id);
    }
    
}
