<th scope="{{ $scope }}" class="bold {{ $class }}" {{ $attributes }}>
    {!! $slot!!}
    @if($direction === 'desc')
        ▲
    @elseif($direction === 'asc')
        ▼
    @elseif($sortable)
        ▼▲
    @endif
</th>
