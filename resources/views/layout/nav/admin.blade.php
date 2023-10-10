<ul class="menu">
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-files"></i>
            <span>{{__('Manage Website')}}</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Setting')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.country.index')}}">{{__('Country')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.division.index')}}">{{__('Division')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.district.index')}}">{{__('District')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.district.index')}}">{{__('District')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.thana.index')}}">{{__('Thana')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.admin.index')}}">{{__('Users')}}</a></li>
                    {{--  <li class="py-1"><a href="{{route(currentUser().'.terms.index')}}">{{__('Terms & Condition')}}</a></li>  --}}
                    {{--  <li class="py-1"><a href="{{route(currentUser().'.settings.index')}}">{{__('Website Settings')}}</a></li>  --}}
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Home Page')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.homeArticle.index')}}">{{__('Home Article')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item">
                <a href="{{route(currentUser().'.firstPage.index')}}">{{__('Page-1')}}</a>
            </li>
        </ul>
    </li>
    
</ul>
