<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="3">SPK Kualitas Jagung</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SPK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Pages</li>
            <li class="nav-item dropdown {{ $type_menu === 'kriteria' ? 'active' : '' }}">
                <a href="{{ url('kriteria') }}"><i class="fas fa-sitemap"></i><span>Kriteria</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'analisa' ? 'active' : '' }}">
                <a href="{{ url('analisa') }}"><i class="fas fa-project-diagram"></i><span>Analisa</span></a>
            </li>
        </ul>
    </aside>
</div>
