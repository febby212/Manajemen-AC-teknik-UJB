<?php

namespace App\Http\Controllers\WEB\PublicHistory;

use App\Http\Controllers\Controller;
use App\Repo\DataAcRepo;
use App\Repo\HistoryRepo;
use App\Repo\MerekAcRepo;
use App\Repo\ReportACRepo;
use Carbon\Carbon;
use CsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DetailRiwayatController extends Controller
{
    private MerekAcRepo $merekAC;
    private DataAcRepo $dataAc;
    private HistoryRepo $history;
    private ReportACRepo $report;
    private $data = array();

    public function __construct(DataAcRepo $dataAc, MerekAcRepo $merekAC, HistoryRepo $history, ReportACRepo $report)
    {
        $this->data['title'] = "Detail Riwayat Ac";
        $this->data['dir_view'] = "guest.detail.";
        $this->dataAc = $dataAc;
        $this->merekAC = $merekAC;
        $this->history = $history;
        $this->report = $report;
    }

    public function index()
    {
        $ref = $this->data;
        $data = $this->dataAc->getByGrouping();
        return view($this->data['dir_view'] . 'index', compact('data', 'ref'));
    }

    public function show(string $id)
    {
        $id = decrypt($id);
        $ref = $this->data;
        $data = $this->dataAc->getDetail($id);
        $kodeAC = $data->kode_AC;
        $parts = explode('/', $kodeAC);
        $year = end($parts);
        $year = $parts[count($parts) - 2];
        // dd($data->toArray());
        return view($this->data['dir_view'] . 'detail', compact('data', 'ref', 'year'));
    }

    public function update(Request $request, string $id)
    {
        $id = decrypt($id);
        $data = $request->validate([
            'kerusakan' => ['required', 'min:3', 'string'],
            'perbaikan' => ['required', 'min:3', 'string']
        ]);
        $data['updated_by'] = auth()->user()->is_teknisi == 1 ? auth()->user()->teknisi_id : auth()->user()->id;

        try {
            $this->history->edit($id, $data);
            return back()->with('success', 'Berhasil memperbarui data riwayat perbaikan');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terdapat kesalahan di ' . $th->getMessage());
            }
            return back()->with('error', 'Oopss...!! Terdapat kesalah saat memerbarui data riwayat perbaikan');
        }
    }

    public function store(Request $request, string $id) 
    {
        $id = decrypt($id);
        $data = $request->validate([
            'kerusakan' => ['required', 'min:3', 'string'],
            'perbaikan' => ['required', 'min:3', 'string'],
        ]);
        $data['ac_desc_id'] = $id;
        $data['tgl_perbaikan'] = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
        $data['teknisi_id'] = auth()->user()->is_teknisi == 1 ? auth()->user()->teknisi_id : auth()->user()->id;  
        $data['created_by'] = auth()->user()->id;
        $data['kode_perbaikan'] = CsHelper::stringRandom(6);
        $data['id'] = 'HTY-' . CsHelper::data_id();

        
        try {
            $this->history->store($data);
            $this->report->editByIdDescAC($id, ['history_id' => $data['id']]);
            return back()->with('success', 'Berhasil menambah data riwayat perbaikan');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            if (env('APP_DEBUG')  == true) {
                return back()->with('error', 'Terdapat kesalahan di ' . $th->getMessage());
            }
            return back()->with('error', 'Oopss...!! Terdapat kesalahan saat menambah data riwayat perbaikan');
        }
    }
}
