<div class="container">
    <h1 class="my-4">hi {{ $teacher[0]["user"]["name"] }}</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Profile Information</h4>
                <ul class="list-unstyled">
                    <li>
                        <strong>Name:</strong> {{ $teacher[0]["user"]["name"] }}
                    </li>
                    <li>
                        <strong>Email:</strong>
                        {{ $teacher[0]["user"]["email"] }}
                    </li>
                    <li>
                        <strong>Date of Birth:</strong>
                        {{ $teacher[0]["date_of_birth"] }}
                    </li>
                    <li>
                        <strong>Gender:</strong> {{ $teacher[0]["gender"] }}
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4>Contact Information</h4>
                <ul class="list-unstyled">
                    <li>
                        <strong>Address:</strong> {{ $teacher[0]["address"] }}
                    </li>
                    <li>
                        <strong>Phone Number:</strong>
                        {{ $teacher[0]["phone_number"] }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Add Lecture --}}
    <div class="my-2">
        <h2>Lectures</h2>
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
                <div class="col">
                    <select
                        class="form-select my-2"
                        wire:model="selectedSubject"
                        aria-label="Default select example"
                        required
                    >
                        <option selected>Select Subject</option>
                        @isset($selectedClass) @foreach ($subject as $item)
                        <option value="{{ $item['id'] }}" selected>
                            {{ $item["subject_name"] }}
                        </option>
                        @endforeach @endisset
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-group">
                        <label for="startTime">Start Time</label>
                        <input
                            type="datetime-local"
                            wire:model="startTime"
                            class="form-control"
                            id="startTime"
                            required
                        />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="endTime">End Time</label>
                        <input
                            type="datetime-local"
                            wire:model="endTime"
                            class="form-control"
                            id="endTime"
                            required
                        />
                    </div>
                </div>
            </div>
            <button type="button" wire:click="submit" class="btn btn-primary">
                Add Lecture
            </button>
        </form>
    </div>

    {{-- classes list --}}
    @if (count($lecturesList) === 0 )
    <p class="text-center fs-3 py-4">Lecture not added yet</p>
    @endif

    {{-- TODO: list curr datetime wise --}}
    <ul class="list-group py-4">
        @foreach ($lecturesList as $item)
        <li class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                    <a
                        href="/lecture/{{$item->id}}"
                        class="link-underline link-underline-opacity-0"
                        >{{$item->subject->subject_name}}</a
                    >
                </h5>
                {{--
                <button class="btn btn-danger delete-btn">Delete</button> --}}
            </div>
            <p class="mb-1">
                {{$item->subject->class->name}} -
                {{$item->subject->class->department->name}}
            </p>
            <p class="mb-1">{{$item->start_time}} - {{$item->end_time}}</p>
        </li>

        @endforeach
    </ul>
</div>
