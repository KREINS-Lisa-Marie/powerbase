<th scope="{{ $scope }}" class="bold" {{ $attributes }}>
    {!! $slot!!}
    @if($direction === 'desc')
        ▲
    @elseif($direction === 'asc')
        ▼
    @elseif($sortable)
        ▼▲
    @endif
</th>
