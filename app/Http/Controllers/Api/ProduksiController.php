<?php

namespace App\Http\Controllers\Api;

use App\Models\Produksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ProduksiController extends Controller
{

    public function index()
    {
        $produksi = Produksi::orderBy('updated_at','desc')->paginate(50);
        return response([
            'success' => true,
            'message' => 'Here is the Data!',
            'data' => $produksi
        ], 200);
    }

    public function getById($id)
    {
        $article = Produksi::whereId($id)->first();

        if ($article) {
            return response()->json([
                'success' => true,
                'message' => 'Here is the Details!',
                'data'    => $article
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan',
                'data'    => ''
            ], 404);
        }
    }

    public function create(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'tanggal'       => 'required',
            'wilayah'       => 'required',
            'produksi'      => 'required',
        ],
            [
                'tanggal.required' => 'Tanggal is Required!',
                'wilayah.required' => 'Wilayah is Required!',
                'produksi.required' => 'Produksi is Required!',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Fill Up Required Fields!',
                'data'    => $validator->errors()
            ],400);

        }else{
            $article = Produksi::create([
                'tanggal'       => $request->input('tanggal'),
                'wilayah'       => $request->input('wilayah'),
                'produksi'      => $request->input('produksi'),
            ]);

            if ($article) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Dibuat',
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed!',
                ], 400);
            }
        }
    }

    public function update(Request $request, $id)
    {
         //validate data
         $validator = Validator::make($request->all(), [
            'tanggal'       => 'required',
            'wilayah'       => 'required',
            'produksi'      => 'required',
        ],
            [
                'tanggal.required'  => 'Tanggal is Required!',
                'wilayah.required'  => 'Wilayah is Required!',
                'produksi.required' => 'Produksi is Required!',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Fill Up Required Fields!',
                'data'    => $validator->errors()
            ],400);

        } else {

            $article = Produksi::findOrFail($id)->update([
                'tanggal'       => $request->tanggal,
                'wilayah'       => $request->wilayah,
                'produksi'      => $request->produksi,
            ]);

            if ($article) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diubah',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diubah',
                ], 500);
            }
        }
    }

    public function delete($id)
    {
        $article = Produksi::find($id);

        if (!$article){
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
            ], 404);
        }else{
            $article->delete();
        }
        
        if ($article) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Dihapus',
            ], 500);
        }
    }
}
