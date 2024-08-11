<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NoticeBoard;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
{
    public function index(){
        $allNotice = NoticeBoard::latest()->paginate(10);
        return view('admin.notice.index',compact('allNotice'));
    }
    public function create(){
        return view('admin.notice.create');
    }
    public function store(Request $request){
        $data = new NoticeBoard();
        $data->fill($request->all());
        $data->save();
        return back()->with('success', 'Notice Save Successfully');
    }
    public function edit($id){
        $notice = NoticeBoard::findOrFail($id);
        return view('admin.notice.edit',compact('notice'));
    }

    public function update(Request $request, $id){
        $data = NoticeBoard::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return back()->with('success', 'Notice Update Successfully');
    }
    public function delete($id){
        $notice = NoticeBoard::findOrFail($id);
        $notice->delete();
        return back()->with('success', 'Notice Delete Successfully');
    }
}
