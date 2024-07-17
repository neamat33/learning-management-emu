@extends('admin.layouts.app')
@section('page-title', 'Fees Collections')
@section('content')
    <div class="container flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Fees Collections </h4>
        <div class="row">
            <div class="col-10 offset-1">
                
                <div class="card">
                    {{-- <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Fees Collections</h6>
                        <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('fees-collections.index') }}"
                                class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Collections List</a></h6>
                    </div> --}}
                    <div class="card-body">
                        <form action="{{ route('fees-collections.store') }}" method="POST">
                            @csrf
                            <div class="modal-body ">
        
                                <div class="row">
                                    <div class="form-group col-md-5 mt-5">
                                        <label for=""><b>Students</b></label>
                                        <select name="student_id" id="student_id" class="select2 form-select"
                                            data-allow-clear="true">
                                            <option value="" disabled selected>--Select--</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}">
                                                    {{ $student->id . '. ' . $student->student_name . ' (' . $student->mobile.')' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                        
                                        <table id="student-info" class="table table-striped table-bordered">
                                            <tr>
                                                <td width="40%"><strong>Name</strong></td>
                                                <td id="student-name"></td>
                                            </tr>
                                            <tr>
                                                <td width="40%"><strong>Father Name</strong></td>
                                                <td id="father-name"></td>
                                            </tr>
                                            <tr>
                                                <td width="40%"><strong>Mother Name</strong></td>
                                                <td id="mother-name"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Class Info</strong></td>
                                                <td id="class-info"></td>
                                            </tr>
                                        </table>                                        
                                        
                                    </div>
                                    
                                    <div class="col-md-12 mt-5 mb-4">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width=5% class="text-center"><strong> SN. </strong></th>
                                                <th width=65% class="text-center"><strong>Particulars</strong></th>
                                                <th width=40% class="text-center"><strong>Amount (BDT)</strong></th>
                                            </tr>
                                            @foreach($categories as $k=>$category)
                                            <tr class="tnx_category">
                                                <td class="text-center pt-0 pb-0 p-2">{{ ++$k}}</td>
                                                <td class="pt-0 pb-0 pl-2">{{ $category->name }} <input type="hidden" name="tnx_fees_cat[]" value="{{ $category->id }}"/></td>
                                                <td class="pt-1 pb-1 pl-2"><input class="form-control tnx_amount text-end" type="number" name="tnx_amount[]" value="" placeholder="0.0"/></td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2" class="text-end pt-1 pb-1 pl-2"><strong>Sub Total</strong> </td>
                                                <td class="pt-1 pb-1 pl-2"><input type="number" style="color: #041F82;font-size: 20px;font-weight: 600;" name="subtotal" id="subtotal" class="form-control  text-end" value="" placeholder="0.0" readonly/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-end pt-1 pb-1 pl-2"><strong>Discount</strong> </td>
                                                <td class="pt-1 pb-1 pl-2"><input type="number" name="discount" id="discount" class="form-control text-end" value="" placeholder="0.0"/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-end pt-1 pb-1 pl-2"><strong>Total</strong> </td>
                                                <td class="pt-1 pb-1 pl-2"><input type="number" style="color: #041F82;font-size: 20px; font-weight: 600;"  name="total" id="total" class="form-control text-end" value="" placeholder="0.0" readonly/></td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                    <div class="form-group col-md-12 mt-2 mb-3">
                                        <div class="row">
                                            <div class="col-md-1 mt-2">
                                                <label for=""><b>Note </b></label>
                                            </div>
                                            <div class="col-md-11">
                                                <textarea name="note" class="form-control mt-1 " rows="1">{{ old('note') }}</textarea>
                                                @if ($errors->has('note'))
                                                    <span class="invalid-feedback">{{ $errors->first('note') }}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <h5 class="mb-2 mt-3">Payment Information</h5>
                                    <div class="form-group col-md-6 mt-2">
                                        <label for=""><b>Transaction Date </b><span class="text-danger">*</span></label>
                                        <input type="text" name="date" id="tnx_date" value="{{ date('Y-m-d') }}"
                                            class="form-control mt-1" />
                                        @if ($errors->has('date'))
                                            <span class="invalid-feedback">{{ $errors->first('date') }}</span>
                                        @endif
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
                                        <label for=""><b>Accounts</b></label>
                                        <select name="tnx_ac_id" id="tnx_ac_id" class="form-select">
                                            <option value="" disabled selected>--Select--</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}"
                                                    data-curr_blance='{{ $account->curr_blance }}'>
                                                    {{ $account->account_name . ' - ' . $account->account_no }}</option>
                                            @endforeach
        
                                        </select>
                                    </div>
                                   
                                   
        
                                    <div class="form-group col-md-6 mt-2">
                                        <label for=""><b>Payment Method Details </b></label>
                                        <textarea name="payment_method_des" class="form-control mt-1" rows="1">{{ old('payment_method_des') }}</textarea>
                                        @if ($errors->has('payment_method_des'))
                                            <span class="invalid-feedback">{{ $errors->first('payment_method_des') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-end mt-3">
                                        <button class="btn btn-info " type="submit">Save</button>
                                    </div>
        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="card">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>Name : </td><td> Md Neamat Ullah</td>
                        </tr>
                        <tr>
                            <td>Name : </td><td> Md Neamat Ullah</td>
                        </tr>
                        <tr>
                            <td>Name : </td><td> Md Neamat Ullah</td>
                        </tr>
                    </table>
                </div>
            </div> --}}
        </div>
        

    </div>
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
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
            $(document).on('change', '#student_id', function() {
                let student_id = $(this).val();
                
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/get_student_info') }}",
                    data: {
                        'student_id': student_id,
                    },
                    success: function(data) {
                        console.log(data)
                        $('#student-name').text(data.student_name);
                        $('#father-name').text(data.father_name);
                        $('#mother-name').text(data.mother_name);
                        $('#class-info').html('<b>Class: </b>'+data.class_name+',<b> Section: </b>'+data.section_name+',<b> Batch: </b>'+data.batch_name);
                        
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred: " + status + " " + error);
                    }
                });
            });
        })

        $(document).on('change', '#tnx_ac_id', function() {
            let curr_blance = parseFloat($(this).find(':selected').data('curr_blance') || 0);
            $('#current_balance').text(curr_blance.toFixed(2));

        });  
    </script>

<script>
    $(".tnx_category").on("keyup", 'input[class*="tnx_amount"]', function (event) {
        calculateSubtotal();
    });
    
    function calculateSubtotal() {
        // Get all input elements with class 'tnx_amount'
        const amounts = document.querySelectorAll('.tnx_amount');
        let subtotal = 0;
        var discount = parseFloat($("#discount").val()) || 0;
        // Loop through the amounts and add them to the subtotal
        amounts.forEach((input) => {
            const value = parseFloat(input.value);
            if (!isNaN(value)) {
                subtotal += value;
            }
        });
    
        // Set the subtotal input field value
        document.getElementById('subtotal').value = subtotal;
        document.getElementById('total').value = subtotal-discount;
    }

    $("#discount").on("keyup", function() {
        calculateSubtotal();
    });
    </script>
@endsection
