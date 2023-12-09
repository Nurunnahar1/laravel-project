<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Site Links</h2>
                    <ul class="useful-links">
                        <li><a href="rooms.html">Rooms & Suites</a></li>
                        <li><a href="{{ route('photo.gallery') }}">Photo Gallery</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Useful Links</h2>
                    <ul class="useful-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('term') }}">Terms and Conditions</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('faq') }}">Faq</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Contact</h2>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="right">
                            34 Antiger Lane,<br>
                            PK Lane, USA, 12937
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-volume-control-phone"></i>
                        </div>
                        <div class="right">
                            contact@arefindev.com
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="right">
                            122-222-1212
                        </div>
                    </div>
                    <ul class="social">
                        <li><a href=""><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Newsletter</h2>
                    <p>
                        In order to get the latest news and other great items, please subscribe us here:
                    </p>


                    <form action="{{ route('subscriber.sendEmail') }}" method="post"  class="form_subscriber_ajax">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" class="form-control">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Subscribe Now">
                        </div>
                    </form>



                </div>
            </div>

        </div>
    </div>
</div>

<div class="copyright">
    All Rights Reserved.
</div>

<div class="scroll-top">
    <i class="fa fa-angle-up"></i>
</div>


{{-- success message --}}

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

<script>
    (function($){
        $(".form_subscriber_ajax").on('submit', function(event){
            event.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType: 'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data){
                    $('#loader').hide();

                    if(data.code == 0){
                        $.each(data.error_message, function(prefix, val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1){
                        $(form)[0].reset();
                        iziToast.success({
                            title:'',
                            position:'topRight',
                            message:data.success_message,
                        });
                    }
                }
            });
        });
    })(jQuery);
</script>

    <div id="loader"></div>
