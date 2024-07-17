@extends('admin.layouts.app')
@section('page-title', 'Section List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Account /</span> Transaction </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Transaction Category List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="" data-bs-toggle="modal"
                        data-bs-target="#AddModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        New</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th style="width: 5%">Sl.</th>
                            <th>Transaction Category</th>
                            <th>Parent</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->tnx_name }}</td>
                                <td>{{ $item->parent_name }}</td>
                                <td>
                                    @if ($item->tnx_type == 1)
                                        Income
                                    @else
                                        Expense
                                    @endif
                                </td>
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
                                    <a data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#EditModal"
                                        class="btn btn-primary btn-circle btn-sm editBtn">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
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
        <!-- Modal to add new record -->
        <div class="modal fade  mb-5" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                    </div>
                    <form action="{{ route('transaction_category.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Transaction Type</label>
                                <select class="form-control" name="tnx_type" id="tnx_type">
                                    <option value="">Select..</option>
                                    <option value="1">Income</option>
                                    <option value="2">Expense</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="tnx_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="parent_id" id="parent_id">

                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to edit record -->
    <div class="modal fade  mb-5" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Transaction Category</h5>
                </div>
                <form id="update-form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Transaction Type</label>
                            <select class="form-control" disabled selected name="tnx_type" id="e_tnx_type">
                                <option value="">Select..</option>
                                <option value="1">Income</option>
                                <option value="2">Expense</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="tnx_name" id="tnx_name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="parent_id" id="e_parent_id">
                                @foreach($category as $value)
                                    <option value="{{ $value->id}}"> {{ $value->tnx_name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {

            $(document).on('click', '.editBtn', function() {
                let id = $(this).data("id");

                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/transaction_category_edit') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data)
                        $('#e_parent_id').val(data.parent_id);
                        $('#tnx_name').val(data.tnx_name);
                        $('#e_tnx_type').val(data.tnx_type);
                        var id = data.id;
                        // Replace this with actual dynamic ID value
                        var formActionUrl = "{{ url('admin/transaction_category/update') }}/" + id;
                        $('#update-form').attr('action', formActionUrl);
                    },
                });
            });

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
