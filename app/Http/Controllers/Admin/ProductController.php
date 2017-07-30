<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    private $_categories = [];

    public function __construct()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $this->_categories[$category->id] = $category->title;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        } else {
            $products = Product::all();
        }

        return view('admin.product.show', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create',
            ['categories' => $this->_categories]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thumbnail = 'no-image.jpg';
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $thumbnail = $file->getClientOriginalName();
            $path = public_path('uploads/product');
            $file->move($path, $thumbnail);
        }

        $p = new Product();
        $p->name = $request->name;
        $p->categories_id = $request->categories_id;
        $p->price = $request->price;
        $p->thumbnail = $thumbnail;
        $p->save();

        Session::flash('success', "Tạo mới thành công");

        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Product::findOrFail($id);

        return view('admin.product.edit', [
                'p' => $p,
                'categories' => $this->_categories,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p = Product::findOrFail($id);
        $thumbnail = $p->thumbnail;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $thumbnail = $file->getClientOriginalName();
            $path = public_path('uploads/product');
            $file->move($path, $thumbnail);
        }

        $p->name = $request->name;
        $p->categories_id = $request->categories_id;
        $p->price = $request->price;
        $p->thumbnail = $thumbnail;
        $p->save();

        Session::flash('success', "Chỉnh sửa thành công");

        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Product::findOrFail($id);
        $p->delete();
        Session::flash('success', 'Xoá thành công');

        return redirect('admin/product');
    }
}
