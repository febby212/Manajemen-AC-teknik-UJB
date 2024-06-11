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

    public function index()
    {
        $ref = $this->data;
        $data = $this->dataAc->getByGrouping();
        return view($this->data['dir_view'] . 'index', compact('ref', 'data'));
    }

    public function dataAcByRoom($ruangan) {
        $ruangan = decrypt($ruangan);
        $ref = $this->data;
        $data = $this->dataAc->getByRuangan($ruangan);
        $roomName = $this->dataAc->getRoomName($ruangan);
// dd($ruangan);
        return view($this->data['dir_view'] . 'detailedByRoom.index', compact('ref', 'data', 'roomName'));
    }
}
