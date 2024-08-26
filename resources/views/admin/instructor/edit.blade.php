@extends('admin.layouts.app')
@section('page-title', 'Update InstrUctor ')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light"></span> Instructor</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Instructor</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('instructors.index') }}"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Instructor List</a></h6>
            </div>
            <div class="card-body">

                <form action="{{ route('instructors.update',$instructor->id) }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Branch Name </b></label> <br>
                                <select name="branch_id" id="branch_id" class="form-select mt-1">
                                    @foreach ($branchs as $branch)
                                        <option value="{{ $branch->id }}" {{ $instructor->branch_id == $branch->id? 'selected' : 0 }}>{{ $branch->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Instructor Name </b><span class="text-danger">*</span></label>
                                <input name="name" id="name" value="{{ old('name',$instructor->name)}}"
                                       class="form-control mt-1" />
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>Mobile </b><span class="text-danger">*</span></label>
                                <input type="number" name="mobile" id="mobile" value="{{ old('mobile',$instructor->mobile) }}"
                                       class="form-control mt-1" />
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Email </b></label>
                                <input type="email" name="email" id="email" value="{{ old('email',$instructor->email) }}"
                                       class="form-control mt-1" />
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Instructor Photo </b></label>
                                <input type="file"  name="photo" id="imgInp" class="form-control mt-1" />
                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Subject Name </b></label> <br>
                                <select name="subject_id" id="subject_id" class="form-select mt-1">
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ $instructor->subject_id == $subject->id? 'selected' : 0 }}>{{ $subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 mt-1">
                                <label for=""><b>Present Address </b></label>
                                <textarea name="address" class="form-control mt-1" rows="1">{{ old('address',$instructor->address ) }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 mt-1">
                                <label for=""><b>Education Qualification </b></label>
                                <textarea name="qualification" class="form-control mt-1" rows="1">{{ old('qualification',$instructor->qualification ) }}</textarea>
                                @if ($errors->has('qualification'))
                                    <span class="invalid-feedback">{{ $errors->first('qualification') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for=""><b> Instructor Image</b></label><br>
                                @if($instructor->photo)
                                    <img  id="blah" src="{{ asset($instructor->photo)}}" style="height: 100px;width: 100px;border-radius: 10px" />
                                @else
                                    <img  id="blah" src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" style="height: 100px;width: 100px;border-radius: 10px" />
                                @endif
                            </div>
                            <div style="text-align:right">
                                <div class="mt-3">
                                    <p id="select-alert" class="text-danger p-2"></p>
                                    <button type="submit" class="btn btn-primary ">Update Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }
        });
    </script>
@endsection
