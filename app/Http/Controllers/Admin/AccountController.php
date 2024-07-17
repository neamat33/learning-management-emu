<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountService;
use App\Services\BranchService;
use App\Services\ClassService;
use App\Services\SectionService;
use App\Services\ShiftService;
use App\Services\StudentService;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    protected $AccountService;
    public function __construct(AccountService $AccountService)
    {
        $this->AccountService = $AccountService;
    }

    public function index(Request $request)
    {
        $branch = (new BranchService)->get();
        $section = (new SectionService)->get();
        $accounts = $this->AccountService->get();
        if($request->account_name){
            $data['accounts'] = $accounts->where('a.account_name','like','%'.$request->account_name.'%');
        }
        if($request->account_no){
            $data['accounts'] = $accounts->where('a.account_no',$request->account_no);
        }
        if($request->branch_id){
            $data['accounts'] = $accounts->where('a.branch_id',$request->branch_id);
        }

        if(session('role_id')==1){ 
            $data['branches'] = $branch->get();
            $data['accounts'] = $accounts->paginate();            
        }else{
            $data['accounts'] = $accounts->where('branch_id',session('branch_id'))->paginate();
        }
        
        return view('admin.account.list', $data);
    }

    public function create()
    {

        $branch = (new BranchService)->get();
        $data['banks'] = DB::table('accounts_bank_name')->where('status_id',1)->get();
        if(session('role_id')==1){ 
            $data['branches'] = $branch->get();
        }else{
            $data['branches'] = $branch->where('id',session('branch_id'))->get();
        }
        return view('admin.account.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_name' => 'required|string|max:128',
            'branch_name' => 'nullable|string|max:128',
            'acc_type_id' => "required|numeric",
            'bank_id' => 'required|numeric',
            'account_no' => 'required|numeric',
        ]);
        
        try {
            $data = $request->all();
            $id = $this->AccountService->add($data);
            return redirect()->back()->with('success', 'Account Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('accounts.create')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('academic_class')->where('id', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->AccountService->update($data, $id);
            return redirect()->route('classes.index')->with('success', 'Class Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->AccountService->delete($id);
            return redirect()->route('classes.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
        }
    }

    public function get_bank()
    {
        $acc_type_id = $_GET['acc_type_id'];

        return $this->AccountService->get_bank($acc_type_id);
    }
}
