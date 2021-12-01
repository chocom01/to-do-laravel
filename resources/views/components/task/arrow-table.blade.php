<th class="{{$class}}">
    <a class="sortUp -mb-2" href="{{ "/$orderBy/asc/?".http_build_query(request()->query()) }}"></a>
    <strong class="mr-8"> {{ $slot }} </strong>
    <a class="sortDown -mt-2" href="{{ "/$orderBy/desc/?".http_build_query(request()->query()) }}"></a>
</th>