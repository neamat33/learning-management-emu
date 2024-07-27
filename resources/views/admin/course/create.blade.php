@extends('admin.layouts.app')
@section('page-title', 'Add Course')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Course</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Course Add</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('courses.index') }}"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>&nbsp; Course List</a></h6>
            </div>
            <div class="card-body">

                <form action="{{ route('courses.store') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body ">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for=""><b>Course Title </b><span class="text-danger">*</span></label>
                                <input name="course_title" id="course_title" value="{{ old('course_title') }}"
                                    class="form-control mt-2" required />
                                @if ($errors->has('course_title'))
                                    <span class="invalid-feedback">{{ $errors->first('course_title') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="mb-2"><b>Course Catgeory </b><span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">Select Item</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Course Price </b></label>
                                <input name="price" id="price" value="{{ old('price') }}"
                                    class="form-control mt-2" />
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Discount Price </b><span class="text-danger">*</span></label>
                                <input name="discount_price" id="discount_price" value="{{ old('discount_price') }}"
                                    class="form-control mt-2" />
                                @if ($errors->has('discount_price'))
                                    <span class="invalid-feedback">{{ $errors->first('discount_price') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Start Date </b><span class="text-danger">*</span></label>
                                <input type="text" name="start_date" id="start_date" value="{{ date('Y-m-d') }}"
                                    class="form-control mt-2" />
                                @if ($errors->has('start_date'))
                                    <span class="invalid-feedback">{{ $errors->first('start_date') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Cover Photo </b></label>
                                <input type="file" name="image" id="image" class="form-control mt-2" />
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Class Routine (Image)</b></label>
                                <input type="file" name="class_routine" id="class_routine" class="form-control mt-2" />
                                @if ($errors->has('class_routine'))
                                    <span class="invalid-feedback">{{ $errors->first('class_routine') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-8 mt-2">
                                <label for=""><b>Short Video </b></label>
                                <input type="text" name="video" id="video" value="{{ old('video') }}"
                                    class="form-control mt-2" />
                                @if ($errors->has('video'))
                                    <span class="invalid-feedback">{{ $errors->first('video') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-12 mt-2">
                                <label for=""><b>Course Description </b></label>
                                <textarea name="course_description" class="form-control mt-2" rows="2" required>{{ old('course_description') }}</textarea>
                                @if ($errors->has('course_description'))
                                    <span class="invalid-feedback">{{ $errors->first('course_description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-1 mt-5" id="addrow">
                            <button type="button" class="btn btn-sm btn-primary mb-1" >Add</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-responsive-md mytable">
                                <thead>
                                    <tr>
                                        <th style="width: 30%"><strong>Subject</strong></th>
                                        <th style="width: 30%"><strong>Instructor</strong></th>
                                        <th style="width: 40%"><strong>Description</strong></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="subject[]" id="select2" class="select1 form-control"
                                                style="min-width: 100px" required>
                                                <option value="">Select Item</option>
                                                @foreach ($subjects as $val)
                                                    <option value="{{ $val->id }}">{{ $val->subject_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <select name="instructor[]" class="select1 form-control"
                                                style="min-width: 100px" required>
                                                <option value="">Select Item</option>
                                                @foreach ($instructors as $instructor)
                                                    <option value="{{ $instructor->id }}">{{ $instructor->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <div class="form-group chapter">
                                                @if($errors->has('size'))
                                                <div class="alert alert-danger">{{ $errors->first('chapter') }}</div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-8">
                                                        <input type="text" name="chapter[]" class="form-control mt-1">
                                                    </div>
                                                    <div class="col-1">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                
                                            <a href="" class="btn btn-sm btn-success mt-1 add_input" style=""><i class="fa fa-plus"> Add</i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div style="text-align:right">
                            <div class="mt-3">
                                <p id="select-alert" class="text-danger p-2"></p>
                                <button type="submit" class="btn btn-info ">Save</button>
                            </div>
                        </div>


                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection
@section('extra_js')
    <script>
        
        var jq = $.noConflict();
        jq(document).ready(function() {
            $("#select2").select2();
            $("#category_id").select2();
            $(".select1").select2();
            jq('#start_date').datepicker({
                dateFormat: 'yy-mm-dd', // Set the date format as DD/MM/YYYY
                changeMonth: true, // Allow changing the month
                changeYear: true, // Allow changing the year
                yearRange: '1900:+0', // Set the range of years
                // You can add more options as needed
            });
        });

        //add description
        $(".add_input").click(function(event){
            // alert("hello");
            event.preventDefault();
            $(".sizes").append(`<div class="row">
                  <div class="col-8">
                      <input type="text" name="chapter[]" class="form-control mt-1">
                  </div>
                  <div class="col-1">
                      <a href="" class="btn btn-danger remove_parent" style="">X</a>
                  </div>
                </div>`);
        });

        $(document).on('click', '.remove_parent',function(){
            event.preventDefault();
            $(this).parent().parent().remove();
        });
    </script>
    @include('admin.course.scripts')
@endsection
