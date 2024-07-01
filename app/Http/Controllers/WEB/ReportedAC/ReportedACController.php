<?php

namespace App\Http\Controllers\WEB\ReportedAC;

use App\Http\Controllers\Controller;
use App\Repo\HistoryRepo;
use App\Repo\ReportACRepo;
use Carbon\Carbon;
use CsHelper;
use Illuminate\Http\Request;

class ReportedACController extends Controller
{
    private ReportACRepo $report;
    private HistoryRepo $history;
    private $data = array();

    public function __construct(ReportACRepo $report, HistoryRepo $history)
    {
        $this->data['title'] = "Laporan Kerusakan AC";
        $this->data['dir_view'] = "guest.report.";
        $this->report = $report;
        $this->history = $history;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($dataAC_id)
    {
        $dataAC_id = decrypt($dataAC_id);
        $ref = $this->data;
        $data = $this->report->getByIdDescAC($dataAC_id);
        return view($this->data['dir_view'] . 'index', compact('ref', 'data'));
    }

    public function indexAll() {
        $ref = $this->data;
        $data = $this->report->getAll();
        return view($this->data['dir_view'] . 'all', compact('ref', 'data'));
    }

    public function store(Request $request, $dataAC_id)
    {
        $dataAC_id = decrypt($dataAC_id);
        $data = $request->validate([
            'kerusakan' => ['required', 'min:3'],
            'created_by' => ['']
        ]);
        $data['id'] = 'RPT-' . CsHelper::data_id();
        $data['tgl_report'] = Carbon::now();
        $data['ac_desc_id'] = $dataAC_id;

        try {
            $this->report->store($data);
            return redirect()->route('report.index', encrypt($dataAC_id))->with('success', 'Laporan sudah Anda sudah dibuat, terima kasih atas laporannya');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat melaporakan kerusakan")->withInput();
        }
    }

    public function indexAdmin()
    {
        $ref = $this->data;
        $ref['title'] = 'Laporan Kerusakan AC';
        $data = $this->report->getAll();
        $dataHistory = $this->history->getAll();
        // dd($data->toArray());
        return view('fitur.report.index', compact('ref', 'data', 'dataHistory'));
    }

    public function updateStatusReport(Request $request, $descAC_id)
    {
        $descAC_id = decrypt($descAC_id);

        $data = $request->validate([
            'history_id' => ['required', 'string', 'min:3']
        ]);

        try {
            $this->report->editByIdDescAC($descAC_id, $data);
            return back()->with('success', 'Berhasil memperbarui data laporan');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat update data")->withInput();
        }
    }
}
