<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-title">Grupos Familiares</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-bell"></i> Administracion</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('area') }}'><i class='nav-icon la la-question'></i> Areas</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('distrito') }}'><i class='nav-icon la la-question'></i> Distritos</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('grupo') }}'><i class='nav-icon la la-question'></i> Grupos</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('reporte') }}'><i class='nav-icon la la-question'></i> Reportes</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('sector') }}'><i class='nav-icon la la-question'></i> Sectors</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('usuario') }}'><i class='nav-icon la la-question'></i> Usuarios</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('zona') }}'><i class='nav-icon la la-question'></i> Zonas</a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('area') }}'><i class='nav-icon la la-question'></i> Areas</a></li>
