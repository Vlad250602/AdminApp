<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('table-employees') ? 'active' : '' }}">
        <i class="nav-icon fas fa-male"></i>
        <p>Employees</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('table-positions') }}" class="nav-link {{ Request::is('table-positions') ? 'active' : '' }}">
        <i class="nav-icon fas fa-male"></i>
        <p>Positions</p>
    </a>
</li>
