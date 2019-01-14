<a class=" px-3 mx-1 c-link menu-link" 
    href="{{ route( $route , [ $id ?? '' , $name ?? '' , $page ?? '' ] ) }}">
    {{ $slot }}
</a>