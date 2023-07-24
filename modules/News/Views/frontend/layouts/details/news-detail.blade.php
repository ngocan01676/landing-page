<div class="article">
    <div class="header">
        @if($image_url = get_file_url($row->image_id, 'full'))
            <header class="post-header">
                <img src="{{ $image_url  }}" alt="{{$row->title}}">
            </header>
            <div class="cate">
            </div>
        @endif
    </div>
    <h2 class="title">{{$row->title}}</h2>
    <div class="post-info">
        <ul>
            @if(!empty($row->getAuthor))
                <li>
                    <span> {{ __('BY ')}} </span>
                    {{$row->getAuthor->getDisplayName() ?? ''}}
                </li>
            @endif
            <li> {{__('DATE ')}}  {{ display_date($row->updated_at)}}  </li>
        </ul>
    </div>
    <div class="post-content"> {!! $row->content !!}</div>
    <div class="space-between">
    </div>
</div>
 
