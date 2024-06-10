<?php

namespace App\Http\Controllers\WEB\Ac;

use App\Exports\RiwayatPerbaikanACExport;
use App\Http\Controllers\Controller;
use App\Repo\DataAcRepo;
use App\Repo\HistoryRepo;
use App\Repo\TeknisiRepo;
use CsHelper;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HistoryServiceController extends Controller
{
    private DataAcRepo $dataAc;
    private HistoryRepo $dataHistory;
    private TeknisiRepo $teknisi;
    private $data = array();

    public function __construct(DataAcRepo $dataAc, HistoryRepo $dataHistory, TeknisiRepo $teknisi)
    {
        $this->data['title'] = "Riwayat Perbaikan AC";
        $this->data['view_dir'] = "fitur.riwayat.";
        $this->dataAc = $dataAc;
        $this->dataHistory = $dataHistory;
        $this->teknisi = $teknisi;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->dataHistory->getAll();
        // dd($data->toArray());
        // dd($data->acDesc->merekAC->merek); mengambil merek ac

        return view($this->data['view_dir'] . 'index', compact('ref', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = $this->data;
        $ref['url'] = route('history.store');
        $data_ac = $this->dataAc->getAll();
        $teknisi = $this->teknisi->getAll();
        // dd($data_ac);
        return view($this->data['view_dir'] . 'form', compact('ref', 'data_ac', 'teknisi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ac_desc_id' => ['required', 'string'],
            'PPA' => ['required', 'string', 'min:4'],
            'pos_anggaran' => ['required', 'string', 'min:3'],
            'biaya' => ['required', 'numeric'],
            'teknisi_id' => ['required'],
            'tgl_perbaikan' => ['required', 'date'],
            'kerusakan' => ['required', 'string', 'min:4'],
            'perbaikan' => ['required', 'string', 'min:4'],
        ]);
        $data['id'] = 'HTY-' . CsHelper::data_id();
        $data['created_by'] = auth()->user()->id;

        try {
            $this->dataHistory->store($data);
            return redirect()->route('history.index')->with('success', 'Berhasi menambah data riwayat perbaikan ac');
        } catch (\Throwable $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan data riwayat perbaikan ac")->withInput($request->input);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ref = $this->data;
        $data = $this->dataHistory->getDetail($id);
        // dd($data->toArray());
        // dd($data->acDesc->merekAC->merek); mengambil merek ac

        return view($this->data['view_dir'] . 'detail', compact('ref', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ref = $this->data;
        $ref['url'] = route('history.update', $id);
        $data_ac = $this->dataAc->getAll();
        $teknisi = $this->teknisi->getAll();
        $data = $this->dataHistory->getById($id);
        // dd($data_ac);
        return view($this->data['view_dir'] . 'form', compact('ref', 'data_ac', 'teknisi', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'ac_desc_id' => ['required', 'string'],
            'PPA' => ['required', 'string', 'min:4'],
            'pos_anggaran' => ['required', 'numeric'],
            'biaya' => ['required', 'numeric'],
            'teknisi_id' => ['required'],
            'tgl_perbaikan' => ['required', 'date'],
            'kerusakan' => ['required', 'string', 'min:4'],
            'perbaikan' => ['required', 'string', 'min:4'],
        ]);

        $data['updated_by'] = auth()->user()->id;

        try {
            $this->dataHistory->edit($id, $data);
            return redirect()->route('history.index')->with('success', 'Berhasi mengubah data riwayat perbaikan ac');
        } catch (\Throwable $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat mengubah data riwayat perbaikan ac")->withInput($request->input);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->teknisi->destroy($id);
            return redirect()->route('history.index')->with('success', 'Berhasi menghapus data riwayat perbaikan ac');
        } catch (\Throwable $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menghapus data riwayat perbaikan ac");
        }
    }

    public function exportHistory() {
        
    }
}
