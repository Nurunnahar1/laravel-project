@extends('frontend.layout.app')
@section('content')
    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $contact->heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <form action="{{ route('contact.sendEmail') }}" method="post" class="form_contact_ajax">
                        @csrf
                        <div class="contact-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control" name="email" id="email">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea class="form-control" rows="3" name="message" id="message"></textarea>
                                <span class="text-danger error-text message_error"></span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="map">

                        <iframe src="{{ $contact->map }} "></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    (function($){
        $(".form_contact_ajax").on('submit', function(event){
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"></script>
    <script>
        let contactForm = document.getElementById('form_contact_ajax');
        contactForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let message = document.getElementById('message').value;



            if (name.length == 00) {
                alert('insert your name')
            } else if (email.length == 00) {
                alert('insert your email')
            } else if (message.length == 00) {
                alert('insert your message')
            } else {
                let formData = {
                    fullName: name,
                    email: email,

                    message: message
                }
                let url = "/contactRequest";

                showLoader();

                let result = await axios.post(url, formData);

                hideLoader()



                if (result.status == 200 && result.data === 1) {
                    alert('success');
                    contactForm.reset();

                } else {
                    alert('error')
                }
            }

        });
    </script> --}}
    <div id="loader"></div>
@endsection
