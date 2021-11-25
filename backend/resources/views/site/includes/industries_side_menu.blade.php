@if (count($industriesMenu))
<aside class="single_sidebar_widget post_category_widget bg-gray">
    <h4 class="widget_title text-center">@lang('custom.label_our_industries')</h4>
    <ul class="list cat-list">
        @foreach ($industriesMenu as $keyIndustry => $itemIndustry)
        <li>
            <a href="{{ route('site.'.$language.'.industry-details', $itemIndustry['slug']) }}" @if ($industrySlug == $itemIndustry['slug'])class="active" @endif>
                {{ $itemIndustry['title'] }}
            </a>
        </li>
        @endforeach
    </ul>
</aside>
@endif