<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{
    public function index()
    {
        $data['sidebar_item'] = 'products';
        return view('admin.products.index', $data);
    }

    public function grid(Request $request)
    {
        if($request->ajax()){
            $data = Product::query()->orderByDesc('created_at');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="/admin/products/'.$row->id.'/edit" class="edit btn btn-success btn-sm">ویرایش</a>
                            <a href="/admin/products/'.$row->id.'/delete" class="delete btn btn-danger btn-sm mt-1" onclick="return confirm(`واقعا میخوای ایشون رو حذف کنی؟`)">حذف</a>
                            <a href="/admin/products/'.$row->slug.'" class="view btn btn-warning btn-sm mt-1">مشاهده</a>
                            ';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at_fa;
                })
                ->editColumn('category_id', function ($row) {
                    return $row->category->name;
                })
                ->addColumn('thumbnail', function($row){
                    return '<img class="img-thumbnail elevation-2" width="50px" height="50px" src="' . $row->thumbnail(). '">';
                })
                ->addColumn('status', function ($row) {
                    $badges = [];
                    $badges[] = $row->is_active
                        ? '<span class="badge badge-success">فعال</span>'
                        : '<span class="badge badge-danger">غیر فعال</span>';
                    if ($row->is_featured) {
                        $badges[] = '<span class="badge badge-secondary">ویژه</span>';
                    }
                    if ($row->is_group_buy) {
                        $badges[] = '<span class="badge badge-warning">فروش گروهی</span>';
                    }
                    return implode(' ', $badges);
                })
                ->addColumn('variants_count', function($row){
                    return count($row->variants);
                })
                ->addColumn('attributes_count', function($row){
                    return count($row->attributeValues);
                })
                ->rawColumns(['action', 'thumbnail', 'status'])
                ->make(true);
        }
        return view('admin.products.index');
    }

    public function create()
    {
        $data['sidebar_item'] = 'products_create';
        $data['title'] = 'ثبت محصول';
        return view('admin.products.form', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'mobile' => ['required', 'numeric', 'regex:/09[0-9]{9}/', 'unique:products'],
            'email' => ['required', 'email', 'unique:products,email'],
            'password' => 'required|string|min:6',
            'status' => [
                'required',
                Rule::in(array_keys(Product::$statuses)), // فقط مقادیر مجاز
            ],
        ]);

        if(!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        Product::create($validated);

        return redirect('/admin/products')->with([
            'status' => 'success',
            'message' => 'کاربر با موفقیت ثبت شد.',
        ]);
    }

    public function edit(Product $product)
    {
        $data['sidebar_item'] = 'products_create';
        $data['title'] = 'ویرایش محصول ' . $product->name;
        $data['product'] = $product;
        return view('admin.products.form', $data);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'mobile' => ['required', 'numeric', 'regex:/09[0-9]{9}/', 'unique:products,mobile,'.$product->id.',id'],
            'email' => ['required', 'email', 'unique:products,email,'.$product->id.',id'],
            'password' => 'nullable|string|min:6',
            'status' => [
                'required',
                Rule::in(array_keys(Product::$statuses)), // فقط مقادیر مجاز
            ],
        ]);

        if(!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $product->fill($validated);
        $product->save();

        return redirect('/admin/products')->with([
            'status' => 'success',
            'message' => 'کاربر با موفقیت ویرایش شد.',
        ]);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return redirect('/admin/products')->with([
            'status' => 'success',
            'message' => 'کاربر با موفقیت حذف شد.',
        ]);
    }
}
