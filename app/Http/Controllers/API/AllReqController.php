<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repo\TeknisiRepo;
use Exception;
use Helper;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AllReqController extends Controller
{
    private TeknisiRepo $teknisi;
    public function __construct(TeknisiRepo $teknisi, )
    {
        $this->teknisi = $teknisi;
    }

    

}
