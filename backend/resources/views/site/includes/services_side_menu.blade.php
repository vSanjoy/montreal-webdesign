@if (count($servicesMenu))
<aside class="single_sidebar_widget post_category_widget bg-gray">
    <h4 class="widget_title text-center">@lang('custom.label_our_services')</h4>
    <ul class="list cat-list">
        @foreach ($servicesMenu as $keyService => $itemService)
        <li>
            <a href="{{ route('site.'.$language.'.service-category', $itemService['slug']) }}" class="service-cat @if ($postSlug == $itemService['slug'])active @endif">{!! $itemService['title'] !!}</a>
            @if (count($itemService['post']))
            <ul class="list cat-list">
                @foreach ($itemService['post'] as $keyServicePost => $itemServicePost)
                <li>
                    <a href="{{ route('site.'.$language.'.service-details', $itemServicePost['slug']) }}" @if ($postSlug == $itemServicePost['slug'])class="active" @endif>
                        {{ $itemServicePost['title'] }}
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
</aside>
@endif