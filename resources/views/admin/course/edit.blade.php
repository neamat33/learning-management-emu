@extends('admin.layouts.app')
@section('page-title', 'Student Registration')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Student Registration</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Student Registration</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('students.index') }}"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Student List</a></h6>
            </div>
            <div class="card-body">

                <form action="{{ route('students.update',$student->id) }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>Student Name </b><span class="text-danger">*</span></label>
                                <input name="student_name" id="student_name" value="{{ $student->student_name }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('student_name'))
                                    <span class="invalid-feedback">{{ $errors->first('student_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Mobile </b><span class="text-danger">*</span></label>
                                <input type="number" name="mobile" id="mobile" value="{{ $student->mobile }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Email </b></label>
                                <input type="email" name="email" id="email" value="{{ $student->email }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Date Of Birth </b><span class="text-danger">*</span></label>
                                <input type="date" name="dob" id="dob" value="{{ $student->dob }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback">{{ $errors->first('dob') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Image </b></label>
                                <input type="file" name="img" id="img"
                                    class="form-control mt-1" />
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback">{{ $errors->first('img') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Father Name </b></label>
                                <input name="father_name" id="mobile" value="{{ $student->father_name }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('father_name'))
                                    <span class="invalid-feedback">{{ $errors->first('father_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Mother Name </b></label>
                                <input name="mother_name" id="mother_name" value="{{ $student->mother_name }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('father_name'))
                                    <span class="invalid-feedback">{{ $errors->first('mother_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Father Mobile </b></label>
                                <input type="number" name="father_mobile" id="father_mobile" value="{{ $student->father_mobile }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('father_mobile'))
                                    <span class="invalid-feedback">{{ $errors->first('father_mobile') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Mother Mobile </b></label>
                                <input type="number" name="mother_mobile" id="mother_mobile" value="{{ $student->mother_mobile }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('father_name'))
                                    <span class="invalid-feedback">{{ $errors->first('mother_mobile') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Father Email </b></label>
                                <input type="email" name="father_email" id="father_email" value="{{ $student->father_email }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('father_email'))
                                    <span class="invalid-feedback">{{ $errors->first('father_email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Mother Email </b></label>
                                <input type="email" name="mother_email" id="mother_email" value="{{ $student->mother_email }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('mother_email'))
                                    <span class="invalid-feedback">{{ $errors->first('mother_email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Present Address </b></label>
                                <textarea name="present_address" class="form-control mt-1" rows="1">{{ $student->present_address }}</textarea>
                                @if ($errors->has('present_address'))
                                    <span class="invalid-feedback">{{ $errors->first('present_address') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Permanent Address </b></label>
                                <textarea name="permanent_address" class="form-control mt-1" rows="1">{{ $student->permanent_address }}</textarea>
                                @if ($errors->has('permanent_address'))
                                    <span class="invalid-feedback">{{ $errors->first('permanent_address') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Note </b></label>
                                <textarea name="note" class="form-control mt-1" rows="1">{{ $student->note }}</textarea>
                                @if ($errors->has('note'))
                                    <span class="invalid-feedback">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                            <div class=" mt-4 mb-3">
                                <h6 class="m-0 font-weight-bold text-primary">Assign Class</h6>
                            </div>
                            
                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Branch Name </b></label>
                                <select name="branch_id" id="branch_id" class="form-select mt-1">

                                    @foreach ($branches as $branch)
                                        <option @if($assign->branch_id == $branch->id) selected @endif value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            
                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Class Name </b></label>
                                <select name="class_id" id="class_id" class="form-select mt-1">
                                    <option value="">--Select--</option>
                                    @foreach ($classes as $class)
                                        <option @if($assign->class_id == $class->id) selected @endif value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Section Name </b></label> <br>
                                <select name="section_id" id="section_id" class="form-select mt-1">
                                    <option value="">--Select--</option>
                                    @foreach ($sections as $section)
                                        <option @if($assign->section_id == $section->id) selected @endif value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Batch Name </b></label> <br>
                                <select name="batch_id" id="batch_id" class="form-select mt-1">
                                    @foreach ($batches as $batch)
                                        <option @if($assign->batch_id == $batch->id) selected @endif value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 mt-2">
                                <label for=""><b>Shift Name </b></label> <br>
                                <select name="shift_id" id="shift_id" class="form-select mt-1">
                                    @foreach ($shifts as $shift)
                                        <option @if($assign->shift_id == $shift->id) selected @endif value="{{ $shift->id }}">{{ $shift->shift_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="text-align:right">
                                <div class="mt-3">
                                    <p id="select-alert" class="text-danger p-2"></p>
                                    <button type="submit" class="btn btn-primary ">Save Information</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <script>
        $(function() {

            $(document).on('change', '#class_id', function() {
                let class_id = $(this).val();
                let branch_id = $("#branch_id").val();
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/get_section') }}",
                    data: {
                        'class_id': class_id, 'branch_id':branch_id
                    },
                    success: function(data) {
                        //console.log(data)
                        $("#section_id").html(data);
                    },
                });
            });
        })
    </script>
@endsection
