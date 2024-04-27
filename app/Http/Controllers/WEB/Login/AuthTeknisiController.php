<?php

namespace App\Http\Controllers\WEB\Login;

use App\Http\Controllers\Controller;
use App\Repo\TokenizeRepo;
use CsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthTeknisiController extends Controller
{
    private TokenizeRepo $tokenize;
    private $data = array();

    public function __construct(TokenizeRepo $tokenize, )
    {
        $this->data['title'] = "Riwayat Perbaikan Ac";
        $this->data['dir_view'] = "teknisi.";
        $this->tokenize = $tokenize;
    }

    public function loginTeknisi(Request $request)
    {
        $token = $request->validate([
            'token' => ['required', 'min:4']
        ], [], [
            'token' => 'Kode akses'
        ]);

        $teknisi = $this->tokenize->getToken($token);

        if ($teknisi) {
            $teknisi->used = true;
            $teknisi->save();

            auth()->loginUsingId($teknisi->teknisi_id);
            return view();
        }
        return back()->with('error', config('error','Kode akses tidak sesuai'));
    }

    public function generateToken(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'id' => 'TKN-' . CsHelper::data_id(),
            'teknisi_id' => $id,
            'token' => CsHelper::token(),
            'created_by' => auth()->user()->id,
        ];
        try {
            $this->tokenize->generateToken($data);
            return CsHelper::api_respons(200, 'Kode akses berhasil dibuat', $data);
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat membuat kode akses");
        }
    }
}
