<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Http\Requests\ProductsValidationRequest;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('products.index')->with(['products'=>Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create')->with(['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsValidationRequest $request)
    {
        //
        $file = $request->file('file');
        $name= $file->getClientOriginalName();
        $file->move(public_path().'/images/',$name);
        Product::create([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'description'=>$request->body,
            'price'=>$request->price,
            'slug'=>str_slug($request->title),
            'file'=>$name,
        ]);
         return redirect()->route('products.index')->with(['success'=>'Produit ajouté']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        return view('products.show')->with(['product'=>Product::whereSlug($slug)->first(),
                    'categories'=>Category::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit')->with(['product'=>Product::where("id", $id)->first(),
                    'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsValidationRequest $request, $id)
    {
        //
        $product = Product::where("id", $id)->first();
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name= $file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $product->file=$name;  
        }
            $product->title = $request->title;
            $product->description = $request->body;
            $product->category_id = $request->category;
            $product->price = $request->price;
            $product->update();
        
         return redirect()->route('products.index')->with(['success'=>'Produit modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::where("id", $id)->first();
        $product->delete();
        return redirect()->route('products.index')->with(['success'=>'Produit supprimé']);
    }
}
