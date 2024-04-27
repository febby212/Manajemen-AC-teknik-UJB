<?php

namespace App\Http\Controllers\WEB\Teknisi;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repo\TeknisiRepo;
use App\Repo\TokenizeRepo;
use CsHelper;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class TeknisiController extends Controller
{
    private TeknisiRepo $teknisi;
    private TokenizeRepo $token;
    private $data = array();

    public function __construct(TeknisiRepo $teknisi, TokenizeRepo $token)
    {
        $this->data['title'] = "Teknisi";
        $this->data['dir_view'] = "fitur.teknisi.";
        $this->teknisi = $teknisi;
        $this->token = $token;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->teknisi->getAll();
        // dd($data->toArray());

        return view($this->data["dir_view"] . 'index', compact('ref', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = $this->data;
        $ref['url'] = route('teknisi.store');

        return view($this->data['dir_view'] . 'form', compact('ref'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:4'],
            'nama_perusahaan' => ['required', 'string', 'min:4'],
            'alamat_perusahaan' => ['required', 'string', 'min:4']
        ]);

        $data['id'] = 'TKI-' . CsHelper::data_id();
        $data['created_by'] = auth()->user()->id;

        try {
            $this->teknisi->store($data);
            return redirect()->route('teknisi.index')->with('success', 'Berhasi menambah data teknisi');
        } catch (\Throwable $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan data teknisi")->withInput($request->input);
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
        $ref['url'] = route('teknisi.update', $id);
        $data = $this->teknisi->getById($id);

        return view($this->data['dir_view'] . 'form', compact('ref', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:4'],
            'nama_perusahaan' => ['required', 'string', 'min:4'],
            'alamat_perusahaan' => ['required', 'string', 'min:4']
        ]);

        $data['updated_by'] = auth()->user()->id;

        try {
            $this->teknisi->edit($id, $data);
            return redirect()->route('teknisi.index')->with('success', 'Berhasi mengubah data teknisi');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat mengubah data teknisi")->withInput($request->input);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->teknisi->destroy($id);
            $this->token->destroyByTeknisi($id);
            return back()->with('success', 'Data berhasil di hapus');
        } catch (Throwable $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menghapus data");
        }
    }
}
