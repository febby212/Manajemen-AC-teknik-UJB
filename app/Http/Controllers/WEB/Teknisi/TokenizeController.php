<?php

namespace App\Http\Controllers\WEB\Teknisi;

use App\Http\Controllers\Controller;
use App\Repo\TeknisiRepo;
use App\Repo\TokenizeRepo;
use CsHelper;
use Illuminate\Http\Request;

class TokenizeController extends Controller
{
    private TokenizeRepo $token;
    private TeknisiRepo $teknisi;
    private $data = array();

    public function __construct(TokenizeRepo $token, TeknisiRepo $teknisi, )
    {
        $this->data['title'] = "Kode akses";
        $this->data['dir_view'] = "fitur.token.";
        $this->token = $token;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->token->getAllWithTrash();
        // dd($data->toArray());
        
        return view($this->data['dir_view'] . "index", compact('ref', 'data'));
    }

    public function dataTeknisi(Request $request) {
        if ($request->ajax()) {
            $data = $this->teknisi->getAll();
            dd($data);
            return json_encode($data);
        } else {
            return json_encode(["data" => null]);
        }
    }

    public function generateToken(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'id' => 'TKN-' . CsHelper::data_id(),
            'teknisi_id' => $id,
            'token' => CsHelper::token(),
            'created_by' => auth()->user()->id,
        ];
        try {
            $this->token->generateToken($data);
            return CsHelper::api_respons(200, 'Kode akses berhasil dibuat', $data);
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat membuat kode akses");
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->token->destroy($id);
            return back()->with('success', 'Berhasil menghapus token');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terdapat kesalahan di ' . $th->getMessage());
                }
            return back()->with('error', 'Terdapat kesalahan saat menghapus data');
        }
    }
}
