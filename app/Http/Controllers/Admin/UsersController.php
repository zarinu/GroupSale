<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        $data['sidebar_item'] = 'users';
        return view('admin.users.index', $data);
    }

    public function grid(Request $request)
    {
        if($request->ajax()){
            $data = User::query()->orderByDesc('created_at');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="/admin/users/'.$row->id.'/edit" class="edit btn btn-success btn-sm">ویرایش</a> <a href="/admin/users/'.$row->id.'/delete" class="delete btn btn-danger btn-sm mt-1" onclick="return confirm(`واقعا میخوای ایشون رو حذف کنی؟`)">حذف</a>';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at_fa;
                })
                ->editColumn('status', function ($row) {
                    return '<span class="'. User::$statusesLabels[$row->status] .'">'. User::$statuses[$row->status] .'</span>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('admin.users.index');
    }

    public function create()
    {
        $data['sidebar_item'] = 'users_create';
        $data['title'] = 'ثبت کاربر';
        return view('admin.users.form', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'mobile' => ['required', 'numeric', 'regex:/09[0-9]{9}/', 'unique:users'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|string|min:6',
            'status' => [
                'required',
                Rule::in(array_keys(User::$statuses)), // فقط مقادیر مجاز
            ],
        ]);

        if(!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        User::create($validated);

        return redirect('/admin/users')->with([
            'status' => 'success',
            'message' => 'کاربر با موفقیت ثبت شد.',
        ]);
    }

    public function edit(User $user)
    {
        $data['sidebar_item'] = 'users_create';
        $data['title'] = 'ویرایش کاربر ' . $user->name;
        $data['user'] = $user;
        return view('admin.users.form', $data);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'mobile' => ['required', 'numeric', 'regex:/09[0-9]{9}/', 'unique:users,mobile,'.$user->id.',id'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id.',id'],
            'password' => 'nullable|string|min:6',
            'status' => [
                'required',
                Rule::in(array_keys(User::$statuses)), // فقط مقادیر مجاز
            ],
        ]);

        if(!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->fill($validated);
        $user->save();

        return redirect('/admin/users')->with([
            'status' => 'success',
            'message' => 'کاربر با موفقیت ویرایش شد.',
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect('/admin/users')->with([
            'status' => 'success',
            'message' => 'کاربر با موفقیت حذف شد.',
        ]);
    }
}
