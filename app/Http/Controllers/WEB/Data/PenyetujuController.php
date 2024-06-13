<?php

namespace App\Http\Controllers\WEB\Data;

use App\Http\Controllers\Controller;
use App\Models\Penyetuju;
use App\Repo\PenyetujuRepo;
use CsHelper;
use Illuminate\Http\Request;

class PenyetujuController extends Controller
{
    private PenyetujuRepo $penyetuju;
    private $data = array();

    public function __construct(PenyetujuRepo $penyetuju)
    {
        $this->data['title'] = 'Otorisasi Pejabat';
        $this->data['dir_view'] = 'fitur.data.penyetuju.';
        $this->penyetuju = $penyetuju;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->penyetuju->getAll();
        $count = $this->penyetuju->countData();
        return view($this->data['dir_view'] . 'index', compact('ref', 'data', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = $this->data;
        $ref['url'] = route('penyetuju.store');
        return view($this->data['dir_view'] . 'form', compact('ref'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $count = $this->penyetuju->countData();
        if ($count >= 2) {
            return back()->with('error', 'Jumlah data sudah mencapai batas');
        }

        $data = $request->validate([
            'nama' => ['required', 'string', 'min:3'],
            'jabatan' => ['required', 'string', 'min:3', 'unique:' . Penyetuju::class],
        ]);
        $data['id'] = 'PJB-' . CsHelper::data_id();
        $data['created_by'] = auth()->user()->id;

        try {
            $this->penyetuju->store($data);
            return redirect()->route('penyetuju.index')->with('success', 'Data pejabat penyetuju berhasil');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terdapat kesalahan di ' . $th->getMessage());
                }
            return back()->with('error', 'Terdapat kesalahan saat menyimpan data')->withInput();
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
        $ref = $this->data;
        $ref['url'] = route('penyetuju.update', $id);
        $data = $this->penyetuju->getById($id);

        return view($this->data['dir_view'] . 'form', compact('ref', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'min:3'],
            'jabatan' => ['required', 'string', 'min:3'],
        ]);
        $data['updated_by'] = auth()->user()->id;

        try {
            $this->penyetuju->edit($id, $data);
            return redirect()->route('penyetuju.index')->with('success', 'Berhasil memperbarui data pejabat penyetuju');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terjadi keslaahan di ' . $th->getMessage());
                }
            return back()->with('error', 'Terjadi keslaahan saat memperbarui data pejabat penyetuju')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $count = $this->penyetuju->countData();
        if ($count >= 2) {
            return back()->with('error', 'Jumlah data sudah mencapai batas');
        }
    }
}
