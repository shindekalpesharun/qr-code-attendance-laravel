<div class="container">
    {{-- Success is as dangerous as failure. --}}
    <div class="d-flex justify-content-between py-4">
        <h1 class="py-2">Management</h1>
        <button type="button" class="btn btn-primary align-self-center" data-bs-toggle="modal"
            data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Add Department</button>
    </div>

    {{-- Model --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Department</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Add Department:</label>
                            <input type="text" wire:model.defer="departmentName" class="form-control"
                                id="recipient-name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End model --}}


    {{-- department list --}}
    @if (count($departments) === 0)
    <p class="text-center fs-3 py-4">Department not added yet</p>
    @endif

    <ul class="list-group py-4">
        @foreach ($departments as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/department/{{$item->id}}" class="link-underline link-underline-opacity-0">{{$item->name}}</a>


        </li>
        @endforeach
    </ul>


</div>