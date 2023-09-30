{{-- @extends('layouts.app') Use your layout if you have one --}}
@extends('layouts.exam')
@section('content')
<body>
     @include('layouts.alert')
    <div class="container">
    <h1>Edit Student</h1>
    @php
        // dd($student);
    @endphp
    {!! Form::model($student, ['route' => ['student.update', $student['id']], 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('register_no', 'Register No:') !!}
            {!! Form::text('register_no', $student['register_no'], ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('admission_no', 'Admission No:') !!}
            {!! Form::text('admission_no', $student['admission_no'], ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('first_name', 'First name :') !!}
            {!! Form::text('first_name', $student['first_name'], ['class' => 'form-control', 'required']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('last_name', 'Last name :') !!}
            {!! Form::text('last_name', $student['last_name'], ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email :') !!}
            {!! Form::text('email', $student['email'], ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mobile_no', 'Mobile number :') !!}
            {!! Form::text('mobile_no', $student['mobile_no'], ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            <label for="class">Class:</label>
            <select class="form-control" id="class" name="class" value={{ $student['class'] }} required>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
            <option value="e">E</option>
            </select>
        </div>

        {{-- Department --}}
        <div class="form-group">
            <label for="department">Department:</label>
            <select class="form-control" id="department" value={{ $student['department'] }} name="department" required>
            <option value="1">Computer science</option>
            <option value="2">Maths</option>
            <option value="3">Chemistry</option>
            <option value="4">Physics</option>
            </select>
        </div>

        {{-- Degree --}}
        <div class="form-group">
            <label for="degree">Degree:</label>
            <select class="form-control" id="degree" value={{ $student['degree'] }} name="degree" required>
            <option value="ug">UG</option>
            <option value="pg">PG</option>
            </select>
        </div>

        {{-- Batch --}}
        <div class="form-group">
            <label for="batch">Batch:</label>
            <select class="form-control" id="batch" value={{ $student['batch'] }} name="batch" required>
            <option value="2021-2024">2021-2024</option>
            <option value="2019-2022">2019-2022</option>
            <option value="2020-2023">2020-2023</option>
            <option value="2023-2026">2023-2026</option>
        </select>
        </div>

@php
   $profile_pic =  '';
@endphp
        <div class="form-group">

                <img src="{{ $profile_pic }}"  alt="img" height="100px" width="100px">
        </div>

        {{-- Gender --}}
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" value={{ $student['gender'] }} name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        {{-- Date of Birth --}}
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    {!! Form::close() !!}

    </div>
</body>
    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(function(){
            var data = '<?php echo json_encode($student);?>'
            var response = JSON.parse(data)
            console.log('response : ',response);
            $('#department').select2();
            $('#class').select2();
            $('#batch').select2();
            $('#gender').select2();
            $('#degree').select2();
            $('#department').val(response.department)
            $('#department').trigger('change');
            $('#class').val(response.class)
            $('#class').trigger('change');
            $('#batch').val(response.batch)
            $('#batch').trigger('change');
            $('#gender').val(response.gender)
            $('#gender').trigger('change');
            $('#degree').val(response.degree)
            $('#degree').trigger('change');
            $('#date_of_birth').val(response.date_of_birth);
        })
    </script>


