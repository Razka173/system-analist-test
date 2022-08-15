<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 50);
        $page = $request->input('page', 1);

        $invoices = Invoice::with(['product'])->latest()->paginate($limit);
        return response([
            'status' => true,
            'message' => 'List Semua Invoice',
            'data' => $invoices->getCollection(),
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
                'invoice_no' => 'required|min:1',
                'date' => 'required|date',
                'customer_name' => 'required|min:2',
                'salesperson_name' => 'required|min:2',
                'payment_type' => 'required|in:CASH,CREDIT',
                'notes' => 'nullable',
                'product_id' => 'required',
            ],
            [
                'invoice_no.required' => 'Masukkan No Invoice !',
                'date.required' => 'Masukkan Date Invoice !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $invoice = Invoice::create([
                'invoice_no' => $request->input('invoice_no'),
                'date' => $request->input('date'),
                'customer_name' => $request->input('customer_name'),
                'salesperson_name' => $request->input('salesperson_name'),
                'payment_type' => $request->input('payment_type'),
                'notes' => $request->input('notes'),
                'product_id' => $request->input('product_id'),
            ]);

            if ($invoice) {
                return response()->json([
                    'success' => true,
                    'message' => 'Invoice Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Invoice Gagal Disimpan!',
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
        $invoice = Invoice::whereId($id)->first();

        if ($invoice) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Invoice!',
                'data'    => $invoice
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invoice Tidak Ditemukan!',
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
                'invoice_no' => 'required|min:1',
                'date' => 'required|date',
                'customer_name' => 'required|min:2',
                'salesperson_name' => 'required|min:2',
                'payment_type' => 'required|in:CASH,CREDIT',
                'notes' => 'nullable',
                'product_id' => 'required',
            ],
            [
                'invoice_no.required' => 'Masukkan No Invoice !',
                'date.required' => 'Masukkan Date Invoice !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $invoice = Invoice::whereId($request->input('id'))->update([
                'invoice_no' => $request->input('invoice_no'),
                'date' => $request->input('date'),
                'customer_name' => $request->input('customer_name'),
                'salesperson_name' => $request->input('salesperson_name'),
                'payment_type' => $request->input('payment_type'),
                'notes' => $request->input('notes'),
                'product_id' => $request->input('product_id'),
            ]);

            if ($invoice) {
                return response()->json([
                    'success' => true,
                    'message' => 'Invoice Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Invoice Gagal Diupdate!',
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
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        if ($invoice) {
            return response()->json([
                'success' => true,
                'message' => 'Invoice Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invoice Gagal Dihapus!',
            ], 400);
        }
    }
}
