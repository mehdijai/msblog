@if ($dir == 'h')
    <div role="separator" class="w-full py-9 @isset($class['section']){{$class['section']}} @endisset">
        <div class="container mx-auto @isset($class['wrapper']){{$class['wrapper']}} @endisset">
            <hr class="border-golden-dark border-opacity-20 @isset($class['line']){{$class['line']}} @endisset">
        </div>
    </div>
@elseif($dir == 'v')
    <div role="separator" class="w-0 h-6 mx-5 border-l-2 border-golden-dark border-opacity-20"></div>
@endif