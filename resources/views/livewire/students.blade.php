<div class="container">
    {{-- Success is as dangerous as failure. --}}
    <div class="d-flex justify-content-between py-4">
        <h1 class="py-2">{{ $class[0]['name'] }} Department</h1>
        <button type="button" class="btn btn-primary align-self-center" data-bs-toggle="modal"
            data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
            Add Students
        </button>
    </div>

    <div class="d-flex justify-content-around">
        <h2 class="align-self-center">QR Code</h2>
        <img
            src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=department_id={{$class[0]['department_id']}}?class_id={{$class[0]['id']}}">
        <a href="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=department_id={{$class[0]['department_id']}}?class_id={{$class[0]['id']}}"
            class="align-self-center btn btn-primary" target="_blank">Download</a>
    </div>
    {{-- Model --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Students
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Add Studnets:</label>
                            <input type="text" wire:model.defer="studentName" class="form-control my-2" id="studentName"
                                placeholder="name" required />
                            @error('studentName') <div>{{ $message }}</div> @enderror
                            <input type="email" wire:model.defer="studentEmail" class="form-control my-2"
                                id="studentEmail" placeholder="email" required />
                            <input type="text" wire:model.defer="studentPassword" class="form-control my-2"
                                id="studentPassword" placeholder="password" required />
                            <input type="date" wire:model.defer="studentDOB" class="form-control my-2" id="studentDOB"
                                placeholder="Date Of Birth" required />

                            <select class="form-select my-2" wire:model.defer="studentGender"
                                aria-label="Default select example">

                                <option selected>Gender</option>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <input type="text" wire:model.defer="studentAddress" class="form-control my-2"
                                id="studentAddress" placeholder="Address" required />
                            <input type="text" wire:model.defer="studentPhoneNumber" class="form-control my-2"
                                id="studentPhoneNumber" placeholder="Phone Number" required />
                            {{-- <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input wire:model.defer="studentProfile" class="form-control" type="file"
                                    id="studentProfile">
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End model --}}

    {{-- classes list --}}
    @if (count($student) === 0)
    <p class="text-center fs-3 py-4">Student not added yet</p>
    @endif

    <ul class="list-group py-4">
        @foreach ($student as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/student/{{$item->id}}"
                class="link-underline link-underline-opacity-0">{{$item['user']['name']}}</a>

            {{-- <button wire:click="delete({{ $item->id }})" type=" button" class="btn btn-danger">
                delete
            </button> --}}
        </li>
        @endforeach
    </ul>
</div>