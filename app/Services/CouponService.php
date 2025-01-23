<?php

namespace App\Services;

use App\Repository\CouponRepository;

class CouponService
{
    protected $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function index()
    {
        return $this->couponRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->couponRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->couponRepository->where($array)->get();
    }
    public function store(array $data)
    {
        return $this->couponRepository->create($data);
    }
    public function updateAnyColumn($data, $id)
    {
        $coupon = $this->couponRepository->find($id);
        $coupon = $this->couponRepository->update($data, $coupon);
    }
    public function update($data, $id)
    {
        $coupon = $this->couponRepository->find($id);
        $coupon = $this->couponRepository->update($data, $coupon);
    }
    public function destroy($id)
    {
        $coupon = $this->couponRepository->find($id);
        $this->couponRepository->delete($coupon);
    }
}
