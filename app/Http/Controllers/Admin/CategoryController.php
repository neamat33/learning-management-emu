<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    public function __construct()
    {
       
    }

    public function index()
    {
        $data['categories'] = Category::get();
        return view('admin.category.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            Category::create($data);
            return redirect()->route('categories.index')->with('success', 'Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('categories.index')->with('error', $error_message);
        }
    }

    public function edit($id)
    {
       return Category::where('id', $id)->where('status', 1)->first();
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            $category->update([
                'name' => $request->name,
            ]);
            return redirect()->route('categories.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('categories.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('categories.index')->with('error', $error_message);
        }
    }
}