@extends('layouts.public.master_public')
@section('section')
    @include('layouts.public.partials.rightContent')
    <div class="leftContents">
        <div class="col-md-7 contacts">
            <h4 class="grey message">Leave a Message</h4>
            <form class="contact-form" action="/Send_message" method="POST">
                {{  csrf_field() }}
                <div class="form-group">
                    <input id="contact-name" type="text" name="name" class="form-control inputBox" placeholder="Enter your name *" required="required" data-error="Name is required.">
                </div>
                <div class="form-group">
                    <input id="contact-email" type="text" name="email" class="form-control inputBox" placeholder="Enter your email *" required="required" data-error="Email is required.">
                </div>
                <div class="form-group">
                    <input id="contact-phone" type="text" name="phone" class="form-control inputBox" placeholder="Enter your phone *" required="required" data-error="Phone is required.">
                </div>
                <div class="form-group">
                    <textarea id="form-message" name="message" class="form-control inputBox" placeholder="Write your message here *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send a Message</button><br>
            </form>
        </div>
    </div>

@endsection
