<?php

$menu = [
        [
            'label' => 'Home',
            'route' => 'calendar',
            'icon'  => 'fa-home',
            'submenu'=> [],
        ],
        [
            'label' => 'Places',
            'route' => 'location',
            'icon'  => 'fa-map-marker',
            'submenu'=> [],
        ],
        [
            'label' => 'Cuisine',
            'route' => 'cuisine',
            'icon'  => 'fa-cutlery',
            'submenu'=> [],
        ],
];

?>
<div id="site-sidebar-wrapper">
    <div id="site-sidebar" class="sidebar">
        <ul class="nav nav-sidebar">
            <li class="sidebar-toggler-wrapper"><i class="fa fa-2x fa-angle-double-left"></i></li>

            @foreach($menu as $item)
                @if(count($item['submenu']) > 0)
                    <li class="has-sub-menu {{ Request::is($item['route'].'*') ? 'open' : ''}}">
                        <i class="fa fa-fw {{ $item['icon'] }}"></i>
							<span class="title-wrapper">
                                <span class="title">{{ $item['label'] }}</span><i class="fa fa-angle-right"></i>
							</span>
                        </i>
                        <ul class="sub-menu">
                            @foreach($item['submenu'] as $subitem)
                                <li class="{{ Request::is($subitem['route']) ? 'active' : ''}}">
                                    @if(count($subitem['badge']) > 0)
                                        <span class="badge {{$subitem['badge']['color']}}">{{$subitem['badge']['text']}}</span>
                                    @endif
                                    <a href="{{url($subitem['route'])}}">{{$subitem['label']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="{{ Request::is($item['route']) ? 'active' : ''}}">
                        <i class="fa fa-fw {{ $item['icon'] }}"></i>
							<span class="title-wrapper">
								<a href="{{ url($item['route'])}}">{{ $item['label'] }}</a>
							</span>
                        </i>
                    </li>
                @endif
            @endforeach

        </ul>
    </div>
</div>
