<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Models\Product;
use App\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    public function index()
    {
        $sliders = $this->sliderService->index();
        return view('template.admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        $slider = new Slider();

        return view('template.admin.sliders.create_and_edit', compact('slider'));
    }
    public function store(SliderRequest $request)
    {
        // dd($request->validated());
        $data = $request->validated();
        $this->sliderService->store($data);

        return redirect()->route('admin.sliders.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit( string $id)
    {
        // dd($id);
        $slider = $this->sliderService->find($id);
        // dd($slider);
        $products = Product::where('status' , 1)->get();

        return view('template.admin.sliders.create_and_edit', compact('slider', 'products' ));
    }

    public function update(SliderRequest $request, $id)
    {
        $data = $request->validated();

        $this->sliderService->update($data,$id);
        return redirect()->route('admin.sliders.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->sliderService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->sliderService->find($id);
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
        $item = $this->sliderService->updateAnyColumn($data, $id);
    }
}
