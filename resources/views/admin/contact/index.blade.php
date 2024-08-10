@extends('admin.layouts.app')
@section('page-title', 'Contact Message List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light"> </span> Contact Message</h4>
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Contact Message List</h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email </th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contactMessage as $key => $message)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $message->name}}</td>
                            <td>{{ $message->phone_number}}</td>
                            <td>{{ $message->email}}</td>
                            <td>{{ $message->message}}</td>
                            <td>
                                <a href="{{ route('message.delete',$message->id) }}"
                                   class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash text-white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    {!! $contactMessage->links() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- Modal to edit record -->




@endsection
