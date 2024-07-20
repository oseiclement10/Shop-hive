@props(['name', 'method', 'action', 'class'])
<form name="{{ $name }}" method="{{ $method }}" action="{{ $action }}" class="{{ $class }}">
    @csrf
    @method($method)
    {{ $slot }}
</form>
