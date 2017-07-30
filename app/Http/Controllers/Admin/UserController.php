<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    private $_group = [];

    public function __construct()
    {
        $groups = Group::all();
        foreach ($groups as $group) {
            $this->_group[$group->id] = $group->name;
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
            $users = User::where('name', 'like', '%' . $keyword . '%')->get();
        } else {
            $users = User::all();
        }
        return view('admin.user.show', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.user.create",
            ['group' => $this->_group]
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
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|max:100|',
//            'password' => 'required|max:50|min:6'

        ]);
        $u = new User();
        $u->name = $request->name;
        $u->password = Hash::make($request->password1);
        $u->email = $request->email;
        $u->phone = $request->phone;
        $u->address = $request->address;
        $u->group_id = $request->group_id;
        $u->save();
        Session::flash('success', "Tạo mới thành công");

        return redirect('admin/user');
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
        $user = User::findOrFail($id);

        return view("admin.user.edit", [
            'user' => $user,
            'group' => $this->_group,
        ]);
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
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->password = Hash::make($request->password1);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->group_id = $request->group_id;
        $user->save();

        Session::flash('success', "Chỉnh sửa thành công");

        return redirect("admin/user");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('success', "Xoá thành công");

        return redirect('admin/user');
    }
}
