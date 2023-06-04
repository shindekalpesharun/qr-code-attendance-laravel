<div class="container mt-3">
    <h4>Attendance</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Department</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($latestAttendance as $index => $item)
            <tr>
                <td>{{$item['user']['name']}}</td>
                <td>{{$item['student']['class']['name']}}</td>
                <td>{{$item['student']['class']['department']['name']}}</td>
                <td>{{$item['created_at']->format('d-m-Y')}}</td>
                <td>Present</td>
            </tr>
            @endforeach
            {{-- {{ $latestAttendance->links() }} --}}

        </tbody>
    </table>
</div>