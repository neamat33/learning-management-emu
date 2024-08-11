@extends('admin.layouts.app')
@section('page-title', 'Notice List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light"> Notice List</span></h4>
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Notice List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('notice.board.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Notice</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Subject</th>
                        <th>Notice Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($allNotice as $key => $notice)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $notice->subject}}</td>
                            <td width="50%">{{ $notice->message}}</td>
                            <td>
                                @if ($notice->status == 1)
                                    <span class="badge bg-success set-status">Active</span>
                                @else
                                    <span class="badge bg-danger set-status">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('notice.board.edit',$notice->id) }}"
                                   class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit text-white"></i>
                                </a>
                                <a href="{{ route('notice.board.delete',$notice->id) }}"
                                   class="btn btn-primary btn-circle btn-sm"><i class="fa fa-trash text-white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    {!! $allNotice->links() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- Modal to edit record -->
@endsection
