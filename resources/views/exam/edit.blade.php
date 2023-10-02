@extends('layouts.exam')

@section('content')
    <h2>Exam Registration</h2>

    <form method="POST" action="{{ route( 'exam.update',$exam->exam_id ) }}" id='examform'>
        @csrf
        <div class="form-group">
            <label for="department">Department</label>
            <select class="form-control" id="department" name="department" >
                @foreach ($departments as $department)
                <option value="{{ $department['department_id'] }}">{{ $department['department_name']  }}</option>
                @endforeach
                </select>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" >
        </div>

        <div class="form-group">
            <label for="time">Exam start Time</label>
            <input type="text" name="start_time" id="start_time">
            <label for="time">Exam end Time</label>
            <input type="text" name="end_time" id="end_time">
        </div>

        <div class="form-group">
            <label for="exam_code">Exam Code</label>
            <input type="text" name="exam_code" id="exam_code" class="form-control" >
        </div>

        <div class="form-group">
            <label for="exam_name">Exam name</label>
            <input type="text" name="exam_name" id="exam_name" class="form-control" >
        </div>

        <div class="form-group">
            <label for="session">Session</label>
            <select class="form-control" id="session" name="session" >
                <option value="FN">FN</option>
                <option value="AN">AN</option>
                </select>
        </div>



        <div class="form-group">
            <label for="batch">Batch</label>
            <select class="form-control" id="batch" name="batch" >
                <option value="2021-2023">2021-2023</option>
                <option value="2022-2024">2022-2024</option>
                <option value="2023-2025">2023-2025</option>
            </select>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <select class="form-control" id="year" name="year" >
                <option value="I">I year</option>
                <option value="II">II year</option>
                <option value="III">III year </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

<script>
    $(document).ready(function()
    {

    $('#department').select2();
    $('#session').select2();
    $('#batch').select2();
    $('#year').select2();

    $('#start_time').timepicker({
                showMeridian: true
    });
    $('#end_time').timepicker({
        showMeridian: true
    });

    $("#examform").validate({
            rules: {
                department: "required",
                date: "required",
                start_time: "required",
                end_time: "required",
                exam_code: "required",
                exam_name: "required",
                session: "required",
                batch: "required",
                year: "required",
            },
            messages: {
                department: "Please select a department",
                date: "Please enter a date",
                start_time: "Please enter a start time",
                end_time: "Please enter an end time",
                exam_code: "Please enter an exam code",
                exam_name: "Please enter an exam name",
                session: "Please select a session",
                batch: "Please select a batch",
                year: "Please select a year",
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });


    })
</script>





