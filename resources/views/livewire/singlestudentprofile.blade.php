<div class="container">
    <h1 class="my-4">hi {{$student[0]['user']['name']}}</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Profile Information</h4>
                <ul class="list-unstyled">
                    <li><strong>Name:</strong> {{$student[0]['user']['name']}}</li>
                    <li><strong>PRN:</strong> {{$student[0]['permanent_registration_number']}}</li>
                    <li><strong>Email:</strong> {{$student[0]['user']['email']}}</li>
                    <li><strong>Date of Birth:</strong> {{$student[0]['date_of_birth']}}</li>
                    <li><strong>Gender:</strong> {{$student[0]['gender']}}</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4>Contact Information</h4>
                <ul class="list-unstyled">
                    <li><strong>Address:</strong> {{$student[0]['address']}}</li>
                    <li><strong>Phone Number:</strong> {{$student[0]['phone_number']}}</li>
                    <li><strong>Class:</strong> {{$student[0]['class']['name']}}</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <h4>Attendance</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentAttendance as $item)
                <tr>
                    <td>{{$item['created_at']->format('d-m-Y')}}</td>
                    <td>Present</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>