@extends('admin.layouts.app')
@section('page-title', 'User Create')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">User /</span> Create</h4>
        <div class="content-body" style="min-height: 500px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">User Create</h6>
                                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('user.index') }}"
                                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> User List</a></h6>
                            </div>
                            
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('user.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name<span class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control input-rounded" name="name"
                                                    value="{{ old('name') }}" placeholder="Name">
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email<span class="text-danger">*</span> :</label>
                                                <input type="email" class="form-control input-rounded" name="email"
                                                    value="{{ old('email') }}" placeholder="Email">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Branch :</label>
                                                <select name="branch_id" id="" class="form-control">
                                                    <option value="">Select Branch</option>
                                                    @foreach ($branch as $item)
                                                        <option value="{{ $item->id }}">{{ $item->branch_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('branch_id'))
                                                    <span class="invalid-feedback">{{ $errors->first('branch_id') }}</span>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Role<span class="text-danger">*</span> :</label>
                                                <select name="role" id="" class="form-control">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('role'))
                                                    <span class="invalid-feedback">{{ $errors->first('role') }}</span>
                                                @endif
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password<span class="text-danger">*</span>
                                                    :</label>
                                                <input type="password" class="form-control input-rounded" name="password"
                                                    placeholder="******" autocomplete="off">
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password Confirmation<span
                                                        class="text-danger">*</span> :</label>
                                                <input type="password" class="form-control input-rounded"
                                                    name="password_confirmation" placeholder="******" autocomplete="off">
                                                @if ($errors->has('password_confirmation'))
                                                    <span
                                                        class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                                                @endif
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <h4 class="final_text" style="text-align:center;"></h4>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra_js')
    <script>
        $('select[name="related_to_unit_id"]').change(function() {
            update_final_text();
        });

        $('select[name="related_sign"]').change(function() {
            update_final_text();
        });

        $('input[name="related_by"]').change(function() {
            update_final_text();
        });

        function update_final_text() {
            // alert("HELLO");
            var string = "1 ";
            string += $('input[name="name"]').val();
            string += " = 1";
            string += $('select[name="related_to_unit_id"]').find(":selected").text();
            string += " ";
            string += $('select[name="related_sign"]').find(":selected").val();
            string += " ";
            string += $('input[name="related_by"]').val();
            $('.final_text').html(string);
        }
    </script>
@endsection
