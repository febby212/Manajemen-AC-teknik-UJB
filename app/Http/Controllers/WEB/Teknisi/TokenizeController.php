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
        $data = $this->token->getAll();
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
        //
    }
}
