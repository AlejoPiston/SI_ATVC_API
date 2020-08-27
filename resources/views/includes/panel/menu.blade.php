@if (auth()->user()->Tipo == 'administrador')

<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="@yield('nav-link Inicio')" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Inicio</span>
        </a>
    </li>
</ul>
@elseif(auth()->user()->Tipo == 'tecnico')
@else {{-- Cliente --}}
@endif

<!-- Divider -->
<hr class="my-3">
<h6 class="navbar-heading p-0 text-muted">
@if (auth()->user()->Tipo == 'administrador')
<span class="docs-normal">Gestionar datos</span>
@elseif(auth()->user()->Tipo == 'tecnico')
<span class="docs-normal">Menú</span>
@else {{-- Cliente --}}
<span class="docs-normal">Menú</span>
@endif
</h6>
<!-- Nav items -->

    

<ul class="navbar-nav">

@if (auth()->user()->Tipo == 'administrador')

<li class="nav-item">
    <a class="@yield('nav-link OT')" href="{{ url('/orden_trabajos') }}">
    <i class="ni ni-delivery-fast text-green"></i>
    <span class="nav-link-text">Órdenes de trabajo</span>
    </a>
</li>
{{-- 
<li class="nav-item">
    <a class="nav-link" href="examples/map.html">
    <i class="ni ni-support-16 text-red"></i>
    <span class="nav-link-text">Instalaciones</span>
    </a>
</li>
--}}
<li class="nav-item">
    <a class="@yield('nav-link Administradores')" href="{{ url('/administradores') }}">
    <i class="ni ni-single-02 text-blue"></i>
    <span class="nav-link-text">Administradores</span>
    </a>
</li>
<li class="nav-item">
    <a class="@yield('nav-link Tecnicos')" href="{{ url('/tecnicos') }}">
    <i class="ni ni-user-run text-orange"></i>
    <span class="nav-link-text">Técnicos</span>
    </a>
</li>
<li class="nav-item">
    <a class="@yield('nav-link Clientes')" href="{{ url('/clientes') }}">
    <i class="ni ni-circle-08 text-pink"></i>
    <span class="nav-link-text">Clientes</span>
    </a>
</li>
{{-- 
<li class="nav-item">
    <a class="nav-link" href="examples/profile.html">
    <i class="ni ni-active-40 text-yellow"></i>
    <span class="nav-link-text">Sistema experto</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="examples/tables.html">
    <i class="ni ni-notification-70 text-purple"></i>
    <span class="nav-link-text">Notificaciones</span>
    </a>
</li>
--}}
    
@elseif(auth()->user()->Tipo == 'tecnico')
<li class="nav-item">
    <a class="@yield('nav-link Inicio')" href="{{ route('home') }}">
    <i class="ni ni-tv-2 text-primary"></i>
    <span class="nav-link-text">Inicio</span>
    </a>
</li>
<li class="nav-item">
    <a class="@yield('nav-link MOT')" href="{{ url('/orden_trabajos') }}">
    <i class="ni ni-delivery-fast text-green"></i>
    <span class="nav-link-text">Mis órdenes de trabajo</span>
    </a>
</li>

    
@else {{-- Cliente --}}
<li class="nav-item">
    <a class="@yield('nav-link Inicio')" href="{{ route('home') }}">
    <i class="ni ni-tv-2 text-primary"></i>
    <span class="nav-link-text">Inicio</span>
    </a>
</li>
    
<li class="nav-item">
    <a class="@yield('nav-link MD')" href="{{ url('/orden_trabajos') }}">
    <i class="ni ni-active-40 text-purple"></i>
    <span class="nav-link-text">Mis daños</span>
    </a>
</li>

@endif



</ul>
@if (auth()->user()->Tipo == 'administrador')
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading p-0 text-muted">
<span class="docs-normal">Reportes</span>
</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="@yield('nav-link Ubi')" href="{{ url('/reportes/ot/ubicaciones') }}">
          <i class="ni ni-pin-3"></i>
          <span class="nav-link-text">Ubicaciones</span>
        </a>
      </li>
<li class="nav-item">
    <a class="@yield('nav-link FOT')" 
        href="{{ url('/reportes/ot/linea') }}">
    <i class="ni ni-chart-bar-32"></i>
    <span class="nav-link-text">Frecuencia Órdenes de trabajo</span>
    </a>
</li>
<li class="nav-item">
    <a class="@yield('nav-link TMA')" 
        href="{{ url('/reportes/tecnicos/columna') }}">
    <i class="ni ni-paper-diploma"></i>
    <span class="nav-link-text">Técnicos más activos</span>
    </a>
</li>
</ul>
@elseif(auth()->user()->Tipo == 'tecnico')
@else {{-- Cliente --}}
@endif

