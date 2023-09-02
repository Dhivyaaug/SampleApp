 {{-- You can extend your master layout if you have one --}}
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
        <form method="POST" action="{{ url('admin/student/store') }}" id="registration" files='true' enctype="multipart/form-data">
            @csrf {{-- Add the CSRF token --}}

            {{-- Register No --}}
            <div class="form-group">
                <label for="register_no">Register No:</label>
                <input type="text" class="form-control" id="register_no" name="register_no" required>
            </div>

            {{-- Admission No --}}
            <div class="form-group">
                <label for="admission_no">Admission No:</label>
                <input type="text" class="form-control" id="admission_no" name="admission_no" required>
            </div>

            {{-- First Name --}}
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>

            {{-- Last Name --}}
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            {{-- Mobile No --}}
            <div class="form-group">
                <label for="mobile_no">Mobile No:</label>
                <input type="text" class="form-control" id="mobile_no" name="mobile_no" required>
            </div>

            {{-- Class --}}
            <div class="form-group">
                <label for="class">Class:</label>
                <select class="form-control" id="class" name="class" required>
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
                <select class="form-control" id="department" name="department" required>
                <option value="cs">Computer science</option>
                <option value="math">Maths</option>
                <option value="che">Chemistry</option>
                <option value="phy">Physics</option>
                </select>
            </div>

            {{-- Degree --}}
            <div class="form-group">
                <label for="degree">Degree:</label>
                <select class="form-control" id="degree" name="degree" required>
                <option value="ug">UG</option>
                <option value="pg">PG</option>
                </select>
            </div>

            {{-- Batch --}}
            <div class="form-group">
                <label for="batch">Batch:</label>
                <select class="form-control" id="batch" name="batch" required>
                <option value="2021-2024">2021-2024</option>
                <option value="2019-2022">2019-2022</option>
                <option value="2020-2023">2020-2023</option>
                <option value="2023-2026">2023-2026</option>
            </select>
            </div>


            <div class="form-group">
                <label for="batch">Profile Picture :</label>
                <input type="file" class="form-control" required name="profile_pic" id="profile_pic">
            </div>

            {{-- Gender --}}
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
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

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
<script>
    $(document).ready(function () {
        $("#registration").validate({
            rules: {
                register_no: {
                    required: true,
                    maxlength: 255, // You can adjust the maximum length as needed
                },
                admission_no: {
                    required: true,
                    maxlength: 255,
                },
                first_name: {
                    required: true,
                    maxlength: 255,
                },
                last_name: {
                    required: true,
                    maxlength: 255,
                },
                email: {
                    required: true,
                    email: true,
                },
                mobile_no: {
                    required: true,
                    digits: true,
                },
                class: {
                    required: true,
                    maxlength: 255,
                },
                department: {
                    required: true,
                    maxlength: 255,
                },
                degree: {
                    required: true,
                    maxlength: 255,
                },
                batch: {
                    required: true,
                    maxlength: 255,
                },
                gender: {
                    required: true,
                },
                date_of_birth: {
                    required: true,
                },
            },
            messages: {
                // You can customize error messages here if needed
            },
            errorElement: "span",
            errorClass: "text-danger",
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
        });
    });

</script>
</html>


