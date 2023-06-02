<div class="container">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <h1 class="d-flex justify-content-center my-4">Sign up</h1>
    <form wire:submit.prevent="submit">
        <div class="form-group my-2">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" wire:model="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter name" />
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group my-2">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" wire:model="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter email" />
            @error('email') <span class="error">{{ $message }}</span> @enderror
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group my-2">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" wire:model="password" class="form-control" id="exampleInputPassword1"
                placeholder="Password" />
            @error('password')
            <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>