<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="{{asset('Dashboards/global_assets/images/logo_light.png')}}" alt="">

        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

        <ul class="navbar-nav">
            <a href="{{route('invoice.create')}}" class="nav-item btn btn-link btn-float "><i class="icon-calculator text-primary"></i> <span>{{__('main.invoices')}}</span></a>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('Dashboard/global_assets/images/lang/gb.png')}}" class="img-flag mr-2" alt="">
                    English
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <ul>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item english" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">

                    <span>{{auth()->user()->name}}</span>

                </a>

                <div class="dropdown-menu dropdown-menu-right">

                    <a href="{{route('logout')}}" class="dropdown-item"><i class="icon-switch2"></i>{{__('main.logout')}} </a>

                    <a href="{{route('profile.edit')}}" class="dropdown-item"><i class="icon-user-tie mr-3"></i>{{ __('Profile') }}</a>

                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
