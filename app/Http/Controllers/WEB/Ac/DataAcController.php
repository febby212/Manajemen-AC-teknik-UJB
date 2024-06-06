<?php

namespace App\Http\Controllers\WEB\Ac;

use App\Http\Controllers\Controller;
use App\Repo\DataAcRepo;
use App\Repo\MerekAcRepo;
use CsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataAcController extends Controller
{
    private MerekAcRepo $merekAC;
    private DataAcRepo $dataAc;
    private $data = array();

    public function __construct(DataAcRepo $dataAc, MerekAcRepo $merekAC)
    {
        $this->data['title'] = "Data AC";
        $this->data['dir_view'] = "fitur.daftarAC.";
        $this->dataAc = $dataAc;
        $this->merekAC = $merekAC;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->dataAc->getAll();
        // dd($data->toArray());
        return view($this->data['dir_view'] . 'index', compact('ref', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref =  $this->data;
        $ref['url'] = route('daftarAC.store');
        $merek = $this->merekAC->getAll();

        return view($this->data['dir_view'] . 'form', compact('ref', 'merek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jumlah = $request->input('jumlah');

        $jumlah_id = CsHelper::stringRandom(6);
        // $allData = [];
        for ($i = 0; $i < $jumlah; $i++) {
            $data = $request->validate([
                'merek_id' => ['required', 'min:3', 'string'],
                'kelengkapan' => ['required', 'min:3', 'string'],
                'ruangan' => ['required', 'min:3', 'string'],
                'kondisi' => ['required', 'min:3', 'string'],
                'tahun_pembelian' => ['required'],
                'desc_kondisi' => ['required', 'min:3', 'string'],
            ], [], [
                'merek_id' => 'Merek AC',
                'kelengkapan' => 'Kelengkapan AC',
                'ruangan' => 'Ruangan',
                'kondisi' => 'Kondisi AC',
                'tahun_pembelian' => 'Tahun pembelian AC',
                'desc_kondisi' => 'Deskripsi',
            ]);

            $merek = $this->merekAC->getById($data['merek_id']);
            $data['kode_AC'] = '01' . '/' . $merek['merek'] . '-' . $merek['seri'] . '/' . Str::upper($data['ruangan']) . '/' . $data['tahun_pembelian'] . '/' . CsHelper::numbering($i + 1, 3). '/' . CsHelper::token();
            $data['id'] = 'DTAC-' . CsHelper::data_id();
            $data['created_by'] = auth()->user()->id;
            $data['id_jumlah'] = $jumlah_id;

            // $allData[] = $data;
            try {
                $this->dataAc->store($data);
            } catch (\Throwable $th) {
                if (env('APP_DEBUG')) {
                    return $th->getMessage();
                }
                return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan data AC")->withInput($request->input);
            }
        }
        return redirect()->route('daftarAC.index')->with('success', 'Berhasil menambah data AC');
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
        $ref =  $this->data;
        $ref['url'] = route('daftarAC.update', $id);
        $merek = $this->merekAC->getAll();
        $data = $this->dataAc->getById($id);
        $tahun_pembelian = $data;
        return view($this->data['dir_view'] . 'form', compact('ref', 'merek', 'data', 'tahun_pembelian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'merek_id' => ['required', 'min:3', 'string'],
            'kelengkapan' => ['required', 'min:3', 'string'],
            'ruangan' => ['required', 'min:3', 'string'],
            'kondisi' => ['required', 'min:3', 'string'],
            'desc_kondisi' => ['required', 'min:3', 'string'],
        ], [], [
            'merek_id' => 'Merek AC',
            'kelengkapan' => 'Kelengkapan AC',
            'ruangan' => 'Ruangan',
            'kondisi' => 'Kondisi AC',
            'desc_kondisi' => 'Deskripsi',
        ]);

        $data['updated_by'] = auth()->user()->id;
        try {
            $this->dataAc->edit($id, $data);
            return redirect()->route('daftarAC.index')->with('success', 'Berhasi merubah data AC');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat merubah data AC")->withInput($request->input);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->dataAc->destroy($id);
            return redirect()->route('daftarAC.index')->with('success', 'Berhasi menghapus data AC');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menghapus data AC");
        }
    }
}
