@extends('admin.layouts.app')
@section('page-title', 'Notice Edit')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Notice Update</span></h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Notice Update</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('notice.board.index') }}"
                                                                 class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Notice List</a></h6>
            </div>
            <div class="card-body">
                <form action="{{ route('notice.board.update',$notice->id) }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><b> Subject </b><span class="text-danger">*</span></label>
                                <input name="subject" id="subject" value="{{ old('subject',$notice->subject) }}" class="form-control mt-1" required>
                                @if ($errors->has('subject'))
                                    <span class="invalid-feedback">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><b>Status </b></label> <br>
                                <select name="status"  class="form-select mt-1" required>
                                    <option value="1" {{$notice->status == 1 ? 'selected' : 0 }}>Active</option>
                                    <option value="0" {{$notice->status == 0 ? 'selected' : 0 }}>InActive</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mt-1">
                                <label for=""><b>Message Details</b></label>
                                <textarea name="message" class="form-control mt-1" rows="5" required>{{ $notice->message }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                            <div style="text-align:right">
                                <div class="mt-3">
                                    <p id="select-alert" class="text-danger p-2"></p>
                                    <button type="submit" class="btn btn-primary ">Update</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
