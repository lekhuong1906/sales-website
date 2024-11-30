<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Tag;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tags'] = Tag::getListTagValid()->get();
        // dd($data);
        $data['products'] = Product::getListProductValid()->get();
        return view("home.pages.products", compact("data"));
    }

    /**
     * Display a listing of the resource in admin page.
     */
    public function adminProductList()
    {
        $data["products"] = Product::orderBy("_id", "desc")->paginate(5);
        return view("admin.pages.products.product_list", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['tags'] = Tag::getListTagValid()->get();
        return view("admin.pages.products.product_add", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = $this->productService->create($request->all());

        if (!$product)
            return redirect()->back()->with('error', 'Something went wrong! Please try again');
        return redirect()->route('admin.products')->with('success', 'Product Add Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //O69vybdnTdXLIay60Uc81IbQpXyQITWlHMRy6iMxfhU=

        $product = Product::find($id);
        $product->tags = Tag::whereIn('_id', $product->tags)->get();
        // dd($product->tags);
        return view("home.pages.product_detail", compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product'] = Product::find($id)->withoutLocalized();
        $data['tags'] = Tag::getListTagValid()->get();
        return view("admin.pages.products.product_edit", compact("data", "id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        dd($request->all());
        $product = $this->productService->update($request->all(), $id);
        if (!$product)
            return redirect()->back()->with("error", "Something went wrong! Please try again");

        return redirect()->route("admin.products")->with("success", "Update Product Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product)
            return redirect()->back()->with("error", "Item not found!");

        return redirect()->back()->with("success", "Delete product success");
    }
}
