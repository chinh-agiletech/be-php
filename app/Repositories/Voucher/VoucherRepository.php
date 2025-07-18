<?php

namespace App\Repositories\Voucher;

use App\Models\Voucher;
use App\Repositories\BaseRepository;

class VoucherRepository extends BaseRepository
{
    protected $model;

    public function __construct(Voucher $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $voucher = $this->model->find($id);
        if ($voucher) {
            $voucher->update($data);
            return $voucher;
        }
        return null;
    }

    public function delete($id): void
    {
        $voucher = $this->model->find($id);
        if ($voucher) {
            $voucher->delete();
        }
    }
}
