<tr>
    <td>{{ link_to($link->hash, $link->hash) }}</td>
    <td>{{ link_to($link->url, $link->url) }}</td>
    <td>{{ $link->description }}</td>
    <td>{{ $link->created_at }}</td>
    <td>
        {{ $link->remoteAddress or '<span class="text-muted">&ndash;</span>' }}<br >
        @if ( $link->hostname )<span data-toggle="tooltip" title="{{ $link->hostname }}">{{ str_limit($link->hostname, 50) }}</span>@else<span class="text-muted">&ndash;</span>@endif
    </td>
    <td>@if ( $link->userAgent)<span data-toggle="tooltip" title="{{ $link->userAgent }}">{{ str_limit($link->userAgent) }}</span>@else<span class="text-muted">&ndash;</span>@endif</td>
    <td>{{ link_to_route('link.hits', $link->count, [ $link->id, ]) }}</td>
</tr>
