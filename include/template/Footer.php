<!-- ======= Elegant Professional Footer ======= -->
<footer class="bg-secondary text-light pt-5 ">

    <div class="container">
        <div class="row g-4 align-items-center">

            <!-- Brand & About -->
            <div class="col-lg-4 text-center text-lg-start">
                <h3 class="fw-bold mb-2 text-warning">
                    <i class="fas fa-bolt text-warning me-2"></i>Electro
                </h3>
                <p class="text-while small mb-3">
                    A modern electronics store offering premium products, secure shopping, and fast delivery.
                </p>

                <!-- Social Icons -->
                <div class="d-flex justify-content-center justify-content-lg-start gap-2">
                    <a href="#" class="btn btn-outline-warning rounded">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-outline-warning rounded">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-warning rounded">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-outline-warning rounded">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Newsletter -->
            <!-- <div class="col-lg-4">
                <div class="bg-black rounded-4 p-4 shadow text-center">
                    <h5 class="fw-bold mb-3 text-warning">Subscribe to our Newsletter</h5>

                    <form>
                        <input type="text" class="form-control mb-3 py-2"
                            placeholder="Your Name">

                        <input type="email" class="form-control mb-3 py-2"
                            placeholder="Your Email">

                        <button class="btn btn-warning w-100 fw-bold">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div> -->

            <!-- Quick Links -->
            <div class="col-lg-4 text-center text-lg-end">
                <h5 class="fw-bold mb-3 text-primary">Quick Links</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <a href="#" class=" text-light text-decoration-none ">Shop</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">About Us</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">Contact</a>
                    </li>
                    <li>
                        <a href="#" class="text-light text-decoration-none">Privacy Policy</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class=" mt-5 py-3 copyright">
        <div class="container text-center small text-light">
            © 2025 <span class="text-warning fw-bold">Electro</span>. All rights reserved.
        </div>
    </div>

</footer>
<!-- ======= Footer End ======= -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-info  btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/wow/wow.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>

    <!-- Custom Script for Modal Close -->
   
 
    <script>
        $(document).ready(function() {
            // fix selector: modal id is '#login'
            // $('#login .btn-close').on('click', function() {
            //     $('#login').modal('hide');
            // });

            // If server-side validation produced errors, open the login modal.
            <?php if (
                (isset($emailError) && $emailError) ||
                (isset($passwordError) && $passwordError) ||
                (isset($loginError) && $loginError)
            ): ?>
                var myModal = new bootstrap.Modal(document.getElementById('login'));
                myModal.show();
            <?php endif; ?>
        });
    </script>
</body>

</html>
