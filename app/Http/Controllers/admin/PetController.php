<?php
namespace App\Http\Controllers\Admin;

use App\Models\Pet;
use App\Models\User;
use App\Models\PetsCategory;
use App\Services\PetService;
use Illuminate\Http\Request;
use App\Http\Requests\PetRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    protected $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }
    public function index()
    {
        $pets = $this->petService->index();
        return view('template.admin.pets.index', compact('pets'));
    }

    public function create()
    {
        $pet = new Pet();
        $users = User::all();
        $categories = PetsCategory::all();
        return view('template.admin.pets.create_and_edit', compact('pet', 'users', 'categories'));
    }

    public function store(PetRequest $request)
    {
        $this->petService->store($request->validated());
        return redirect()->route('admin.pets.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(Pet $pet)
    {
        $users = User::all();
        $categories = PetsCategory::all();
        return view('template.admin.pets.create_and_edit', compact('pet', 'users', 'categories'));
    }

    public function update(PetRequest $request, Pet $pet)
    {
        $this->petService->update($request->validated(), $pet->id);
        return redirect()->route('admin.pets.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->petService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->petService->find($id);
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
        $item = $this->petService->updateAnyColumn($data, $id);
    }
}
