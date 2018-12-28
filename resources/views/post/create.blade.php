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
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Post </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{isset($post) && $post !==null ? route('post.update',[$post->id]):route('post.store')}}" method="POST" enctype="multipart/form-data">
                                    @if(isset($post) && $post !==null )
                                    <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <h3 class="card-title">post Information</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> title</label>
                                                    <input type="text" class="form-control" name="title" required value="{{isset($post) && $post !==null ? $post->title:old('title')}}">
                                                    @if ($errors->has('title'))
                                                        <div class="error">{{ $errors->first('title') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Description</label>
                                                    <input type="text" class="form-control" name="description" required value="{{isset($post) && $post !==null ? $post->description:old('description')}}">
                                                    @if ($errors->has('description'))
                                                        <div class="error">{{ $errors->first('description') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Category</label>
                                                    <select class="form-control custom-select" name="category">
                                                            <option value="main" selected> Select category</option>
                                                            @foreach($categories as $key => $category)
                                                                <option value="{{$category->id}}" {{isset($post) && $post !==null && $post->category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" class="form-control" name="image"  value="{{isset($post) && $post !==null ? $post->image:old('image')}}">
                                                    @if ($errors->has('image'))
                                                        <div class="error">{{ $errors->first('image') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Content</label>
                                                    <textarea class="form-control" name="content" required id="" cols="30" rows="10">{{isset($post) && $post !==null ? $post->content:old('content')}}</textarea>
                                                    @if ($errors->has('content'))
                                                        <div class="error">{{ $errors->first('content') }}</div>
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
