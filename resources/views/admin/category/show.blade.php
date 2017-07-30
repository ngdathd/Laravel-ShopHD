@extends('layouts.admin')
@section('title')
    Category | ShopDHT
@endsection
@section('username')
    Admin
    {{--ten nguoi dung--}}
@endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}">
                        <svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg>
                    </a></li>
                <li class="active">Category</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category Table</h1>
            </div>
        </div>

        @if(Session::has('success'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert bg-success" role="alert">
                        <svg class="glyph stroked checkmark">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use>
                        </svg>
                        {{ Session::get('success') }}
                        <a href="#" class="pull-right">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('admin/category/create') }}" class="btn">Create New</a>
                        {{--them moi--}}
                    </div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="fixed-table-toolbar">
                                {!! Form::open(['method' => 'GET', 'url' => 'admin/category']) !!}
                                <div class="columns btn-group pull-right">
                                    <button class="btn btn-default" type="submit" name="search" title="Search">
                                        <i class="glyphicon glyphicon-search icon-search"> </i>
                                    </button>
                                </div>
                                <div class="pull-right search">
                                    <input type="text" class="form-control" name="keyword"
                                           @if(Request::has('keyword'))
                                           value="{{ Request::get('keyword') }}"
                                           @endif
                                           placeholder="Search">
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="fixed-table-container">
                                <div class="fixed-table-header">
                                    <table></table>
                                </div>
                                <div class="fixed-table-body">
                                    <div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please
                                        wait…
                                    </div>
                                    <table data-toggle="table"
                                           data-show-refresh="true"
                                           data-show-toggle="true"
                                           data-show-columns="true"
                                           data-search="true"
                                           data-select-item-name="toolbar1"
                                           data-pagination="true"
                                           data-sort-name="name"
                                           data-sort-order="desc"
                                           class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th class="bs-checkbox " style="width: 36px; ">
                                                <div class="th-inner "><input name="btSelectAll" type="checkbox"></div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="">
                                                <div class="th-inner sortable">No.</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="">
                                                <div class="th-inner sortable">Category</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="">
                                                <div class="th-inner sortable">Action</div>
                                                <div class="fht-cell"></div>
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($categories)
                                            @foreach($categories as $key => $item)
                                                <tr>
                                                    <td class="bs-checkbox " style="width: 36px; ">
                                                        <div class="th-inner "><input name="btSelectAll"
                                                                                      type="checkbox"></div>
                                                        <div class="fht-cell"></div>
                                                    </td>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>
                                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/category' , $item->id]]) !!}
                                                        <button type="button" class="btn">
                                                            <a href="{{ url('admin/category/'.$item->id.'/edit') }}">Edit</a>
                                                        </button>
                                                        <button type="submit" class="btn"
                                                                onclick="return confirm('Are you sure?');"> Delete
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection