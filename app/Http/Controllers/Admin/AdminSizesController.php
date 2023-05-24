<?php

namespace App\Http\Controllers\Admin;
use App\Models\Size;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSizesController extends Controller
{
    
    public function create()
    {
        //admin thêm danh mục
        return view('/admin/admin_catalog/catalogs_create');
    }


    public function store(Request $request)
    {
        Size::create([
            'size_name' => $request->size_name,
        ]);
        return redirect()->action([AdminCategoriesController::class, 'index'])->with('message', 'Thêm dung lượng thành công');
    }

}
