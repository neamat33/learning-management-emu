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
                                <label for="" class="mb-2"><b>Course Catgeory </b><span
                                        class="text-danger">*</span></label>
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
                                <textarea name="course_description" class="form-control mt-2" rows="14" required>{{ old('course_description') }}</textarea>
                                @if ($errors->has('course_description'))
                                    <span class="invalid-feedback">{{ $errors->first('course_description') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 mt-2 text-center">
                                <label for=""><b>Cover Photo</b></label>
                                <div>
                                    <img id="image1" src="https://st4.depositphotos.com/14953852/24787/v/380/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" style="height: 100px; width: 100px">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mt-2 text-center">
                                <label for=""><b>Class Routine (Image)</b></label>
                                <div>
                                    <img id="class_routine1" src="https://st4.depositphotos.com/14953852/24787/v/380/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" style="height: 100px; width: 100px">
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="col-md-1 mb-1" id="addrow">
                                <button type="button" class="btn btn-sm btn-primary mb-1">Add</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive-md mytable">
                                    <thead>
                                    <tr>
                                        <th style="width: 30%"><strong>Subject</strong></th>
                                        <th style="width: 30%"><strong>Instructor</strong></th>
                                        <th style="width: 40%"><strong>Lesson</strong></th>
                                    </tr>
                                    </thead>
                                    <tbody id="subjectRows">
                                    <tr class="subject-row">
                                        <td>
                                            <select name="course_details[subject][]" class="select1 form-control"
                                                    style="min-width: 100px" required>
                                                <option value="">Select Subject</option>
                                                @foreach ($subjects as $val)
                                                    <option value="{{ $val->id }}">{{ $val->subject_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="course_details[instructor][]" class="select1 form-control"
                                                    style="min-width: 100px" required>
                                                <option value="">Select Teacher</option>
                                                @foreach ($instructors as $instructor)
                                                    <option value="{{ $instructor->id }}">{{ $instructor->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <div class="form-group chapter ">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <input type="text" name="course_details[chapter][0][]"
                                                               class="form-control mt-1">
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="button"
                                                                class="btn btn-sm btn-success mt-2 add-chapter">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chapter-container"></div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
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
        $(document).ready(() => {
            image.onchange = evt => {
                const [file] = image.files
                if (file) {
                    image1.src = URL.createObjectURL(file)
                }
            }
        });
        $(document).ready(() => {
            class_routine.onchange = evt => {
                const [file] = class_routine.files
                if (file) {
                    class_routine1.src = URL.createObjectURL(file)
                }
            }
        });
    </script>
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
    </script>

    <script>
        $(document).ready(function() {
            let subjectIndex = 1;

            $('#addrow').click(function() {
                let newRow = `
                <tr class="subject-row">
                    <td>
                        <select name="course_details[subject][]" class="select1 form-control" style="min-width: 100px" required>
                            <option value="">Select subject</option>
                            @foreach ($subjects as $val)
                <option value="{{ $val->id }}">{{ $val->subject_name }}</option>
                            @endforeach
                </select>
            </td>
            <td>
                <select name="course_details[instructor][]" class="select1 form-control" style="min-width: 100px" required>
                    <option value="">Select Teacher</option>
@foreach ($instructors as $instructor)
                <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                            @endforeach
                </select>
            </td>
    <td>
    <div class="form-group chapter">
        <div class="row align-items-center">
            <div class="col-9">
                <input type="text" name="course_details[chapter][${subjectIndex}][]" class="form-control mt-1">
                    </div>
                    <div class="col-3 d-flex">
                        <button type="button" class="btn btn-sm btn-success mt-1 ml-1 add-chapter">
                            <span class="fa fa-plus"></span>
                        </button>
                        <a href="#" style="margin-left:5px" class="btn btn-sm btn-danger mt-1 ml-1 remove_parent">X</a>
                    </div>
                </div>
            </div>
            <div class="chapter-container"></div>
        </td>

                </tr>`;
                $('#subjectRows').append(newRow);
                subjectIndex++;
            });

            $(document).on('click', '.add-chapter', function() {
                let subjectRowIndex = $(this).closest('.subject-row').index();
                let chapterInput = `
                <div class="row mt-2">
                    <div class="col-9">
                        <input type="text" name="course_details[chapter][${subjectRowIndex}][]" class="form-control">
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-sm btn-danger remove-chapter">
                            <span> X </span>
                        </button>
                    </div>
                </div>`;
                $(this).closest('.subject-row').find('.chapter-container').append(chapterInput);
            });

            $(document).on('click', '.remove-chapter', function() {
                $(this).closest('.row').remove();
            });

            $(document).on('click', '.remove_parent', function() {
                event.preventDefault();
                $(this).closest('.subject-row').remove();
            });
        });
    </script>
    {{-- @include('admin.course.scripts') --}}
@endsection
