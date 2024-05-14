<?php

namespace App\Http\Controllers\WEB\PublicHistory;

use App\Http\Controllers\Controller;
use App\Repo\DataAcRepo;
use App\Repo\HistoryRepo;
use App\Repo\MerekAcRepo;
use Illuminate\Http\Request;

class DetailRiwayatController extends Controller
{
    private MerekAcRepo $merekAC;
    private DataAcRepo $dataAc;
    private HistoryRepo $history;
    private $data = array();

    public function __construct(DataAcRepo $dataAc, MerekAcRepo $merekAC, HistoryRepo $history)
    {
        $this->data['title'] = "Detail Riwayat Ac";
        $this->data['dir_view'] = "guest.detail.";
        $this->dataAc = $dataAc;
        $this->merekAC = $merekAC;
        $this->history = $history;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->dataAc->getByGrouping();
        // dd($data->);
        // dd($data->toArray());
        return view($this->data['dir_view'] . 'index', compact('data', 'ref'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ref = $this->data;
        $data = $this->history->getDetail($id);
        // dd($data->toArray());
        return view($this->data['dir_view'] . 'detail', compact('data', 'ref'));
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
