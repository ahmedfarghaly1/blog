@extends('master.app')

@section('content')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Mumm</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">categories</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">categories</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th class="text-nowrap">actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <th>{{$category->name}}</th>
                                             <th class="text-nowrap">
                                             
                                                    <div class="form-group">
                                                    <a  class="btn btn-info" href="{{route('category.show',[$category->id])}}" data-toggle="tooltip" data-original-title="مشاهدة"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                                        <a  class="btn btn-success" href="{{route('category.edit',[$category->id])}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                        <form action="{{route('category.destroy',[$category->id])}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger" href="{{route('category.destroy',[$category->id])}}" onclick="return confirm('Are you sure?')"> <i class="fa fa-close"></i> </button>
                                                        </form>
                                                    </div>
                                             </th>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->

@endsection
