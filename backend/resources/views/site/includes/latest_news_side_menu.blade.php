@php $latestNews = latestNews(); @endphp
@if ($latestNews->count())
<aside class="single_sidebar_widget popular_post_widget bg-gray">
    <h3 class="widget_title">@lang('custom.label_latest_news')</h3>
    @foreach ($latestNews as $keyNews => $itemNews)
    <div class="media post_item">
        @php
        $newsImageUrl = asset('/images/'.config('global.LATEST_NEWS_NO_IMAGE'));
        if ($itemNews->image != null) {
            if (file_exists(public_path('/images/uploads/'.$postStorage.'/'.$itemNews->image))) {
                $newsImageUrl = asset('/images/uploads/'.$postStorage.'/thumbs/'.$itemNews->image);
            }
        }
        @endphp
        <img src="{!! $newsImageUrl !!}" alt="{!! $itemNews->title !!}">
        <div class="media-body">
            <a href="{{ route('site.'.$language.'.news-details', $itemNews->slug) }}">
                <h3>{!! $itemNews->title !!}</h3>
            </a>
            <p>{!! \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $itemNews->date)->format('F d, Y - h:i a') !!}</p>
        </div>
    </div>
    @endforeach
</aside>
@endif