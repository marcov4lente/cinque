<ul class="pagination right-align">
    @if($current_page > 1)
        <li><a href="{{ $prev_page_url }}"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a></li>
    @endif
    <li class="pagination-label">Page {{ $current_page }} of {{ $current_page }}.</li>
    @if($current_page < $last_page)
        <li><a href="{{ $next_page_url }}"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
    @endif
</ul>
