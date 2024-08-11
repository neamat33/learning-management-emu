@extends('frontend.layouts.app')
@section('content')
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <!-- Main content START -->
                <div class="col-xl-12">
                    <!-- Student review START -->
                    <div class="card border bg-transparent rounded-3">
                        <!-- Header START -->
                        <div class="card-header bg-transparent border-bottom">
                            <div class="row justify-content-between align-middle">
                                <!-- Title -->
                                <div class="col-sm-6">
                                    <h3 class="card-header-title mb-2 mb-sm-0">
                                        <i class="fa fa-thumb-tack" aria-hidden="true"></i> Notice Board
                                    </h3>
                                </div>
                                <!-- Short by filter -->
                                <div class="col-sm-4">
                                    <div style="display: block;float: right">
                                        <i class="fas fa-fw fa-file-signature fs-5" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Header END -->

                        @php
                            // Find the most recent notice based on the 'updated_at' field
                            $latestNotice = \App\Models\NoticeBoard::orderBy('updated_at', 'desc')->first();
                            $latestNoticeId = $latestNotice ? $latestNotice->id : null;
                        @endphp
                        <!-- Reviews START -->
                        <div class="card-body mt-2 mt-sm-4">
                            @foreach($notices as $key => $notice)
                                <!-- Review item START -->
                                <div class="d-sm-flex"
                                     @if($notice->id === $latestNoticeId)
                                         style="background-color: #fff2f2;padding: 5px 5px;border-radius: 5px"
                                     @else
                                         style="padding: 5px 5px;border-radius: 5px"
                                    @endif
                                >
                                    <div>
                                        <div class="mb-3 d-sm-flex justify-content-sm-between align-items-center">
                                            <!-- Title -->
                                            <div>
                                                <h5 class="m-0">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> {{$notice->subject ?? ' '}}
                                                </h5>
                                                {{ \Carbon\Carbon::parse($notice->updated_at)->setTimezone('Asia/Dhaka')->addHours(24)->format('d M Y h:i a') }}
                                            </div>
                                        </div>
                                        <p>{{$notice->message ?? ' '}}</p>
                                    </div>
                                </div>
                                @if (!$loop->last)
                                    <hr>
                                @endif

                            @endforeach
                        </div>
                        <!-- Reviews END -->
                        <div class="card-footer border-top">
                            <!-- Pagination START -->
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                                <!-- Content -->
                                <p class="mb-0 text-center text-sm-start">
                                    Showing {{ $notices->firstItem() }} to {{ $notices->lastItem() }} of {{ $notices->total() }} entries
                                </p>
                                <!-- Pagination -->
                                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                                    <ul class="pagination pagination-sm pagination-primary-soft my-0 py-0">
                                        <!-- Previous Page Link -->
                                        @if ($notices->onFirstPage())
                                            <li class="page-item my-0 disabled">
                                                <span class="page-link"><i class="fas fa-angle-left"></i></span>
                                            </li>
                                        @else
                                            <li class="page-item my-0">
                                                <a class="page-link" href="{{ $notices->previousPageUrl() }}" tabindex="-1">
                                                    <i class="fas fa-angle-left"></i>
                                                </a>
                                            </li>
                                        @endif

                                        <!-- Pagination Elements -->
                                        @foreach ($notices->links()->elements[0] as $page => $url)
                                            @if ($page == $notices->currentPage())
                                                <li class="page-item my-0 active">
                                                    <span class="page-link">{{ $page }}</span>
                                                </li>
                                            @else
                                                <li class="page-item my-0">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        <!-- Next Page Link -->
                                        @if ($notices->hasMorePages())
                                            <li class="page-item my-0">
                                                <a class="page-link" href="{{ $notices->nextPageUrl() }}">
                                                    <i class="fas fa-angle-right"></i>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item my-0 disabled">
                                                <span class="page-link"><i class="fas fa-angle-right"></i></span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <!-- Pagination END -->
                        </div>
                    </div>
                    <!-- Student review END -->
                </div>
                <!-- Main content END -->
            </div><!-- Row END -->
        </div>
    </section>

@endsection
