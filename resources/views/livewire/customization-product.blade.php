@section('title')
Customization
@endsection
<div>
    @livewireStyles
    @extends('landing.base')
    @section('content')
    <div>
        Lorem Ipsum
    </div>
    @include('landing.search')
    @endsection
    @livewireScripts
</div>