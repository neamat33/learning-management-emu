@extends('admin.layouts.app')
@section('page-title', 'Course List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Course</h4>
        <div class="card card-body mb-2">
            <form action="">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Course Name" value="{{ request('name') }}">
                    </div>


                    <div class="form-row col-md-3">
                        <div class="form-group float-right">
                            <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-sliders"></i>
                                    Filter
                            </button>
                            <a href="{{ route('courses.index') }}" class="btn btn-info">Reset</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Course  List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('courses.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                    Course </a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Photo</th>
                            <th>Course Name</th>
                            <th>Start Date</th>
                            <th>Price </th>
                            <th>Category </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($courses as $key=>$item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><img src="{{ asset($item->image)}}" alt="" width="50" height="50" style="border-radius: 5px"></td>
                            <td>{{ $item->course_title}}</td>
                            <td>{{ $item->start_date}}</td>
                            <td>{{ $item->price}}</td>
                            <td>{{ $item->category->name}}</td>
                            <td>
                                @if ($item->status == 1)
                                    <a href="{{route('course.inactive',$item->id)}}" class="badge bg-success set-status"  title="change to InActive">Active</a>
                                @else
                                    <a href="{{route('course.active',$item->id)}}" class="badge bg-danger" title="change to active">Inactive</a>
                                @endif
                            </td>
                            <td>
{{--                                <a href="{{ route('courses.edit',$item->id) }}"--}}
{{--                                   class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit text-white"></i>--}}
{{--                                </a>--}}
                                @can('delete-course')
                                <a class="btn btn-sm btn-danger" href="" data-bs-toggle="modal" data-bs-target=".delete-modal" onclick="handle({{ $item->id }})"><i class="fas fa-trash"></i>
                                </a>
                                @endcan
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    {!! $courses->links() !!}
                </div>
            </div>
        </div>

    </div>



@include('admin.layouts.delete-modal')

@endsection
@section('extra_js')
<script>

    //Delete Code

    function handle(id) {

       var url = "{{ route('courses.destroy', 'party_id') }}".replace('party_id', id);

        $("#delete-form").attr('action', url);

       $("#confirm-modal").modal('show');

     }

</script>
@endsection
