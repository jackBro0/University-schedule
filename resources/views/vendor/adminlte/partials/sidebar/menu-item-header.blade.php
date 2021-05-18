<li @if(isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-header {{ $item['class'] ?? '' }}">

{{--    {{ is_string($item) ? $item : $item['header'] }}--}}
    <h2><a href="{{route('teacher.create')}}" class="nav-item">Teacher</a></h2>
</li>
