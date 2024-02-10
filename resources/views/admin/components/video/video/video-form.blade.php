@extends('layouts.master')
@section('title')
New Lead
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Videos</h1>
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
                <form action="/admin/get-videos" method="post">
                    @csrf

                    <div class="row">
                        <div class="form-group col-4">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                            @error('name')
                            <p style="color:red;font-size: 15px;">*{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label>Link</label>
                            <input type="text" name="link" class="form-control" placeholder="Paste Link" required>
                        </div>


                        <div class="form-group col-4">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter description" >
                        </div>

                        <div class="form-group col-4">
                            <label>Priority</label>
                            <input type="number" name="priority" class="form-control" placeholder="set priority" >
                        </div>


                        <div class="form-group col-4">
                            <label>Status</label>
                            <select required class="form-control " name="status">
                            <option disabled="disabled" selected="selected">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">In Active</option>

                            </select>
                        </div>


                        <div class="form-group col-4">
                            <label>categories</label>
                            <select required class="form-control " name="category_id">
                                <option disabled="disabled" selected="selected">Select categories</option>
                                @foreach($categories as $obj)
                                <option value="{{$obj->id}}">{{$obj->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <button style="float: right;" class="btn btn-primary" type="submit">Save</button>
                        </div>
                </form>
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