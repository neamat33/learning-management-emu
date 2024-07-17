@extends('admin.layouts.app')
@section('page-title', 'Student List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Student</h4>
        <div class="card card-body mb-2">
            <form action="{{ route('students.index') }}">
                <div class="row">
                    <div class="form-group col-md-3">
                        <input type="text" name="student_name" class="form-control" placeholder="Student Name" value="{{ request('student_name') }}">
                    </div>
    
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="mobile" placeholder="Student Mobile" value="{{ request('mobile') }}">
                    </div>
    
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <select name="class_id" id="" class="form-control">
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ request("class_id")==$class->id?"SELECTED":"" }}>{{ $class->class_name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group col-md-3">
                      <select name="section_id" id="" class="form-control">
                          <option value="">Select Section</option>
                        @foreach ($sections as $section)
                          <option value="{{ $section->id }}" {{ request("section_id")==$section->id?"SELECTED":"" }}>{{ $section->section_name }}</option>
                        @endforeach
                      </select>
                    </div>
    
    
                </div>
                <div class="form-row mt-2">
                    <div class="form-group float-right">
                        <button class="btn btn-primary" type="submit">
                                <i class="fa fa-sliders"></i>
                                Filter
                        </button>
                        <a href="{{ route('students.index') }}" class="btn btn-info">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('students.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        Student</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Student Name</th>
                            <th>Mobile</th>
                            <th>Branch </th>
                            <th>Class </th>
                            <th>Section </th>
                            <th>Batch </th>
                            <th>Shift </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($students as $key=>$item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->student_name}}</td>
                            <td>{{ $item->mobile}}</td>
                            <td>{{ $item->branch_name}}</td>
                            <td>{{ $item->class_name}}</td>
                            <td>{{ $item->section_name}}</td>
                            <td>{{ $item->batch_name}}</td>
                            <td>{{ $item->shift_name}}</td>
                            <td>
                                        
                                @if ($item->status_id == 1)
                                    <span class="badge bg-success set-status" id="status_{{ $item->id }}"
                                        onclick="setActive({{ $item->id}})">Active</span>
                                @else
                                    <span class="badge bg-danger set-status" id="status_{{ $item->id }}"
                                        onclick="setActive({{ $item->id}})">Inactive</span>
                                @endif

                            </td>
                            <td><a href="{{ route('students.edit',$item->id) }}" 
                                class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit text-white"></i>
                            </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    {!! $students->links() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- Modal to edit record -->
       



@endsection
