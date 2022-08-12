{{-- <a href="{{ url('/logout') }}">
    Logout
</a> --}}
<!doctype html>
<html lang="en">
  <head>
  	<title>OES Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ url('Assets/css/style.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
        .modal-content{
            display: grid;
            align-items: center;
            height: 40%;
        }

    </style>


    </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">

				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="index.html" class="logo">Project Name</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{ url('/admin/dashboard') }}"><span class="fa fa-home mr-3"></span> Subjects</a>
        </li>
        <li>
            <a href="/adminExam"><span class="fa fa-user mr-3"></span> Exams</a>
        </li>
          <li>
              <a href="/logout"><span class="fa fa-user mr-3"></span> Logout</a>
          </li>
          {{-- <li>
            <a href="#"><span class="fa fa-sticky-note mr-3"></span> Friends</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-sticky-note mr-3"></span> Subcription</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Settings</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li> --}}
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-center text-primary font-weight-bold">Add Exams</h2>
        <button class="btn btn-primary mt-2 mb-3" type="button" data-toggle="modal" data-target="#my-modal">Add Exam</button>
        <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="examForm" class="col-9 mx-auto" action="{{ url('/adminExam') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exam_name">Exam Name</label>
                          <input type="text" class="form-control" name="exam_name" id="exam_name" aria-describedby="emailHelp" style="border: 1px solid;">
                        </div>
                        <div class="form-group">
                          <label for="subject_id">Subject</label>
                          <br>
                                <select name="subject_id" id="subject_id" class="w-100">
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->subject }}">{{ $subject->subject }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                          <label for="date">Date</label>
                          <input type="date" class="form-control" name="date" id="date" aria-describedby="emailHelp" style="border: 1px solid;" required min="@php echo date('Y-m-d'); @endphp">
                        </div>
                        <div class="form-group">
                          <input type="time" class="form-control" name="time" id="time" style="border: 1px solid;">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Add</button>
                      </form>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
          <tr>
            <th>ID</th>
            <th>Exam Name</th>
            <th>Subjest Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($exams as $exam)
        <tr>
            <td> {{ $exam->id }} </td>
            <td> {{ $exam->exam_name }} </td>
            <td> {{ $exam->subject_id }} </td>
            <td> {{ $exam->date }} </td>
            <td> {{ $exam->time }} </td>
            <td> <a href="{{ route('editExam',["id"=>$exam->id]) }}"> <button class="btn btn-primary">Edit</button> </a> </td>
            <td> <a href="{{ route('deleteExam',["id"=>$exam->id]) }}"> <button class="btn btn-danger">Delete</button> </a> </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

    {{-- <script src="{{ url('Assets/js/jquery.min.js') }}"></script> --}}
    <script src="{{ url('Assets/js/popper.js') }}"></script>
    <script src="{{ url('Assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('Assets/js/main.js') }}"></script>
  </body>
</html>
