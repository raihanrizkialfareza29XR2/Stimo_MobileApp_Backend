<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags --> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>@yield('title')</title>
		<link rel="stylesheet" href="{{ ('front/vendors/mdi/css/materialdesignicons.min.css') }}">
		<link rel="stylesheet" href="{{ ('front/vendors/owl.carousel/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ ('front/vendors/owl.carousel/css/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ ('front/vendors/aos/css/aos.css') }}">
		<link rel="stylesheet" href="{{ ('front/vendors/jquery-flipster/css/jquery.flipster.css') }}">
		<link rel="stylesheet" href="{{ ('front/css/style.css') }}">
		<link rel="shortcut icon" href="{{ ('front/images/mpk.png') }}" />
		<link rel="stylesheet" href="{{ url('mycss/kan.css') }}">
		<link rel="stylesheet" href="{{ url('mycss/box.css') }}">
		<style>
			::-webkit-scrollbar {
				--webkit-appearance: none;
			}

			::-webkit-scrollbar:vertical {
				width: 11px;
			}

			::-webkit-scrollbar:horizontal {
				height: 11px;
			}

			::-webkit-scrollbar-thumb {
				border-radius: 8px;
				border: 2px solid white; /* should match background, can't be transparent */
				background-color: rgba(0, 0, 0, .5);
			}

			::-webkit-scrollbar-track { 
				background-color: #fff; 
				border-radius: 8px; 
			}
			@keyframes example {
				0% {
					transform: translateX(0) translateY(5px)
				}
				50% {
					transform: translateX(0) translateY(-5px)
				}
				100% {
					transform: translateX(0) translateY(5px)
				}
			}
			.gambar {
				animation: example 4s ease-in-out infinite ;
			}
		</style>
        @stack('addon-style')
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div id="mobile-menu-overlay"></div>
		@include('includes.user.navbarc')
		<div class="page-body-wrapper">
			<section id="home" class="home">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="main-banner">
								<div class="d-sm-flex justify-content-between">
									<div data-aos="zoom-in-up">
										<div class="banner-title">
												<h3 class="font-weight-medium">Welcome To PILKETOS SMK Telkom Malang 2021
											</h3>
										</div>
										<p class="mt-3">Pemilihan Ketua OSIS ini sangat menentukan masa depan sekolah, <br> mari gunakan hak pilih
                                        dan jangan golput 
										</p>
										<a href="{{ route('voting') }}" class="btn btn-secondary mt-3">Voting Sekarang</a>
									</div>
									<div class="mt-5 mt-lg-0">
										<img src="{{ url('front/images/group.png') }}" alt="marsmello" class="img-fluid gambar" data-aos="zoom-in-up">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			@yield('content')
			@yield('content2')
			@yield('content3')
		<footer class="footer">
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<address>
								<p>Jl. Danau Ranau, Sawojajar</p>
								<p class="mb-4">Kec. Kedungkandang, Kota Malang, Jawa Timur 65139</p>
								<div class="d-flex align-items-center">
									<p class="mr-4 mb-0">(0341) 712500</p>
									<a href="mailto:info@yourmail.com" class="footer-link">https://smktelkom-mlg.sch.id/</a>
								</div>
							</address>
							<div class="social-icons">
								<h6 class="footer-title font-weight-bold">
									Social Share
								</h6>
								<div class="d-flex">
									<a href="#"><i class="mdi mdi-github-circle"></i></a>
									<a href="#"><i class="mdi mdi-facebook-box"></i></a>
									<a href="#"><i class="mdi mdi-twitter"></i></a>
									<a href="#"><i class="mdi mdi-dribbble"></i></a>
								</div>
							</div>
						</div>
            <div class="col-sm-6">
              <img src="{{ url('front/images/coding.png') }}" alt="footer" width="140" style="margin-left: 450px">
            </div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="d-flex justify-content-between align-items-center">
						<div class="d-flex align-items-center">
							<img src="{{ url('front/images/mpk.png') }}" alt="logo" class="mr-3" style="width: 50px">
							<p class="mb-0 text-small pt-1">© 2021 - 2022 <a href="https://mpkmoklet.rizkigroups.com/" class="text-white" target="_blank">MPK Moklet</a>. All rights reserved.</p> <br>
              <p class="mb-0 text-small pt-1" style="margin-left: 40px">Created By : <a href="https://rizkigroups.com/" class="text-white" target="_blank">RizkiGroups.com</a></p>
						</div>
						<div>
							<div class="d-flex">
								<a href="#" class="text-small text-white mx-2 footer-link">Privacy Policy </a>          
								<a href="#" class="text-small text-white mx-2 footer-link">Customer Support </a>
								<a href="#" class="text-small text-white mx-2 footer-link">Careers </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		</div>
		<script src="{{ url('front/vendors/base/vendor.bundle.base.js') }}"></script>
		<script src="{{ url('front/vendors/owl.carousel/js/owl.carousel.js') }}"></script>
		<script src="{{ url('front/vendors/aos/js/aos.js') }}"></script>
		<script src="{{ url('front/vendors/jquery-flipster/js/jquery.flipster.min.js') }}"></script>
		<script src="{{ url('front/js/template.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="//code.tidio.co/jsdlkkapzor4tiowxvcrytf3zhvhvxd9.js" async></script>
        @include('sweetalert::alert')
	</body>
</html>
