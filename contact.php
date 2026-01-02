 <?php include('include/template/Header.php')?>

 

<!-- ===== Contact Section ===== -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Contact Us</h2>
            <p class="text-muted">Have a question? We’re happy to help.</p>
        </div>

        <div class="row g-4 align-items-stretch">

            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="bg-white p-4 p-lg-5 rounded shadow-sm h-100">
                    <h4 class="mb-4">Send us a message</h4>

                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control py-2" placeholder="Your Name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control py-2" placeholder="Your Email">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control py-2" placeholder="Phone Number">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control py-2" rows="5"
                                    placeholder="Your Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-2">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Map + Info -->
            <div class="col-lg-5">
                <div class="bg-white rounded shadow-sm h-100 overflow-hidden">

                    <!-- Map -->
                    <iframe class="w-100" height="250"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                       
                             
                            </iframe>
                    </iframe>

                    <!-- Info -->
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <i class="fa fa-map-marker-alt text-primary fs-5 me-3"></i>
                            <span>123 Street, New York, USA</span>
                        </div>

                        <div class="d-flex mb-3">
                            <i class="fa fa-envelope text-primary fs-5 me-3"></i>
                            <span>support@example.com</span>
                        </div>

                        <div class="d-flex">
                            <i class="fa fa-phone-alt text-primary fs-5 me-3"></i>
                            <span>(+012) 3456 7890</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- ===== Contact End ===== -->

    <!-- Footer Start -->
    <?php include('include/template/Footer.php')?>