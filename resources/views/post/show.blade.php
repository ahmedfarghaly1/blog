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
                    <h3 class="text-themecolor">Mumm </h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Posts</a></li>
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
                                <h4 class="card-title">Post Inofrmation</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>

                                                <th>title : {{$post->title}}</th>
                                                <th>description : {{$post->description}}</th>
                                                <th>category : {{$post->get_category->name}}</th>
                                                <th>content : {{$post->content}}</th>
                                                <th><img style="width:100px;height:100px;" src="{{url('/images/posts/'.$post->image)}}"></th>


                                            </tr>
                                        </thead>
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
