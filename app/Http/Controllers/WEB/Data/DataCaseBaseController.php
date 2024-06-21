<?php

namespace App\Http\Controllers\WEB\Data;

use App\Http\Controllers\Controller;
use App\Repo\CaseBaseRepo;
use Illuminate\Http\Request;

class DataCaseBaseController extends Controller
{
    private CaseBaseRepo $caseBase;
    private $data = array();

    public function __construct(CaseBaseRepo $caseBase)
    {
        $this->data['title'] = 'Case Base';
        $this->data['dir_view'] = 'fitur.data.caseBase.';
        $this->caseBase = $caseBase;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->caseBase->getAll();

        return view($this->data['dir_view'] . 'index', compact('ref', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = $this->data;
        $ref['url'] = route('case-base.store');
        return view($this->data['dir_view'] . 'form', compact('ref'));
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
            'kd_gejala' => ['required', 'string', 'min:3'],
            'kd_penyakit' => ['required', 'string', 'min:3'],
            'bobot' => ['required', 'numeric'],
        ]);
        $data['updated_by'] = auth()->user()->id;

        try {
            $this->caseBase->edit($id, $data);
            return back()->with('success', 'Berhasil memeprbarui data case base');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terjadi kesalah di ' . $th->getMessage());
            }
            return back()->with('error', 'Terjadi kesalah saat memeperbarui data case base');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->caseBase->destroy($id);
            return back()->with('success', 'Berhasil menghapus data case base');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terjadi kesalahan di ' . $th->getMessage());
            }
            return back()->with('success', 'Terjadi kesalahan saat menghapus data case base');
        }
    }
}
