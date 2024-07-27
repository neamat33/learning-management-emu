@extends('frontend.layouts.app')
@section('content')

    <!-- =======================
Page content START -->
    <section class="pt-5">
        <div class="container" data-sticky-container>
            <div class="row g-4 g-sm-5">

                <!-- Left sidebar START -->
                <div class="col-xl-4">
                    <div data-sticky data-margin-top="80" data-sticky-for="992">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-xl-12">

                                <!-- Card START -->
                                <div class="card shadow">
                                    <!-- Image -->
                                    <div class="rounded-3">
                                        <img src="{{ asset($course->image)}}" style="height: 391px;width: 391px" class="card-img-top" alt="book image">
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body pb-3">
                                        <!-- Buttons and price -->
                                        <div class="text-center">
                                            <!-- Buttons -->
                                            <a href="#" class="btn btn-success-soft mb-2 mb-sm-0 me-00 me-sm-3"><i class="bi bi-cart3 me-2"></i>প্রোগ্রামে ভর্তি হও</a>
                                            <a href="#" class="btn btn-white-soft mb-0"><h4 class="text-success mb-0 item-show">৳ {{$course->price}} /-</h4></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card END -->

                            </div>
                        </div> <!-- Row End -->
                    </div>
                </div>
                <!-- Left sidebar END -->

                <!-- Main content START -->
                <div class="col-xl-8">

                    <!-- Title -->
                    <h1 class="mb-4">{{$course->course_title}}</h1>
                    <div>
                        <div class="list-group-item px-0 mb-4">
                            <span class="h6 fw-light"><i class="bi fa-fw bi-calendar-fill text-primary me-2"></i>ক্লাস শুরু:</span>
                            <span class="h6">{{ \Carbon\Carbon::parse($course->start_date)->format('d M Y') }}</span>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="d-flex align-items-center mb-4">
                        <h2 class="me-3 mb-0">4.5</h2>
                        <div>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
                            </ul>
                            <p class="mb-0 small mt-n1">Reviews from our Student</p>
                        </div>
                    </div>

                    <!-- Content -->
                    <h5>কোর্সটি সম্পর্কে বিস্তারিত</h5>
                    <p>
                        {{$course->course_description ?? ' '}}
                    </p>

                    <!-- Book detail START -->
                    <div class="col-12">
                        <ul class="nav nav-pills nav-pills-bg-soft px-3" role="tablist">
                            <!-- Tab item -->
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <button class="nav-link mb-0 active"  data-bs-toggle="pill" data-bs-target="#book-pills-1" type="button" role="tab" aria-controls="book-pills-1" aria-selected="true">কোর্স ইন্সট্রাক্টর</button>
                            </li>
                        </ul>
                        <!-- Tabs END -->
                        <!-- Tab contents START -->
                        <div class="tab-content pt-4 px-3 mb-4">
                            <!-- Content START -->
                            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="book-pills-tab-1">
                                <div class="row g-2">
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="d-flex justify-content-lg-center align-items-center p-3 bg-blue bg-opacity-10 rounded-3 shamim-border shamim-style">
                                            <span class="display-6 lh-1 text-blue mb-0"><i class="fas fa-user-tie"></i></span>
                                            <div class="ms-4 h6 fw-normal mb-0">
                                                <div class="">
                                                    <p class="mb-1">S.M Shamim</p>
                                                    <p class="mb-0" style="font-size: 12px">ব্র্যাক ইউ.'১৫</p>
                                                    <p class="mb-0" style="font-size: 12px">বাংলা ১ম পত্র</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="d-flex justify-content-lg-center align-items-center p-3 bg-blue bg-opacity-10 rounded-3 shamim-border shamim-style">
                                            <span class="display-6 lh-1 text-blue mb-0"><i class="fas fa-user-tie"></i></span>
                                            <div class="ms-4 h6 fw-normal mb-0">
                                                <div class="">
                                                    <p class="mb-1">S.M Shamim</p>
                                                    <p class="mb-0" style="font-size: 12px">ব্র্যাক ইউ.'১৫</p>
                                                    <p class="mb-0" style="font-size: 12px">বাংলা ১ম পত্র</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="d-flex justify-content-lg-center align-items-center p-3 bg-blue bg-opacity-10 rounded-3 shamim-border shamim-style">
                                            <span class="display-6 lh-1 text-blue mb-0"><i class="fas fa-user-tie"></i></span>
                                            <div class="ms-4 h6 fw-normal mb-0">
                                                <div class="">
                                                    <p class="mb-1">S.M Shamim</p>
                                                    <p class="mb-0" style="font-size: 12px">ব্র্যাক ইউ.'১৫</p>
                                                    <p class="mb-0" style="font-size: 12px">বাংলা ১ম পত্র</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="d-flex justify-content-lg-center align-items-center p-3 bg-blue bg-opacity-10 rounded-3 shamim-border shamim-style">
                                            <span class="display-6 lh-1 text-blue mb-0"><i class="fas fa-user-tie"></i></span>
                                            <div class="ms-4 h6 fw-normal mb-0">
                                                <div class="">
                                                    <p class="mb-1">S.M Shamim</p>
                                                    <p class="mb-0" style="font-size: 12px">ব্র্যাক ইউ.'১৫</p>
                                                    <p class="mb-0" style="font-size: 12px">বাংলা ১ম পত্র</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab contents END -->
                    </div>
                    <!-- Book detail END -->
                    <!-- Book detail START -->
                    <div class="col-12">
                        <!-- Tabs START -->
                        <ul class="nav nav-pills nav-pills-bg-soft px-3" role="tablist">
                            <!-- Tab item -->
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <button class="nav-link mb-0 active" id="" data-bs-toggle="pill" data-bs-target="#book-pills-1" type="button" role="tab" aria-controls="book-pills-1" aria-selected="true">প্রোগ্রামের সিলেবাস</button>
                            </li>
                        </ul>
                        <!-- Tabs END -->

                        <!-- Tab contents START -->
                        <div class="tab-content pt-4 px-3 mb-4" >
                            <!-- Content START -->
                            <div class="tab-pane fade show active" aria-labelledby="book-pills-tab-1">
                                <div class="row g-4">
                                    <div class="col-md-12">
                                        <!-- Tab contents START -->
                                        <div class="card-body p-sm-4">
                                            <div class="tab-content" id="course-pills-tabContent">
                                                <!-- Content START -->
                                                <div class="tab-pane fade show active" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                                                    <!-- Accordion START -->
                                                    <div class="accordion accordion-icon accordion-border" id="accordionExample2">
                                                        <!-- Item -->
                                                        <div class="accordion-item mb-3">
                                                            <h6 class="accordion-header font-base" id="heading-1">
                                                                <button class="accordion-button fw-bold rounded d-flex collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                                    বাংলা ১ম পত্র
                                                                    <span class="text-secondary ms-auto pe-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as completed">
													           <i class="bi bi-check-circle-fill"></i>
											             	</span>
                                                                </button>
                                                            </h6>

                                                            <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionExample2">
                                                                <div class="accordion-body mt-3">
                                                                    <!-- Course assignment -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-signature fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px">অধ্যায় ০ : Orientation + Guideline</a>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!-- Actions Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Completed">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>
                                                                    <hr> <!-- Divider -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-signature fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px">অধ্যায় ১ : অপরিচিতা</a>
                                                                                    <ul class="nav nav-divider small mb-0">
                                                                                        <li class="nav-item">20pts</li>
                                                                                    </ul>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!-- Actions Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Completed">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>
                                                                    <hr> <!-- Divider -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Item -->
                                                        <div class="accordion-item mb-3">
                                                            <h6 class="accordion-header font-base" id="heading-2">
                                                                <button class="accordion-button fw-bold collapsed rounded d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                                    Week 2 -
                                                                    <span class="small ms-2">April 22 - 24</span>
                                                                    <span class="small ms-0 ms-sm-2 d-none d-sm-block">(3 Items)</span>
                                                                </button>
                                                            </h6>
                                                            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordionExample2">
                                                                <!-- Accordion body START -->
                                                                <div class="accordion-body mt-3">

                                                                    <!-- Course assignment -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-signature fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px">Assignments 2 - Research about customer life cycle</a>
                                                                                    <ul class="nav nav-divider small mb-0">
                                                                                        <li class="nav-item">20pts</li>
                                                                                        <li class="nav-item"><a href="#">Submit</a></li>
                                                                                    </ul>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!-- Actions Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                    <hr> <!-- Divider -->

                                                                    <!-- Course assignment -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-signature fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px">Assignments 3 - SEO Optimization</a>
                                                                                    <ul class="nav nav-divider small mb-0">
                                                                                        <li class="nav-item">20pts</li>
                                                                                        <li class="nav-item"><a href="#">Submit</a></li>
                                                                                    </ul>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!-- Actions Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                    <hr> <!-- Divider -->

                                                                    <!-- Course slide -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-alt fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px" data-bs-toggle="modal" data-bs-target="#slideModal">
                                                                                        Slide - Type of Marketing
                                                                                    </a>
                                                                                    <ul class="nav nav-divider small mb-0">
                                                                                        <li class="nav-item">View</li>
                                                                                        <li class="nav-item">05 Slide</li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <!-- Accordion body END -->
                                                            </div>
                                                        </div>

                                                        <!-- Item -->
                                                        <div class="accordion-item mb-3">
                                                            <h6 class="accordion-header font-base" id="heading-3">
                                                                <button class="accordion-button fw-bold collapsed rounded d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                                    Week 3 -
                                                                    <span class="small ms-2">April 28 - May 05</span>
                                                                    <span class="small ms-0 ms-sm-2 d-none d-sm-block">(3 Items)</span>
                                                                </button>
                                                            </h6>
                                                            <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#accordionExample2">
                                                                <!-- Accordion body START -->
                                                                <div class="accordion-body mt-3">

                                                                    <!-- Course assignment -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-signature fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px">Assignments 2 - Research about customer life cycle</a>
                                                                                    <ul class="nav nav-divider small mb-0">
                                                                                        <li class="nav-item">20pts</li>
                                                                                        <li class="nav-item"><a href="#">Submit</a></li>
                                                                                    </ul>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!-- Actions Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                    <hr> <!-- Divider -->

                                                                    <!-- Course assignment -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-signature fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px">Assignments 3 - SEO Optimization</a>
                                                                                    <ul class="nav nav-divider small mb-0">
                                                                                        <li class="nav-item">20pts</li>
                                                                                        <li class="nav-item"><a href="#">Submit</a></li>
                                                                                    </ul>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!-- Actions Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                    <hr> <!-- Divider -->

                                                                    <!-- Course slide -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-alt fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px" data-bs-toggle="modal" data-bs-target="#slideModal">
                                                                                        Slide - Type of Marketing
                                                                                    </a>
                                                                                    <ul class="nav nav-divider small mb-0">
                                                                                        <li class="nav-item">View</li>
                                                                                        <li class="nav-item">05 Slide</li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <!-- Accordion body END -->
                                                            </div>
                                                        </div>

                                                        <!-- Item -->
                                                        <div class="accordion-item mb-3">
                                                            <h6 class="accordion-header font-base" id="heading-4">
                                                                <button class="accordion-button fw-bold rounded d-flex collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                                    Week 4 -
                                                                    <span class="small ms-2">May 08 - 15</span>
                                                                    <span class="small ms-0 ms-sm-2 d-none d-sm-block">(4 Items)</span>
                                                                </button>
                                                            </h6>

                                                            <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="heading-4" data-bs-parent="#accordionExample2">
                                                                <div class="accordion-body mt-3">
                                                                    <!-- Course lecture -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="d-flex align-items-center">
                                                                            <!-- Video button -->
                                                                            <a data-glightbox data-gallery="office-tour" href="https://www.youtube.com/embed/tXHviS-4ygo" class="icon-md position-relative">
                                                                                <img src="{{asset('web')}}/assets/images/courses/4by3/01.jpg" class="rounded-1"  alt="">
                                                                                <small class="text-white position-absolute top-50 start-50 translate-middle"><i class="fas fa-play me-0 "></i></small>
                                                                            </a>

                                                                            <!-- Content -->
                                                                            <div class="ms-3">
                                                                                <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px"> What is Digital Marketing What is Digital Marketing</a>
                                                                                <ul class="nav nav-divider small mb-0">
                                                                                    <li class="nav-item">15m 10s</li>
                                                                                    <li class="nav-item">20pts</li>
                                                                                    <li class="nav-item"><a href="#">Submit</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Actions Mark button -->
                                                                        <a class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                    <hr> <!-- Divider -->

                                                                    <!-- Course lecture -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="d-flex align-items-center">
                                                                            <!-- Video button -->
                                                                            <a data-glightbox data-gallery="office-tour" href="https://www.youtube.com/embed/tXHviS-4ygo" class="icon-md position-relative">
                                                                                <img src="{{asset('web')}}/assets/images/courses/4by3/01.jpg" class="rounded-1"  alt="">
                                                                                <small class="text-white position-absolute top-50 start-50 translate-middle"><i class="fas fa-play me-0 "></i></small>
                                                                            </a>

                                                                            <!-- Content -->
                                                                            <div class="ms-3">
                                                                                <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px"> Measuring SEO Effectiveness</a>
                                                                                <ul class="nav nav-divider small mb-0">
                                                                                    <li class="nav-item">30m 10s</li>
                                                                                    <li class="nav-item">20pts</li>
                                                                                    <li class="nav-item"><a href="#">Submit</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Actions Mark button -->
                                                                        <a class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                    <hr> <!-- Divider -->

                                                                    <!-- Course lecture -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="d-flex align-items-center">
                                                                            <!-- Video button -->
                                                                            <a data-glightbox data-gallery="office-tour" href="https://www.youtube.com/embed/tXHviS-4ygo" class="icon-md position-relative">
                                                                                <img src="{{asset('web')}}/assets/images/courses/4by3/01.jpg" class="rounded-1"  alt="">
                                                                                <small class="text-white position-absolute top-50 start-50 translate-middle"><i class="fas fa-play me-0 "></i></small>
                                                                            </a>

                                                                            <!-- Content -->
                                                                            <div class="ms-3">
                                                                                <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px"> Keywords in Blog and Articles</a>
                                                                                <ul class="nav nav-divider small mb-0">
                                                                                    <li class="nav-item">30m 10s</li>
                                                                                    <li class="nav-item">20pts</li>
                                                                                    <li class="nav-item"><a href="#">Submit</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Actions Mark button -->
                                                                        <a class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                    <hr> <!-- Divider -->

                                                                    <!-- Course slide -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-alt fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px" data-bs-toggle="modal" data-bs-target="#slideModal">
                                                                                        Slide - Digital Marketing
                                                                                    </a>
                                                                                    <ul class="nav nav-divider small mb-0">
                                                                                        <li class="nav-item">View</li>
                                                                                        <li class="nav-item">05 Slide</li>
                                                                                    </ul>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!-- Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>

                                                                    <hr> <!-- Divider -->

                                                                    <!-- Course slide -->
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <!-- Video button -->
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-question-circle fa-fw fs-5"></i>
                                                                                </a>
                                                                                <!-- Content -->
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px">Quiz - Digital Marketing</a>
                                                                                    <ul class="nav nav-divider small mb-0">
                                                                                        <li class="nav-item">12 April</li>
                                                                                        <li class="nav-item">10 pts</li>
                                                                                    </ul>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!-- Actions Mark button -->
                                                                        <a href="#" class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Accordion END -->
                                                </div>
                                                <!-- Content END -->

                                                <!-- Content START -->
                                                <div class="tab-pane fade" id="course-pills-2" role="tabpanel" aria-labelledby="course-pills-tab-2">
                                                    <div class="card">
                                                        <!-- Card header -->
                                                        <div class="card-header border-bottom p-0 pb-3">
                                                            <!-- Title and select -->
                                                            <div class="d-sm-flex justify-content-between align-items-center">
                                                                <h4 class="mb-0">All Notes</h4>
                                                                <!-- Short by filter -->
                                                                <form class="col-sm-6 col-lg-3 bg-light-input">
                                                                    <select class="form-select js-choice z-index-9" aria-label=".form-select-sm">
                                                                        <option value="">Sort by</option>
                                                                        <option>All</option>
                                                                        <option>Introductions</option>
                                                                        <option>What is Digital Marketing</option>
                                                                        <option>Most Viewed</option>
                                                                    </select>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <!-- Card body -->
                                                        <div class="card-body p-0 pt-3">
                                                            <!-- Note item -->
                                                            <div class="row g-4">
                                                                <!-- Image -->
                                                                <div class="col-sm-2 col-xl-1">
                                                                    <img src="{{asset('web')}}/assets/images/courses/4by3/01.jpg" class="rounded flex-shrink-0" alt="">
                                                                </div>
                                                                <!-- Content -->
                                                                <div class="col-sm-10 col-xl-11">
                                                                    <h5>Introduction (2:34)</h5>
                                                                    <p>Departure defective arranging rapturous did believe him all had supported. Supposing so be resolving breakfast am or perfectly. It drew a hill from me. Valley by oh twenty direct me so. Departure defective arranging rapturous did believe him all had supported. Family months lasted simple set nature vulgar him. Picture for attempt joy excited ten carried manners talking how. Family months lasted simple set nature vulgar him. Picture for attempt joy excited ten carried manners talking how.</p>
                                                                    <!-- Buttons -->
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <a href="#" class="btn btn-sm btn-primary mb-0"><i class="bi bi-play-fill me-2"></i>Play</a>
                                                                        <a href="#" class="text-success mb-0"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                                                                        <a href="#" class="text-danger mb-0"><i class="bi bi-trash me-2"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr> <!-- Divider -->

                                                            <!-- Note item -->
                                                            <div class="row g-4">
                                                                <!-- Image -->
                                                                <div class="col-sm-2 col-xl-1">
                                                                    <img src="{{asset('web')}}/assets/images/courses/4by3/01.jpg" class="rounded flex-shrink-0" alt="">
                                                                </div>
                                                                <!-- Content -->
                                                                <div class="col-sm-10 col-xl-11">
                                                                    <h5> What is Digital Marketing What is Digital Marketing (10:20)</h5>
                                                                    <p>Arranging rapturous did believe him all had supported. Supposing so be resolving breakfast am or perfectly. It drew a hill from me. Valley by oh twenty direct me so. Departure defective arranging rapturous did believe him all had supported. Family months lasted simple set nature vulgar him. Picture for attempt joy excited ten carried manners talking how. Family months lasted simple set nature vulgar him. Picture for attempt joy excited ten carried manners talking how.</p>
                                                                    <!-- Buttons -->
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <a href="#" class="btn btn-sm btn-primary mb-0"><i class="bi bi-play-fill me-2"></i>Play</a>
                                                                        <a href="#" class="text-success mb-0"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                                                                        <a href="#" class="text-danger mb-0"><i class="bi bi-trash me-2"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Content END -->

                                                <!-- Content START -->
                                                <div class="tab-pane fade" id="course-pills-3" role="tabpanel" aria-labelledby="course-pills-tab-3">
                                                    <div class="card">
                                                        <!-- Card header -->
                                                        <div class="card-header border-bottom p-0 pb-3">
                                                            <!-- Title -->
                                                            <h4 class="mb-3">Discussion</h4>
                                                            <form class="row g-4">
                                                                <!-- Search -->
                                                                <div class="col-sm-6 col-lg-3">
                                                                    <div class="position-relative">
                                                                        <input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
                                                                        <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                                                                            <i class="fas fa-search fs-6 "></i>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <!-- Select option -->
                                                                <div class="col-sm-6 col-lg-3">
                                                                    <select class="js-choice">
                                                                        <option value="">Select item</option>
                                                                        <option>Week 1</option>
                                                                        <option>Week 2</option>
                                                                        <option>Week 3</option>
                                                                        <option>Week 4</option>
                                                                        <option>Week 5</option>
                                                                        <option>Week 6</option>
                                                                    </select>
                                                                </div>

                                                                <!-- Select option -->
                                                                <div class="col-sm-6 col-lg-3">
                                                                    <select class="js-choice">
                                                                        <option value="">Filter</option>
                                                                        <option>All</option>
                                                                        <option>Answered</option>
                                                                        <option>Unanswered</option>
                                                                    </select>
                                                                </div>

                                                                <!-- Button -->
                                                                <div class="col-sm-6 col-lg-3">
                                                                    <a href="#" class="btn btn-primary-soft mb-0 w-100" data-bs-toggle="modal" data-bs-target="#modalCreatePost">Create Post</a>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <!-- Card body -->
                                                        <div class="card-body p-0 pt-3">
                                                            <div class="vstack gap-3">
                                                                <!-- Question item START -->
                                                                <div class="border-bottom">
                                                                    <!-- Name and time -->
                                                                    <div class="d-sm-flex justify-content-sm-between mb-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <!-- Avatar -->
                                                                            <div class="avatar avatar-sm flex-shrink-0">
                                                                                <img class="avatar-img rounded-circle" src="{{asset('web')}}/assets/images/avatar/03.jpg" alt="avatar">
                                                                            </div>
                                                                            <!-- Info -->
                                                                            <div class="ms-2">
                                                                                <h6 class="mb-0"><a href="#">Samuel Bishop</a></h6>
                                                                                <small>posted 9 minutes ago</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Question -->
                                                                    <h5>How can you categorize Digital marketing?</h5>
                                                                    <p class="mb-2">As it so contrasted oh estimating instrument. Size like body someone had. Are conduct viewing boy minutes warrant the expense? Tolerably behavior may admit daughters offending her ask own. Praise effect wishes change way and any wanted. Lively use looked latter regard had. Do he it part more last in.</p>

                                                                    <!-- Action button -->
                                                                    <ul class="nav nav-divider pb-3 small">
                                                                        <li class="nav-item"> <a class="text-primary-hover" href="#"> <i class="bi bi-hand-thumbs-up me-2"></i>Like (3)</a> </li>
                                                                        <li class="nav-item"> <a class="text-primary-hover" href="#"> <i class="bi bi-chat-left me-2"></i>Reply</a> </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- Question item END -->

                                                                <!-- Question item START -->
                                                                <div>
                                                                    <!-- Name and time -->
                                                                    <div class="d-sm-flex justify-content-sm-between mb-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <!-- Avatar -->
                                                                            <div class="avatar avatar-sm flex-shrink-0">
                                                                                <img class="avatar-img rounded-circle" src="{{asset('web')}}/assets/images/avatar/05.jpg" alt="avatar">
                                                                            </div>
                                                                            <!-- Info -->
                                                                            <div class="ms-2">
                                                                                <h6 class="mb-0"><a href="#">Carolyn Ortiz</a></h6>
                                                                                <small>posted 50 minutes ago</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Question -->
                                                                    <h5> What are the key areas where you can use keywords to optimize your site ranking?</h5>
                                                                    <p class="mb-2">As it so contrasted oh estimating instrument. Size like body someone had. Are conduct viewing boy minutes warrant the expense? Tolerably behavior may admit daughters offending her ask own. Praise effect wishes change way and any wanted. Lively use looked latter regard had. Do he it part more last in.</p>

                                                                    <!-- Action button -->
                                                                    <ul class="nav nav-divider pb-0 small">
                                                                        <li class="nav-item"> <a class="text-primary-hover" href="#"> <i class="bi bi-hand-thumbs-up me-2"></i>Like (3)</a> </li>
                                                                        <li class="nav-item"> <a class="text-primary-hover" href="#"> <i class="bi bi-chat-left me-2"></i>Reply</a> </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- Question item END -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Content END -->

                                            </div>
                                        </div>
                                        <!-- Tab contents END -->
                                    </div>
                                </div>
                            </div>
                            <!-- Content END -->

                        </div>
                        <!-- Tab contents END -->
                    </div>
                    <!-- Book detail END -->
                    <!-- Book detail START -->
                    <div class="col-12">
                        <!-- Tabs START -->
                        <ul class="nav nav-pills nav-pills-bg-soft px-3" id="book-pills-tab" role="tablist">
                            <!-- Tab item -->
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <button class="nav-link mb-0 active" id="book-pills-tab-1" data-bs-toggle="pill" data-bs-target="#book-pills-1" type="button" role="tab" aria-controls="book-pills-1" aria-selected="true">ক্লাস রুটিন</button>
                            </li>
                            <!-- Tab item -->
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <a href="#" class="btn btn-success-soft mb-2 mb-sm-0 me-00 me-sm-3"><i class="fa fa-download me-2"></i>ডাউনলোড করো</a>
                            </li>
                            <!-- Tab item -->
                        </ul>
                        <!-- Tabs END -->

                        <!-- Tab contents START -->
                        <div class="tab-content pt-4 px-3" id="book-pills-tabContent">
                            <!-- Content START -->
                            <div class="tab-pane fade show active" id="book-pills-1" role="tabpanel" aria-labelledby="book-pills-tab-1">
                                <div class="row g-4">
                                    <div class="col-md-12">
                                        <div style="height: 340px">
                                            <img  src="{{asset($course->class_routine)}}" style="height: 340px;width: 100%" class="rounded-3" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Book detail END -->
                </div>
                <!-- Main content END -->
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->
@endsection
