<header class="Header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('process.form') }}">Start a process</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user_tasks.index') }}">User tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('variables.index') }}">Variables</a>
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('variables.index') }}">Variables list</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('variables.create') }}">Create variable</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
