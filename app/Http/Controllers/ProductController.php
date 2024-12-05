<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $img = Product_image::all();
        return view('product.index')->with('product', $product)->with('img', $img);
    }

    public function contact()
    {
        return view('product.contact');
    }

    public function products(Request $request)
    {
        return view('product.products');
    }

    public function cart(Request $request)
    {
        return view('product.cart');
    }

    public function detail()
    {
        return view('product.detail');
    }
    public function show($id)
    {
        $product = Product::find($id);
        $img = Product_image::where('product_id', $id)->first();
        return view('product.show')->with('product', $product)->with('img', $img);
    }

    public function checkout(Request $request)
    {
        return view('product.checkout');
    }

    public function productlist()
    {
        $products = Product::paginate(20);
        return view('admin.productlist')->with('product', $products);
    }
    public function productshow($id)
    {
        $product = Product::find($id);
        $product_img = Product_image::where('product_id', $product->id)->first();
        return view('admin.productshow')->with('product', $product)->with('img', $product_img);
    }
    public function productdelete($id)
    {
        $product = Product::find($id);
        $img = Product_image::where('product_id', $product->id)->first();
        Storage::delete($img->product_img);
        $product->delete();
        Session::flash('success', 'Product deleted successfully');
        return redirect()->route('productlist')->with('success', 'product deleted successfully!');
    }

    public function productadd()
    {
        return view('admin.productadd');
    }

    public function productupdate($id)
    {
        $product = Product::find($id);
        return view('admin.productupdate')->with('product', $product);
    }


    public function productimgdelete($id)
    {
        $img = Product_image::find($id);
        Storage::delete($img->product_img);
        $img->delete();
        Session::flash('success', 'Image deleted successfully');
        return redirect()->route('productshow', $img->product_id)->with('success', 'Image deleted successfully!');
    }


    public function productimgedd(Request $request, $id)
    {
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
        ]);
        $path = $request->file('product_img')->store('img');
        Product_image::create([
            'product_id' => $id,
            'product_img' => $path,
        ]);
        Session::flash('success', 'Product created successfully');
        return redirect()->back();
    }
    public function productstore(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric|between:0,999999.99',
            'product_category' => 'required|string|max:100',
            'product_paint' => 'required|string|max:10',
            'product_size' => 'required|string|max:10',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
        ]);

        $path = $request->file('product_img')->store('img');
        // dd($path);
        $product = Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_category' => $request->product_category,
            'product_paint' => $request->product_paint,
            'product_size' => $request->product_size,
        ]);
        Product_image::create([
            'product_id' => $product->id,
            'product_img' => $path,
        ]);
        Session::flash('success', 'Product created successfully');
        return redirect()->route('productlist')->with('success', 'Product added successfully!');
    }

    public function productedid(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric|between:0,999999.99',
            'product_category' => 'required|string|max:100',
            'product_paint' => 'required|string|max:10',
            'product_size' => 'required|string|max:10',
        ]);
        if ($request->hasFile('product_img')) {
            $request->validate([
                'product_img' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
            ]);
            $path = $request->file('product_img')->store('img');
        } else {
            $path = Product_image::where('product_id', $id)->first()->product_img;
        }
        Product_image::where('product_id', $id)->update([
            'product_img' => $path,
        ]);
        $product = Product::find($id);
        $product->update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_category' => $request->product_category,
            'product_paint' => $request->product_paint,
            'product_size' => $request->product_size,
        ]);
        Session::flash('success', 'Product updated successfully');
        return redirect()->route('productlist')->with('success', 'Product updated successfully!');
    }
}
