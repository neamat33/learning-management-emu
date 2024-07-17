@extends('admin.layouts.app')
@section('page-title', 'Role Show')

@section('content')
    <div class="content-body mt-4" style="min-height: 500px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        
                        <div class="card-body">
                            <h4 class="card-title">({{ $role->name }}) - Permisson Show</h4>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <span class="badge bg-info my-1" style="text-transform: capitalize"> {{ str_replace('-',' - ',str_replace('_', ' ', $v->name)) }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra_js')

@endsection
