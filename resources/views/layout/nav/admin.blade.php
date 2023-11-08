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
                    <li class="py-1"><a href="{{route(currentUser().'.admin.index')}}">{{__('Users')}}</a></li>
                    {{--  <li class="py-1"><a href="{{route(currentUser().'.terms.index')}}">{{__('Terms & Condition')}}</a></li>  --}}
                    {{--  <li class="py-1"><a href="{{route(currentUser().'.settings.index')}}">{{__('Website Settings')}}</a></li>  --}}
                </ul>
            <li class="submenu-item sidebar-item">
                <a href="{{route(currentUser().'.category.index')}}">{{__('Category')}}</a>
            </li>
            <li class="submenu-item sidebar-item">
                <a href="{{route(currentUser().'.post.index')}}">{{__('Post')}}</a>
            </li>
        </ul>
    </li>
    
</ul>
