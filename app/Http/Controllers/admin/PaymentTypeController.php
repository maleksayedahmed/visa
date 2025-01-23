<?php
namespace App\Http\Controllers\Admin;

use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PaymentTypeService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentTypeRequest;

class PaymentTypeController extends Controller
{
    protected $paymentTypeService;

    public function __construct(PaymentTypeService $paymentTypeService)
    {
        $this->paymentTypeService = $paymentTypeService;
    }
    public function index()
    {
        $paymentTypes = $this->paymentTypeService->index();
        return view('template.admin.payment_types.index', compact('paymentTypes'));
    }

    public function create()
    {
        $paymentType = new PaymentType();
        return view('template.admin.payment_types.create_and_edit', compact('paymentType'));
    }

    public function store(PaymentTypeRequest $request)
    {
        $this->paymentTypeService->store($request->validated());
        return redirect()->route('admin.payment_types.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit($id)
    {
        $paymentType = $this->paymentTypeService->find($id);
        return view('template.admin.payment_types.create_and_edit', compact('paymentType'));
    }

    public function update(PaymentTypeRequest $request,  $id)
    {
        $this->paymentTypeService->update($request->validated(), $id);
        return redirect()->route('admin.payment_types.index')->with('success', __('messages.payment_type_updated'));
    }

    public function destroy($id)
    {
        $this->paymentTypeService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->paymentTypeService->find($id);
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
        $item = $this->paymentTypeService->updateAnyColumn($data, $id);
    }
}
