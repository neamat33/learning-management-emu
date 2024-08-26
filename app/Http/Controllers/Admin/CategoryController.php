<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

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
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('success', 'Deleted successfully');;

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
        dd('ok');
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('categories.index')->with('error', $error_message);
        }
    }


    public function inactive($id){
        $data = Category::where('id',$id)->first();
        $data->status = 0;
        $data->save();
        return back()->with('success', 'Status change Successfully!');
    }
    public function active($id){
        $data = Category::where('id',$id)->first();
        $data->status = 1;
        $data->save();
        return back()->with('success', 'Status change Successfully!');
    }




}
