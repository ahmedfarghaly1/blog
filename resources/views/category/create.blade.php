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
                    <h3 class="text-themecolor">mumm</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Companies</a></li>
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
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add category </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{isset($category) && $category !==null ? route('category.update',[$category->id]):route('category.store')}}" method="POST" enctype="multipart/form-data">
                                    @if(isset($category) && $category !==null )
                                    <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <h3 class="card-title">category Information</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">category name</label>
                                                    <input type="text" class="form-control" name="name" required value="{{isset($category) && $category !==null ? $category ->name:old('name')}}">
                                                    @if ($errors->has('name'))
                                                        <div class="error">{{ $errors->first('name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                  
                                       
    
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> اضافة</button>
                                        <a href="{{url()->previous()}}" class="btn btn-inverse ">الغاء</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->

@endsection
