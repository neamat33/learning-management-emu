@extends('admin.layouts.app')
@section('page-title', 'Income Transaction')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Transaction </h4>

        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Income Transaction</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('transactions.index') }}"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Transaction List</a></h6>
            </div>
            <div class="card-body">
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><b>Category Name</b></label>

                                <select name="tnx_cat_id" id="tnx_cat_id" class="form-select select2 mt-1"
                                    data-allow-clear="true">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach ($income_category as $income_cat)
                                        <option value="{{ $income_cat->id }}">{{ $income_cat->tnx_name }}</option>
                                    @endforeach

                                </select>
                                <input type="hidden" name="tnx_type_id" value="1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><b>Sub Category Name</b></label>
                                <select name="tnx_subcat_id" id="tnx_subcat_id" class="form-select mt-1">
                                    <option value="" disabled selected>--Select SubCategory--</option>

                                </select>
                            </div>
                            
                            <div class="form-group col-md-6 mt-2">
                                <label for=""><b>Accounts</b></label>
                                <select name="tnx_ac_id" id="tnx_ac_id" class="form-select mt-1">
                                    <option value="" disabled selected>--Select--</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}"
                                            data-curr_blance='{{ $account->curr_blance }}'>
                                            {{ $account->account_name . ' - ' . $account->account_no }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-6 mt-2">
                                <label for=""><b>Payment Method</b></label>
                                <select name="payment_method" id="payment_method" class="form-select mt-1">
                                    <option value="" disabled selected>--Select--</option>
                                    <option value="1">Cash</option>
                                    <option value="2">Cheque</option>
                                    <option value="3">Mobile Banking</option>

                                </select>
                            </div>

                            <div class="form-group col-md-6 mt-2">
                                <label for=""><b>Transaction Date </b><span class="text-danger">*</span></label>
                                <input type="text" name="tnx_date" id="tnx_date" value="{{ date('Y-m-d') }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('tnx_date'))
                                    <span class="invalid-feedback">{{ $errors->first('tnx_date') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 mt-2 mt-1">
                                <label for=""><b>Payment Method Details </b></label>
                                <textarea name="payment_method_des" class="form-control mt-1" rows="1">{{ old('payment_method_des') }}</textarea>
                                @if ($errors->has('payment_method_des'))
                                    <span class="invalid-feedback">{{ $errors->first('payment_method_des') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 mt-2">
                                <label for=""><b>Amount </b></label>
                                <input type="number" name="amount" id="amount" value="{{ old('amount') }}"
                                    class="form-control mt-1" />
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 mt-2">
                                <label for=""><b>Note </b></label>
                                <textarea name="note" class="form-control mt-1" rows="1">{{ old('note') }}</textarea>
                                @if ($errors->has('note'))
                                    <span class="invalid-feedback">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                            <div>

                            </div>
                            <div class="mt-3">
                                <p class="text-info"><b>Current Balance: <span id="current_balance">0.00</span></b></p>
                                <div style="text-align:right;">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
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
        jq('#tnx_date').datepicker({
            dateFormat: 'yy-mm-dd', // Set the date format as DD/MM/YYYY
            changeMonth: true, // Allow changing the month
            changeYear: true, // Allow changing the year
            yearRange: '1900:+0', // Set the range of years
            // You can add more options as needed
        });
    });
</script>

<script>
    $(function() {
        $(document).on('change', '#tnx_cat_id', function() {
            let cat_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/get_tnx_subcat') }}",
                data: {
                    'cat_id': cat_id,
                },
                success: function(data) {
                    //console.log(data)
                    $("#tnx_subcat_id").html(data);
                },
            });
        });


        $(document).on('change', '#tnx_ac_id', function() {
            let curr_blance = parseFloat($(this).find(':selected').data('curr_blance') || 0);
            $('#current_balance').text(curr_blance.toFixed(2));

        });
       
    })
</script>
@endsection
