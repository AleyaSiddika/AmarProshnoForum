<nav class="avbar navbar-default navbar-fixed-bottom MainFooter">
    <div class="container-fluid">
        <div class="Footer">
            <p>© All Rights Reserved by Aleya Nur Mohol Siddika - 2017.</p>
        </div>
    </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js')}}"></script>
<script>
     $(document).ready(function () {
         $("#btn").click(function () {
             $("#EditProfile").fadeIn(0);
             $("#profileDetails").fadeOut(0);

         });

     })
</script>

{{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}
{{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wg5cdn94m4uhhvn9y5c4gclfeb9w6jtnme3plh8qbn49tlo0"></script>--}}
{{--<script>tinymce.init({ selector:'textarea' });</script>--}}

</body>
</html>
