<footer class="position-relative" id="footer-main">
    <div class="footer pt-lg-7 footer-dark bg-dark">
        <!-- SVG shape -->
        <div class="shape-container shape-line shape-position-top shape-orientation-inverse">
            <svg width="2560px" height="100px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="none" x="0px" y="0px" viewBox="0 0 2560 100" style="enable-background:new 0 0 2560 100;" xml:space="preserve" class=" fill-section-secondary">
                    <polygon points="2560 0 2560 100 0 100"></polygon>
                </svg>
        </div>
        <!-- Footer -->
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <!-- Theme's logo -->
                    <a href="{{route('frontend.home')}}">
                        <img alt="Image placeholder" src="{{asset('uploads/site_logo.svg')}}" id="footer-logo" width="100" height="100">
                    </a>
                    <!-- Webpixels' mission -->
                    <p class="mt-4 text-sm opacity-8 pr-lg-4">Brief intro.</p>
                    <!-- Social -->
{{--                    <ul class="nav mt-4">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link pl-0" href="https://dribbble.com/webpixels" target="_blank">--}}
{{--                                <i class="fab fa-dribbble"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="https://github.com/webpixels" target="_blank">--}}
{{--                                <i class="fab fa-github"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="https://www.instagram.com/webpxs" target="_blank">--}}
{{--                                <i class="fab fa-instagram"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="https://www.facebook.com/webpixels" target="_blank">--}}
{{--                                <i class="fab fa-facebook"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
                <div class="col-lg-2 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                    <h6 class="heading mb-3">Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{route('frontend.home')}}">Home</a></li>
                        <li><a href="{{route('about')}}">About</a></li>
                        <li><a href="{{route('booking')}}">Book Staff</a></li>
                        <li><a href="{{route('job')}}">Career</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
{{--                <div class="col-lg-2 col-6 col-sm-4 mb-5 mb-lg-0">--}}
{{--                    <h6 class="heading mb-3">About</h6>--}}
{{--                    <ul class="list-unstyled">--}}
{{--                        <li><a href="#">Services</a></li>--}}
{{--                        <li><a href="#">Pricing</a></li>--}}
{{--                        <li><a href="#">Contact</a></li>--}}
{{--                        <li><a href="#">Careers</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-lg-2 col-6 col-sm-4 mb-5 mb-lg-0">--}}
{{--                    <h6 class="heading mb-3">Company</h6>--}}
{{--                    <ul class="list-unstyled">--}}
{{--                        <li><a href="#">Community</a></li>--}}
{{--                        <li><a href="#">Help center</a></li>--}}
{{--                        <li><a href="#">Support</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
            <hr class="divider divider-fade divider-dark my-4">
            <div class="row align-items-center justify-content-md-between pb-4">
                <div class="col-md-6">
                    <div class="copyright text-sm font-weight-bold text-center text-md-left">
                        &copy; {{ now()->year }}<a href="{{route('frontend.home')}}" class="font-weight-bold" target="_blank"> Lifeline Recruitment Ltd.</a>. All rights reserved
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('terms')}}">
                                Terms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('privacy')}}">
                                Privacy
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Core JS  -->
<script src="{{asset('client_assets')}}/libs/jquery/dist/jquery.min.js"></script>
<script src="{{asset('client_assets')}}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('client_assets')}}/libs/svg-injector/dist/svg-injector.min.js"></script>
<script src="{{asset('client_assets')}}/libs/feather-icons/dist/feather.min.js"></script>
<!-- Quick JS -->
<script src="{{asset('client_assets')}}/js/quick-website.js"></script>
<!-- Feather Icons -->
<script>
    feather.replace({
        'width': '1em',
        'height': '1em'
    })
</script>
</body>

</html>
