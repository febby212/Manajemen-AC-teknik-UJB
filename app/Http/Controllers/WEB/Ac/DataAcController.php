<?php

namespace App\Http\Controllers\WEB\Ac;

use App\Http\Controllers\Controller;
use App\Repo\DataAcRepo;
use App\Repo\MerekAcRepo;
use CsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use BaconQrCode\Common\ErrorCorrectionLevel;
use BaconQrCode\Encoder\Encoder;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class DataAcController extends Controller
{
    private MerekAcRepo $merekAC;
    private DataAcRepo $dataAc;
    private $data = array();

    public function __construct(DataAcRepo $dataAc, MerekAcRepo $merekAC)
    {
        $this->data['title'] = "Data AC";
        $this->data['dir_view'] = "fitur.daftarAC.";
        $this->dataAc = $dataAc;
        $this->merekAC = $merekAC;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->dataAc->getAll();
        $appUrl = env('APP_URL');
        // dd($data->toArray());
        return view($this->data['dir_view'] . 'index', compact('ref', 'data', 'appUrl'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref =  $this->data;
        $ref['url'] = route('daftarAC.store');
        $merek = $this->merekAC->getAll();

        return view($this->data['dir_view'] . 'form', compact('ref', 'merek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jumlah = $request->input('jumlah');

        for ($i = 0; $i < $jumlah; $i++) {
            $data = $request->validate([
                'merek_id' => ['required', 'min:3', 'string'],
                'kelengkapan' => ['required', 'min:3', 'string'],
                'ruangan' => ['required', 'min:3', 'string'],
                'kondisi' => ['required', 'min:3', 'string'],
                'tahun_pembelian' => ['required', 'min:3', 'numeric'],
                'desc_kondisi' => ['required', 'min:3', 'string'],
            ], [], [
                'merek_id' => 'Merek AC',
                'kelengkapan' => 'Kelengkapan AC',
                'ruangan' => 'Ruangan',
                'kondisi' => 'Kondisi AC',
                'tahun_pembelian' => 'Tahun pembelian AC',
                'desc_kondisi' => 'Deskripsi',
            ]);

            $merek = $this->merekAC->getById($data['merek_id']);
            $data['kode_AC'] = '01' . '/AC' . '/' . $merek['merek'] . '-' . $merek['seri'] . '/' . Str::upper($data['ruangan']) . '/' . $data['tahun_pembelian'] . '/' . CsHelper::token();
            $data['id'] = 'DTAC-' . CsHelper::data_id();
            $data['created_by'] = auth()->user()->id;

            // $allData[] = $data;
            try {
                $this->dataAc->store($data);
            } catch (\Throwable $th) {
                if (env('APP_DEBUG')) {
                    return $th->getMessage();
                }
                return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan data AC")->withInput($request->input);
            }
        }
        return redirect()->route('daftarAC.index')->with('success', 'Berhasil menambah data AC');
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
        $ref =  $this->data;
        $ref['url'] = route('daftarAC.update', $id);
        $merek = $this->merekAC->getAll();
        $data = $this->dataAc->getById($id);
        $jumlahAc = $this->dataAc->countByRuangan($data->ruangan);

        $kode = $data->kode_AC;
        $parts = explode('/', $kode);
        // Mengambil tahun (elemen ke-4 dari array)
        $tahun = $parts[4];
        $tahun_pembelian = $tahun;

        return view($this->data['dir_view'] . 'form', compact('ref', 'merek', 'data', 'tahun_pembelian', 'jumlahAc', 'tahun_pembelian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'merek_id' => ['required', 'min:3', 'string'],
            'kelengkapan' => ['required', 'min:3', 'string'],
            'ruangan' => ['required', 'min:3', 'string'],
            'kondisi' => ['required', 'min:3', 'string'],
            'desc_kondisi' => ['required', 'min:3', 'string'],
            'tahun_pembelian' => ['required', 'min:3', 'numeric'],
        ], [], [
            'merek_id' => 'Merek AC',
            'kelengkapan' => 'Kelengkapan AC',
            'ruangan' => 'Ruangan',
            'kondisi' => 'Kondisi AC',
            'desc_kondisi' => 'Deskripsi',
            'tahun_pembelian' => 'Tahun Pembelian',
        ]);

        $jumlahBaru = $request->input('jumlah');

        $AC = $this->dataAc->getById($id);
        $jumlahLama = $this->dataAc->countByRuangan($AC->ruangan);
        $tahun_pembelian = $request->input('tahun_pembelian');
        $merek = $this->merekAC->getById($data['merek_id']);

        if ($jumlahBaru > $jumlahLama) {
            for ($i = $jumlahLama; $i < $jumlahBaru; $i++) {
                $dataBaru = [
                    'id' => 'DTAC-' . CsHelper::data_id(),
                    'merek_id' => $data['merek_id'],
                    'kelengkapan' => $data['kelengkapan'],
                    'ruangan' => $data['ruangan'],
                    'kondisi' => $data['kondisi'],
                    'desc_kondisi' => $data['desc_kondisi'],
                    'tahun_pembelian' => $data['tahun_pembelian'],
                ];
                $dataBaru['kode_AC'] = '01' . '/AC' . '/' . $merek['merek'] . '-' . $merek['seri'] . '/' . Str::upper($data['ruangan']) . '/' . $tahun_pembelian . '/' . CsHelper::token();
                $dataBaru['created_by'] = auth()->user()->id;
                try {
                    $this->dataAc->store($dataBaru);
                } catch (\Throwable $th) {
                    if (env('APP_DEBUG')) {
                        return $th->getMessage();
                    }
                }
            }
        } elseif ($jumlahBaru < $jumlahLama) {
            $kelebihanAC = $this->dataAc->destroyKelebihanAC($AC->id_jumlah, $jumlahLama, $jumlahBaru);
            foreach ($kelebihanAC as $kelebihan) {
                $kelebihan->delete();
            }
        }


        $data['kode_AC'] = '01' . '/AC' . '/' . $merek['merek'] . '-' . $merek['seri'] . '/' . Str::upper($data['ruangan']) . '/' . $tahun_pembelian . '/' . CsHelper::token();
        $data['updated_by'] = auth()->user()->id;
        try {
            $this->dataAc->edit($id, $data);
            return redirect()->route('daftarAC.index')->with('success', 'Berhasi merubah data AC');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat merubah data AC")->withInput($request->input);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->dataAc->destroy($id);
            return redirect()->route('daftarAC.index')->with('success', 'Berhasi menghapus data AC');
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('error', 'Data ini masih digunakan oleh data lain, sehingga tidak bisa dihapus.');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menghapus data AC");
        }
    }

    public function downloadQR($id) {
        $id = decrypt($id);

        $data = $this->dataAc->getById($id);

        $renderer = new ImageRenderer(new RendererStyle(400), new SvgImageBackEnd());

        $writer = new Writer($renderer);
        $qr = env('APP_URL') . 'detail-riwayat/' . encrypt($id);
        $qrBinary = $writer->writeString($qr);
        $qrBase64 = base64_encode($qrBinary);
        $pdf = FacadePdf::loadView($this->data['dir_view'] . 'downloadQR', compact('qrBase64'));
        return $pdf->stream('QR-Code-AC-' . $data->kode_AC . '.pdf');
    }
}
