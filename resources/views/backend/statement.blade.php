@extends('backend.backendMaster')
@section('title', 'Complain list')
@section('page_title', 'Complain list')
@section('page_content')
    <!-- Page -->
    <div class="page">

        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">@yield('page_title')</li>
            </ol>
        </div>

        <div class="page-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered panel-info border border-info">

                        <div class="panel-heading">
                            <h3 class="panel-title">@yield('page_title')</h3>
                        </div>

                        <div class="p-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="p-5">
                                        <table class="table table-hover table-responsive dataTable table-striped w-full" id="">
                                            <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>amount</th>
                                                <th>type</th>
                                                <th>accepted By</th>
                                                <th>Status</th>
                                                <th>Accepted At</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($sort) > 0)
                                                @foreach ($sort as $item)
                                                    <tr>
                                                        <td> {{ $item->user_id}}</td>
                                                            @if($item->depositAmount)
                                                            
                                                        <td> {{ $item->depositAmount }}</td>
                                                            @else
                                                        <td> {{ $item->withdrawAmount }}</td>    
                                                            @endif
                                                        @if($item->depositAmount)
                                                            
                                                        <td> Deposit</td>
                                                            @else
                                                        <td>   Withdraw</td>    
                                                            @endif
                                                        <td> {{ $item->accepted_by }}</td>
                                                        <td>
                                                            @if($item->status == 1)
                                                                <span class="badge badge-success">Seen</span>
                                                            @else
                                                                <span class="badge badge-warning">Pending</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            {{ $item->created_at }}
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page -->

@endsection

@section('page_styles')
    @include('backend.partials._styles')
    @include('backend.partials._datatable_style')
@endsection


@section('page_scripts')
    @include('backend.partials._scripts')
    @include('backend.partials._datatable_script')
    <script type="text/javascript">
        $('#usercomplain').addClass('active open');
        $('#complainlist').addClass('active');
    </script>
@endsection
