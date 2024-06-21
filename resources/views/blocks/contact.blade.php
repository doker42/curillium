

<section class="page-section bg-blue1" id="contact">
    <div class="container-fluid">
        <h2 class="page-section-heading text-center text-white text-uppercase mb-0">Contact Me</h2>
        <br>
        <div class="row">
            <div class="col-lg-8 mx-auto">

                <form class="send-form" role="form" onsubmit="return false;">
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" id="email" placeholder="Input your email">
                        <div id="email-error" class="validate">"Please enter a valid email"</div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="message" class="form-control" id="message" placeholder="Input your message">
                        <div id="msg-error" class="validate">Please write something for me</div>
                    </div>

                    <div id="loading"></div>
                    <div id="error-message"></div>
                    <div id="message_sent" class="sent-message">Your message has been sent. Thank you!</div>

                    <div class="text-center form-send">
                        <button id="send" type="submit" class="btn bg-white" data-url="{{ route('contact') }}">Send message</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
