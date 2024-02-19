@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('sub-title')
    <h1 class="m-0"> Dashboard</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $categories->count() }}</h3>

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
                    <h3>{{ $videos->count() }}
                    </h3>

                    <p>Videos</p>
                </div>
                <div class="icon">
                    <i class="ion ion ion-film-marker"></i>
                </div>
            </div>
        </div>
    @endsection



    @section('script')
        <script type="text/javascript">
            $(function() {

            });
        </script>
    @endsection
