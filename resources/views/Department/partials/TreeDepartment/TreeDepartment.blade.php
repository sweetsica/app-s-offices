<div class="card h-100">
    <div class="card-body">
        <div id="CoCauToChuc" class="wapper-tree">
            {{-- Style Old style="overflow: scroll" --}}
            <ul id="tree1" style="overflow: scroll; padding-bottom: 30px">
                @if ($departments)
                    @foreach ($departments as $parent)
                        {{-- Style Old style="width: max-content" --}}
                        <li data-id="{{ $parent->id }}" style="width: max-content">
                            {{ $parent->order ?? '' }}<a href="#" class="title-child"
                                id="{{ $parent->id }}">{{ $parent->name }}</a>
                            {{-- @if (isset($parent->sub_unit) && count($parent->sub_unit) > 0) --}}
                            @if ($parent->order != null)
                                @include('Department.partials.TreeDepartment.ChildDepartment', [
                                    'subUnit' => $parent->parent_id,
                                    'previous' => $parent->order,
                                ])
                            @else
                                @include('Department.partials.TreeDepartment.ChildDepartment', [
                                    'subUnit' => $parent->parent_id,
                                    'previous' => '',
                                ])
                            @endif
                            {{-- @endif --}}
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
