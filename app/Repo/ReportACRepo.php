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

    public function getById($id)
    {
        return ReportDamageAC::where('id', $id)->firstOrFail();
    }

    public function store($data)
    {
        return ReportDamageAC::create($data);
    }

    public function edit($id, $data)
    {
        return ReportDamageAC::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return ReportDamageAC::destroy($id);
    }
    
}
