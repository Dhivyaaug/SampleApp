{{-- @extends('layouts.app') Use your layout if you have one --}}
@include('layouts.studentlink')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        @include('layouts.alert')
    <div class="container">
    <h1>Student List</h1>

    <!-- Display a table of student records -->
    <table class="table">
        <thead>
            <tr>
                <th>s.no</th>
                <th>Register No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach($students as $student)
                <tr>

                    <td>{{ $count }}</td>
                    <td>{{ $student->register_no }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        <a data-id='{{  $student->id }}'  class="btn btn-danger deleteuser">Delete</a>
                    </td>
                </tr>
                @php
                $count++;
               @endphp
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}
    </div>
    <script>
         $(function(){

            $('.deleteuser').click(function(){
               if(confirm('Are you sure you want to delete?'))
               {
                deleteUser($(this).data('id'))
               }
         });
        });

        function deleteUser(id)
        {
            $.ajax({
                type: 'GET',
                url: `student/delete/${id}`, // Replace with your API endpoint
                success: function(data) {
                  if(data)
                  {
                    location.reload()
                  }
                },
                error: function(error) {
                    // Handle errors here
                    $('#result').html('Error: ' + error.statusText);
                }
            });
        }
    </script>
</body>
</html>

