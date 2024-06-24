<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- SVG logo here -->
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">DUWIT</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Account</span>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">User Account</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('patner.index') ? 'active' : '' }}">
            <a href="{{ route('patner.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-buildings"></i>
                <div data-i18n="Basic">Patner Account</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Operational</span>
        </li>

        <li class="menu-item {{ request()->routeIs('admin-topup.*') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-download"></i>
                <div data-i18n="Account Settings">Top up</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin-topup.create') ? 'active' : '' }}">
                    <a href="{{ route('admin-topup.create') }}" class="menu-link">
                        <div data-i18n="Account">Top up Process</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin-topup.history') ? 'active' : '' }}">
                    <a href="{{ route('admin-topup.history') }}" class="menu-link">
                        <div data-i18n="Notifications">Top up History</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item  ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-upload"></i>
                <div data-i18n="Account Settings">Withdrawal</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  ? 'active' : '' }}">
                    <a href="#" class="menu-link">
                        <div data-i18n="Account">Withdrawal Process</div>
                    </a>
                </li>
                <li class="menu-item ? 'active' : '' }}">
                    <a href="#" class="menu-link">
                        <div data-i18n="Notifications">Withdrawal History</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item  ? 'active' : '' }}">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-id-card"></i>
                <div data-i18n="Basic">Patner Card</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->

<!-- / Menu -->

<script>
     document.addEventListener('DOMContentLoaded', function () {
    // Get all menu items
    const menuItems = document.querySelectorAll('.menu-item');

    // Add click event listener to each menu item
    menuItems.forEach(item => {
        item.addEventListener('click', function () {
            // Remove 'active' class from all menu items
            menuItems.forEach(i => i.classList.remove('active'));
            // Add 'active' class to the clicked menu item
            this.classList.add('active');
        });
    });
});

</script>