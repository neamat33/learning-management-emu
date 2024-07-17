@extends('admin.layouts.app')
@section('page-title', 'Student List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Instructor</h4>
        <div class="card card-body mb-2">
            <form action="">
                <div class="row">
                    <div class="form-group col-md-3">
                        <input type="text" name="name" class="form-control" placeholder="Instructor Name" value="{{ request('name') }}">
                    </div>
    
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile No." value="{{ request('mobile') }}">
                    </div>
                    <div class="form-row col-md-3">
                        <div class="form-group float-right">
                            <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-sliders"></i>
                                    Filter
                            </button>
                            <a href="{{ route('instructors.index') }}" class="btn btn-info">Reset</a>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Instructor List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('instructors.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                    Instructor</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Photo</th>
                            <th>Instructor Name</th>
                            <th>Mobile</th>
                            <th>Email </th>
                            <th>Subject </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($instructors as $key=>$item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><img src="{{ asset($item->photo)}}" alt="" width="80" height="80"></td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->mobile}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->subject->subject_name}}</td>
                            <td>
                                        
                                @if ($item->status_id == 1)
                                    <span class="badge bg-success set-status" id="status_{{ $item->id }}"
                                        onclick="setActive({{ $item->id}})">Active</span>
                                @else
                                    <span class="badge bg-danger set-status" id="status_{{ $item->id }}"
                                        onclick="setActive({{ $item->id}})">Inactive</span>
                                @endif

                            </td>
                            <td><a href="{{ route('instructors.edit',$item->id) }}" 
                                class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit text-white"></i>
                            </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    {!! $instructors->links() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- Modal to edit record -->
       



@endsection
