<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicBatch;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use App\Services\BatchService;
use App\Services\BranchService;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    protected $BatchService;
    public function __construct(BatchService $BatchService)
    {
        $this->BatchService = $BatchService;
    }

    public function index()
    {
        $branch = (new BranchService)->get();
        $batch = $this->BatchService->get();

        if(session('role_id')==1){
            $data['batch'] = $batch->get();
            $data['branch'] = $branch->get();
        }else{
            $data['batch'] = $batch->where('branch_id',session('branch_id'))->get();
            $data['branch'] = $branch->where('id',session('branch_id'))->get();
        }
        return view('admin.batch.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->BatchService->add($data);
            return redirect()->back()->with('success', 'Batch Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->back()->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('academic_batch')->where('id', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->BatchService->update($data, $id);
            return back()->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return back()->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->BatchService->delete($id);
            return back()->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return back()->with('error', $error_message);
        }
    }

    public function inactive($id){
        $data = AcademicBatch::where('id',$id)->first();
        $data->status_id = 0;
        $data->save();
        return back()->with('success', 'Status change Successfully!');
    }
    public function active($id){
        $data = AcademicBatch::where('id',$id)->first();
        $data->status_id = 1;
        $data->save();
        return back()->with('success', 'Status change Successfully!');
    }

}
