@extends('admin.layouts.app')
@section('page-title', 'Fees Collections')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-3">
                <div class="card invoice-preview-card">
                    
                        <div class="text-center flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                            <div class="mb-xl-0 mb-4">
                                <div class=" svg-illustration mb-2 gap-2 ">
                                    <span class="app-brand-text fw-bold fs-4">EMU Coaching Center</span>
                                </div>
                                <p class="mb-1">Branch : Barisal</p>
                                <p class="mb-1">San Diego County, CA 91905, USA</p>
                                <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                            </div>

                        </div>
                    

                    <div class="card-body p-3">
                        <div class="row p-sm-3 p-0">
                            <div class="col-xl-6 col-md-12 col-sm-7 col-12">

                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-4">Student Name </td>
                                            <td>:&nbsp;</td>
                                            <td class="fw-medium">{{ $student->student_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Mobile </td>
                                            <td>:&nbsp;</td>
                                            <td>{{ $student->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Class </td>
                                            <td>:&nbsp;</td>
                                            <td>{{ $student->class_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Section </td>
                                            <td>: &nbsp;</td>
                                            <td>{{ $student->section_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Shift </td>
                                            <td>: &nbsp;</td>
                                            <td>{{ $student->shift_name }}</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="table-responsive p-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>
                                        <strong>Date:</strong> {{ date('d/m/Y', strtotime($single->date)) }}
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <strong>Invoice:</strong> # {{ $single->invoice_id }}
                                    </p>
                                </div>
                            </div>
                            <table class="table  table-bordered table">
                                <thead>
                                    <tr>
                                        <td width="5%" class="pt-1 pb-1"><strong> Sn. </strong></td>
                                        <td class="text-center pt-1 pb-1"><strong>Purticulars </strong></td>
                                        <td width="22%" class="text-center pt-1 pb-1"><strong> Amount (BDT)</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($single->items as $key => $item)
                                        <tr>
                                            <td class="center pt-1 pb-1">{{ ++$key }}</td>
                                            <td class="pt-1 pb-1">{{ $item->category->name }}</td>
                                            <td class="text-end pt-1 pb-1">{{ $item->tnx_amount }} </td>
                                        </tr>
                                    @endforeach
                                    
                                    <tr>

                                        <td colspan="2" class="text-end pt-1 pb-1"><strong> Subtotal: </strong></td>
                                        <td class="text-end pt-1 pb-1"><strong>{{ $single->sub_total }}</strong> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end pt-1 pb-1"><strong>Discount: </strong></td>
                                        <td class="text-end pt-1 pb-1"><strong>{{ $single->discount }}</strong></td>
                                    </tr>
                                    <tr>

                                        <td colspan="2" class="text-end pt-1 pb-1"><strong>Total: </strong></td>
                                        <td class="text-end pt-1 pb-1"><strong>{{ $single->tnx_amount }} </strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mt-3">
                                <p>
                                    <strong>Note:</strong> {{ $single->note }}
                                </p>
                            </div>
                            <div class="row">
                               <div class="col-md-6">

                               </div>
                                <div class="col-md-6 text-end">
                                    <table>
                                        <tr>
                                            <td><strong>Payment Method :</strong></td>
                                            <td>Bkash</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Posted By :</strong></td>
                                            <td> Mr. Xyz</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-12 text-end mt-5">
                                    <p class="pb-0">....................................</p>
                                    <p>Authorized Signature </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- <div class="card-body mx-3">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-medium">Note:</span>
                                <span>It was a pleasure working with you and your team. We hope you will keep us in mind for
                                    future freelance projects. Thank You!</span>
                            </div>
                        </div>
                    </div> --}}
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

                        <a href="{{ route('fees-collections.index') }}" class="btn btn-primary d-grid w-100">
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
