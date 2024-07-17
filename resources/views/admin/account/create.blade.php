@extends('admin.layouts.app')
@section('page-title', 'Accounts ')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Account /</span> Create</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Account Create</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('accounts.index') }}"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Account List</a></h6>
            </div>
            <div class="card-body">

                <form action="{{ route('accounts.store') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b> Branch Name </b><span class="text-danger">*</span></label>
                                <select name="branch_id" class="form-select mt-1" required>
                                    <option value="">Select</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{ $branch->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div> 
                           
                            <div class="form-group col-md-4">
                                <label for=""><b>Account Type </b></label>
                                <select name="acc_type_id" id="acc_type_id" class="form-select mt-1">
                                    <option value="">--Select--</option>
                                    <option value="1">Bank Account</option>
                                    <option value="2">Mobile Bank Account</option>
                                    <option value="3">Cash Account</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for=""><b> Bank Name </b></label>
                                <select name="bank_id" id="bank_id" class="form-select mt-1">
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Account Name </b><span class="text-danger">*</span></label>
                                <input name="account_name" id="account_name" {{ old('account_name') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('account_name'))
                                    <span class="invalid-feedback">{{ $errors->first('account_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Account No. </b></label>
                                <input type="text" name="account_no" id="account_no" {{ old('account_no') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('account_no'))
                                    <span class="invalid-feedback">{{ $errors->first('account_no') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Bank Branch Name </b></label>
                                <input type="text" name="branch_name" id="branch_name" {{ old('branch_name') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('branch_name'))
                                    <span class="invalid-feedback">{{ $errors->first('branch_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b> Address </b></label>
                                <textarea name="address" class="form-control mt-1" rows="1">{{ old('address') }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Transaction Charge</b></label>
                                <input type="text" name="tnx_charge" id="tnx_charge" {{ old('tnx_charge') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('tnx_charge'))
                                    <span class="invalid-feedback">{{ $errors->first('tnx_charge') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Initial Balance</b></label>
                                <input type="number" name="initial_blance" id="initial_blance" {{ old('initial_blance') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('initial_blance'))
                                    <span class="invalid-feedback">{{ $errors->first('initial_blance') }}</span>
                                @endif
                            </div>

                            
                           
                            <div style="text-align:right">
                                <div class="mt-3">
                                    <p id="select-alert" class="text-danger p-2"></p>
                                    <button type="submit" class="btn btn-primary ">Save</button>
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

            $(document).on('change', '#acc_type_id', function() {
                let acc_type_id = $(this).val();
   
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/get_bank') }}",
                    data: {
                        'acc_type_id': acc_type_id
                    },
                    success: function(data) {
                        console.log(data)
                        $("#bank_id").html(data);
                    },
                });
            });
        })
    </script>
@endsection
