<?php
namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\ServiceService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }
    public function index()
    {
        $services = $this->serviceService->index();
        return view('template.admin.services.index', compact('services'));
    }

    public function create()
    {
        $service = new Service();
        return view('template.admin.services.create_and_edit', compact('service'));
    }

    public function store(ServiceRequest $request)
    {
        $this->serviceService->store($request->validated());
        return redirect()->route('admin.services.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(Service $service)
    {
        return view('template.admin.services.create_and_edit', compact('service'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $this->serviceService->update($request->validated(), $service->id);
        return redirect()->route('admin.services.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->serviceService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->serviceService->find($id);
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
        $item = $this->serviceService->updateAnyColumn($data, $id);
    }
}
