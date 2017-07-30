<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $categories = Category::where('title', 'like', '%' . $keyword . '%')->get();
        } else {
            $categories = Category::all();
        }

        return view('admin.category.show'
            , ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c = new Category();
        $c->title = $request->title;
        $c->save();
        Session::flash('success', 'Tạo mới thành công');

        return redirect('admin/category');
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
        $c = Category::findOrFail($id);

        return view('admin.category.edit', ['c' => $c]);
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
        $c = Category::findOrFail($id);
        $c->title = $request->title;
        $c->save();
        Session::flash('success', "Chỉnh sửa thành công");

        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Category::findOrFail($id);
        $c->delete();
        Session::flash('success', 'Xoá thành công');

        return redirect('admin/category');
    }
}
