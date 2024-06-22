<?php

namespace App\Http\Controllers\WEB\Prediksi;

use App\Http\Controllers\Controller;
use App\Repo\CaseBaseRepo;
use App\Repo\DataAcRepo;
use App\Repo\GejalaRepo;
use App\Repo\HistoriIdentifikasiRepo;
use App\Repo\SolusiRepo;
use CsHelper;
use Illuminate\Http\Request;

class PrediksiController extends Controller
{
    private CaseBaseRepo $caseBase;
    private GejalaRepo $gejala;
    private DataAcRepo $dataAc;
    private SolusiRepo $solusi;
    private HistoriIdentifikasiRepo $hasilHistori;
    private $data = array();

    public function __construct(CaseBaseRepo $caseBase, GejalaRepo $gejala, DataAcRepo $dataAc, SolusiRepo $solusi, HistoriIdentifikasiRepo $hasilHistori)
    {
        $this->data['title'] = 'Prediksi Kerusakan';
        $this->data['dir_view'] = 'fitur.CBR.';
        $this->caseBase = $caseBase;
        $this->gejala = $gejala;
        $this->dataAc = $dataAc;
        $this->solusi = $solusi;
        $this->hasilHistori = $hasilHistori;
    }

    public function index()
    {
        $ref = $this->data;
        $ref['url'] = route('prediksi.cbr');
        $data = $this->gejala->getAll()->select('kd_gejala', 'gejala');
        $dataAc = $this->dataAc->getAll();

        return view($this->data['dir_view'] . 'index', compact('ref', 'data', 'dataAc'));
    }

    public function predict(Request $request)
    {
        $dataInput = $request->input('kd_gejala');
        $dataAC = $request->input('dataAc_id');
        $data = $this->caseBase->getByKdPenyakit();

        $bobotPerGejala = [];
        $totalBobotPerPenyakit = [];

        // Loop melalui data database
        foreach ($data as $kd_penyakit => $gejalaList) {
            foreach ($gejalaList as $gejala) {
                $kd_gejala = $gejala['kd_gejala'];
                $bobot = $gejala['bobot'];

                if (in_array($kd_gejala, $dataInput)) {
                    if (!isset($bobotPerGejala[$kd_penyakit])) {
                        $bobotPerGejala[$kd_penyakit] = 0;
                    }

                    $bobotPerGejala[$kd_penyakit] += $bobot;
                }

                if (!isset($totalBobotPerPenyakit[$kd_penyakit])) {
                    $totalBobotPerPenyakit[$kd_penyakit] = 0;
                }

                $totalBobotPerPenyakit[$kd_penyakit] += $bobot;
            }
        }

        // Hitung rasio bobot gejala terhadap total bobot penyakit dalam bentuk persen
        $hasilPerhitungan = [];
        foreach ($bobotPerGejala as $kd_penyakit => $bobot) {
            $rasio = ($bobot / $totalBobotPerPenyakit[$kd_penyakit]) * 100; // Mengubah ke persen
            $hasilPerhitungan[$kd_penyakit] = round($rasio, 3); // Bulatkan ke tiga angka di belakang koma
        }

        // Ambil dua nilai tertinggi
        arsort($hasilPerhitungan);
        $hasilTertinggi = array_slice($hasilPerhitungan, 0, 2, true);

        try {
            $kodePrediksi = CsHelper::stringRandom(4);
            $result = [];
            // Ambil solusi berdasarkan hasil tertinggi
            foreach ($hasilTertinggi as $kd_penyakit => $persentase) {
                $solusi = $this->solusi->getByPenyakit($kd_penyakit);
                $result[] = [
                    'id' => 'HHI-' . CsHelper::data_id(),
                    'kode_prediksi' => $kodePrediksi,
                    'user_id' => $request->user()->id,
                    'dataAc_id' => $request->dataAc_id,
                    'kd_penyakit' => $kd_penyakit,
                    'kd_gejala' => implode(',', $dataInput),
                    'solusi' => $solusi->first()->solusi,
                    'persentase' => number_format($persentase, 3),
                    'created_by' => $request->user()->name,
                ];
                // $hasilData = $this->hasilHistori->store();

            }
            dd($hasilTertinggi);
            return view($this->data['dir_view'] . 'result', compact('result'));
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return back()->with('error', 'Terdapat kesalahan di ' . $th->getMessage())->withInput();
            }
            return back()->with('error', 'Terdapat kesalahan saat memprediksi kerusakan AC')->withInput();
        }
    }
}
