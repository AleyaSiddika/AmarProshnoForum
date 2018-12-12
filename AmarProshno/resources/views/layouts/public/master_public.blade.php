@include('layouts.public.partials.head')
<div class="container">
    @yield('publicView')
    <div class="row mainContentents">
        <div class="col-md-12">
            <div>
                @yield('section')
            </div>
        </div>
    </div>

</div>

{{-- Footer--}}
@include('layouts.public.partials.footer')