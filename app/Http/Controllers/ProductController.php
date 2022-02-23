<?php
namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    //@return \Illuminate\Http\Response;

    public function index()
    {
        return Product::all();
    }

    //@param \Illuminate\Http\Request;
    //@return \Illuminate\Http\Response;
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        return Product::create($request->all());
   
    }
    public function show($id)
    {
        return Product::find($id);

    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }
    public function destroy($id)
    {
       return Product::destroy($id);
    }
    public function search($name)
    {
       return Product::where('name', 'like','%'. $name.'%')->get();
    }


}
