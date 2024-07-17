@extends('admin.layouts.app')
@section('page-title', 'Fees Collections')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div
                            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                            <div class="mb-xl-0 mb-4">
                                <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                            fill="#7367F0" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                            fill="#161616" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                            fill="#161616" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                            fill="#7367F0" />
                                    </svg>

                                    <span class="app-brand-text fw-bold fs-4"> Vuexy </span>
                                </div>
                                <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
                                <p class="mb-2">San Diego County, CA 91905, USA</p>
                                <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                            </div>
                            <div>
                                <h4 class="fw-medium mb-2">INVOICE #{{ $single->invoice_id }}</h4>
                                <div class="mb-2 pt-1">
                                    <span>Date Issues:</span>
                                    <span class="fw-medium">{{ date('M d, Y',strtotime($single->date))}}</span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body p-3">
                        <div class="row p-sm-3 p-0">
                            <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                <h6 class="mb-4">Bill To: </h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-4">Student Name :</td>
                                            <td class="fw-medium">{{ $student->student_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Mobile :</td>
                                            <td>{{ $student->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Class :</td>
                                            <td>{{ $student->class_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Section :</td>
                                            <td>{{ $student->section_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Shift :</td>
                                            <td>{{ $student->shift_name}}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                    <div class="table-responsive p-3">
                        <table class="table  table-bordered table">
                            <thead>
                                <tr>
                                    <td width="5%"><strong> Sn. </strong></td>
                                    <td  class="text-center"><strong>Purticulars </strong></td>
                                    <td width="22%" class="text-center"><strong> Amount (BDT)</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($single->items as  $key=> $item)
                                <tr>
                                    <td class="center">{{++$key}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td class="text-end">{{ $item->tnx_amount}} </td>
                                </tr>
                               @endforeach
                                
                                <tr>
                                    
                                    <td  colspan="2" class="text-end"><strong> Subtotal: </strong></td>
                                    <td class="text-end">{{ $single->sub_total}} </td>
                                </tr>
                                <tr>
                                    <td colspan="2"  class="text-end"><strong>Discount: </strong></td>
                                    <td class="text-end">{{ $single->discount}}</td>
                                </tr>
                                <tr>
                                    
                                    <td colspan="2"  class="text-end"><strong>Total: </strong></td>
                                    <td class="text-end">{{ $single->tnx_amount}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="card-body mx-3">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-medium">Note:</span>
                                <span>It was a pleasure working with you and your team. We hope you will keep us in mind for
                                    future freelance projects. Thank You!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas"
                            data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="ti ti-printer ti-xs me-2"></i>Print</span>
                        </button>
                        <button class="btn btn-label-secondary d-grid w-100 mb-2">Download</button>
                    
                        <a href="{{ route('fees-collections.index')}}" class="btn btn-primary d-grid w-100">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class=" ti-xs me-2"> ৳ </i>New Collection</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
      </div>
    </div>
    <!-- /Send Invoice Sidebar -->

@endsection
