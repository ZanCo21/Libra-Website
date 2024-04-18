<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold ms-2">Libra .</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item {{ Request::is('dashboard/analytics*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::is('dashboard/analytics*') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
              <div data-i18n="Analytics">Analytics</div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Data &amp; report</span>
      </li>
      <!-- Pages -->
      <li class="menu-item {{ Request::is('dashboard/manageBooks*') ? 'active open' : '' }} {{ Request::is('dashboard/transactionBooks*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-box"></i>
          <div data-i18n="Account Settings">Data</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::is('dashboard/manageBooks*') ? 'active' : '' }}">
            <a href="{{ route('manageBooks') }}" class="menu-link">
              <div data-i18n="Notifications">Manage Books</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('dashboard/transactionBooks*') ? 'active' : '' }}">
            <a href="{{ route('transactionBooks') }}" class="menu-link">
              <div data-i18n="Account">Transactions Books</div>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">manage Account</span>
      </li>
      <!-- Pages -->
      <li class="menu-item {{ Request::is('dashboard/manageAccount*') ? 'active open' : '' }} {{ Request::is('dashboard/manageRequestAccount*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-box"></i>
          <div data-i18n="Account Settings">Account</div>
          <div class="badge bg-danger rounded-pill ms-auto">{{ $countRequestUser }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::is('dashboard/manageAccount*') ? 'active' : '' }}">
            <a href="{{ route('manageAccount') }}" class="menu-link">
              <div data-i18n="Notifications">Manage Users</div>
            </a>
          </li>
          <li class="menu-item  {{ Request::is('dashboard/manageRequestAccount*') ? 'active' : '' }}">
            <a href="{{ route('manageRequestAccount') }}" class="menu-link">
              <div data-i18n="Notifications">Request Account</div>
              <div class="badge bg-danger rounded-pill ms-auto">{{ $countRequestUser }}</div>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
  <!-- / Menu -->