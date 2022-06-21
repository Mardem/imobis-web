<li class="side-menus {{ Request::is('admin/home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-home"></i><span>Dashboard</span>
    </a>
</li>

<li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="far fa-file-alt"></i><span>Leads</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{ route('leads.index') }}">Todos leads</a></li>
        <li><a class="nav-link" href="{{ route('leads.create') }}">Novo lead</a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class=" fas fa-users"></i><span>Clientes</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{ route('clients.index') }}">Todos clientes</a></li>
        <li><a class="nav-link" href="{{ route('clients.create') }}">Novo cliente</a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class=" fas fa-users"></i><span>Usuários</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{ route('users.index') }}">Todos usuários</a></li>
        <li><a class="nav-link" href="{{ route('users.create') }}">Novo usuário</a></li>
    </ul>
</li>


<li class="side-menus ">
    <a class="nav-link text-danger" href="{{ url('logout') }}" onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
        <i class=" fas fa-sign-out-alt"></i><span>Logout</span>
    </a>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
        {{ csrf_field() }}
    </form>
</li>
