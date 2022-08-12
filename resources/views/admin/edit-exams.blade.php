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
        #updateModalBtn{
            opacity: 0
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
        {{-- <h2 class="mb-4 text-center text-primary font-weight-bold">Update Exam</h2> --}}
        <button id="updateModalBtn" class="btn btn-primary mt-2 mb-3" type="button" data-toggle="modal" data-target="#my-modal">Update Exam</button>
        <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="updateExamForm" class="col-9 mx-auto" action="{{ url('/updateExam'.$exams->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exam_name">Exam Name</label>
                          <input type="text" value="{{ $exams->exam_name }}" class="form-control" name="exam_name" id="exam_name" aria-describedby="emailHelp" style="border: 1px solid;">
                        </div>
                        <div class="form-group">
                          <label for="subject_id">Subject</label>
                          <br>
                                <select name="subject_id" id="subject_id" class="w-100" value="{{ $exams->subject_id }}">
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->subject }}">{{ $subject->subject }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                          <label for="date">Date</label>
                          <input type="date" value="{{ $exams->date }}" class="form-control" name="date" id="date" aria-describedby="emailHelp" style="border: 1px solid;" required min="@php echo date('Y-m-d'); @endphp">
                        </div>
                        <div class="form-group">
                          <input type="time" value="{{ $exams->time }}" class="form-control" name="time" id="time" style="border: 1px solid;">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Update</button>
                      </form>
                </div>
            </div>
        </div>
        {{-- @php
            print_r($exams->exam_name);
            dd();
            @endphp --}}

</div>
    <script>
        $(document).ready(function(){
            // trigger modal
            $("#updateModalBtn").click();
            console.log('modal cliked');
        })
    </script>
    {{-- <script src="{{ url('Assets/js/jquery.min.js') }}"></script> --}}
    <script src="{{ url('Assets/js/popper.js') }}"></script>
    <script src="{{ url('Assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('Assets/js/main.js') }}"></script>
  </body>
</html>
