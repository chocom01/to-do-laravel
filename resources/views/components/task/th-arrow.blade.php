<th class="{{$class}}">
    <a class="sortUp -mb-2 " href="{{ request()->fullUrlWithQuery(['orderBy' => $orderBy, 'sortBy' => 'asc']) }}"></a>
    <strong> {{ $slot }} </strong>
    <a class="sortDown -mt-2" href="{{ request()->fullUrlWithQuery(['orderBy' => $orderBy, 'sortBy' => 'desc']) }}"></a>
</th>