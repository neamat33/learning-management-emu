@extends('frontend.layouts.app')
@section('content')
    <!-- =======================
Page content START -->
    <section class="pt-5">
        <div class="container">
                <div class="row g-4 g-sm-5">
                    <!-- Main content START -->
                    <div class="col-xl-12 mb-4 mb-sm-0">
                        <!-- Personal info START -->
                        <div class="card card-body shadow p-4">
                            <div style="text-align: center">
                                <div>
                                    <img src="{{asset('web/green.jpg')}}" style="height: 200px;width: 200px" />
                                </div>
                                <h5 class="mb-0">Your Order has been successful! Please wait for course permission..</h5>
                                <h5>Or</h5>
                                <h6>Contact: 01631025895</h6>
                            </div>
                            <!-- Title -->
                            <!-- Form END -->
                        </div>
                        <!-- Personal info END -->
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </form>
        </div>
    </section>
    <!-- =======================
    Page content END -->
@endsection
@push('js')

@endpush

