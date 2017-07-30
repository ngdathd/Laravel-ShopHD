@extends('layouts.admin')
@section('title')
    Order | ShopDHT
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
                <li class="active">Order</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order Table</h1>
            </div>
        </div>

        {{--code them secsion thong bao--}}

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('admin/product/create') }}" class="btn">Create New</a>
                        {{--them moi--}}
                    </div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="fixed-table-toolbar">
                                <div class="columns btn-group pull-right">
                                    <button class="btn btn-default" type="button" name="refresh" title="Refresh">
                                        <i class="glyphicon glyphicon-refresh icon-refresh"></i>
                                    </button>
                                </div>
                                <div class="pull-right search">
                                    <input class="form-control" placeholder="Search" type="text">
                                </div>
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
                                                <div class="th-inner sortable">ID</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="">
                                                <div class="th-inner sortable">User<span class="order"><span
                                                                class="caret" style="margin: 10px 5px;"></span></span>
                                                </div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="">
                                                <div class="th-inner sortable">Detail<span class="order"><span
                                                                class="caret" style="margin: 10px 5px;"></span></span>
                                                </div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="">
                                                <div class="th-inner sortable">Order Date<span class="order"><span
                                                                class="caret" style="margin: 10px 5px;"></span></span>
                                                </div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="">
                                                <div class="th-inner sortable">Required Date<span class="order"><span
                                                                class="caret" style="margin: 10px 5px;"></span></span>
                                                </div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="">
                                                <div class="th-inner sortable">Action</div>
                                                <div class="fht-cell"></div>
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--code phan sua xoa--}}
                                        {{--dung class="btn" de lam button--}}
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