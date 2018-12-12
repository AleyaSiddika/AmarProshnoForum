@include('layouts.admin.partials.admin_head')
<div class="container">
    <div class="row mainContentents">
        <div class="col-md-12">
            <div>
                @yield('section')
            </div>
        </div>
    </div>
</div>
{{-- Footer--}}
@include('layouts.admin.partials.footer')