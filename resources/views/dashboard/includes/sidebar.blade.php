<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item"><a href="#"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('site.adminPanel')</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
          <ul class="menu-content">
            <li class="{{Request::is('*/admin/home')?'active':''}}"><a class="menu-item" href="" data-i18n="nav.dash.ecommerce">@lang('site.homepage')</a>
            </li>
          </ul>
        </li>
        <!-- settings -->
        <li class=" nav-item"><a href="#"><i class="la la-cogs"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('site.settings') }}</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">{{ __('site.shipping') }}</a>
              <ul class="menu-content">
                <li class="{{Request::is('*/settings/shipping/free')?'active':''}}"><a class="menu-item" href="{{ route('admin.settings.editShipping', 'free') }}">{{ __('site.free_shipping') }}</a>
                </li>
                <li class="{{Request::is('*/settings/shipping/local')?'active':''}}"><a class="menu-item" href="{{ route('admin.settings.editShipping', 'local') }}" data-i18n="nav.templates.vert.compact_menu">{{ __('site.local_shipping') }}</a>
                </li>
                <li class="{{Request::is('*/settings/shipping/outer')?'active':''}}"><a class="menu-item" href="{{ route('admin.settings.editShipping', 'outer') }}" data-i18n="nav.templates.vert.content_menu">{{ __('site.outer_shipping') }}</a>
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
        <!-- admins -->
        <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('site.admins') }}</span></a>
          <ul class="menu-content">
            <li class="{{Request::is('*/admins')?'active':''}}"><a class="menu-item" href="{{ route('admin.admins.index') }}">{{ __('site.show_admins') }}</a>
            </li>
            <li class="{{Request::is('*/admins/create')?'active':''}}"><a class="menu-item" href="{{ route('admin.admins.create') }}" data-i18n="nav.templates.vert.compact_menu">{{ __('site.add_admin') }}</a>
            </li>
          
          </ul>
        </li>
        <!-- mainCategory -->
        <li class=" nav-item"><a href="#"><i class="la la-folder-open-o"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('site.main_categories') }}</span></a>
          <ul class="menu-content">
            <li class="{{Request::is('*/mainCategory')?'active':''}}"><a class="menu-item" href="{{ route('admin.mainCategory.index') }}">{{ __('site.show_main_categories') }}</a>
            </li>
            <li class="{{Request::is('*/mainCategory/create')?'active':''}}"><a class="menu-item" href="{{ route('admin.mainCategory.create') }}" data-i18n="nav.templates.vert.compact_menu">{{ __('site.add_mainCategory') }}</a>
            </li>
          
          </ul>
        </li>
        <!-- subCategory -->
        <li class=" nav-item"><a href="#"><i class="la la-folder"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('site.sub_categories') }}</span></a>
          <ul class="menu-content">
            <li class="{{Request::is('*/subCategory')?'active':''}}"><a class="menu-item" href="{{ route('admin.subCategory.index') }}">{{ __('site.show_sub_categories') }}</a>
            </li>
            <li class="{{Request::is('*/subCategory/create')?'active':''}}"><a class="menu-item" href="{{ route('admin.subCategory.create') }}" data-i18n="nav.templates.vert.compact_menu">{{ __('site.add_subCategory') }}</a>
            </li>
          
          </ul>
        </li>
        <!-- brands -->
        <li class=" nav-item"><a href="#"><i class="la la-trademark"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('site.brands') }}</span></a>
          <ul class="menu-content">
            <li class="{{Request::is('*/brands')?'active':''}}"><a class="menu-item" href="{{ route('admin.brands.index') }}">{{ __('site.show_brands') }}</a>
            </li>
            <li class="{{Request::is('*/brands/create')?'active':''}}"><a class="menu-item" href="{{ route('admin.brands.create') }}" data-i18n="nav.templates.vert.compact_menu">{{ __('site.add_brand') }}</a>
            </li>
          
          </ul>
        </li>
        <!-- tags -->
        <li class=" nav-item"><a href="#"><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('site.tags') }}</span></a>
          <ul class="menu-content">
            <li class="{{Request::is('*/tags')?'active':''}}"><a class="menu-item" href="{{ route('admin.tags.index') }}">{{ __('site.show_tags') }}</a>
            </li>
            <li class="{{Request::is('*/tags/create')?'active':''}}"><a class="menu-item" href="{{ route('admin.tags.create') }}" data-i18n="nav.templates.vert.compact_menu">{{ __('site.add_tag') }}</a>
            </li>
          
          </ul>
        </li>
         <!-- products -->
         <li class=" nav-item"><a href="#"><i class="la la-sitemap"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('site.products') }}</span></a>
          <ul class="menu-content">
            <li class="{{Request::is('*/products')?'active':''}}"><a class="menu-item" href="{{ route('admin.products.index') }}">{{ __('site.show_products') }}</a>
            </li>
            <li class="{{Request::is('*/products/create')?'active':''}}"><a class="menu-item" href="{{ route('admin.products.create') }}" data-i18n="nav.templates.vert.compact_menu">{{ __('site.add_product') }}</a>
            </li>
          
          </ul>
        </li>
      </ul>
    </div>
  </div>