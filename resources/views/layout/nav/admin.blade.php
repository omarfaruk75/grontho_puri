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
                    <li class="py-1"><a href="{{route(currentUser().'.headerCard.index')}}">{{__('Header Card')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.headerArticle.index')}}">{{__('Header Article')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.homeArticle.index')}}">{{__('Home Article')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.homeCard.index')}}">{{__('Home Card')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Poem Page')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.firstPage.index')}}">{{__('Full Article')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.link.index')}}">{{__('Social Link')}}</a></li>
                    
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('About Page')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.text.index')}}">{{__('About Article')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.collage.index')}}">{{__('Collage Image')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.collageSecond.index')}}">{{__('Collage Image-2')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.collageThird.index')}}">{{__('Collage Image-3')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.collageFour.index')}}">{{__('Collage Image-4')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.mission.index')}}">{{__('Mission')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.aboutImage.index')}}">{{__('About Image')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Footer')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.contact.index')}}">{{__('Contact Address')}}</a></li>
                   
                </ul>
            </li>
        </ul>
    </li>
    
</ul>
