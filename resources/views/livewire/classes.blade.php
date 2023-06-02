<div class="container">
    {{-- Success is as dangerous as failure. --}}
    <div class="d-flex justify-content-between py-4">
        <h1 class="py-2">{{ $departmentName[0]["name"] }} Department</h1>
        <button
            type="button"
            class="btn btn-primary align-self-center"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
            data-bs-whatever="@getbootstrap"
        >
            Add Class
        </button>
    </div>

    {{-- Model --}}
    <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Class
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label"
                                >Add Class:</label
                            >
                            <input
                                type="text"
                                wire:model.defer="className"
                                class="form-control"
                                id="recipient-name"
                            />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            wire:click="submit"
                            class="btn btn-primary"
                        >
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End model --}}

    {{-- classes list --}}
    @if (count($class) === 0)
    <p class="text-center fs-3 py-4">Class not added yet</p>
    @endif

    <ul class="list-group py-4">
        @foreach ($class as $item)
        <li
            class="list-group-item d-flex justify-content-between align-items-center"
        >
            <a
                href="/class/{{$item->id}}"
                class="link-underline link-underline-opacity-0"
                >{{$item->name}}</a
            >

            <button
                wire:click="delete({{ $item->id }})"
                type=" button"
                class="btn btn-danger"
            >
                delete
            </button>
        </li>
        @endforeach
    </ul>
</div>
