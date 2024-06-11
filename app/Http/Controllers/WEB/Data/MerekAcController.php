<?php

namespace App\Http\Controllers\WEB\Data;

use App\Http\Controllers\Controller;
use App\Repo\MerekAcRepo;
use CsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerekAcController extends Controller
{
    private MerekAcRepo $merekAc;
    private $data = array();

    public function __construct(MerekAcRepo $merekAc,)
    {
        $this->data['title'] = "Data Merek AC";
        $this->data['dir_view'] = "fitur.data.merekAc.";
        $this->merekAc = $merekAc;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->merekAc->getAll();
        // dd($data->toArray());
        return view($this->data['dir_view'] . 'index', compact('ref', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = $this->data;
        $ref['url'] = route('merekAc.store');

        return view($this->data['dir_view'] . 'form', compact('ref'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'merek' => ['required', 'min:3', 'string'],
            'seri' => ['required', 'min:3', 'string'],
        ], [], [
            'merek' => 'Merek Ac',
            'seri' => 'Seri Ac',
        ]);
        $data['seri'] = Str::upper($data['seri']);
        $data['id'] = CsHelper::data_id();
        $data['created_by'] = auth()->user()->id;

        try {
            $this->merekAc->store($data);
            return redirect()->route('merekAc.index')->with('success', 'Berhasi menambah data merek AC');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan data merek AC")->withInput($request->input);
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
        $data = $this->merekAc->getById($id);
        $ref = $this->data;
        $ref['url'] = route('merekAc.update', $id);

        return view($this->data['dir_view'] . 'form', compact('ref', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'merek' => ['required', 'min:3', 'string'],
            'seri' => ['required', 'min:3', 'string'],
        ], [], [
            'merek' => 'Merek Ac',
            'seri' => 'Seri Ac',
        ]);
        $data['updated_by'] = auth()->user()->id;

        try {
            $this->merekAc->edit($id, $data);
            return redirect()->route('merekAc.index')->with('success', 'Berhasi merubah data merek AC');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat merubah data merek AC")->withInput($request->input);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->merekAc->destroy($id);
            return redirect()->route('merekAc.index')->with('success', 'Berhasi menghapus data merek AC');
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('error', 'Data ini masih digunakan oleh data lain, sehingga tidak bisa dihapus.');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menghapus data merek AC");
        }
    }
}
