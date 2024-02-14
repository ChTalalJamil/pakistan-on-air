@extends('layouts.master')
@section('title')
Dashboard
@endsection
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Dashboard</h1>
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
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$categories->count()}}</h3>

                        <p>Total category</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-videocamera"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$videos->count()}}
                        </h3>

                        <p>Videos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion ion-film-marker"></i>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection



@section('script')
<script type="text/javascript">
    $(function() {

    });
</script>
@endsection