@extends('admin.layouts.app')
@section('page-title', 'Transaction List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Account /</span> Transaction </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary flex-grow-1">Transactions List</h6>
                <div class="d-flex">
                    <h6 class="font-weight-bold text-primary" style="margin-right:10px;">
                        <a href="{{ route('transactions.create')}}" class="btn btn-sm btn-primary ">
                            <i class="fa fa-plus"></i> Add Income
                        </a>
                    </h6>
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a href="{{ route('create_transaction_exepense')}}" class="btn btn-sm btn-danger">
                            <i class="fa fa-plus"></i> Add Expense
                        </a>
                    </h6>
                </div>
            </div>                      
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th style="width: 5%">Sl.</th>
                            <th>Date</th>
                            <th>Transactions Type</th>
                            <th>Category</th>
                            <th>User Name</th>
                            <th>Accounts Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($transactions as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ date('d-m-Y',strtotime($item->tnx_date)) }}</td>
                                <td>
                                    @if($item->tnx_type_id==1) 
                                        Income
                                        @else
                                        Expense
                                    @endif
                                </td>
                                <td>{{ $item->category.' ('.$item->sub_category.')' }}</td>
                                <td>{{ $item->student_name ?? '-' }}</td>
                                <td>{{ $item->account_name.'-'.$item->account_no }}</td>
                                <td>{{ $item->tnx_amount }}</td>
                                
                                <td>
                                    @if ($item->status_id == 1)
                                        <span class="badge bg-success set-status" id="status_{{ $item->id }}"
                                            onclick="setActive({{ $item->id }})">Active</span>
                                    @else
                                        <span class="badge bg-danger set-status" id="status_{{ $item->id }}"
                                            onclick="setActive({{ $item->id }})">Inactive</span>
                                    @endif

                                </td>
                                <td>
                                    @if($item->tnx_type_id == 1)
                                    <a href="{{ route('transactions.edit',$item->id) }}" 
                                        class="btn btn-primary btn-circle btn-sm editBtn">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                    @endif
                                    {{-- <a href="{{ url('delete-category/' . $item->id_cat) }}"
                                        class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <script>
        $(function() {
            $("#tnx_type").on('change',function(){
                let tnx_type = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/get_parent') }}",
                    data: {
                        'tnx_type': tnx_type,
                    },
                    success: function(data) {
                        //console.log(data)
                        $("#parent_id").html(data);
                    },
                });
            })
        })
    </script>

@endsection
