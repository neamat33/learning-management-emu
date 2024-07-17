@extends('admin.layouts.app')
@section('page-title', 'Account List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Accounts /</span> List</h4>
        <div class="card card-body mb-2">
            <form action="{{ route('accounts.index') }}">
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="text" name="account_name" class="form-control" placeholder="Account Name" value="{{ request('account_name') }}">
                    </div>
    
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="account_no" placeholder="Account Number" value="{{ request('account_no') }}">
                    </div>
    
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <select name="branch_id" id="" class="form-control">
                            <option value="">Select Branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" {{ request("branch_id")==$branch->id?"SELECTED":"" }}>{{ $branch->branch_name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

    
                </div>
                <div class="form-row mt-2">
                    <div class="form-group float-right">
                        <button class="btn btn-primary" type="submit">
                                <i class="fa fa-sliders"></i>
                                Filter
                        </button>
                        <a href="{{ route('accounts.index') }}" class="btn btn-info">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Accounts List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('accounts.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                    Account</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th><strong> Branch</strong> </th>
                            <th>Account Name </th>
                            <th>Account No. </th>
                            <th>Opening Blance </th>
                            <th>Current Blance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($accounts as $key=>$item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->branch }}</td>
                            <td>{{ $item->account_name}}</td>
                            <td>{{ $item->account_no}}</td>
                            <td>{{ $item->initial_blance}}</td>
                            <td>{{ $item->curr_blance}}</td>
                            <td>
                                        
                                @if ($item->status_id == 1)
                                    <span class="badge bg-success set-status" id="status_{{ $item->id }}"
                                        onclick="setActive({{ $item->id}})">Active</span>
                                @else
                                    <span class="badge bg-danger set-status" id="status_{{ $item->id }}"
                                        onclick="setActive({{ $item->id}})">Inactive</span>
                                @endif

                            </td>
                            <td><a data-id="{{ $item->id}}" data-bs-toggle="modal" data-bs-target="#EditModal"
                                class="btn btn-primary btn-circle btn-sm editBtn">
                                <i class="fa fa-edit text-white"></i>
                            </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    {!! $accounts->links() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- Modal to edit record -->
       



@endsection
