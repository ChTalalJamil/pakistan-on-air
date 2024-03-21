@extends('layouts.master')
@section('title')
    Terms
@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('sub-title')
    <h1 class="m-0"> Terms and Conditions</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $terms->count() }}
                    </h3>

                    <p>Total terms</p>
                </div>
                <div class="icon">
                    <i class="ion ion-videocamera"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Filter Terms </h3>
                </div>
                <div class="card-body">
                    <form class="auth-login-form mt-2" action="{{ route('filter.terms') }}" method="get">
                        <div class="row" style="display: flex; justify-content: space-between;">
                            <div class="col-4">

                                <label for="start" class="col-form-label">Start date:</label>
                                <input class="form-control" type="date" id="start" name="start">
                            </div>
                            <div class="col col-4">

                                <label class="col-form-label" for="end">End date:</label>
                                <input class="form-control" type="date" id="end" name="end">
                            </div>
                            <div class="col col-2">
                                <button style="margin-top: 37px;" class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <div style="float: right" class="col col-2">
                                <button style="margin-top: 37px;" class="btn btn-success" type="button"> <a
                                        style="color: white;" href="{{ route('create.terms') }}"> Add Terms
                                    </a></button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Terms List</h3>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="table_id" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terms as $key => $term)
                            <tr>
                                <td>{{ $term->user }}</td>
                                <td>{{ $term->created_at->format('d-M-Y') }}</td>
                                <td>
                                    <div style="display: flex;">
                                        <div>
                                            <button class="btn">
                                                <a href="{{ route('edit.term', ['uuid' => $term->uuid]) }}">
                                                    <i class="ion ion-edit"></i>
                                                </a>
                                            </button>
                                        </div>
                                        <div>
                                            <form action="{{ route('destroy.term', ['id' => $term->id]) }}"
                                                method="post">
                                                @csrf
                                                <button class="btn" type="submit">
                                                    <a style="color: red"
                                                        href="{{ route('destroy.term', ['id' => $term->id]) }}">
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
@endsection



@section('script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
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
