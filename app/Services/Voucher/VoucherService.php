<?php

namespace App\Services\Voucher;

use App\Services\BaseServices;
use App\Repositories\Voucher\VoucherRepository;

class VoucherService extends BaseServices
{
    protected $voucherRepository;

    public function __construct(VoucherRepository $voucherRepository)
    {
        $this->voucherRepository = $voucherRepository;
    }

    public function getAllVouchers()
    {
        return $this->voucherRepository->getAll();
    }

    public function getVoucherById($id)
    {
        return $this->voucherRepository->getById($id);
    }

    public function createVoucher(array $data)
    {
        return $this->voucherRepository->create($data);
    }

    public function updateVoucher($id, array $data)
    {
        return $this->voucherRepository->update($id, $data);
    }

    public function deleteVoucher($id): void
    {
        $this->voucherRepository->delete($id);
    }

    protected function getModelClass(): string
    {
        return \App\Models\Voucher::class;
    }
}
