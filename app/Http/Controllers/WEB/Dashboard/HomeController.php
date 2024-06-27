<?php

namespace App\Http\Controllers\WEB\Dashboard;

use App\Http\Controllers\Controller;
use App\Repo\DataAcRepo;
use App\Repo\HistoryRepo;
use App\Repo\ReportACRepo;
use App\Repo\TeknisiRepo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $data = array();
    private HistoryRepo $history;
    private TeknisiRepo $teknisi;
    private DataAcRepo $dataAC;
    private ReportACRepo $report;

    public function __construct(HistoryRepo $history, TeknisiRepo $teknisi, DataAcRepo $dataAC, ReportACRepo $report)
    {
        $this->data['title'] = "Dashboard";
        $this->data['dir_view'] = "fitur.home.";
        $this->history = $history;
        $this->teknisi = $teknisi;
        $this->dataAC = $dataAC;
        $this->report = $report;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $countHistory = $this->history->countHistory();
        $latesHistory = $this->history->getLatesHistory(5);
        $countTeknisi = $this->teknisi->countTeknisi();
        $countDataAC = $this->dataAC->countDataAC();
        $contReport = $this->report->countReport();
        $latesReport = $this->report->latesReport(5);
// dd($latesHistory->toArray());
        return view($this->data['dir_view'] . 'dashboard', compact('ref', 'countHistory', 'latesHistory', 'countTeknisi', 'countDataAC'));
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
