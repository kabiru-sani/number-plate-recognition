<div>
     @section('welcome') active @endsection
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn">Advanced Vehicle Recognition System for Enhanced Academy Security</h1>
                    <p class="text-white pb-3 animated zoomIn">Our cutting-edge Optical Character Recognition (OCR) technology automatically identifies and records license plate numbers of all vehicles entering and exiting the Nigerian Defense Academy. This AI-powered solution provides real-time monitoring, improves security protocols, and maintains accurate digital records of daily gate activity.</p>
                    <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Request Demo</a>
                    <a href="" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">System Specifications</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid" src="{{ asset('assets/img/hero.png') }}" alt="Vehicle plate recognition system at NDA gate">
                </div>
            </div>
        </div>
    </div>
   


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="section-title position-relative mb-4 pb-2">
                        <h6 class="position-relative text-primary ps-4">About Our System</h6>
                        <h2 class="mt-2">Advanced Vehicle Recognition for Enhanced Security</h2>
                    </div>
                    <p class="mb-4">Our specialized OCR technology has been safeguarding critical installations since 2014. Designed specifically for the Nigerian Defense Academy, this system provides automated, real-time identification of all vehicles passing through academy gates. The solution combines military-grade security protocols with cutting-edge AI recognition for unparalleled access control.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Military-Approved</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Real-Time Monitoring</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>99.7% Accuracy</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>24/7 Surveillance</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="">System Details</a>
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{ asset('assets/img/about.jpg') }}" alt="NDA vehicle recognition system in operation">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Newsletter Start -->
    <div class="container-xxl bg-primary newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container px-lg-5">
            <div class="row align-items-center" style="height: 250px;">
                <div class="col-12 col-md-6">
                    <h3 class="text-white">Newsletter</h3>
                    <small class="text-white">subscribe to our newsletter.</small>
                    <div class="position-relative w-100 mt-3">
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                            placeholder="Enter Your Email" style="height: 48px;">
                        <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                    <img class="img-fluid mt-5" style="height: 250px;" src="{{ asset('assets/img/newsletter.png') }}">
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->
</div>