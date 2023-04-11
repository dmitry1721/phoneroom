<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Services\Category\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::orderBy('id')->with('brands')->paginate(42);

        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.category.create', compact('categories', 'brands'));
    }

    public function store(StoreRequest $request, Service $service){

//        dd($request);
        $data = $request->validated();
        if (isset($data['image'])){
            $data['image'] = \Storage::disk('local')->put('public/images/categories', $data['image']);
        }
        $service->store($data);
        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        $parentCategory = Category::query()
                ->select('*')
                ->where('id', $category->parent_id)
                ->first();
        return view('admin.category.show', compact('category', 'parentCategory'));
    }

    public function edit(Category $category)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $parentCategory = Category::query()
            ->select('*')
            ->where('id', $category->parent_id)
            ->first();
        return view('admin.category.edit', compact('category', 'categories', 'parentCategory', 'brands'));
    }

    public function update(Category $category, UpdateRequest $request, Service $service){

        $data = $request->validated();
        if(empty($data['image']) !== true){
            $data['image'] = \Storage::disk('local')->put('public/images/categories', $data['image']);
        }
        $service->update($data, $category);
        return redirect()->route('admin.categories.index');
    }


    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
