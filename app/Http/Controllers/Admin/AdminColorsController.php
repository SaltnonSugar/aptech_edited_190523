<?php

namespace App\Http\Controllers\Admin;
use App\Models\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminColorsController extends Controller
{
    
    public function create()
    {
        //admin thêm danh mục
        return view('/admin/admin_catalog/catalogs_create');
    }


    public function store(Request $request)
    {
        Color::create([
            'color_name' => $request->color_name,
        ]);
        return redirect()->action([AdminCategoriesController::class, 'index'])->with('message', 'Thêm màu sắc thành công');
    }

}
