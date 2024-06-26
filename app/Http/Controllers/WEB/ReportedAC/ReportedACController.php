<?php

namespace App\Http\Controllers\WEB\ReportedAC;

use App\Http\Controllers\Controller;
use App\Repo\ReportACRepo;
use Carbon\Carbon;
use CsHelper;
use Illuminate\Http\Request;

class ReportedACController extends Controller
{
    private ReportACRepo $report;
    private $data = array();

    public function __construct(ReportACRepo $report)
    {
        $this->data['title'] = "Laporan Kerusakan AC";
        $this->data['dir_view'] = "guest.report.";
        $this->report = $report;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->report->getAll();
        return view($this->data['dir_view'] . 'index', compact('ref', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $dataAC_id)
    {
        $dataAC_id = decrypt($dataAC_id);
        $data = $request->validate([
            'kerusakan' => ['required', 'min:3'],
            'created_by' => ['required', 'string', 'min:3']
        ]);
        $data['id'] = 'RPT-' . CsHelper::data_id();
        $data['tgl_report'] = Carbon::now();
        $data['ac_desc_id'] = $dataAC_id;

        try {
            $this->report->store($data);
            return redirect()->route('report.index')->with('success', 'Laporan sudah anda sudah dibuat, terimakasih atas laporannya');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat melaporakan kerusakan")->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $data = 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexAdmin() {
        $ref = $this->data;
        $ref['title'] = 'Laporan Kerusakan AC';
        $data = $this->report->getAll();
        dd($data->toArray());
        return view('fitur.report.index', compact('ref', 'data'));
    }
}
