<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 50);
        $page = $request->input('page', 1);

        $products = Product::with(['invoices'])->latest()->paginate($limit);
        return response([
            'status' => true,
            'message' => 'List Semua Produk',
            'data' => $products->getCollection(),
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'item_name' => 'required|min:5',
                'quantity' => 'required|min:1|numeric',
                'total_cost_of_goods_sold' => 'required|numeric',
                'total_price_sold' => 'required|numeric',
            ],
            [
                'item_name.required' => 'Masukkan Item Name Produk !',
                'quantity.required' => 'Masukkan Quantity Produk !',
                'total_cost_of_goods_sold.required' => 'Masukan Total Cost of Goods Sold Produk !',
                'total_price_sold.required' => 'Masukan Total Price Sold Produk !'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $product = Product::create([
                'item_name'                 => $request->input('item_name'),
                'quantity'                  => $request->input('quantity'),
                'total_cost_of_goods_sold'  => $request->input('total_cost_of_goods_sold'),
                'total_price_sold'          => $request->input('total_price_sold'),
            ]);

            if ($product) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Product Gagal Disimpan!',
                ], 401);
            }
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = Product::whereId($id)->first();

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Produk!',
                'data'    => $product
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Produk Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',
                'item_name' => 'required|min:5',
                'quantity' => 'required|min:1|numeric',
                'total_cost_of_goods_sold' => 'required|numeric',
                'total_price_sold' => 'required|numeric',
            ],
            [
                'id.required' => 'Masukkan ID !',
                'item_name.required' => 'Masukkan Item Name Produk !',
                'quantity.required' => 'Masukkan Quantity Produk !',
                'total_cost_of_goods_sold.required' => 'Masukan Total Cost of Goods Sold Produk !',
                'total_price_sold.required' => 'Masukan Total Price Sold Produk !'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $product = Product::whereId($request->input('id'))->update([
                'item_name'                 => $request->input('item_name'),
                'quantity'                  => $request->input('quantity'),
                'total_cost_of_goods_sold'  => $request->input('total_cost_of_goods_sold'),
                'total_price_sold'          => $request->input('total_price_sold'),
            ]);

            if ($product) {
                return response()->json([
                    'success' => true,
                    'message' => 'Produk Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk Gagal Diupdate!',
                ], 401);
            }
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Produk Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Produk Gagal Dihapus!',
            ], 400);
        }
    }
}
