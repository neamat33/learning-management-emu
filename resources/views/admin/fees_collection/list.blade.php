@extends('admin.layouts.app')
@section('page-title', 'Monthly Fees Configuration List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Configuration</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Fees Collection List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('fees-collections.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        Fees Collection</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Branch Name</th>
                            <th>Student Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($frees as $key => $item)
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
        
    </div>
    <!-- Modal to edit record -->

    <script>
        $(function() {
       
        })

    </script>

@endsection
