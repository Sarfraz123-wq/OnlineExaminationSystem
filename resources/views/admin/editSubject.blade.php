<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>

    <form id="editForm" class="col-9 mx-auto" method="POST" action="{{ url('/updateSubject' . $subjectId) }}">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Update Subject</label>
          <input type="text" class="form-control" name="subject" id="exampleInputEmail1" aria-describedby="emailHelp" style="border: 1px solid;" value="{{ $subject->subject }}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
      </form>    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</body>
</html>
