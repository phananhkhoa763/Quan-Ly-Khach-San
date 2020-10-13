    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('template/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('template/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    
    

    

    <!--datetimepicker-->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!--//datetimepicker-->

    <!-- Gmaps -->
    

   


    <script src="{{ asset('template/assets/js/jquery.slimscroll.min.js') }}"></script>

    
    <script src="{{ asset('template/assets/js/klorofil-common.js') }}"></script>

   
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script>
        
        $(document).ready(function() {
            $('.standardSelect').select2();
            $('.defaultsel').select2({
                minimumResultsForSearch: Infinity,
                width: '100%'
            });
        });
        $(":input").inputmask();
        $(function() {
            var url = window.location;
            var element = $('ul.nav a').filter(function() {
                return this.href == url || url.href.indexOf(this.href) == 0;
            }).parent().addClass('active').parent().parent().addClass('active');
        });
        $(window).on('load', function(event) {
            $('body').removeClass('preloading');
            $('.load').delay(400).fadeOut('fast');
        });

        
    </script>

   
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    


    <script type="text/javascript" src="{{ asset('js/myScript.js') }}"></script> <!-- kết nối file js -->
    <script type="text/javascript" src="{{ asset('editer/ckeditor/ckeditor.js') }}"></script> <!-- kết nối file ckeditor -->
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script type="text/javascript" src="{{ asset('editer/ckeditor/ckfinder.js') }}"></script> <!-- kết nối file ckfinder -->

    <!--select2-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!--//select2-->

    <!--<script>
        $(function () {
            $.get("template/vendors/bootstrap/dist/css/bootstrap.min.css", function (data) {
                var version = data.match(/v[.\d]+[.\d]/);
                alert(version);
            });
        });
    </script>
    