@extends('layouts.exam')

@section('content')
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
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script>
        $(document).ready(function () 
        {
        $(".examslist").select2({
            maximumSelectionLength: 2
        });

        $('#hall').select2()

        });

</script>
