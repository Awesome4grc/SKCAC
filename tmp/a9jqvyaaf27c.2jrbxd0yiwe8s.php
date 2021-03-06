<!--
    Author: Awesome Four (Adolfo, Alec, Bo, Keith)
    Date:   4/25/2019
    File: header.html

    Forms page.
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forms</title>
	<link href="css/styles.css" rel="stylesheet">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet"
		  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet"
		  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/vendors/formvalidation/dist/js/FormValidation.min.js"></script>
	<script src="/vendors/formvalidation/dist/js/plugins/Bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="http://code.jquery.com/jquery.js"></script>
</head>

<body>
<div class="container">
	<div class="jumbotron">

		<h1>SKCAC Forms</h1>
		<ul class="nav nav-tabs">
			<li class="active" id="participant-info">
				<a data-toggle="tab" href="#1st">Participant Info</a>
			</li>
			<li id="rights">
				<a data-toggle="tab" href="#2nd">Notice of Rights</a>
			</li>
			<li id="release">
				<a data-toggle="tab" href="#3rd">Release of Information</a>
			</li>
			<li id="photo">
				<a data-toggle="tab" href="#4th">Photo Release</a>
			</li>
			<li id="appeal">
				<a data-toggle="tab" href="#5th">Appeal Grievance Procedures</a>
			</li>
			<li id="medicare">
				<a data-toggle="tab" href="#6th">Medicare & Medicaid</a>
			</li>
			<li id="handbook">
				<a data-toggle="tab" href="#7th">Handbook</a>
			</li>
		</ul>
		<!-- <p>(some text goes here...)</p> -->
		<div class="tab-content">
			<div id="1st" class="tab-pane fade in active">
				<h3></h3> <!-- for space purpose -->

				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button type="button" id="personal1" class="btn btn-link"
										data-toggle="collapse"
										data-target="#collapse1">Participant
								</button>
							</h4>
						</div>

						<div id="collapse1" class="panel-collapse collapse in"
							 aria-labelledby="heading1" data-parent="#accordion">
							<div class="panel-body">

								<!-- Participant Information Form -->
								<form class="user-form" novalidate>
									<div class="form-row">
										<!-- client first name -->
										<div class="form-group col-md-6">
											<label for="clientFirst">First Name</label>
											<input type="text" class="form-control"
												   id="clientFirst" value="Floobus" placeholder=""
												   required > <!--name="participantFirstName"-->
											<!-- hidden -->
											<div class="invalid-feedback">Please enter your first name.</div>
										</div>
										<span class="glyphicon form-control-feedback"></span>
										<!-- client last name -->
										<div class="form-group col-md-6">
											<label for="clientLast">Last Name</label>
											<input type="text" class="form-control"
												   id="clientLast"
												   name="participantLastName" value="Doobus"
												   placeholder="" required>
											<div class="invalid-feedback">Please enter your last name</div> <!-- hidden -->
										</div>
									</div>

									<div class="form-row">
										<!-- client email -->
										<div class="form-group col-md-6">
											<label for="clientEmail">Email</label>
											<input type="email" class="form-control"
												   id="clientEmail" name="participantEmail"
												   aria-describedby="emailHelp"
												   placeholder="" value="glubble@blubble.com"
												   data-error="email address is invalid"
												   required>
											<small id="emailHelp"
												   class="form-text text-muted"></small>
											<div class="invalid-feedback">Please enter a valid email</div> <!-- hidden -->
										</div>

										<!-- client phone -->
										<div class="form-group col-md-6">
											<label for="clientPhone">Phone</label>
											<input type="tel" class="form-control"
												   id="clientPhone" name="participantPhone" value="123-456-7890"
												   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
												   placeholder="999-999-9999" required>
											<div class="invalid-feedback">Please enter a valid phone number</div> <!-- hidden -->
										</div>
									</div>

									<div class="form-row">
										<!-- participant address -->
										<div class="form-group col-md-12">
											<label for="clientAddress">Address</label>
											<input type="text" class="form-control"
												   id="clientAddress" value="1234 Main St"
												   name="participantAddress"
												   placeholder="1234 Main St" required>
											<div class="invalid-feedback">Please enter your address</div> <!-- hidden -->
										</div>
									</div>

									<div class="form-row">
										<!-- participant address 2 -->
										<div class="form-group col-md-12">
											<label for="clientAddress2">Address 2</label>
											<input type="text" class="form-control"
												   id="clientAddress2"
												   name="participantAddress2"
												   placeholder="apartment, studio, or floor">
											<div class="invalid-feedback"></div> <!-- hidden -->
										</div>
									</div>

									<div class="form-row">
										<!-- participant city -->
										<div class="form-group col-md-6">
											<label for="clientCity">City</label>
											<input type="text" class="form-control" value="Auburn"
												   id="clientCity" name="participantCity"
												   placeholder="" required>
											<div class="invalid-feedback">Please enter your city</div>
										</div>

										<!-- participant state -->
										<div class="form-group col-md-4">
											<label for="clientState">State</label>
											<input type="text" class="form-control" value="Washington"
												   id="clientState" name="participantState"
												   placeholder="" required>
											<div class="invalid-feedback">Please enter your state</div>
										</div>

										<!-- participant zip -->
										<div class="form-group col-md-2">
											<label for="clientZip">Zip</label>
											<input type="text" class="form-control" value="98002"
												   id="clientZip" name="participantZip"
												   placeholder="" required>
											<div class="invalid-feedback">Please enter your zip code</div> <!-- hidden -->
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<button type="button" id="1" name="user-form"
													class="btn btn-acc btn-primary">Next
											</button>
										</div>
									</div>
								</form>
								<!-- end of the 1st form -->
							</div>
						</div>
					</div>
					<!-- end of 1st Accordion -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button type="button" id='personal2'
										class="btn btn-link collapsed"
										data-toggle="collapse"
										data-target="#collapse2">Residential Provider
								</button>
							</h4>
						</div>

						<div id="collapse2" class="panel-collapse collapse"
							 aria-labelledby="heading2" data-parent="#accordion">
							<div class="panel-body">

								<!-- Provider Information Form -->
								<form class="provider-form">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>First Name</label>
											<input type="text" class="form-control"
												   id="providerFirst" value="Scrungus"
												   name="providerFirstName" placeholder=""
												   required>
											<span class="glyphicon form-control-feedback"></span>
										</div>

										<div class="form-group col-md-6">
											<label>Last Name</label>
											<input type="text" class="form-control"
												   id="providerLast" value="the Wise"
												   name="providerLastName" placeholder=""
												   required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Email</label>
											<input type="email" class="form-control" value="wizened@magic.org"
												   id="providerEmail" name="providerEmail"
												   placeholder="" required>
										</div>

										<div class="form-group col-md-6">
											<label>Phone</label>
											<input type="text" class="form-control" value="123-456-7890"
												   id="providerPhone" name="providerPhone"
												   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
												   placeholder="999-999-9999" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<label>Address</label>
											<input type="text" class="form-control"
												   id="providerAddress" value="1667 Pub St"
												   name="providerAddress"
												   placeholder="1234 Main St" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<label>Address 2</label>
											<input type="text" class="form-control"
												   id="providerAddress2"
												   name="providerAddress2"
												   placeholder="apartment, studio, or floor">
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label>City</label>
											<input type="text" class="form-control" value="Seer's Village"
												   id="providerCity" name="providerCity"
												   required>
										</div>

										<div class="form-group col-md-4">
											<label>State</label>
											<input type="text" class="form-control" value="Washington"
												   id="providerState" name="providerState"
												   placeholder="" required>
										</div>

										<div class="form-group col-md-2">
											<label>Zip</label>
											<input type="text" class="form-control" value="98008"
												   id="providerZip" name="providerZip"
												   required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<button type="button" id="2" name="provider-form"
													class="btn btn-acc btn-primary">Next
											</button>
										</div>
									</div>
								</form>
								<!-- end of the 2nd form -->

							</div>
						</div>
					</div>
					<!-- end of 2nd Accordion -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button type="button" id="personal3"
										class="btn btn-link collapsed"
										data-toggle="collapse"
										data-target="#collapse3">Guardian
								</button>
							</h4>
						</div>

						<div id="collapse3" class="panel-collapse collapse"
							 aria-labelledby="heading3" data-parent="#accordion">
							<div class="panel-body">

								<!-- Legal Guardian Information Form -->
								<form class="guardian-form">
									<label>
										<input type="checkbox" class="btn btn-guard"> I do not have a legal guardian
									</label>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>First Name</label>
											<input type="text" class="form-control"
												   id="guardFirst" name="guardian" value="Targus"
												   placeholder="" required>
											<span class="glyphicon form-control-feedback"></span>
										</div>

										<div class="form-group col-md-6">
											<label>Last Name</label>
											<input type="text" class="form-control" value="Crushfist"
												   id="guardLast" name="guardian"
												   placeholder="" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Email</label>
											<input type="email" class="form-control"
												   id="guardEmail" name="guardian" value="can_crusher@hotmail.com"
												   placeholder="" required>
										</div>

										<div class="form-group col-md-6">
											<label>Phone</label>
											<input type="text" class="form-control"
												   id="guardPhone" name="guardian" value="123-456-7890"
												   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
												   placeholder="999-999-9999" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<label>Address</label>
											<input type="text" class="form-control"
												   id="guardAddress" name="guardian" value="99 Skullcrusher Ave"
												   placeholder="1234 Main St" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<label>Address 2</label>
											<input type="text" class="form-control"
												   id="guardAddress2"
												   name="guardianAdd2"
												   placeholder="Apartment, studio, or floor">
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label>City</label>
											<input type="text" class="form-control"
												   id="guardCity" name="guardian" value="Hobart"
												   required>
										</div>

										<div class="form-group col-md-4">
											<label>State</label>
											<input type="text" class="form-control"
												   id="guardState" name="guardian" value="Washington"
												   placeholder="state" required>
										</div>

										<div class="form-group col-md-2">
											<label>Zip</label>
											<input type="text" class="form-control" value="98025"
												   id="guardZip" name="guardian"
												   required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<button type="button" id="3"
													name="guardian-form"
													class="btn btn-acc btn-primary">Next
											</button>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
					<!-- end of the 3rd Accordion -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button type="button" id="personal4"
										class="btn btn-link collapsed"
										data-toggle="collapse" data-target="#collapse4">NSA
								</button>
							</h4>
						</div>

						<div id="collapse4" class="panel-collapse collapse"
							 aria-labelledby="heading4" data-parent="#accordion">
							<div class="panel-body">

								<!-- NSA(Client Rep.) Form -->
								<form class="rep-form">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>First Name</label>
											<input type="text" class="form-control" value="Donald"
												   id="nsaFirst" name="repFirstName"
												   placeholder="" required>
											<span class="glyphicon form-control-feedback"></span>
										</div>

										<div class="form-group col-md-6">
											<label>Last Name</label>
											<input type="text" class="form-control" value="Duck"
												   id="nsaLast" name="repLastName"
												   placeholder="" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Email</label>
											<input type="email" class="form-control"
												   id="nsaEmail" name="repEmail" value="superduck@ducksquad.net"
												   placeholder="" required>
										</div>

										<div class="form-group col-md-6">
											<label>Phone</label>
											<input type="text" class="form-control"
												   id="nsaPhone" name="repPhone" value="123-456-7890"
												   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
												   placeholder="999-999-9999" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<button type="button" id="4"
													name="rep-form"
													class="btn btn-acc btn-primary">Next
											</button>
										</div>
									</div>
								</form>
								<!-- end of NSA form -->
							</div>
						</div>
					</div>
					<!-- end of the 4th Accordion -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button type="button" id="personal5"
										class="btn btn-link collapsed"
										data-toggle="collapse"
										data-target="#collapse5">Emergency Contact
								</button>
							</h4>
						</div>

						<div id="collapse5" class="panel-collapse collapse"
							 aria-labelledby="heading5" data-parent="#accordion">
							<div class="panel-body">

								<!-- Emergency Contact Form -->
								<form class="emerg-form" novalidate>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>First Name</label>
											<input type="text" class="form-control"
												   id="emergFirst" name="emergFirstName" value="Benito"
												   placeholder="" required>
											<span class="glyphicon form-control-feedback"></span>
										</div>

										<div class="form-group col-md-6">
											<label>Last Name</label>
											<input type="text" class="form-control" value="Mussolini"
												   id="emergLast" name="emergLastName"
												   placeholder="" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Emergency Phone</label>
											<input type="text" class="form-control"
												   id="emergPhone" name="emergPhone" value="123-456-7890"
												   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
												   placeholder="999-999-9999" required>
										</div>

										<div class="form-group col-md-6">
											<label>Alternate Phone</label>
											<input type="text" class="form-control"
												   id="emergAltPhone" name=emergPhone2" value="123-456-7890"
												   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
												   placeholder="999-999-9999">
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<button type="button" id="5" name="emerg-form"
													class="btn btn-acc btn-primary">Next
											</button>
										</div>
									</div>
								</form>
								<!-- end of emergency form -->

							</div>
						</div>
					</div>
					<!-- end of the 5th Accordion -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button type="button" id="personal6"
										class="btn btn-link collapsed"
										data-toggle="collapse"
										data-target="#collapse6">Medication
								</button>
							</h4>
						</div>

						<div id="collapse6" class="panel-collapse collapse"
							 aria-labelledby="heading6" data-parent="#accordion">
							<div class="panel-body">
								<form class="med-form" novalidate>
									<button type="button" class="btn btn-primary btn-med" name="0">
										Add Medication
									</button>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Medication and Dosage (med-form)</label>
											<span class="medications">

													</span>
										</div>

										<div class="form-group col-md-4">
											<label>Frequency Taken</label>
											<span class="frequencies">

                                                    </span>
										</div>

										<div class="form-group col-md-4">
											<label>Time Taken</label>
											<span class="times">

                                                    </span>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-12">
											<button type="button" id="6" name="med-form"
													class="btn btn-acc btn-primary">Next
											</button>
										</div>
									</div>
								</form>
								<!-- end of medication form -->

							</div>
						</div>
					</div>
					<!-- end of the 6th Accordion -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button type="button" id="personal7"
										class="btn btn-link collapsed"
										data-toggle="collapse"
										data-target="#collapse7">Alerts, Restrictions, Limitations
								</button>
							</h4>
						</div>

						<div id="collapse7" class="panel-collapse collapse"
							 aria-labelledby="heading7" data-parent="#accordion">
							<div class="panel-body">
								<form class="alert-form" novalidate>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Medical Alerts</label>
											<br>
											<textarea rows="10" cols="40"
													  placeholder="allergies, high blood pressure, diabetic, etc."></textarea>
										</div>

										<div class="form-group col-md-4">
											<label>Physical Limitations</label>
											<br>
											<textarea rows="10" cols="40"
													  placeholder="bending, sitting, standing, etc."></textarea>

										</div>

										<div class="form-group col-md-4">
											<label>Diet Restrictions</label>
											<br>
											<textarea rows="10" cols="40"></textarea>
										</div>

										<div class="form-row">
											<div class="form-group col-md-12">
												<a data-toggle="tab" href="#2nd"><button type="button" class="btn btn-acc btn-primary" name="alert-form">Next</button></a>
											</div>
										</div>
									</div>
								</form>
								<!-- end of form -->

							</div>
						</div>
					</div>
					<!-- end of the 7th Accordion -->
				</div>
			</div>

			<div id="2nd" class="tab-pane fade">
				<h3></h3>

				<form class="rights">
					<p>As a participant of services provided by SKCAC Industries and Employment Services, you have the right to:</p>
					<p>- Respectful staff-to-participant interactions;</p>
					<p>- Be treated with dignity and respect;</p>
					<p>- Be free from any kind of abuse or punishment including neglect, financial exploitation, abandonment, humiliation, retaliation, verbal, mental, physical and/or sexual abuse;</p>
					<p>- Be free from discrimination and harassment on the basis of race, color, national origin, gender, age, religion, creed, marital status, disability, sexual orientation, or the presence of any physical, mental or sensory disability;</p>
					<p>- Be compensated for work at prevailing wages and commensurate with abilities;</p>
					<p>- Be free from invasion of privacy;</p>
					<p>- Have information about you treated confidentially;</p>
					<p>- Actively participate in the development/modification of your service program;</p>
					<p>- Select your own vocational goals and have final approval on all plans SKCAC helps you with or makes for you;</p>
					<p>- Be provided services in your best interest and related to your needs;</p>
					<p>- Review your service records, have access to and release of your personal records, as requested;</p>
					<p>- Be fully informed regarding fees to be charged and methods for payment;</p>
					<p>- Be provided with rules and regulation governing conduct and responsibilities of SKCAC participants and employees;</p>
					<p>- Register complaints and recommendations without interference, reprisal or retaliation;</p>
					<p>- An appeal/grievance process if you disagree with a SKCAC decision and that the action will not result in retaliation or barriers to services;</p>
					<p>- Involve others in the planning process (spouse, parents, guardian, advocates, etc.);</p>
					<p>- Informed consent about service delivery, release of information, composition of service delivery team, and involvement in research projects;</p>
					<p>- Informed right of refusal, when consent is required, with explanation of risks and adverse consequences of the refusal;</p>
					<p>- Access to self help and advocacy services;</p>
					<p>- Access or referral to legal entities for appropriate representation, if needed;</p>
					<p>- Investigation and resolution of alleged infringement of rights.</p>
					<p>This information has been reviewed with me and I understand my rights as a participant of services provided by SKCAC Industries and Employment Services</p>

					<div class="checkbox">
						<!-- <label><input type="checkbox"> Remember me</label><br> -->
						<label>
							<input type="checkbox" id="participantSig" required>
							Program Participant Acknowledgement
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="guardianSig" name="guardian" required>
							Guardian (if under legal guardianship) Acknowledgement
						</label>
					</div>

					<a data-toggle="tab" href="#3rd"><button type="button" class="btn btn-acc btn-primary">Next</button></a>						</form>
				<!-- end of form -->
			</div>
			<!-- end of 2nd tab pane -->

			<div id="3rd" class="tab-pane fade">
				<h3></h3>
				<p></p>

				<form class="release">
					<h3 class="mt-2">Release of Information</h3>
					<p>I, ________________________________, hereby give my permission for SKCAC
						Industries and Employment Services to
						exchange necessary information regarding my employment and program services
						with the agencies and/or individuals indicated below:
					</p>
					<label class="font-weight-bold">Referring Agency</label>
					<br>
                    <label>
					<select name="agency" id="referring" class="form-control">
						<option value="dshs">
                            Developmental Disabilities Administration, DSHS
						</option>
						<option value="dvr">Division of Vocational Rehabilitation (DVR)</option>
					</select>
                    </label>
					<br>

					<label class="font-weight-bold">Funding Agency</label>
					<br>
                    <label>
					<select name="agency" id="funding" class="form-control">
						<option>King County, Developmental Disabilities Section</option>
						<option>Division of Vocational Rehabilitation (DVR)</option>
					</select>
                    </label>
					<br>
					<label class="font-weight-bold">Employer/Volunteer site</label>
					<br>
					<input type="text" id="employer" class="form-control"
						   placeholder="employer">
					<br>
					<label class="font-weight-bold">Other</label>
					<br>
					<input type="text" id="other" class="form-control" placeholder="other">
					<br>
					<p>The information may be released via mail, phone, personal interview, fax or other means of communication.
						<br>
						I have been informed that information about me is confidential and restricted for employment and program services purposes only.
						<br>
						This release/exchange of information release is active and valid for a 12-month period, from date of signature.
					</p>

					<div class="checkbox">
						<label>
							<input type="checkbox" required>
							Program Participant Acknowledgement
						</label>
					</div>

					<div class="checkbox">
						<label>
							<input type="checkbox" name="guardian" required>
							Guardian (if under legal guardianship) Acknowledgement
						</label>
					</div>

					<a data-toggle="tab" href="#4th"><button type="button" class="btn btn-acc btn-primary">Next</button></a>						</form>
			</div>
			<!-- end of 3rd tab pane -->

			<div id="4th" class="tab-pane fade">
                <form class="photo">
				<h3></h3>
				<p></p>

				<h3 class="mt-2">Photo Release</h3>
				<p>I, _________________________________, hereby give my permission for SKCAC Industries and Employment Services to use my photograph for the specified use below:
					<br>
					as part of materials promoting supported employment to potential employers and at community events which focus on supported employment.
					<br>
					I have been informed that the photograph will be used for the purpose stated, and is restricted to said use.
					<br>
					This release is considered active and valid for a 12-month period, from the date of signature.
				</p>

				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember" required>
						Program Participant Acknowledgement
					</label>
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox" name="guardian" required>
						Guardian (if under legal guardianship) Acknowledgement
					</label>
				</div>
                </form>

				<a data-toggle="tab" href="#5th"><button type="button" class="btn btn-acc btn-primary">Next</button></a>					</div>
			<!-- end of 4th tab pane -->

			<div id="5th" class="tab-pane fade">
				<form class="appeal">
				<h3></h3>
				<p></p>

				<p>As a participant of services provided by SKCAC Industries and Employment Services, you have the right to:</p>
				<p>- Respectful staff-to-participant interactions;</p>
				<p>- Be treated with dignity and respect;</p>
				<p>- Be free from any kind of abuse or punishment including neglect, financial exploitation, abandonment, humiliation, retaliation, verbal, mental, physical and/or sexual abuse;</p>
				<p>- Be free from discrimination and harassment on the basis of race, color, national origin, gender, age, religion, creed, marital status, disability, sexual orientation, or the presence of any physical, mental or sensory disability;</p>
				<p>- Be compensated for work at prevailing wages and commensurate with abilities;</p>
				<p>- Be free from invasion of privacy;</p>
				<p>- Have information about you treated confidentially;</p>
				<p>- Actively participate in the development/modification of your service program;</p>
				<p>- Select your own vocational goals and have final approval on all plans SKCAC helps you with or makes for you;</p>
				<p>- Be provided services in your best interest and related to your needs;</p>
				<p>- Review your service records, have access to and release of your personal records, as requested;</p>
				<p>- Be fully informed regarding fees to be charged and methods for payment;</p>
				<p>- Be provided with rules and regulation governing conduct and responsibilities of SKCAC participants and employees;</p>
				<p>- Register complaints and recommendations without interference, reprisal or retaliation;</p>
				<p>- An appeal/grievance process if you disagree with a SKCAC decision and that the action will not result in retaliation or barriers to services;</p>
				<p>- Involve others in the planning process (spouse, parents, guardian, advocates, etc.);</p>
				<p>- Informed consent about service delivery, release of information, composition of service delivery team, and involvement in research projects;</p>
				<p>- Informed right of refusal, when consent is required, with explanation of risks and adverse consequences of the refusal;</p>
				<p>- Access to self help and advocacy services;</p>
				<p>- Access or referral to legal entities for appropriate representation, if needed;</p>
				<p>- Investigation and resolution of alleged infringement of rights.</p>
				<p>- This information has been reviewed with me and I understand my rights as a participant of services provided by SKCAC Industries and Employment Services</p>

				<div class="checkbox">
					<label>
						<input type="checkbox" required>
						Program Participant Acknowledgement
					</label>
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox" name="guardian" required>
						Guardian (if under legal guardianship) Acknowledgement
					</label>
				</div>
				</form>

				<a data-toggle="tab" href="#6th"><button type="button" class="btn btn-acc btn-primary">Next</button></a>					</div>

			<div id="6th" class="tab-pane fade">
				<h3></h3>
				<p></p>

				<form class="medicare">
					<h3 class="mt-2"> Title II/Medicare and SSI/Medicaid</h3>
					<p>I hereby acknowledge that I have received information to find Title II Benefits: SSDI (Disability Insurance),
						CDB (Childhood Disability Benefits) and Medicare 2018 and Supplemental Security Income and Medicaid 2018
						at www.ssa.gov. I understand that while the Employment Support Agency (SKCAC) may offer basic assistance or
						information regarding my benefits, the Agency is not responsible for managing my Title II and Medicare or Supplemental
						Security Income and Medicaid benefits.
					</p>

					<label>SSDI Amount
						<input type="text" id="ssdiAmount">
					</label>

					<label> SSI Amount
						<input type="text" id="ssiAmount">
					</label>
					<br>

					<a data-toggle="tab" href="#7th"><button type="button" class="btn btn-acc btn-primary">Next</button></a>
				</form>
			</div>
			<div id="7th" class="tab-pane fade">
				<h3></h3>
				<p></p>

				<form class="handbook">
					<a href="views2/handbook.html" target="_blank">
						<h3 class="mt-2">Participant Handbook</h3>
					</a>
					<iframe height="400px" width="100%"
							src="participant_forms/Handbook Assessment and Placement 2-1-2018.pdf"></iframe>
					<p> By checking the box you acknowledge that you have received and read
						Participant handbook. Please direct any questions you may have to
						your SKCAC Program Services representative.
					</p>

					<div class="checkbox">
						<label>
							<input type="checkbox" required>
							Program Participant Acknowledgement
						</label>
					</div>

					<div class="checkbox">
						<label>
							<input type="checkbox" name="guardian" required>
							Guardian (if under legal guardianship) Acknowledgement
						</label>
					</div>

					<button type="button" class="btn btn-conf btn-primary">Confirm</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end of the Jumbotron -->

<script src="JavaScript/nextButton.js"></script>
<script src="JavaScript/addMedication.js"></script>
</body>
</html>