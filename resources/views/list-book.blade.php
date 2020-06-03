<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 style="text-align: center">List Book</h1>
        <form  role="form" action="{{url("/book/search")}}" method="POST"  >
            @method("POST")
            @csrf
            <div class="form-group" style="width: 30%">
                <label for="book">Email address</label>
                <input type="text" name="bookname" class="form-control" id="book" placeholder="Search....">
                <button class="btn btn-dark">Search</button>
            </div>
        </form>
        <a href="{{url('/book/new-book')}}" class="btn btn-outline-dark">New Book</a>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Available</th>
                <th scope="col">ISBN</th>
                <th scope="col">Publishing Year</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{$book->__get("id")}}</th>
                    <td>{{$book->__get("title")}}</td>
                    <td>{{$book->__get("author_id")}}</td>
                    <td>{{$book->__get("available")}}</td>
                    <td>{{$book->__get("ISBN")}}</td>
                    <td>{{$book->__get("pub_year")}}</td>
                    <td>
                        <a href="{{url("/book/edit-book/{$book->__get("id")}")}}" class="btn btn-outline-dark">Edit</a>
                    </td>
                    <td>
                        <form action="{{url("/book/delete-book/{$book->__get("id")}")}}" method="post">
                            @method("DELETE")
                            @csrf
                            {{--                            nếu ko có @csrf tạo mã token sẽ bị lỗi 419--}}
                            <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-outline-dark">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
