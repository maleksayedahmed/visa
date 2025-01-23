<?php

namespace App\Http\Controllers\admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Services\CouponService;
use App\Http\Controllers\Controller;


class CouponController extends Controller
{
    protected $couponService;

    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }
    public function index()
    {
        $coupons = $this->couponService->index();
        return view('template.admin.coupons.index' , compact('coupons'));
    }

    public function create(Coupon $item)
    {
        return view('template.admin.coupons.create_and_edit' ,compact('item'  ) );
    }

    public function store(Request $request)
    {
        $this->couponService->store($request->all());
        return redirect()->route('admin.coupons.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->couponService->find($id);
        return view('template.admin.coupons.create_and_edit' , compact('item' ) );
    }

    public function update(Request $request, string $id)
    {
        $this->couponService->store($request->all(),$id);
        return redirect()->route('admin.coupons.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->couponService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->couponService->find($id);
        $status = 0;
        if (isset($item) && !empty($item->id)) {
            if ($item->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }
        $data = array(
            'status' => $status
        );
        $item = $this->couponService->updateAnyColumn($data, $id);
    }


}
