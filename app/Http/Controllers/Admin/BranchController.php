<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Services\BranchService;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    protected $BranchService;
    public function __construct(BranchService $BranchService)
    {
        $this->BranchService = $BranchService;
    }

    public function index()
    {
        $branch = $this->BranchService->get();
        $data['branch'] = $branch->get();

        return view('admin.branch.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->BranchService->add($data);
            return redirect()->route('branch.index')->with('success', 'Branch Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('branch.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('academic_branch')->where('id', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->BranchService->update($data, $id);
            return redirect()->route('branch.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('branch.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->BranchService->delete($id);
            return redirect()->route('branch.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('branch.index')->with('error', $error_message);
        }
    }

    public function inactive($id){
        $data = Branch::where('id',$id)->first();
        $data->status_id = 0;
        $data->save();
        return back()->with('success', 'Status change Successfully!');
    }
    public function active($id){
        $data = Branch::where('id',$id)->first();
        $data->status_id = 1;
        $data->save();
        return back()->with('success', 'Status change Successfully!');
    }

}
