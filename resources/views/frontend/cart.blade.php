@extends('frontend.layouts.app')
@section('content')
    <!-- =======================
Page content START -->
    <section class="pt-5">
        <div class="container">
            <form action="{{route('store.buy.course')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="row g-4 g-sm-5">
                    <!-- Main content START -->
                    <div class="col-xl-8 mb-4 mb-sm-0">
                        <!-- Alert -->
                        <div class="alert alert-danger alert-dismissible d-flex justify-content-between align-items-center fade show py-2 pe-2" role="alert">
                            <div>
                                <i class="bi bi-exclamation-octagon-fill me-2"></i>
                                Already have an account? <a href="#" class="text-reset btn-link mb-0 fw-bold">Log in</a></div>
                            <button type="button" class="btn btn-link mb-0 text-end" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-lg text-dark"></i></button>
                        </div>
                        <!-- Personal info START -->
                        <div class="card card-body shadow p-4">
                            <!-- Title -->
                            <h5 class="mb-0">Personal Details</h5>
                            <!-- Form START -->
                            <div class="row g-3 mt-0">
                                <!-- Name -->
                                <div class="col-md-6 bg-light-input">
                                    <label for="yourName" class="form-label">Your Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="yourName" value="{{old('name')}}" name="name" placeholder="Name">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Email -->
                                <div class="col-md-6 bg-light-input">
                                    <label for="emailInput" class="form-label">Email Address </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" id="emailInput" placeholder="Email">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Number -->
                                <div class="col-md-6 bg-light-input">
                                    <label for="mobileNumber" class="form-label">Mobile number *</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number')}}" name="phone_number" id="mobileNumber" placeholder="Mobile number">
                                    @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Address -->
                                <div class="col-md-6 bg-light-input">
                                    <label for="address" class="form-label">Address *</label>
                                    <input type="text" class="form-control" id="address" placeholder="Address">
                                </div>
                            </div>
                            <!-- Form END -->

                            <!-- Payment method START -->
                            <div class="row g-3 mt-4">
                                <!-- Title -->
                                <h5 class="">Payment method</h5>
                                <div class="col-12">
                                    <div class="table-responsive border-0 rounded-3">
                                        <!-- Table START -->
                                        <table class="table align-middle p-4 mb-0">
                                            <tbody class="border-top-0">
                                            <!-- Table item -->
                                            <tr>
                                                <!-- Course item -->
                                                <td style="width: 70%">
                                                    <div class="d-lg-flex align-items-center">
                                                        <input type="radio" id="bkash" style="height: 20px;width: 20px" name="payment_type" value="bkash" class="@error('payment_type') is-invalid @enderror" required >
                                                        <!-- Title -->
                                                        <h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0">
                                                            <span>Bkash</span>
                                                        </h6>
                                                    </div>
                                                </td>
                                                <!-- Amount item -->
                                                <td class="text-center" style="width: 10%">

                                                </td>
                                                <!-- Action item -->
                                                <td style="width: 20%">
                                                    <div class="w-100px w-md-80px mb-2 mb-md-0">
                                                        <img src="https://freelogopng.com/images/all_img/1656227518bkash-logo-png.png" class="rounded" alt="">
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Table item -->
                                            <tr>
                                                <!-- Course item -->
                                                <td style="width: 70%">
                                                    <div class="d-lg-flex align-items-center">
                                                        <!-- Image -->
                                                        <input type="radio" id="ssl" style="height: 20px;width: 20px" name="payment_type" value="ssl" class="@error('payment_type') is-invalid @enderror" required>
                                                        <!-- Title -->
                                                        <h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0">
                                                            <span>SSL Commerce</span>
                                                        </h6>
                                                    </div>
                                                </td>

                                                <!-- Amount item -->
                                                <td class="text-center" style="width: 10%">
                                                </td>
                                                <!-- Action item -->
                                                <td style="width: 20%">
                                                    <div class="w-100px w-md-80px mb-2 mb-md-0 ml-4">
                                                        <img src="https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/161578146/original/413a03d851ad916f7d51a7f456ccba933113022b/do-sslcommerz-and-paypal-payment-gateway-integration.png" class="rounded" alt="">
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Payment method END -->
                        </div>
                        <!-- Personal info END -->
                    </div>
                    <!-- Main content END -->
                    <!-- Right sidebar START -->
                    <div class="col-xl-4">
                        <div class="row mb-0">
                            <div class="col-md-6 col-xl-12">
                                <!-- Order summary START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-4">Checkout Summary</h4>
                                    <hr>
                                    <!-- Coupon END -->
                                    <!-- Course item START -->
                                    <div class="row g-3">
                                        <!-- Image -->
                                        <div class="col-sm-4">
                                            <img class="rounded" src="{{asset($course->image)}}" alt="">
                                        </div>
                                        <!-- Info -->
                                        <div class="col-sm-8">
                                            <h6 class="mb-0"><a href="#">{{$course->course_title}}</a></h6>
                                            <!-- Info -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <span class="text-success">৳ {{$course->price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course item END -->
                                    <hr> <!-- Divider -->
                                    <!-- Price and detail -->
                                    <ul class="list-group list-group-borderless mb-2">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h5 mb-0">Total</span>
                                            <span class="h5 mb-0">৳ {{$course->price}}</span>
                                        </li>
                                    </ul>
                                    <input type="hidden" name="course_id" value="{{$course->id}}">
                                    <input type="hidden" name="total_price" value="{{$course->price}}">
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-lg btn-success">Place Order</button>
                                    </div>
                                    <!-- Content -->
                                    <p class="small mb-0 mt-2 text-center">By completing your purchase, you agree to these <a href="#"><strong>Terms of Service</strong></a></p>
                                </div>
                                <!-- Order summary END -->
                            </div>
                        </div><!-- Row End -->
                    </div>
                    <!-- Right sidebar END -->
                </div><!-- Row END -->
            </form>
        </div>
    </section>
    <!-- =======================
    Page content END -->
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#company_id').change(function() {

            });
        });
    </script>
@endpush

