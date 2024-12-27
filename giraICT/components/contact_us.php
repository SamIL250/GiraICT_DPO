<div class="container-xxl py-5" id="contact">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary ">Get In Touch with us.</h6>
                    <h1 class="mb-4">Contact For more information</h1>
                    <p class="mb-4">We’re here to help! Whether you have questions about courses, technical support, or partnership opportunities, feel free to reach out..</p>
                    <iframe class="position-relative w-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.5159680288693!2d30.056990473978594!3d-1.9465602367021506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca4240db7b3f5%3A0x5256fd511623ef15!2sMakuza%20Peace%20Plaza!5e0!3m2!1sen!2srw!4v1726310309783!5m2!1sen!2srw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
                        </iframe>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class=" border p-5 h-100 d-flex align-items-center">
                        <form method="POST" action="./services/feedbacks/send_feedback.php">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="names" type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="message" class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Your Message to Gira I.C.T</label>
                                    </div>
                                </div>
                                <input type="hidden" id="url" name="url">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-outline-warning text-white w-100 py-3" type="submit" name="send_feedback">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    // Set the current URL in the hidden input
    document.getElementById("url").value = window.location.href;
</script>