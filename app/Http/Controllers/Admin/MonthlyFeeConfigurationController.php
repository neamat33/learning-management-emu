<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MonthlyFeeConfigService;
use App\Services\BranchService;
use App\Services\ClassService;
use Illuminate\Support\Facades\DB;

class MonthlyFeeConfigurationController extends Controller
{
    protected $MonthlyFeeConfigService;
    public function __construct(MonthlyFeeConfigService $MonthlyFeeConfigService)
    {
        $this->MonthlyFeeConfigService = $MonthlyFeeConfigService;
    }

    public function index()
    {
        $branch = (new BranchService)->get();
        $class = (new ClassService)->get();
        $configs = $this->MonthlyFeeConfigService->get();

        if(session('role_id')==1){ 
            $data['configs'] = $configs->get();
            $data['branch'] = $branch->get();
            $data['class'] = $class->get();
        }else{
            $data['configs'] = $configs->where('branch_id',session('branch_id'))->get();
            $data['branch'] = $branch->where('id',session('branch_id'))->get();
            $data['class'] = $class->where('id',session('branch_id'))->get();
        }
        return view('admin.fee_configs.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $configs = DB::table('monthly_fees_configurations')->where('branch_id',$request->branch_id)->where('class_id',$request->class_id)->first();
        if($configs){
            return back()->with('warning','Already exists!');
        }
        try {
            $this->MonthlyFeeConfigService->add($data);
            return redirect()->back()->with('success', 'Batch Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->back()->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('monthly_fees_configurations')->where('id', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->MonthlyFeeConfigService->update($data, $id);
            return back()->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return back()->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->MonthlyFeeConfigService->delete($id);
            return back()->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return back()->with('error', $error_message);
        }
    }
}
