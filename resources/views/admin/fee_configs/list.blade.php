@extends('admin.layouts.app')
@section('page-title', 'Monthly Fees Configuration List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Configuration</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Fees Configuration List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="" data-bs-toggle="modal"
                        data-bs-target="#AddModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        Fees Configuration</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Branch Name</th>
                            <th>Class Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($configs as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>

                                <td>{{ $item->branch_name }}</td>
                                <td>{{ $item->class_name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>

                                    @if ($item->status_id == 1)
                                        <span class="badge bg-success set-status" id="status_{{ $item->id }}"
                                            onclick="setActive({{ $item->id }})">Active</span>
                                    @else
                                        <span class="badge bg-danger set-status" id="status_{{ $item->id }}"
                                            onclick="setActive({{ $item->id }})">Inactive</span>
                                    @endif

                                </td>
                                <td><a data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#EditModal"
                                        class="btn btn-primary btn-circle btn-sm editBtn">
                                        <i class="fa fa-edit text-white"></i>
                                    </a></td>
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
                        <h5 class="modal-title">Add Fees Configuration</h5>
                    </div>
                    <form action="{{ route('monthly-fees-configurations.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="">Branch Name</label>
                                <select name="branch_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($branch as $value)
                                        <option value="{{ $value->id }}">{{ $value->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="class_id">Class Name</label>
                                <select name="class_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($class as $value)
                                        <option value="{{ $value->id }}">{{ $value->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="number" class="form-control" name="amount" required>
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
                    <h5 class="modal-title">Edit</h5>
                </div>
                <form id="update-form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Branch Name</label>
                            <select name="branch_id" id="branch_id" class="form-select">
                                <option value="">Select</option>
                                @foreach ($branch as $value)
                                    <option value="{{ $value->id }}">{{ $value->branch_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Class Name</label>
                            <select name="class_id" id="class_id" class="form-select">
                                <option value="">Select</option>
                                @foreach ($class as $value)
                                    <option value="{{ $value->id }}">{{ $value->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
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
                    url: "{{ route('monthly-fees-configurations.edit', ':id') }}".replace(':id',
                        id),
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#branch_id').val(data.branch_id);
                        $('#branch_id').prop('disabled', 'true');
                        $('#class_id').prop('disabled', 'true');
                        $('#class_id').val(data.class_id);
                        $('#amount').val(data.amount);
                        var id = data.id;
                        // Replace this with actual dynamic ID value
                        var formActionUrl =
                            "{{ route('monthly-fees-configurations.update', ':id') }}".replace(
                                ':id', id);
                        $('#update-form').attr('action', formActionUrl);
                    },
                });
            });
        })

        $(document).ready(function() {
            $('#update-form').submit(function() {
                // Re-enable the select field before submitting
                $('#branch_id').prop('disabled', false);
                $('#class_id').prop('disabled', false);
            });
        });
    </script>

@endsection
