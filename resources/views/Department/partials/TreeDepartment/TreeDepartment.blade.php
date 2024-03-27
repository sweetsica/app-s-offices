<div class="card h-100">
    <div class="card-body">
        <div id="CoCauToChuc" class="wapper-tree">
            <ul id="tree1" style=" padding-bottom: 30px">
                @if ($treeDepartment)
                    @foreach ($treeDepartment as $parent)
                        {{-- Style Old style="width: max-content" --}}
                        <li data-id="{{ $parent->id }}" style="width: max-content">
                            {{ $parent->order ?? '' }}<a href="#" class="title-child"
                                id="{{ $parent->id }}">{{ $parent->name }}</a>
                            @if (isset($parent->children) && count($parent->children) > 0)
                                @if ($parent->order != null)
                                    @include('Department.partials.TreeDepartment.ChildDepartment', [
                                        'subUnit' => $parent->children,
                                        'previous' => $parent->order,
                                    ])
                                @else
                                    @include('Department.partials.TreeDepartment.ChildDepartment', [
                                        'subUnit' => $parent->children,
                                        'previous' => '',
                                    ])
                                @endif
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
