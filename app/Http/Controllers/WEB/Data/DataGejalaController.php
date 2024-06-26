<?php

namespace App\Http\Controllers\WEB\Data;

use App\Http\Controllers\Controller;
use App\Repo\GejalaRepo;
use Illuminate\Http\Request;

class DataGejalaController extends Controller
{
    private GejalaRepo $gejala;
    private $data = array();

    public function __construct(GejalaRepo $gejala)
    {
        $this->data['title'] = 'Data Gejala';
        $this->data['dir_view'] = 'fitur.data.gejala.';
        $this->gejala = $gejala;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->gejala->getAll();

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
            // 'kd_gejala' => ['required', 'string', 'min:3'],
            'gejala' => ['required', 'string', 'min:3'],
        ]);
        $data['updated_by'] = auth()->user()->id;

        try {
            $this->gejala->edit($id, $data);
            return back()->with('success', 'Berhasil memperbarui data gejala');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terjadi kesalahan di ' . $th->getMessage());
            }
            return back()->with('error', 'Oops...!! Terjadi kesalahan saat memperbarui data gejala');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->gejala->destroy($id);
            return back()->with('success', 'Berhasil menghapus data gejala');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terjadi kesalahan di ' . $th->getMessage());
            }
            return back()->with('error', 'Oops...!! Terjadi kesalahan saat menghapus data gejala');
        }
    }
}
