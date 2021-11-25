@if (isset($servicesMenu) && count($servicesMenu) || (isset($parentCategoryAndPost) && count($parentCategoryAndPost)))
<aside class="single_sidebar_widget post_category_widget bg-gray">
    <h4 class="widget_title text-center">@lang('custom.label_category')</h4>
    <ul class="list cat-list">
    @if (isset($servicesMenu) && count($servicesMenu))
        @foreach ($servicesMenu as $keyService => $itemService)
        <li>
            <a href="{{ route('site.'.$language.'.service-category', $itemService['slug']) }}" class="d-flex justify-content-between align-items-center @if ($postSlug == $itemService['slug'])active @endif">
                <span>{!! $itemService['title'] !!}</span>
                <span class="gray-clr">({!! $itemService['count'] !!})</span>
            </a>
        </li>
        @endforeach
    @endif
    @if (isset($parentCategoryAndPost) && count($parentCategoryAndPost))
        @foreach ($parentCategoryAndPost as $keyCat => $itemCat)
        <li>
            @php
            $type='uncategorized';
            if (isset($itemCat['id']) && $itemCat['id'] == 9){ $type = 'uncategorized'; }
            else if (isset($itemCat['post_type']) && $itemCat['post_type'] == 'I'){ $type = 'industries'; }
            else if (isset($itemCat['post_type']) && $itemCat['post_type'] == 'S'){ $type = 'services'; }
            else if (isset($itemCat['post_type']) && $itemCat['post_type'] == 'N'){ $type = 'news'; }
            @endphp
            <a href="{{ route('site.'.$language.'.'.$type) }}" class="d-flex justify-content-between align-items-center @if ($itemCat['slug'] == $postSlug)active @endif">
                <span>{!! $itemCat['title'] !!}</span>
                <span class="gray-clr">({!! $itemCat['count'] !!})</span>
            </a>
        </li>
        @endforeach
    @endif
    </ul>
</aside>
@endif