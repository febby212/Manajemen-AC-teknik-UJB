<?php

namespace App\Http\Controllers\WEB\Teknisi;

use App\Http\Controllers\Controller;
use App\Repo\TeknisiRepo;
use App\Repo\TokenizeRepo;
use App\Repo\UserRepo;
use CsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Illuminate\Support\Str;

class TeknisiController extends Controller
{
    private TeknisiRepo $teknisi;
    private TokenizeRepo $token;
    private UserRepo $user;
    private $data = array();

    public function __construct(UserRepo $user, TeknisiRepo $teknisi, TokenizeRepo $token)
    {
        $this->data['title'] = "Teknisi";
        $this->data['dir_view'] = "fitur.teknisi.";
        $this->teknisi = $teknisi;
        $this->token = $token;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ref = $this->data;
        $data = $this->teknisi->getAll();
        // dd($data->toArray());

        return view($this->data["dir_view"] . 'index', compact('ref', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = $this->data;
        $ref['url'] = route('teknisi.store');

        return view($this->data['dir_view'] . 'form', compact('ref'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:4'],
            'nama_perusahaan' => ['required', 'string', 'min:4'],
            'alamat_perusahaan' => ['required', 'string', 'min:4'],
            'no_telp' => ['required', 'min:9']
        ]);

        $data['no_telp'] = $this->processPhoneNumber($data['no_telp']);
        $data['id'] = 'TKI-' . CsHelper::data_id();
        $data['created_by'] = auth()->user()->id;

        $dataUser = [
            'name' => $data['name'],
            'username' => Str::of($data['name'])->before(' '),
            'email' => Str::of($data['name'])->before(' ') . CsHelper::randomNumber() . '@gmail.com',
            'password' => Hash::make('password'),
            'is_teknisi' => 1,
            'teknisi_id' => $data['id'],
        ];

        $dataUser['id'] = 'USR-' . CsHelper::data_id();
        $dataUser['created_by'] = auth()->user()->id;

        try {
            $this->teknisi->store($data);
            $this->user->store($dataUser);
            return redirect()->route('teknisi.index')->with('success', 'Berhasi menambah data teknisi');
        } catch (\Throwable $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan data teknisi")->withInput($request->input);
        }
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
        $ref = $this->data;
        $ref['url'] = route('teknisi.update', $id);
        $data = $this->teknisi->getById($id);

        return view($this->data['dir_view'] . 'form', compact('ref', 'data'));
    }

    protected function processPhoneNumber($phoneNumber)
    {
        // Menghilangkan spasi dan simbol +
        $phoneNumber = str_replace([' ', '+'], '', $phoneNumber);

        // Jika nomor telepon dimulai dengan 0, ubah menjadi 62
        if (strpos($phoneNumber, '0') === 0) {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        }

        return $phoneNumber;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:4'],
            'nama_perusahaan' => ['required', 'string', 'min:4'],
            'alamat_perusahaan' => ['required', 'string', 'min:4'],
            'no_telp' => ['required', 'min:9']
        ]);

        $data['no_telp'] = $this->processPhoneNumber($data['no_telp']);

        $data['updated_by'] = auth()->user()->id;
        // dd($data);

        $dataUser = [
            'name' => $data['name'],
            'username' => Str::of($data['name'])->before(' '),
            'email' => Str::of($data['name'])->before(' ') . CsHelper::randomNumber() . '@gmail.com',
        ];
        $dataUser['updated_by'] = auth()->user()->id;
        try {
            $this->user->editByIdTeknisi($id, $dataUser);
            $this->teknisi->edit($id, $data);
            return redirect()->route('teknisi.index')->with('success', 'Berhasi mengubah data teknisi');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat mengubah data teknisi")->withInput($request->input);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->teknisi->destroy($id);
            $this->token->destroyByTeknisi($id);
            return back()->with('success', 'Data berhasil di hapus');
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('error', 'Data ini masih digunakan oleh data lain, sehingga tidak bisa dihapus.');
        } catch (Throwable $e) {
            if (env('APP_DEBUG')) {
                return back()->with('error', 'Terjadi kesalahan di ' . $e->getMessage());
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menghapus data");
        }
    }
}
