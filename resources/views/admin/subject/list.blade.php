@extends('admin.layouts.app')
@section('page-title', 'Subject List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Subject</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Subject List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="" data-bs-toggle="modal"
                        data-bs-target="#AddModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        Subject</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Subject Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($subject as $key=>$item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->subject_name}}</td>
                            <td>
                                @if ($item->status_id == 1)
                                    <a href="{{route('subject.inactive',$item->id)}}" class="badge bg-success set-status"  title="change to InActive">Active</a>
                                @else
                                    <a href="{{route('subject.active',$item->id)}}" class="badge bg-danger" title="change to active">Inactive</a>
                                @endif
                            </td>
                            <td>
                                <a data-id="{{ $item->id}}" data-bs-toggle="modal" data-bs-target="#EditModal"
                                class="btn btn-primary btn-circle btn-sm editBtn">
                                <i class="fa fa-edit text-white"></i>
                                 </a>

                                <a href="{{route('subject.delete',$item->id)}}" class="btn btn-danger btn-circle btn-sm editBtn">
                                    <i class="fa fa-trash text-white"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="modal fade  mb-5" id="AddModal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Subject</h5>
                    </div>
                    <form action="{{ route('subject.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="subject_name" required>
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
    <div class="modal fade  mb-5" id="EditModal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Occupation</h5>
                    </div>
                    <form id="update-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="subject_name" name="subject_name" required>
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
            $(function(){

                 $(document).on('click', '.editBtn', function() {
                let id = $(this).data("id");
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/subject_edit') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#subject_name').val(data.subject_name);
                        $('#branch_id').val(data.branch_id);
                        var id = data.id;
                        // Replace this with actual dynamic ID value
                        var formActionUrl = "{{ url('admin/subject/update') }}/" + id;
                        $('#update-form').attr('action', formActionUrl);
                    },
                });
            });
            })

        </script>

@endsection
