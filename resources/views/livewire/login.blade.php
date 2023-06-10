<div class="container mt-3">
    {{-- Stop trying to control. --}}
    <h1 class="d-flex justify-content-center">Login</h1>
    @error('email')
            <div class="alert alert-danger my-2" role="alert">
                {{ $message }}
            </div>
            {{-- <span class="error">{{ $message }}</span>  --}}
    @enderror
    <form wire:submit.prevent="submit">
        <div class="form-group my-2">
            <label for="exampleInputEmail1">Email address</label>
            <input
                type="email"
                wire:model="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter email"
                required
            />

            <small id="emailHelp" class="form-text text-muted"
                >We'll never share your email with anyone else.</small
            >
        </div>
        <div class="form-group my-2">
            <label for="exampleInputPassword1">Password</label>
            <input
                type="password"
                wire:model="password"
                class="form-control"
                id="exampleInputPassword1"
                placeholder="Password"
                required
            />
            @error('password')
            <span class="error">{{ $message }}</span> @enderror 
            
        </div>
        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>
