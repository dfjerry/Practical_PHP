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
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Book Name</th>
            <th scope="col">Author</th>
            <th scope="col">Available</th>
            <th scope="col">ISBN</th>
            <th scope="col">Publishing Year</th>
        </tr>
        </thead>
        <tbody>
        @foreach($book1 as $book)
            <tr>
                <th scope="row">{{$book->__get("id")}}</th>
                <td>{{$book->__get("title")}}</td>
                <td>{{$book->__get("author_id")}}</td>
                <td>{{$book->__get("available")}}</td>
                <td>{{$book->__get("ISBN")}}</td>
                <td>{{$book->__get("pub_year")}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
