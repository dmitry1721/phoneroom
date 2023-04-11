<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Option;
use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\Tag;
use App\Models\Variant;
use App\Services\Product\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id')->with('category', 'tags', 'brand', 'property', 'variants')->paginate(15);
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        $tags = Tag::all();
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.create', compact('categories', 'brands', 'tags'));
    }

    public function store(StoreRequest $request, Service $service){
        $data = $request->validated();
        $data['published'] = isset($data['published']) ? (bool)$data['published']:false;
        $data['image'] = \Storage::disk('local')->put('public/images/products', $data['image']);
        for ($i=1; $i<=4; $i++){
            if (isset($data['path_'.$i])){
                $data['path_'.$i] = \Storage::disk('local')->put('public/images/thumbimg', $data['path_'.$i]);
            }
        }
        $service->store($data);
        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        $variant = [];
//        $product1 = Product::with('variants')->get();
//        dd($product->variants);
        return view('admin.product.show', compact('product', 'variant'));
    }

    public function variant_show(Product $product, $variant_slug)
    {
        $variant = [];
        if (isset($product->variants)){
            foreach ($product->variants as $variants){

                if (json_decode($variants->variants_json, true)['slug'] === $variant_slug){
                    $variant = json_decode($variants->variants_json, true);
                }
            }
        }

        return view('admin.product.show', compact('product', 'variant'));
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.product.edit', compact('product', 'categories', 'brands', 'tags'));
    }

    public function variant_edit(Product $product, $variant_slug)
    {
        $variant = [];
        if (isset($product->variants)){
            foreach ($product->variants as $variants){

                if (json_decode($variants->variants_json, true)['slug'] === $variant_slug){
                    $variant = json_decode($variants->variants_json, true);
                }
            }
        }
        return view('admin.product.variant_edit', compact('product', 'variant'));
    }

    public function update(Product $product, UpdateRequest $request, Service $service){
        $data = $request->validated();
        $data['published'] = isset($data['published']) ? (bool)$data['published']:false;
        if(empty($data['image']) !== true){
            $data['image'] = \Storage::disk('local')->put('public/images/products', $data['image']);
        }
        for ($i=1; $i<=4; $i++){
            if (empty($data['path_'.$i]) !== true){
                $data['path_'.$i] = \Storage::disk('local')->put('public/images/thumbimg', $data['path_'.$i]);
            }
        }
        $service->update($data, $product);
        return redirect()->route('admin.products.index');
    }

    public function variant_update(Product $product, $variant_slug, UpdateRequest $request, Service $service){
        $data = $request->validated();
        $data['published'] = isset($data['published']) ? (bool)$data['published']:false;
        if(empty($data['image']) !== true){
            $data['image'] = \Storage::disk('local')->put('public/images/products', $data['image']);
        }
        for ($i=1; $i<=4; $i++){
            if (empty($data['path_'.$i]) !== true){
                $data['path_'.$i] = \Storage::disk('local')->put('public/images/thumbimg', $data['path_'.$i]);
            }
        }
        $service->variant_update($data, $product, $variant_slug);
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    public function variant_destroy(Product $product, $variant_slug){

        foreach ($product->variants as $variants){
            if (json_decode($variants->variants_json, true)['slug'] === $variant_slug){
                Variant::where('variants_json', json_encode($variants->variants_json, true))->delete();
                return redirect()->route('admin.products.index');
            }
        }

    }
}
