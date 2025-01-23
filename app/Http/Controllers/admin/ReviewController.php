<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\review;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Pet;
use App\Models\Product;
use App\Models\Service;
use App\Services\ReviewService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }
    public function index()
    {
        $reviews = $this->reviewService->index();
        return view('template.admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $review = new Review();
        $products = Product::where('status' , 1)->get();

        return view('template.admin.reviews.create_and_edit', compact('review', 'products'));
    }
    public function store(ReviewRequest $request)
    {
        // dd($request->validated());
        $data = $request->validated();
        $this->reviewService->store($data);

        return redirect()->route('admin.reviews.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit( string $id)
    {
        // dd($id);
        $review = $this->reviewService->find($id);
        // dd($review);
        $products = Product::where('status' , 1)->get();

        return view('template.admin.reviews.create_and_edit', compact('review', 'products' ));
    }

    public function update(ReviewRequest $request, $id)
    {
        $data = $request->validated();

        $this->reviewService->update($data,$id);
        return redirect()->route('admin.reviews.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->reviewService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->reviewService->find($id);
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
        $item = $this->reviewService->updateAnyColumn($data, $id);
    }
}
