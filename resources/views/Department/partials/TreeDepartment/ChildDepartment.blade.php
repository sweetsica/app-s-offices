<ul>
    {{-- @foreach ($subUnit as $sub)
        <li data-id="{{ $sub->id }}">
            @if ($previous != null)
                [{{ $previous . '.' . $sub->order ?? '' }}]
            @else
                [{{ $sub->order ?? '' }}]
            @endif
            <a href="{{ route('department.show', ['id' => $sub->id]) }}" class="title-child"
                id="{{ $sub->id }}">{{ $sub->name }}</a>
            @if (isset($sub->sub_unit) && count($sub->sub_unit) > 0)
                @if ($previous != null)
                    @include('template.sidebar.sidebarCoCauToChuc.child', [
                        'subUnit' => $sub->sub_unit,
                        'previous' => $previous . '.' . $sub->order,
                    ])
                @else
                    @include('template.sidebar.sidebarCoCauToChuc.child', [
                        'subUnit' => $sub->sub_unit,
                        'previous' => $sub->order,
                    ])
                @endif
            @endif
        </li>
    @endforeach --}}
</ul>
