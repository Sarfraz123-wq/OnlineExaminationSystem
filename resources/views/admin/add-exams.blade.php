<!doctype html>
<html lang="en">
  <head>
  	<title>OES Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <a href="/admin/dashboard"><span class="fa fa-home mr-3"></span> Subjects</a>
        </li>
        <li>
            <a href="/exams"><span class="fa fa-user mr-3"></span> Exams</a>
        </li>
          <li>
              <a href="/logout"><span class="fa fa-user mr-3"></span> Logout</a>
          </li>

        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-center text-primary font-weight-bold">Add Exams</h2>
        <button class="btn btn-primary mt-2 mb-3" type="button" data-toggle="modal" data-target="#my-modal">Add Exam</button>
        <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="examForm" class="col-9 mx-auto">
                        @csrf
                        <div class="form-group">
                          <label for="examInput">Add Exam</label>
                          <input type="text" class="form-control" name="exam" id="examInput" aria-describedby="emailHelp" style="border: 1px solid;">
                          <select name="subject_id" id="">
                              @foreach($subjects as $subject)
                                <option value="{{ $subject->subject_id }}"> {{ $subject->subject_name }} </option>
                              @endforeach
                            </select>
                            <input type="date" name="date">
                            <input type="time" name="time">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Add</button>
                      </form>
                </div>
            </div>
        </div>
        {{-- delete exam modal --}}
        <div id="deleteExamModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="examDeleteForm" class="col-9 mx-auto">
                        @csrf
                        <div class="form-group">
                          <label for="examInput">Delete Exam</label>
                         <p>
                            Do you really want to delete this exam?
                         </p>
                          <input type="hidden" id="deleteHiddenInput">
                        </div>
                        <button type="submit" class="btn btn-danger mb-2" id="deleteExamModalBtn">Delete</button>
                      </form>
                </div>
            </div>
        </div>
        @if (count($exams) < 1)
            <div class="mb-2">
                <h5> No exams schedule yet, Whoooo.. Enjoy! </h5>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Exam Name </th>
                    <th> Subject </th>
                    <th> Date </th>
                    <th> Time </th>
                    <th> Delete </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exams as $exam)
                <tr>
                    <td> {{ $exam->id }} </td>
                    <td> {{ $exam->exam_name }} </td>
                    <td> {{ $exam->subjects[0]['subject_name'] }} </td>
                    <td> {{ $exam->date }} </td>
                    <td> {{ $exam->time }} </td>
                    <td>
                        <button class="btn btn-danger examDeleteBtn" data-id="{{ $exam->id }}" type="button" data-toggle="modal" data-target="#deleteExamModal">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

        <script>
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        </script>
        <script>

            $(document).ready(function(){
                $('#examForm').submit(function(e){
                    e.preventDefault();
                    var formData = $(this).serialize();
                    console.log(formData);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('addExam') }}",
                        data: formData,
                        success: function(data){
                            if(data.success == true){
                                location.reload();
                            }
                            else{
                                alert(data.msg)
                            }
                        }

                    })
                });
            })
            // delete exam
            $('.examDeleteBtn').click(function(){
                var examId = $(this).attr('data-id');
                // $('#deleteHiddenInput').val(examId);
                $('#examDeleteForm').submit(function(e){
                    e.preventDefault();
                    // var formData = examId;
                    $.ajax({
                    url: "{{ route('deleteExam') }}",
                    type: "get",
                    data: {id:examId},
                    success: function(data){
                        if(data.success == true){
                            location.reload();
                        }
                        else{
                            alert(data.msg);
                        }
                    }
                });
                })
            })

        </script>
    <script src="{{ url('Assets/js/popper.js') }}"></script>
    <script src="{{ url('Assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('Assets/js/main.js') }}"></script>
  </body>
</html>
