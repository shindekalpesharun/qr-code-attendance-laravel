<div class="container">
    {{-- Filter --}}
    <div class="my-2">
        <h2>Report</h2>
        <form>
            <div class="row mb-2">
                <div class="col">
                    <select
                        class="form-select my-2"
                        wire:model="selectedDepartment"
                        aria-label="Default select example"
                        required
                    >
                        <option selected>Select Departments</option>
                        @foreach ($departments as $item)
                        <option value="{{ $item['id'] }}" selected>
                            {{ $item["name"] }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select
                        class="form-select my-2"
                        wire:model="selectedClass"
                        aria-label="Default select example"
                        required
                    >
                        <option selected>Select Class</option>
                        @isset($selectedDepartment) @foreach ($classes as $item)
                        <option value="{{ $item['id'] }}" selected>
                            {{ $item["name"] }}
                        </option>
                        @endforeach @endisset
                    </select>
                </div>
                {{-- <div class="col">
                    <select
                        class="form-select my-2"
                        wire:model="selectedSubject"
                        aria-label="Default select example"
                    >
                        <option selected>Select Subject</option>
                        @isset($selectedClass) @foreach ($subject as $item)
                        <option value="{{ $item['id'] }}" selected>
                            {{ $item["subject_name"] }}
                        </option>
                        @endforeach @endisset
                    </select>
                </div> --}}
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Department</th>
                <th>Percentage</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $student) @php $totalLectures =
            $student->attendances->count(); $attendedLectures =
            $student->attendances->where('status', 'Present')->count();
            $attendancePercentage = ($attendedLectures / $totalLectures) * 100;
            $status = $attendancePercentage < 75 ? "Defaulter" : "Normal"
            @endphp
            <tr>
                <td>{{$student->user->name}}</td>
                <td>{{$student->class->name}}</td>
                <td>{{$student->class->department->name}}</td>
                <td>{{ $attendancePercentage }}</td>
                <td>{{ $status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$selectedSubject}}
</div>
