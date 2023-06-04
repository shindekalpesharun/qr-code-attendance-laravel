<div class="container">
    <h1>Lectures</h1>

    <div class="d-flex justify-content-around">
        @if($lecture_status=="between")
        <h2 class="align-self-center">QR Code</h2>
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=lecture_id={{$lecture_id}}">
        <a href="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=lecture_id={{$lecture_id}}"
            class="align-self-center btn btn-primary" target="_blank">Download</a>
        @elseif($lecture_status=="isBefore")
        // Code to be executed if the previous condition is false and this condition is true
        <h2 class="align-self-center">Not Start Yet Lecture</h2>
        @else
        <h2 class="align-self-center">Endeed Lecture</h2>
        @endif



    </div>

    <h3>Attendace Students</h3>
</div>