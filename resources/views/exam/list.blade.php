@extends('layouts.exam')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@section('content')
    @include('layouts.alert')
    <div class="container">
    <h1>Exam List</h1>

    <!-- Display a table of student records -->
    <table class="table">
        <thead>
            <tr>
                <th>s.no</th>
                <th>Department</th>
                <th>Exam Code</th>
                <th>Exam Name</th>
                <th>Exam Date</th>
                <th>Session</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach($exams as $exam)
                <tr>

                    <td>{{ $count }}</td>
                    <td>{{ $exam->department_name }}</td>
                    <td>{{ $exam->exam_code }}</td>
                    <td>{{ $exam->exam_name }}</td>
                    <td>{{ $exam->exam_date }}</td>
                    <td>{{ $exam->session }}</td>
                    <td>{{ $exam->year }}</td>
                    <td>
                        <a href="{{ route('exam.edit', $exam->exam_id) }}" class="btn btn-primary">Edit</a>
                        <a data-id='{{  $exam->exam_id }}'  class="btn btn-danger deleteuser">Delete</a>
                    </td>
                </tr>
                @php
                $count++;
               @endphp
            @endforeach
        </tbody>
    </table>
    {{ $exams->links() }}
    </div>
    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
</html>
