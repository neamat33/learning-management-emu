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
                                <div class="card shadow shamimxp" style="position: relative;">
                                    <div class="overflow-hidden rounded-3" style="padding: 10px">
                                        <img src="{{ asset($course->image) }}" class="card-img" alt="course image">
                                        <!-- Overlay -->
                                        <div class="bg-overlay opacity-6"></div>
                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                            <!-- Video button and link -->
                                            <div class="m-auto">
                                                @if($course->video)
                                                    <a href="{{ $course->video }}" class="btn btn-lg text-danger btn-round btn-white-shadow mb-0" data-glightbox="" data-gallery="course-video">
                                                        <i class="fas fa-play"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="btn btn-lg text-danger btn-round btn-white-shadow mb-0">
                                                        <i class="fas fa-play"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body pb-3">
                                        <!-- Buttons and price -->
                                        <div class="text-center">
                                            <!-- Buttons -->
                                            <a href="{{ route('cart.index', ['course_id' => $course->id]) }}" class="btn btn-success-soft mb-2 mb-sm-0 me-00 me-sm-3">
                                                <i class="bi bi-cart3 me-2"></i>প্রোগ্রামে ভর্তি হও
                                            </a>
                                            <a href="#" class="btn btn-white-soft mb-0">
                                                <h4 class="text-success mb-0 item-show">৳ {{ $course->price }}</h4>
                                            </a>
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
                    <h1 class="mb-4">{{ $course->course_title }}</h1>
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
                    <p>{{ $course->course_description ?? ' ' }}</p>

                    <!-- Instructor Details -->
                    <div class="col-12">
                        <ul class="nav nav-pills nav-pills-bg-soft px-3" role="tablist">
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <button class="nav-link mb-0 active" data-bs-toggle="pill" data-bs-target="#instructors-tab" type="button" role="tab" aria-controls="instructors-tab" aria-selected="true">কোর্স ইন্সট্রাক্টর</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-4 px-3 mb-4">
                            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="instructors-tab">
                                <div class="row g-2">
                                    @foreach($instructors as $instructor)
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="d-flex justify-content-lg-center align-items-center p-3 bg-blue bg-opacity-10 rounded-3 shamim-border shamim-style">
                                                <span class="display-6 lh-1 text-blue mb-0"><i class="fas fa-user-tie"></i></span>
                                                <div class="ms-4 h6 fw-normal mb-0">
                                                    <p class="mb-1">{{ $instructor->name ?? '-' }}</p>
                                                    <p class="mb-0" style="font-size: 12px">{{ $instructor->subject->subject_name ?? '-' }}</p>
                                                    <p class="mb-0" style="font-size: 12px">{{ $instructor->qualification ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Syllabus Details -->
                    <div class="col-12">
                        <ul class="nav nav-pills nav-pills-bg-soft px-3" role="tablist">
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <button class="nav-link mb-0 active" data-bs-toggle="pill" data-bs-target="#syllabus-tab" type="button" role="tab" aria-controls="syllabus-tab" aria-selected="true">প্রোগ্রামের সিলেবাস</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-4 px-3 mb-4">
                            <div class="tab-pane fade show active" id="syllabus-tab" role="tabpanel" aria-labelledby="syllabus-tab">
                                <div class="row g-4">
                                    <div class="col-md-12">
                                        <div class="card-body p-sm-4">
                                            <div class="accordion accordion-icon accordion-border" id="accordionExample2">
                                                @foreach($subjects as $key => $subject)
                                                    <div class="accordion-item mb-3">
                                                        <h6 class="accordion-header font-base" id="heading-{{ $key+1 }}">
                                                            <button class="accordion-button fw-bold collapsed rounded d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key+1 }}" aria-expanded="false" aria-controls="collapse-{{ $key+1 }}">
                                                                <i class="fas fa-fw fa-file fs-7" style="color: darkgray"></i> {{ $subject->subject_name ?? '-' }} {{$key}}
                                                            </button>
                                                        </h6>
                                                        <div id="collapse-{{ $key+1 }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $key+1 }}" data-bs-parent="#accordionExample2">
                                                            <div class="accordion-body mt-3">
                                                                @foreach($courseDetails->chapter as $chapter)
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="#" class="icon-md mb-0 position-static flex-shrink-0 text-body">
                                                                                    <i class="fas fa-fw fa-file-signature fs-5" style="color: darkgray"></i>
                                                                                </a>
                                                                                <div class="ms-3">
                                                                                    <a href="#" class="d-inline-block text-truncate mb-0 h6 fw-normal w-100px w-sm-200px w-md-400px">{{ $chapter[0] ?? '-' }}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <a href="#" class="p-2 mb-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Complete">
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </a>
                                                                    </div>
                                                                    <hr> <!-- Divider -->
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Class Routine -->
                    <div class="col-12">
                        <ul class="nav nav-pills nav-pills-bg-soft px-3" role="tablist">
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <button class="nav-link mb-0 active" data-bs-toggle="pill" data-bs-target="#routine-tab" type="button" role="tab" aria-controls="routine-tab" aria-selected="true">ক্লাস রুটিন</button>
                            </li>
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <a href="{{ route('download.image', encrypt($course->id)) }}" class="btn btn-success-soft mb-2 mb-sm-0 me-00 me-sm-3">
                                    <i class="fa fa-download me-2"></i>ডাউনলোড করো
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content pt-4 px-3" id="routine-tabContent">
                            <div class="tab-pane fade show active" id="routine-tab" role="tabpanel" aria-labelledby="routine-tab">
                                <div style="height: 340px">
                                    <img src="{{ asset($course->class_routine) }}" style="height: 340px;width: 100%" class="rounded-3" alt="Class Routine">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content END -->
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->
@endsection
