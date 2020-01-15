<?php

$folder = 'home.sections';

?>

@foreach (App\Helpers\FunctionHelpers::get_home_page_section() as $key => $section)
    @if(file_exists($folder.'.'.$section->key))

    @else
        @include($folder.'.'.$section->key, ['section' => $section])
    @endif
@endforeach
