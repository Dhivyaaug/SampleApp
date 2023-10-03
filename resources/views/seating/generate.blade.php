@extends('layouts.exam')

@section('content')
    @include('layouts.alert')
    <h2>Generate Seating Arrangement</h2>

    <form method="POST" action="{{ route('seating.create') }}" id='examform'>
        @csrf
        <div class="form-group">
            <label for="block_name">Choose Exam : </label>
            <select class="form-control examslist" multiple="multiple" id="exam" name="exam" required>
            <option value="0"> -- Select Exam --</option>
            @if(count($response['exams']) > 0 )
            @foreach($response['exams'] as $exam)
                <option value="{{ $exam['exam_id'] }} "> {{ $exam['exam_code'] }} - {{ $exam['exam_name'] }}</option>
            @endforeach
            @endif
            </select>
        </div>

        <div class="form-group mt-2 mb-3">

            <label for="hall_no">Choose Hall : </label>
            <select class="form-control" id="hall" name="hall" required>
            <option value="0"> -- Select ExamHall --</option>
            @if(count($response['halls']) > 0 )
            @foreach($response['halls'] as $hall)
                <option value="{{ $hall['block_id'] }} ">{{ $hall['block_name'] }}</option>
            @endforeach
            @endif
            </select>
        </div>

        <!-- <div class="form-group">
            <label for="capacity">Total no of seats</label>
            {{-- <input type="text" required value={{ $hall->block_capacity  }} class="form-control" id="seat_capacity" name="seat_capacity" > --}}
        </div> -->

        <button type="submit" class="btn btn-primary"> Generate </button>
    </form>


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
    
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
        $(document).ready(function () 
        {
        $(".examslist").select2({
            maximumSelectionLength: 2
        });

        $('#hall').select2()

        });

</script>
