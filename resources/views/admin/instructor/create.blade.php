@extends('admin.layouts.app')
@section('page-title', 'Instructor')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Instructor</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Instructor Add</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('instructors.index') }}"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Instructor List</a></h6>
            </div>
            <div class="card-body">

                <form action="{{ route('instructors.store') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Branch Name </b></label> <br>
                                <select name="branch_id" id="branch_id" class="form-select mt-1">
                                    @foreach ($branchs as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Instructor Name </b><span class="text-danger">*</span></label>
                                <input name="name" id="name" value="{{ old('name') }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>Mobile </b><span class="text-danger">*</span></label>
                                <input type="number" name="mobile" id="mobile" value="{{ old('mobile') }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Email </b></label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Instructor Photo </b></label>
                                <input type="file" name="photo" id="img"
                                    class="form-control mt-1" />
                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Subject Name </b></label> <br>
                                <select name="subject_id" id="subject_id" class="form-select mt-1">
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 mt-1">
                                <label for=""><b>Present Address </b></label>
                                <textarea name="address" class="form-control mt-1" rows="1">{{ old('address') }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 mt-1">
                                <label for=""><b>Education Qualification </b></label>
                                <textarea name="qualification" class="form-control mt-1" rows="1">{{ old('qualification') }}</textarea>
                                @if ($errors->has('qualification'))
                                    <span class="invalid-feedback">{{ $errors->first('qualification') }}</span>
                                @endif
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
