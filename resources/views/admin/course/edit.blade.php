@extends('admin.layouts.app')
@section('page-title', 'Update Course')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Course</h4>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Course Update</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('courses.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>&nbsp; Course List</a></h6>
            </div>
            <div class="card-body">
                <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <!-- Course Title -->
                            <div class="form-group col-md-4">
                                <label for=""><b>Course Title </b><span class="text-danger">*</span></label>
                                <input name="course_title" id="course_title" value="{{ old('course_title', $course->course_title) }}"
                                       class="form-control mt-2" required />
                                @if ($errors->has('course_title'))
                                    <span class="invalid-feedback">{{ $errors->first('course_title') }}</span>
                                @endif
                            </div>

                            <!-- Course Category -->
                            <div class="form-group col-md-4">
                                <label for="" class="mb-2"><b>Course Category </b><span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">Select Item</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Course Price -->
                            <div class="form-group col-md-4">
                                <label for=""><b>Course Price </b></label>
                                <input name="price" id="price" value="{{ old('price', $course->price) }}" class="form-control mt-2" />
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback">{{ $errors->first('price') }}</span>
                                @endif
                            </div>

                            <!-- Discount Price -->
                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Discount Price </b><span class="text-danger">*</span></label>
                                <input name="discount_price" id="discount_price" value="{{ old('discount_price', $course->discount_price) }}" class="form-control mt-2" />
                                @if ($errors->has('discount_price'))
                                    <span class="invalid-feedback">{{ $errors->first('discount_price') }}</span>
                                @endif
                            </div>

                            <!-- Start Date -->
                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Start Date </b><span class="text-danger">*</span></label>
                                <input type="text" name="start_date" id="start_date" value="{{ old('start_date', date('Y-m-d', strtotime($course->start_date))) }}" class="form-control mt-2" />
                                @if ($errors->has('start_date'))
                                    <span class="invalid-feedback">{{ $errors->first('start_date') }}</span>
                                @endif
                            </div>

                            <!-- Cover Photo -->
                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Cover Photo </b></label>
                                <input type="file" name="image" id="image" class="form-control mt-2" />
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                                @endif
                            </div>

                            <!-- Class Routine -->
                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Class Routine (Image)</b></label>
                                <input type="file" name="class_routine" id="class_routine" class="form-control mt-2" />
                                @if ($errors->has('class_routine'))
                                    <span class="invalid-feedback">{{ $errors->first('class_routine') }}</span>
                                @endif
                            </div>

                            <!-- Short Video -->
                            <div class="form-group col-md-8 mt-2">
                                <label for=""><b>Short Video </b></label>
                                <input type="text" name="video" id="video" value="{{ old('video', $course->video) }}" class="form-control mt-2" />
                                @if ($errors->has('video'))
                                    <span class="invalid-feedback">{{ $errors->first('video') }}</span>
                                @endif
                            </div>

                            <!-- Course Description -->
                            <div class="form-group col-md-12 mt-2">
                                <label for=""><b>Course Description </b></label>
                                <textarea name="course_description" class="form-control mt-2" rows="14" required>{{ old('course_description', $course->course_description) }}</textarea>
                                @if ($errors->has('course_description'))
                                    <span class="invalid-feedback">{{ $errors->first('course_description') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 mt-2 text-center">
                                <label for=""><b>Cover Photo</b></label>
                                <div>
                                    @if($course->image)
                                        <img id="image1" src="{{asset($course->image)}}" style="height: 100px; width: 100px">
                                    @else
                                        <img id="class_routine1" src="https://st4.depositphotos.com/14953852/24787/v/380/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" style="height: 100px; width: 100px">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6 mt-2 text-center">
                                <label for=""><b>Class Routine (Image)</b></label>
                                <div>
                                    @if($course->class_routine)
                                        <img id="class_routine1" src="{{asset($course->class_routine)}}" style="height: 100px; width: 100px">
                                    @else
                                        <img id="class_routine1" src="https://st4.depositphotos.com/14953852/24787/v/380/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" style="height: 100px; width: 100px">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Course Details (Subjects, Instructors, Chapters) -->
                        @php
                            $courseDetails = json_decode($course->course_details, true);
                        @endphp
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
                                    @foreach ($courseDetails['subject'] as $index => $subjectId)
                                        <tr class="subject-row">
                                            <td>
                                                <select name="course_details[subject][]" class="select1 form-control" style="min-width: 100px" required>
                                                    <option value="">Select Subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}" {{ $subject->id == $subjectId ? 'selected' : '' }}>
                                                            {{ $subject->subject_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="course_details[instructor][]" class="select1 form-control" style="min-width: 100px" required>
                                                    <option value="">Select Instructor</option>
                                                    @foreach ($instructors as $instructor)
                                                        <option value="{{ $instructor->id }}" {{ $instructor->id == $courseDetails['instructor'][$index] ? 'selected' : '' }}>
                                                            {{ $instructor->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group chapter">
                                                    <div class="col-3">
                                                        <button type="button" class="btn btn-sm btn-success mt-2 add-chapter">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="row">
                                                        @foreach ($courseDetails['chapter'][$index] as $lesson)
                                                            <div class="col-9">
                                                                <input type="text" name="course_details[chapter][{{ $index }}][]" value="{{ $lesson }}" class="form-control mt-1">
                                                            </div>
                                                            {{--                                                            <div class="col-3">--}}
                                                            {{--                                                                <button type="button" class="btn btn-sm btn-danger remove-chapter">--}}
                                                            {{--                                                                    <span> X </span>--}}
                                                            {{--                                                                </button>--}}
                                                            {{--                                                            </div>--}}
                                                        @endforeach

                                                    </div>
                                                </div>
                                                <div class="chapter-container"></div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div style="text-align:right">
                            <div class="mt-3">
                                <p id="select-alert" class="text-danger p-2"></p>
                                <button type="submit" class="btn btn-info">Update</button>
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
            let subjectIndex = {{ count($courseDetails['subject']) }};

            // Add new row for subjects and related fields
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
                            <button type="button" class="btn btn-sm btn-danger mt-1 ml-1 remove_parent">X</button>
                        </div>
                    </div>
                </div>
                <div class="chapter-container"></div>
            </td>
        </tr>`;
                $('#subjectRows').append(newRow);
                subjectIndex++;
            });

            // Add new chapter within a subject row
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

            // Remove a specific chapter/lesson
            $(document).on('click', '.remove-chapter', function() {
                $(this).closest('.row').remove();
            });

            // Remove an entire subject row
            $(document).on('click', '.remove_parent', function(event) {
                event.preventDefault();
                $(this).closest('.subject-row').remove();
            });
        });


    </script>


    {{--    <script>--}}
    {{--        $(document).ready(function() {--}}
    {{--            let subjectIndex = {{ count($courseDetails['subject']) }};--}}

    {{--            $('#addrow').click(function() {--}}
    {{--                let newRow = `--}}
    {{--                <tr class="subject-row">--}}
    {{--                    <td>--}}
    {{--                        <select name="course_details[subject][]" class="select1 form-control" style="min-width: 100px" required>--}}
    {{--                            <option value="">Select subject</option>--}}
    {{--                            @foreach ($subjects as $val)--}}
    {{--                <option value="{{ $val->id }}">{{ $val->subject_name }}</option>--}}
    {{--                            @endforeach--}}
    {{--                </select>--}}
    {{--            </td>--}}
    {{--            <td>--}}
    {{--                <select name="course_details[instructor][]" class="select1 form-control" style="min-width: 100px" required>--}}
    {{--                    <option value="">Select Teacher</option>--}}
    {{--@foreach ($instructors as $instructor)--}}
    {{--                <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>--}}
    {{--                            @endforeach--}}
    {{--                </select>--}}
    {{--            </td>--}}
    {{--            <td>--}}
    {{--                <div class="form-group chapter">--}}
    {{--                    <div class="row align-items-center">--}}
    {{--                        <div class="col-9">--}}
    {{--                            <input type="text" name="course_details[chapter][${subjectIndex}][]" class="form-control mt-1">--}}
    {{--                                </div>--}}
    {{--                                <div class="col-3 d-flex">--}}
    {{--                                    <button type="button" class="btn btn-sm btn-success mt-1 ml-1 add-chapter">--}}
    {{--                                        <span class="fa fa-plus"></span>--}}
    {{--                                    </button>--}}
    {{--                                    <a href="#" style="margin-left:5px" class="btn btn-sm btn-danger mt-1 ml-1 remove_parent">X</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="chapter-container"></div>--}}
    {{--                    </td>--}}
    {{--                </tr>`;--}}
    {{--                $('#subjectRows').append(newRow);--}}
    {{--                subjectIndex++;--}}
    {{--            });--}}

    {{--            $(document).on('click', '.add-chapter', function() {--}}
    {{--                let subjectRowIndex = $(this).closest('.subject-row').index();--}}
    {{--                let chapterInput = `--}}
    {{--                <div class="row mt-2">--}}
    {{--                    <div class="col-9">--}}
    {{--                        <input type="text" name="course_details[chapter][${subjectRowIndex}][]" class="form-control">--}}
    {{--                    </div>--}}
    {{--                    <div class="col-3">--}}
    {{--                        <button type="button" class="btn btn-sm btn-danger remove-chapter">--}}
    {{--                            <span> X </span>--}}
    {{--                        </button>--}}
    {{--                    </div>--}}
    {{--                </div>`;--}}
    {{--                $(this).closest('.subject-row').find('.chapter-container').append(chapterInput);--}}
    {{--            });--}}

    {{--            $(document).on('click', '.remove-chapter', function() {--}}
    {{--                $(this).closest('.row').remove();--}}
    {{--            });--}}

    {{--            $(document).on('click', '.remove_parent', function(event) {--}}
    {{--                event.preventDefault();--}}
    {{--                $(this).closest('.subject-row').remove();--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
