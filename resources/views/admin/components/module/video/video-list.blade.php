@extends('layouts.master')
@section('title')
Videos
@endsection

@section('header')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Video</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')


<section class="content">
    <div class="container-fluid">

        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $videos->count() }}</h3>

                        <p>Total Videos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-film-marker"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Filter </h3>
                    </div>
                    <div class="card-body">
                        <form class="auth-login-form mt-2" action="{{ route('search-videos') }}" method="get">
                            <div class="row">
                                <div class="col col-lg-3">
                                    <label for="start" class="col-form-label">Start date:</label>
                                    <input class="form-control" type="date" id="start" name="start">
                                </div>
                                <div class="col col-lg-3">
                                    <label class="col-form-label" for="end">End date:</label>
                                    <input class="form-control" type="date" id="end" name="end">
                                </div>
                                <div class="col col_lg-3">
                                    <button style="margin-top: 37px;" class="btn btn-primary" type="submit">Search</button>
                                </div>
                                <div class="col col_lg-3">
                                    <button style="margin-top: 37px;" class="btn btn-success" type="button"> <a style="color: white;" href="{{route('create.video')}}"> Create Video </a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Video List</h3>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="table_id" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $key => $video)
                            <tr>
                                <td>{{ $video->name }}</td>
                                <td>{{ $video->link }}</td>
                                <td>{{ $video->status }}</td>
                                <td>{{ $video->created_at->format('d-M-Y') }}</td>
                                <td>
                                    <div style="display: flex;">
                                        <div>

                                            <button class="btn">
                                                <a href="{{ route('edit.video', ['uuid' => $video->uuid]) }}">
                                                    <i class="ion ion-edit"></i>
                                                </a>
                                            </button>
                                        </div>
                                        <div>
                                            <form action="{{route('update.video')}}" method="post">
                                                @csrf
                                                <button class="btn" type="submit">
                                                    <a style="color: red" href="{{ route('destroy.video', ['id' => $video->id]) }}">
                                                        <i class="ion ion-android-delete"></i>
                                                    </a>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">
    $(function() {
        $('#table_id').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection