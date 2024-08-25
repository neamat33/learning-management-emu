@extends('admin.layouts.app')
@section('page-title', 'Order List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Order-</span> List</h4>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Order  List</h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Photo</th>
                        <th>Course Name</th>
                        <th>Name</th>
                        <th>Phone Number </th>
                        <th>Total Price </th>
                        <th>Payment Type</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key=>$order)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><img src="{{ asset($order->course->image)}}" alt="" width="50" height="50"></td>
                            <td>{{ $order->course->course_title ?? '-'}}</td>
                            <td>{{ $order->student->name}}</td>
                            <td>{{ $order->student->phone_number}}</td>
                            <td>{{ $order->total_price}}</td>
                            <td>
                                @if($order->payment_type == 'bkash')
                                    <span>Bkash</span>
                                @else
                                    <span>SSL</span>
                                @endif
                            </td>
                            <td>
                                @if ($order->status == 'pending')
                                    <a href="{{route('order.confirm',$order->id)}}" class="badge bg-warning" title="change to confirm">Pending</a>
                                @else
                                    <a href="{{route('order.pending',$order->id)}}" class="badge bg-success set-status"  title="change to Pending">Confirm</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="m-2 text-right" style="float: right">
                    {!! $orders->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
@section('extra_js')
    <script>

    </script>
@endsection
