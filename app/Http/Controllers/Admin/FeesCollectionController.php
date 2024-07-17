<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BranchService;
use App\Services\StudentService;
use App\Models\FeesCollection;
use App\Models\FeesCollectionDetail;
use App\Models\StudentFeesCategory;
use App\Services\AccountService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeesCollectionController extends Controller
{


    public function index()
    {
        $branch = (new BranchService)->get();
        $frees = FeesCollection::query();

        if (session('role_id') == 1) {
            $data['frees'] = $frees->get();
            $data['branch'] = $branch->get();
        } else {
            $data['frees'] = $frees->where('branch_id', session('branch_id'))->get();
            $data['branch'] = $branch->where('id', session('branch_id'))->get();
        }
        return view('admin.fees_collection.list', $data);
    }
    public function create()
    {
      
        $branch = (new BranchService)->get();
        $students = (new StudentService)->get();
        $accounts = (new AccountService)->get();
        $frees = FeesCollection::query();
        $data['categories'] = StudentFeesCategory::get();

        if (session('role_id') == 1) {
            $data['frees'] = $frees->get();
            $data['branch'] = $branch->get();
            $data['students'] = $students->get();
            $data['accounts'] = $accounts->get();
        } else {
            $data['frees'] = $frees->where('branch_id', session('branch_id'))->get();
            $data['branch'] = $branch->where('id', session('branch_id'))->get();
            $data['students'] = $students->where('id', session('branch_id'))->get();
            $data['accounts'] = $accounts->where('id', session('branch_id'))->get();
        }
        return view('admin.fees_collection.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|numeric',
            'tnx_ac_id' => 'required',
            'subtotal' => "required",
        ]);

        $data = $request->all();
        try {
            $fees = FeesCollection::create([
                'branch_id' => session('branch_id'),
                'student_id' => $data['student_id'],
                'date' => date('Y-m-d',strtotime($data['date'])),
                'tnx_ac_id' => $data['tnx_ac_id'],
                'tnx_amount' => $data['total'],
                'sub_total' => $data['subtotal'],
                'discount' => $data['discount'],
                'payment_method' => $data['payment_method'],
                'payment_method_des' => $data['payment_method_des'],
                'tnx_note' => $data['note'],
                'created_by' => Auth::id(),

            ]);

            foreach ($request->tnx_fees_cat as $key => $category) {
                if($request->tnx_amount[$key] !=null){
                    FeesCollectionDetail::create([
                        'fees_collection_id' => $fees->id,
                        'tnx_fees_cat' => $category,
                        'tnx_amount' => $request->tnx_amount[$key],
                    ]);
                }    
            }

            if ($fees) {
                return redirect()->route('fees-collections.show',$fees->id)->with('success', 'Successfully Saved!');
            }
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
    public function show($id)
    {
        $single = FeesCollection::where('id',$id)->first();
        $student = (new studentService)->getStudent($single->student_id);
        return view('admin.fees_collection.invoice', compact('single', 'student'));
        
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
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return back()->with('error', $error_message);
        }
    }
}
