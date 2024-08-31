<div class="row g-4">
    @foreach($allCourses as $course)
        <!-- Card item START -->
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card shadow h-100">
                <div class="position-relative">
                    <!-- Image -->
                    <img src="{{ asset($course->image)}}" class="card-img-top" style="height: 298px; width: 298px" alt="book image">
                    <!-- Overlay -->
                    <div class="card-img-overlay d-flex z-index-0 p-3">
                        <!-- Card overlay Top -->
                        <div class="w-100 mb-auto d-flex justify-content-end">
                            <!-- Card format icon -->
                            <div class="icon-md bg-dark rounded-circle fs-5">
                                <a href="#" class="text-white"><i class="bi bi-book"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card body -->
                <div class="card-body px-3">
                    <!-- Title -->
                    <h5 class="card-title mb-0">
                        <a href="{{route('course.details.page',encrypt($course->id))}}" class="stretched-link">{{$course->course_title}}</a>
                    </h5>
                </div>

                <!-- Card footer -->
                <div class="card-footer pt-0 px-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"><span class="h6 fw-light mb-0">View Details</span></a>
                        <!-- Price -->
                        <h5 class="text-success mb-0">৳ {{$course->price}} /-</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->
    @endforeach
</div>
