<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
          <ul class="menu-content">
            <li class="active"><a class="menu-item" href="dashboard-ecommerce.html" data-i18n="nav.dash.ecommerce">eCommerce</a>
            </li>
            <li><a class="menu-item" href="dashboard-crypto.html" data-i18n="nav.dash.crypto">Crypto</a>
            </li>
            <li><a class="menu-item" href="dashboard-sales.html" data-i18n="nav.dash.sales">Sales</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-cogs"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('site.settings') }}</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">{{ __('site.shipping') }}</a>
              <ul class="menu-content">
                <li><a class="menu-item" href="{{ route('admin.settings.editShipping', 'free') }}">{{ __('site.free_shipping') }}</a>
                </li>
                <li><a class="menu-item" href="{{ route('admin.settings.editShipping', 'local') }}" data-i18n="nav.templates.vert.compact_menu">{{ __('site.local_shipping') }}</a>
                </li>
                <li><a class="menu-item" href="{{ route('admin.settings.editShipping', 'outer') }}" data-i18n="nav.templates.vert.content_menu">{{ __('site.outer_shipping') }}</a>
                </li>
              
              </ul>
            </li>
            <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Horizontal</a>
              <ul class="menu-content">
                <li><a class="menu-item" href="../horizontal-menu-template" data-i18n="nav.templates.horz.classic">Classic</a>
                </li>
                <li><a class="menu-item" href="../horizontal-menu-template-nav" data-i18n="nav.templates.horz.top_icon">Full Width</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>