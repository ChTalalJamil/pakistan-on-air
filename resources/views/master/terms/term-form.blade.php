@extends('layouts.master')
@section('title')
    New Terms and Conditions
@endsection


@section('sub-title')
    <h1 class="m-0"> Terms and Conditions</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            @isset($category)
                <form action="{{ route('update.terms') }}" method="post">
                    @csrf

                    <div class="row">
                       
                        <div class="col-12">
                            <p style="margin-bottom: 3%;"></p>
                        </div>

                        <div class="col-6">
                            <button class="btn btn-dark"><a style="color: white;" href="{{ route('get.terms') }}">
                                    Back </a></button>
                        </div>
                        <div class="col-6">
                            <button style="float: right;" class="btn btn-success" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            @else
                <form action="{{ route('store.terms') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div id="summernote">Hello Summernote</div>
                        </div>
                        <div class="col-12">
                            <p style="margin-bottom: 3%;"></p>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-dark">
                                <a style="color: white;" href="{{ route('get.terms') }}">
                                    Back
                                </a>
                            </button>
                        </div>

                        <div class="col-6">
                            <button style="float: right;" class="btn btn-primary" type="submit">Save</button>
                        </div>

                    </div>
                </form>
            @endisset
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });

        // var html = $('#summernote').summernote('code');

    </script>
@endsection
