@extends('layouts.master')
@section('title')
New Lead
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
        <div class="card">
            <div class="card-body">
                <form action="/admin/store-lead" method="post">
                    @csrf

                    <div class="row">
                        <div class="form-group col-4">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Enter first name" required>
                            @error('first_name')
                            <p style="color:red;font-size: 15px;">*{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Enter last name" required>
                            @error('last_name')
                            <p style="color:red;font-size: 15px;">*{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label for="date" class="col-form-label">Phone:</label>
                            <input type="tel" max="16" min="9" placeholder="Enter Phone" required class="form-control" name="phone">
                            @error('phone')
                            <p style="color:red;font-size: 15px;">*{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                            @error('email')
                            <p style="color:red;font-size: 15px;">*{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label>Campaign</label>
                            <select required class="form-control " name="campaign_id">
                                <option disabled="disabled" selected="selected">Select Campaign</option>
                                @foreach($campaign as $obj)
                                <option value="{{$obj->id}}">{{$obj->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <button style="float: right;"  class="btn btn-primary" type="submit">Create</button>
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