<?php

namespace App\Http\Controllers\WEB\GuestTech;

use App\Http\Controllers\Controller;
use App\Repo\DataAcRepo;
use Illuminate\Http\Request;

class GuestTechController extends Controller
{
    private $data = array();
    private DataAcRepo $dataAc;
    public function __construct(DataAcRepo $dataAc)
    {
        $this->data['dir_view'] = 'guest.';
        $this->data['title'] = 'Home SIMAC';
        $this->dataAc = $dataAc;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->dataAc->getByGrouping();
// dd($data);
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
