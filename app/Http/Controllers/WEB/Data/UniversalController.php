<?php

namespace App\Http\Controllers\WEB\Data;

use App\Http\Controllers\Controller;
use App\Models\CaseBase;
use App\Repo\CaseBaseRepo;
use App\Repo\GejalaRepo;
use App\Repo\SolusiRepo;
use CsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UniversalController extends Controller
{
    private CaseBaseRepo $caseBase;
    private GejalaRepo $gejala;
    private SolusiRepo $solusi;
    private $data = array();

    public function __construct(CaseBaseRepo $caseBase, GejalaRepo $gejala, SolusiRepo $solusi)
    {
        $this->data['title'] = 'Tambah Data';
        $this->data['dir_view'] = 'fitur.data.Universal.';
        $this->caseBase = $caseBase;
        $this->gejala = $gejala;
        $this->solusi = $solusi;
    }

    public function formAddDataCBR(Request $request)
    {
        $currentUrl = url()->current();
        if (!$request->session()->has('previous_url') || $request->session()->get('previous_url') == $currentUrl) {
            $previousUrl = url()->previous();
            if ($previousUrl != $currentUrl) {
                $request->session()->put('previous_url', $previousUrl);
            }
        }

        $ref = $this->data;
        $ref['url'] = route('addDataCBR.store');

        return view($this->data['dir_view'] . 'formCBR', compact('ref'));
    }

    public function storeAddDataCBR(Request $request)
    {
        $data = $request->validate([
            'kd_penyakit' => ['required', 'string', 'min:3'],
            'kd_gejala' => ['required', 'string', 'min:3', 'unique:' . CaseBase::class],
            'bobot' => ['required', 'numeric'],
            'gejala' => ['required', 'string', 'min:3'],
            'nama_penyakit' => ['required', 'string', 'min:3'],
            'solusi' => ['required', 'string', 'min:3'],
        ]);
        $user_id = auth()->user()->id;

        try {
            $this->caseBase->store([
                'id' => 'CB-' . CsHelper::data_id(),
                'kd_gejala' => $data['kd_gejala'],
                'kd_penyakit' => $data['kd_penyakit'],
                'bobot' => $data['bobot'],
                'created_by' => $user_id
            ]);
            $this->gejala->store([
                'id' => 'GJL-' . CsHelper::data_id(),
                'kd_gejala' => $data['kd_gejala'],
                'gejala' => $data['gejala'],
                'created_by' => $user_id
            ]);
            $this->solusi->store([
                'id' => 'SLI-' . CsHelper::data_id(),
                'kd_penyakit' => $data['kd_penyakit'],
                'nama_penyakit' => $data['nama_penyakit'],
                'solusi' => $data['solusi'],
                'created_by' => $user_id
            ]);

            $previousUrl = $request->session()->get('previous_url');
            $request->session()->forget('previous_url');

            return redirect($previousUrl)->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                dd($th->getMessage());
                return back()->with('error', 'Terdapat kesalahan di ' . $th->getMessage());
            }
            return back()->with('error', 'Terdapat kesalahan saat menyimpan data')->withInput();
        }
    }
}
