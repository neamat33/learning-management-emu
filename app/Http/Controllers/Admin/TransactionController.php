<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Services\BranchService;
use App\Services\ClassService;
use App\Services\TransactionService;
use App\Services\ShiftService;
use App\Services\AccountService;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    protected $TransactionService;
    public function __construct(TransactionService $TransactionService)
    {
        $this->TransactionService = $TransactionService;
    }

    public function index()
    {

        $transactions = $this->TransactionService->get();
        if(session('role_id')==1){ 
            $data['transactions'] = $transactions->get();
        }else{
            $data['transactions'] = $transactions->where('branch_id',session('branch_id'))->get();
        }
        
        return view('admin.transaction.list', $data);
    }

    public function create()
    {
        $accounts = (new AccountService)->get();
        $student = (new StudentService)->get();
        $data['income_category'] = DB::table('account_transaction_category')->where('parent_id', 0)->where('tnx_type', 1)->where('status_id', 1)->get();
        if(session('role_id')==1){ 
            $data['accounts'] = $accounts->get();
            $data['students'] = $student->get();
        }else{
            $data['students'] = $student->where('branch_id',session('branch_id'))->get();
            $data['accounts'] = $accounts->where('branch_id',session('branch_id'))->get();
        }
        return view('admin.transaction.create', $data);
    }
    public function create_expense()
    {

        $accounts = (new AccountService)->get();
        $data['expense_category'] = DB::table('account_transaction_category')->where('parent_id', 0)->where('tnx_type', 2)->where('status_id', 1)->get();
        if(session('role_id')==1){ 
            $data['accounts'] = $accounts->get();
        }else{
            $data['accounts'] = $accounts->where('branch_id',session('branch_id'))->get();
        }
        return view('admin.transaction.create_expense', $data);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'tnx_cat_id' => 'required',
            'amount' => 'required',
            'tnx_date' => 'required',
        ]);

        try {
            $data = $request->all();
            
            $transaction = $this->TransactionService->add($data);
            if($transaction){
               return $tnx_type = $request->tnx_type_id;
                $account_id = $request->tnx_ac_id;
                $amount = $request->amount;
                if($tnx_type == 1){
                    DB::table('accounts')->where('id_account', $account_id)
                    ->update([
                        'curr_blance' => DB::raw('curr_blance + ' . $amount)
                    ]);
                }elseif($tnx_type == 2){
                    DB::table('accounts')->where('id_account', $account_id)
                    ->update([
                        'curr_blance' => DB::raw('curr_blance - ' . $amount)
                    ]);
                }
                
                return redirect()->route('transactions.index')->with('success', 'Transaction Created Successfully');
            }   
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('transactions.index')->with('error', $error_message);
        }
        return redirect()->route('transactions.index')->with('error', 'Transaction could not be created!');
    }

    public function edit($id)
    {
        
        $accounts = (new AccountService)->get();
        $student = (new StudentService)->get();
        $data['transaction'] = $this->TransactionService->get()->where('id_at', $id)->first();
        $data['income_category'] = DB::table('account_transaction_category')->where('parent_id', 0)->where('tnx_type', 1)->where('status_id', 1)->get();
        if(session('role_id')==1){ 
            $data['accounts'] = $accounts->get();
            $data['students'] = $student->get();
        }else{
            $data['students'] = $student->where('branch_id',session('branch_id'))->get();
            $data['accounts'] = $accounts->where('branch_id',session('branch_id'))->get();
        }
        return view('admin.transaction.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->TransactionService->update($data, $id);
            return redirect()->route('sections.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('sections.create')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->TransactionService->delete($id);
            return redirect()->route('sections.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('sections.index')->with('error', $error_message);
        }
    }

    public function tnx_subcat()
    {
        $cat_id = $_GET['cat_id'];
        return $this->TransactionService->tnx_subcat($cat_id);
    }
}
