<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
//use App\Policies\ProductPolicy;
use Exception;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function store(CreateProductRequest $request)
    {
        try {
            Log::info('store method called');
        
            // Validate the request
            $validatedData = $request->validate($request->rules());
        
            if ($request->hasFile('images')) {
                $image = $request->file('images');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
        
                $validatedData['images'] = 'images/' . $imageName;
            }
        
            $product = new Product($validatedData);
        
            $product->save();
        
            $product->categories()->attach($request->input('categories'));
        
            Log::info('information stored');
        
            return redirect()->route('products.show', $product->id)->with('success', 'Product created successfully');
        } catch (Exception $e) {
            // Log the exception
            Log::error('Error while storing product:');
            Log::error('Error while storing product: ' . $e->getMessage());
            
            // Handle the error as needed, e.g., redirect with an error message
            return redirect()->back()->withInput()->with('error', 'An error occurred while creating the product.');
        }
    }
    

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);


            $product->image = 'images/' . $imageName;
        }

        $product->update($validatedData);

        $product->categories()->sync($request->input('categories', []));

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }


    public function create(){
        return view('products.create');
    }
    
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $this->authorize('edit', $product);

        return view('products.edit', compact('product'));
    }
}
