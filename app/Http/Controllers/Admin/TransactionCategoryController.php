<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Services\BranchService;
use App\Services\ClassService;
use App\Services\TransactionCategoryService;
use App\Services\ShiftService;
use Yoeunes\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\DB;

class TransactionCategoryController extends Controller
{
    protected $TransactionCategoryService;
    public function __construct(TransactionCategoryService $TransactionCategoryService)
    {
        $this->TransactionCategoryService = $TransactionCategoryService;
    }

    public function index()
    {

        $data['categories'] = $this->TransactionCategoryService->get();
        $data['category'] = DB::table('account_transaction_category')->where('parent_id', 0)->where('status_id', 1)->get();
        return view('admin.transaction_category.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->TransactionCategoryService->add($data);
            return redirect()->route('transaction_category.index')->with('success', 'Transaction Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('transaction_category.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        return DB::table('account_transaction_category')->where('id', $id)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->TransactionCategoryService->update($data, $id);
            return redirect()->route('sections.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('sections.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->TransactionCategoryService->delete($id);
            return redirect()->route('sections.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('sections.index')->with('error', $error_message);
        }
    }

    public function get_parent()
    {
        $tnx_type = $_GET['tnx_type'];
        return $this->TransactionCategoryService->get_parent($tnx_type);
    }
}
