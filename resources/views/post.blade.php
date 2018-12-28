<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mumm Task</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Mumm Task</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      @foreach($categories as $category)
      <li><a href="{{route('postCategory',['id'=>$category->id])}}">{{$category->name}}</a></li>
      @endforeach
    </ul>
  </div>
</nav>
  
<div class="container">
<div class="row">
        <div class="col-sm-12">
        <img src="{{url('/images/posts/'.$post->image)}}" class="img-responsive" style="width:100%; height:200px;" alt="Image">
        <h6>title: {{$post->title}}</h6>
        <h6>category: {{$post->get_category->name}}</h6>
        <p>description: {{$post->description}}</p>
        <p>content: {{$post->content}}</p>
        </div>
    </div>
</div>

</body>
</html>
