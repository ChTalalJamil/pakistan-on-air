@extends('layouts.master')
@section('title')
New Lead
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Category</h1>
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
        <div class="card">
            <div class="card-body">

                @isset($videoCategory)
                <form action="{{route('update.category')}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Name</label>
                            <input type="hidden" name="id" class="form-control" placeholder="Enter name" value="{{$videoCategory->id}}" required>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$videoCategory->name}}" required>
                            @error('name')
                            <p style="color:red;font-size: 15px;">*{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter description" value="{{$videoCategory->description}}">
                        </div>

                        <div class="form-group col-6">
                            <label>Meta Tittle</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Enter meta title" value="{{$videoCategory->meta_title}}">
                        </div>

                        <div class="form-group col-6">
                            <label>Meta Description</label>
                            <input type="text" name="meta_description" class="form-control" placeholder="Enter meta description" value="{{$videoCategory->meta_description }}">
                        </div>
                        <div class="col-12">
                            <p style="margin-bottom: 3%;"></p>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-dark"><a style="color: white;" href="{{route('get.categories')}}"> Back </a></button>
                        </div>
                        <div class="col-6"> 
                            <button style="float: right;" class="btn btn-success" type="submit">Update</button>
                        </div>
                    </div>
                </form>
                @else
                <form action="{{route('store.category')}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                            @error('name')
                            <p style="color:red;font-size: 15px;">*{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter description">
                        </div>

                        <div class="form-group col-6">
                            <label>Meta Tittle</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Enter meta title">
                        </div>

                        <div class="form-group col-6">
                            <label>Meta Description</label>
                            <input type="text" name="meta_description" class="form-control" placeholder="Enter meta description">
                        </div>

                        <div class="col-12">
                            <p style="margin-bottom: 3%;"></p>
                        </div>
                        <div class="col-6">
                                <button class="btn btn-dark"><a style="color: white;" href="{{route('get.categories')}}"> Back </a></button>
                            </div>

                        <div class="col-6">
                            <button style="float: right;" class="btn btn-primary" type="submit">Save</button>
                        </div>
                </form>
                @endisset
            </div>
        </div>
    </div>
</section>
</div>

@endsection


@section('script')

<script>

</script>
@endsection