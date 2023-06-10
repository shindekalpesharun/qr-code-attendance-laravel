<div class="container">
    <div class="d-flex justify-content-between py-4">
        <h1 class="py-2">Teachers</h1>
        <button type="button" class="btn btn-primary align-self-center" data-bs-toggle="modal"
            data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Add Teacher</button>
    </div>

    {{-- Model --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Teacher
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Add Teacher:</label>
                            <input type="text" wire:model.defer="teacherName" class="form-control my-2" id="teacherName"
                                placeholder="name" required />
                            @error('teacherName') <div>{{ $message }}</div> @enderror
                            <input type="email" wire:model.defer="teacherEmail" class="form-control my-2"
                                id="teacherEmail" placeholder="email" required />
                            <input type="text" wire:model.defer="teacherPassword" class="form-control my-2"
                                id="teacherPassword" placeholder="password" required />
                            <input type="date" wire:model.defer="teacherBOD" class="form-control my-2" id="teacherBOD"
                                placeholder="Date Of Birth" required />

                            <select class="form-select my-2" wire:model.defer="teacherGender"
                                aria-label="Default select example" required>

                                <option selected>Gender</option>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <input type="text" wire:model.defer="teacherAddress" class="form-control my-2"
                                id="teacherAddress" placeholder="Address" required />
                            <input type="text" wire:model.defer="teacherPhoneNumber" class="form-control my-2"
                                id="teacherPhoneNumber" placeholder="Phone Number" required />
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

    @if (count($teachers) === 0)
    <p class="text-center fs-3 py-4">Student not added yet</p>
    @endif

    <ul class="list-group py-4">
        @foreach ($teachers as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/teacher/{{$item->id}}"
                class="link-underline link-underline-opacity-0">{{$item['user']['name']}}</a>

            {{-- <button wire:click="delete({{ $item->id }})" type=" button" class="btn btn-danger">
                delete
            </button> --}}
        </li>
        @endforeach
    </ul>

</div>