@extends('layouts.admin')
@section('title') Create User @endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <svg class="glyph stroked home">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use>
                        </svg>
                    </a></li>
                <li><a href="{{ url('admin/user') }}">User</a></li>
                <li class="active">Create</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create New User</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">New User</div>

                    <div class="panel-body">
                        <div class="col-md-6">
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/user', 'role' => 'form']) !!}
                            @include('admin.user.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div>
    </div>
@endsection