<div class="item-comment" data-parent-id="{{ $item['parent_id'] }}" data-id="{{ $item['id'] }}">
	<div class="p-comment content-wrap">
		<div class="avatart">
			<img src="{{asset('/images/ravi/blog/Ellipse 20.png')}}" alt="avatar icon" />
		</div>
		<div class="info-user">
			<p class="username">
				{{ $item['full_name'] }}
			</p>
			<p class="year">
				{{ display_date($item['created_at']) }}
			</p>
			<p class="content-comment">
				{{ $item['comment'] }}
			</p>
			<div class="reply">
				<div class="icon-reply">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							viewBox="0 0 24 24" fill="none">
							<path d="M9 14L4 9L9 4" stroke="#BCBCBC" stroke-width="2"
								stroke-linecap="round" stroke-linejoin="round" />
							<path d="M20 20V13C20 11.9391 19.5786 10.9217 18.8284 10.1716C18.0783 9.42143 17.0609 9 16 9H4"
								stroke="#BCBCBC" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
					</svg>
				</div>
				<p ravi-data-click ravi-show-form-cmt>Reply</p>
				<div class="set-position">
					@include('News::frontend.blocks.blogs-form-cmt')
				</div>
			</div>
		</div>
	</div>
	@if (isset($item['children']) &&  count($item['children']) > 0)
	    <ul data-level="{{ $loop->index + 1 }}">
            @foreach($item['children'] as $item)
                @include('News::frontend.blocks.partials-comment', $item)
            @endforeach
	    </ul>
	@endif
</div>