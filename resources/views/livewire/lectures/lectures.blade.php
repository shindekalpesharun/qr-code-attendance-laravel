<div class="container">
    <h1>Lectures</h1>

    <div class="d-flex justify-content-around">
        @if($lecture_status=="between")
        <h2 class="align-self-center">QR Code</h2>
        <img
            src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=lecture_id={{
                $lecture_id
            }}"
        />
        <a
            href="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=lecture_id={{
                $lecture_id
            }}"
            class="align-self-center btn btn-primary"
            target="_blank"
            >Download</a
        >
        @elseif($lecture_status=="isBefore")
        <h2 class="align-self-center">Not Start Yet Lecture</h2>
        @else
        <h2 class="align-self-center">Endeed Lecture</h2>
        @endif
    </div>

    <h3>Attendace Students</h3>
    {{-- department list --}}
    @if (count($attendances) === 0)
    <p class="text-center fs-3 py-4">Attendace not added yet</p>
    @endif

    <ul class="list-group py-4">
        @foreach ($attendances as $item)
        <li
            class="list-group-item d-flex justify-content-between align-items-center"
        >
            <a
                href="/student/{{$item->user->id}}"
                class="link-underline link-underline-opacity-0"
                >{{$item->user->name}} - {{$item->created_at}}</a
            >
        </li>
        @endforeach
    </ul>
</div>
