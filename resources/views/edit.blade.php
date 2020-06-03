<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Edit Book</h1>
    <form role="form" action="{{url("/book/save-book")}}" method="post" >
        @method("POST")
        @csrf
        <div class="form-group">
            <input type="text" value="{{$books->__get("title")}}" name="bookname" class="form-control @error("title") is-invalid @enderror"  placeholder="Book Name">
            @error("title")
            <span class="error invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" value="{{$books->__get("author_id")}}" name="author" class="form-control @error("author_id") is-invalid @enderror"  placeholder="Author">
            @error("author_id")
            <span class="error invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" value="{{$books->__get("ISBN")}}" name="ISBN" class="form-control @error("title") is-invalid @enderror" placeholder="ISBN">
            @error("ISBN")
            <span class="error invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" value="{{$books->__get("pub_year")}}" name="pubyear" class="form-control @error("pub_year") is-invalid @enderror" placeholder="Pub year">
            @error("pub_year")
            <span class="error invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" value="{{$books->__get("available")}}" name="available" class="form-control @error("available") is-invalid @enderror" placeholder="Available">
            @error("available")
            <span class="error invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
</body>
</html>
