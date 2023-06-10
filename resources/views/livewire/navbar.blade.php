<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">QR Code Attendace System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/management">Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/teacher">Teacher</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/students">Students</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/report">Report</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/about">About us</a>
                    </li>
                </ul>
                @auth
                <div class="nav-item dropdown px-4">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome, {{ $user->name }}!
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Profile</a>
                        </li>
                    </ul>
                </div>
                <livewire:logout-button />
                @else
                <a class="active p-2 link-underline link-underline-opacity-0" aria-current="page" href="login">Login</a>
                <a class="active p-2 link-underline link-underline-opacity-0" aria-current="page" href="signup">Sign
                    up</a>
                @endauth
            </div>
        </div>
    </nav>
</div>