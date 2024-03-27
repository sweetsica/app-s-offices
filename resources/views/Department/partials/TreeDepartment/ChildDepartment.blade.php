<ul>
    @foreach ($subUnit as $sub)
        <li data-id="{{ $sub->id }}">
            @if ($previous != null)
                [{{ $previous . '.' . $sub->order ?? '' }}]
            @else
                [{{ $sub->order ?? '' }}]
            @endif
            <a href="#" class="title-child" id="{{ $sub->id }}">{{ $sub->name }}</a>
            @if (isset($sub->children) && count($sub->children) > 0)
                @if ($previous != null)
                    @include('Department.partials.TreeDepartment.ChildDepartment', [
                        'subUnit' => $sub->children,
                        'previous' => $previous . '.' . $sub->order,
                    ])
                @else
                    @include('Department.partials.TreeDepartment.ChildDepartment', [
                        'subUnit' => $sub->children,
                        'previous' => $sub->order,
                    ])
                @endif
            @endif
        </li>
    @endforeach
</ul>
