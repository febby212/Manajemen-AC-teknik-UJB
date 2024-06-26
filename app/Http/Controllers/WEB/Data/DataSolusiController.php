<?php

namespace App\Http\Controllers\WEB\Data;

use App\Http\Controllers\Controller;
use App\Repo\SolusiRepo;
use Illuminate\Http\Request;

class DataSolusiController extends Controller
{
    private SolusiRepo $solusi;
    private $data = array();

    public function __construct(SolusiRepo $solusi)
    {
        $this->data['title'] = 'Data Solusi';
        $this->data['dir_view'] = 'fitur.data.solusi.';
        $this->solusi = $solusi;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->solusi->getAll();

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
    public function store(Request $request)
    {
        //
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
        $data = $request->validate([
            // 'kd_penyakit' => ['required', 'string', 'min:3'],
            'nama-penyakit' => ['required', 'string', 'min:3'],
            'solusi' => ['required', 'string', 'min:3'],
        ]);
        $data['updated_by'] = auth()->user()->id;

        try {
            $this->solusi->edit($id, $data);
            return back()->with('success', 'Berhasil memperbarui data solusi');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terjadi kesalahan di ' . $th->getMessage());
            }
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data solusi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->solusi->destroy($id);
            return back()->with('success', 'Berhasil memperbarui data solusi');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terjadi kesalahan di ' . $th->getMessage());
            }
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data solusi');
        }
    }
}
