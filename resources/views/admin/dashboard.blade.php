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
            <a href="#"><span class="fa fa-home mr-3"></span> Subjects</a>
        </li>
        <li>
            <a href="#"><span class="fa fa-user mr-3"></span> Exams</a>
        </li>
          <li>
              <a href="/logout"><span class="fa fa-user mr-3"></span> Logout</a>
          </li>

        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-center text-primary font-weight-bold">Add Subjects</h2>
        <button class="btn btn-primary mt-2 mb-3" type="button" data-toggle="modal" data-target="#my-modal">Add Subjects</button>
        <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="subjectForm" class="col-9 mx-auto">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Add Subject</label>
                          <input type="text" class="form-control" name="subject" id="exampleInputEmail1" aria-describedby="emailHelp" style="border: 1px solid;">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                      </form>
                </div>
            </div>
        </div>
        {{-- showing subjects --}}
        @if (count($subjects) == 0)
        <h5 class="mt-4">
            Subjects not found
        </h5>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                <tr>
                    <td>
                        {{ $subject->subj_id }}
                    </td>
                    <td>
                        {{ $subject->subj_name }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            </tbody>
        </table>
        </div>
    <script>
         $(document).ready(function(){
          $("#subjectForm").submit(function(e){
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
            type: 'POST',
            url: "{{ route('addSubject') }}",
            data: formData,
            // dataType: 'json',
            success: function(data){
                console.log(data);
                if(data.success == true){
                    location.reload();
                    // hide modal
                    // $('#my-modal').modal('hide');
                }
                else{
                    alert(data=>msg);
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
