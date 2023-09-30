@extends('layouts.exam')

@section('content')
    <h2>Examhall</h2>

    <form method="POST" action="{{ route( 'examhall.update', $hall->block_id ) }}" id='examform'>
        @csrf
        <div class="form-group">
            <label for="block_name">Block Name : </label>
            <input type="text" required value={{ $hall->block_name  }} class="form-control" name="block_name" id="block_name">
        </div>

        <div class="form-group">

            <label for="hall_no">Hall No : </label>
            <input type="text" required value={{ $hall->hall_no  }} name="hall_no" id="hall_no" class="form-control" >
        </div>

        <div class="form-group">
            <label for="capacity">Total no of seats</label>
            <input type="text" required value={{ $hall->block_capacity  }} class="form-control" id="seat_capacity" name="seat_capacity" >
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
