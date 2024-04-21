<aside class="sidebar">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand"><span class="mdi mdi-washing-machine"></span>Laundry</div>
    <hr>
    <!-- Beranda -->
    <div class="sidebar-content">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
            <span class="mdi mdi-home" style="margin-right: 5px;"></span>Beranda
        </a>
    </div>
    <div class="sidebar-content">
        <a href="{{ route('order.index') }}" class="{{ request()->routeIs('order.index') ? 'active' : '' }}">
            <span class="mdi mdi-note" style="margin-right: 5px;"></span>Order
        </a>
    </div>
    <div class="sidebar-content">
        <a href="{{ route('layanan.index') }}" class="{{ request()->routeIs('layanan.index') ? 'active' : '' }}">
            <span class="mdi mdi-book" style="margin-right: 5px;"></span>Layanan
        </a>
    </div>
    <div class="sidebar-content">
        <a href="#" class="{{ request()->routeIs('') ? 'active' : '' }}">
            <span class="mdi mdi-account-multiple" style="margin-right: 5px;"></span>Konsumen
        </a>
    </div>
    <hr>
    <div class="sidebar-content">
        <a href="#" class="{{ request()->routeIs('') ? 'active' : '' }}">
            <span class="mdi mdi-account" style="margin-right: 5px;"></span>User
        </a>
    </div>
    
</aside>