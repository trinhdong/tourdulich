@extends('layouts.index')
@section('content')
@include('layouts.menu')
	
	<!-- Home -->

		<div class="home">
		<div class="background_image" style="background-image:url(images/contact.jpg)"></div>
	</div>

	<!-- Search -->

	@include('layouts.timkiem')

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-6">
					<div class="contact_content">
						<div class="contact_title">Hãy liên hệ với chúng tôi</div>
						<div class="contact_text">
							<p>blablabla</p>
						</div>
						<div class="contact_list">
							<ul>
								<li>
									<div>address:</div>
									<div>1481 Creekside Lane Avila Beach, CA 931</div>
								</li>
								<li>
									<div>phone:</div>
									<div>+53 345 7953 32453</div>
								</li>
								<li>
									<div>email:</div>
									<div>yourmail@gmail.com</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-6">
					<div class="contact_form_container">
						<form action="#" id="contact_form" class="contact_form">
							<div style="margin-bottom: 18px"><input type="text" class="contact_input contact_input_name inpt" placeholder="Your Name" required="required"><div class="input_border"></div></div>
							<div class="row">
								<div class="col-lg-6" style="margin-bottom: 18px">
									<div><input type="text" class="contact_input contact_input_email inpt" placeholder="Your E-mail" required="required"><div class="input_border"></div></div>
								</div>
								<div class="col-lg-6" style="margin-bottom: 18px">
									<div><input type="text" class="contact_input contact_input_subject inpt" placeholder="Subject" required="required"><div class="input_border"></div></div>
								</div>
							</div>
							<div><textarea class="contact_textarea contact_input inpt" placeholder="Message" required="required"></textarea><div class="input_border" style="bottom:3px"></div></div>
							<button class="contact_button">send</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Map -->

	<div class="contact_map">
		<!-- Google Map -->
		<div class="map">
			<div id="google_map" class="google_map">
				<div class="map_container">
					<div id="map"></div>
				</div>
			</div>
		</div>
	</div>
@endsection