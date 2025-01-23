<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repository\PaymentTypeRepository;

class PaymentTypeService
{
    protected $paymentTypeRepository;

    public function __construct(PaymentTypeRepository $paymentTypeRepository)
    {
        $this->paymentTypeRepository = $paymentTypeRepository;
    }

    public function index()
    {
        return $this->paymentTypeRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->paymentTypeRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->paymentTypeRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $data['created_by'] = Auth::id();
        return $this->paymentTypeRepository->create($data);
    }
    public function updateAnyColumn($data, $id)
    {
        $user = $this->paymentTypeRepository->find($id);
        $user = $this->paymentTypeRepository->update($data, $user);
    }
    public function update($data, $id)
    {
        $data['updated_by'] = Auth::id();
        $user = $this->paymentTypeRepository->find($id);
        $user = $this->paymentTypeRepository->update($data, $user);
    }
    public function destroy($id)
    {
        $user = $this->paymentTypeRepository->find($id);
        $this->paymentTypeRepository->delete($user);
    }
}
