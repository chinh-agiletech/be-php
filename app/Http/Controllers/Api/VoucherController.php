<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Voucher\VoucherService;
class VoucherController extends Controller
{
    protected $service;

    public function __construct(VoucherService $service){
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return response()->json($this->service->getAllVouchers());
    }


    public function show(string $id)
    {
        $voucher = $this->service->getVoucherById($id);
        if (!$voucher) {
            return response()->json(['message' => 'Voucher not found'], 404);
        }
        return response()->json($voucher);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:255',
            'discount' => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);

        $voucher = $this->service->createVoucher($data);
        return response()->json($voucher, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'code' => 'sometimes|required|string|max:255',
            'discount' => 'sometimes|required|numeric',
            'expiry_date' => 'sometimes|required|date',
        ]);

        $voucher = $this->service->updateVoucher($id, $data);
        if (!$voucher) {
            return response()->json(['message' => 'Voucher not found'], 404);
        }
        return response()->json($voucher);
    }

    public function destroy(string $id)
    {
        $this->service->deleteVoucher($id);
        return response()->json(['message' => 'Voucher deleted successfully'], 204);
    }

    protected function getModelClass(): string
    {
        return \App\Models\Voucher::class;
    }
}
