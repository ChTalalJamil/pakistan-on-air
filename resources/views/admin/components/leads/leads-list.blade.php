@extends('layouts.master')
@section('title')
Leads
@endsection

@section('header')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Leads</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item "><a href="/admin/dashboard">Dashboard </a></li>
                </ol>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
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
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$total_leads}}</h3>

                        <p>Total Leads</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$accepted_lead_count}}
                            <!-- <sup style="font-size: 20px">%</sup> -->
                        </h3>

                        <p>Accepted</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark-circled"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$rejected_lead_count}}</h3>

                        <p>Rejected</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-close-circled"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Filter Leads </h3>
                    </div>
                    <div class="card-body">
                        <form class="auth-login-form mt-2" action="{{route('searchLeads')}}" method="get">
                            <div class="row">
                                <div class="col col-lg-4">
                                    <label for="start" class="col-form-label">Start date:</label>
                                    <input class="form-control" type="date" id="start" name="start">
                                </div>
                                <div class="col col-lg-4">
                                    <label class="col-form-label" for="end">End date:</label>
                                    <input class="form-control" type="date" id="end" name="end">
                                </div>
                                <div class="col col_lg-2" >
                                    <button style="margin-left: 50%; margin-top: 15%; border: none; color: white; cursor: pointer;" class="button btn btn-primary" type="submit">Search</button>
                                </div>
                                <div class="col col_lg-2">
                                    <button style="margin-top: 37px; margin-left: 50%;" class="btn btn-success" type="button"> <a style="color: white;" href="/admin/add-leads"> Add Lead </a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Leads List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="table-responsive">
                    <table id="table_id" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Campaign</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $key => $lead)
                            <tr>
                                <td>{{$lead->full_name}}</td>
                                <td>{{$lead->email}}</td>
                                <td>{{$lead->phone}}</td>
                                <td>{{isset($lead->campaign->name)?$lead->campaign->name:$lead->campaign_id}}</td>
                                <td>{{$lead->created_at->format('d-M-Y')}}</td>
                                <td>{{$lead->status == 1? "Accepted": "Rejected"}}</td>
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
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

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