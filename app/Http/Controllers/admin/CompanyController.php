<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Service;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }
    public function index()
    {
        $companies = $this->companyService->index();
        return view('template.admin.companies.index', compact('companies'));
    }

    public function create()
    {
        $company = new Company();
        $countries = Country::where('status',1)->get();
        $services = Service::where('status',1)->get();
        return view('template.admin.companies.create_and_edit', compact('company', 'countries' , 'services'));
    }
    public function store(CompanyRequest $request)
    {
        // dd($request->validated());
        $this->companyService->store($request->validated());
        return redirect()->route('admin.companies.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(Request $request)
    {
        $countries = Country::all();
        $areas = Area::all();
        $company = $this->companyService->find($request->id);
        $cities = City::where('country_id' , $company->country_id)->get();
        $services = Service::where('status',1)->get();
        // dd($company->services->pluck('service_id')->toArray()   );
        return view('template.admin.companies.create_and_edit', compact('company', 'countries' , 'cities','areas','services'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $this->companyService->update($request->validated(),$id);
        return redirect()->route('admin.companies.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->companyService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->companyService->find($id);
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
        $item = $this->companyService->updateAnyColumn($data, $id);
    }
}
