<?php
	include "/mntL/group/group3/master/scripts/init.php";
	// PHP START
		
	// PHP END
	include $sroot."/master/templates/doctype.php";
	include $sroot."/master/templates/header.php";		
		
?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

<!--


    <div id = "about">
        <br>
        <p><h1>FAQ</h1></p>
        <br>
        Content here
        <br><br>
    </div>
-->
<br>
<header>
	<h3>Frequently Asked Questions</h3>
</header>
<section class="cd-faq">
	<ul class="cd-faq-categories">
		<li><a class="selected" href="#general">General</a></li>
		<li><a href="#membership">Membership</a></li>
		<li><a href="#security">Security</a></li>
		<li><a href="#upload">Upload/Share</a></li>
		<li><a href="#errors">Errors</a></li>
		<li><a href="#account">Account Settings</a></li>
	</ul>  <!--cd-faq-categories-->

	<div class="cd-faq-items">
		<ul id="general" class="cd-faq-group">
			<li class="cd-faq-title"><h4>General</h4></li>
			<li>
				<a class="cd-faq-trigger" href="#0">Where can I find out more about OnTarget?</a>
				<div class="cd-faq-content">
					<p>Please check out our ‘About’ section for more information on the service we provide.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Why can't I access some of the content?</a>
				<div class="cd-faq-content">
					<p> OnTarget is a subscription based service that requires payment from users to access certain areas of our website. To become an OnTarget member, please sign up using this link.</p> <!-- INSERT LINK TO SIGN UP HERE -->
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Where can I find your contact details?</a>
				<div class="cd-faq-content">
					<p>You can find our contact details here. We are available Monday – Friday from 9am until 6.30pm and Saturday from 9am until 5.30pm.</p> <!-- INSERT LINK TO CONTACT US SECTION -->
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">What should I do if I’m not satisfied with your service?</a>
				<div class="cd-faq-content">
					<p>We’re sorry to hear you’re not happy with the service we are providing. Please contact us here and we will get back to you ASAP.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">I have a suggestion! Where can I tell you guys about it?</a>
				<div class="cd-faq-content">
					<p>We welcome suggestions from everyone as we’re always looking to improve our services. Please send your suggestions to suggestions@ontarget.co.uk</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">These FAQs have not solved my problem.</a>
				<div class="cd-faq-content">
					<p>If you are still experiencing difficulties with the service, please contact our dedicated technical team on 02920879154. They are available Monday – Friday from 9am until 6.30pm and Saturday from 9am until 5.30pm.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="membership" class="cd-faq-group">
			<li class="cd-faq-title"><h4>Membership</h4></li>
			<li>
				<a class="cd-faq-trigger" href="#0">What are the differences between the membership types?</a>
				<div class="cd-faq-content">
					<p>We have two membership options: Manager and Player. A manager membership has control of the clubs membership fees, has access to all user areas of the website, and can add or delete members from the team. A player membership also has full access to the website but does not have to pay fees nor has the ability to add or remove members from clubs.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How much does an OnTarget membership cost?</a>
				<div class="cd-faq-content">
					<p>Our current membership fees are as follows:
								<ul style="list-style-type:disc">
 									<li>£69.99 a team signup of up to 20 members</li> <br>
 									<li>£99.99 for a team signup of up to 20-40 members</li> <br>
 									<li>£4.99 for each additional member thereafter</li> <br>
 									<li>30-day free trial</li>
								</ul>  

					</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Are there any promotional offers available?</a>
				<div class="cd-faq-content">
					<p>We currently offer new members a 30-day free trial so that you can get a feel for the service before committing to the subscription.</p>
					<br>
					<p>For our existing members we are offering them £10 off for renewing their subscription within 48 hours.</p>
					<br>
					<p>Please keep an eye out on our Facebook page for limited flash offers.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I cancel my membership to OnTarget?</a>
				<div class="cd-faq-content">
					<p>We will send you an email to inform you that you are coming to the end of your subscription. To cancel before the end date of your contract, please email subscription@ontarget.co.uk or telephone us on 02920879154. Please note that you will not be eligible for a refund.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I get a copy of my payment receipt?</a>
				<div class="cd-faq-content">
					<p>Once you have been billed for the membership fee, a receipt will be emailed to you once the payment has been processed.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="security" class="cd-faq-group">
			<li class="cd-faq-title"><h4>Security</h4></li>
			<li>
				<a class="cd-faq-trigger" href="#0">Is OnTarget secure to use?</a>
				<div class="cd-faq-content">
					<p>We have taken all the necessary measures to ensure your safety when using OnTarget. We promise to keep all your data and personal details secure and we won’t share them with any 3rd parties.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I change my privacy settings?</a>
				<div class="cd-faq-content">
					<p>Privacy is important to us at OnTarget and we understand that you don’t want everyone to see your profile. To change the privacy settings, navigate to the settings page and click the privacy tab. From here you can set it to visible or invisible.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Can I log into OnTarget securely from any computer?</a>
				<div class="cd-faq-content">
					<p>Yes, you can log into OnTarget from any computer with an Internet connection. Just enter your username and password into the log in form.
					</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="upload" class="cd-faq-group">
			<li class="cd-faq-title"><h4>Upload/Share</h4></li>
			<li>
				<a class="cd-faq-trigger" href="#0">How do I upload my video/image?</a>
				<div class="cd-faq-content">
					<p>You can upload your content from the upload section of the website once you are logged in. Just click on the upload button and follow the onscreen instructions.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Why won’t my video/image upload?</a>
				<div class="cd-faq-content">
					<p>Please ensure your file is of the correct format. To convert your file, it is best to use online file converters and then try again.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I share my scores with my friends?</a>
				<div class="cd-faq-content">
					<p>To share your scores with your Facebook friends, click on the blue ‘share’ button located next to the score. A pop up will be displayed on screen and you just needs to confirm your Facebook details.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="errors" class="cd-faq-group">
			<li class="cd-faq-title"><h4>Errors</h4></li>
			<li>
				<a class="cd-faq-trigger" href="#0">The system is displaying my scores incorrectly, why is this?</a>
				<div class="cd-faq-content">
					<p>From time to time OnTarget may encounter some technical difficulties. If you believe your scores are incorrect please email help@ontarget.co.uk detailing the problem and make sure you attach the file you are uploading so that our team can analyse the problem.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">My scores are not being displayed by the system.</a>
				<div class="cd-faq-content">
					<p>This may just be a bit of a technical error. Please contact our dedicated technical team on 02920879154 or email them at help@ontarget.co.uk and they will work with you to resolve this issue.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">The leaderboard isn’t being displayed.</a>
				<div class="cd-faq-content">
					<p>From time to time OnTarget may encounter some technical difficulties. Try logging in and out of your account and if this still does not resolve the problem please email help@ontarget.co.uk explaining the situation and our team will get back to you.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="account" class="cd-faq-group">
			<li class="cd-faq-title"><h4>Account Settings</h4></li>
			<li>
				<a class="cd-faq-trigger" href="#0">I’ve forgotten my password.</a>
				<div class="cd-faq-content">
					<p>To reset your password, please click the ‘forgot my password’ link found in the log in section at the top right hand corner.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">I still haven’t received my password reset link.</a>
				<div class="cd-faq-content">
					<p>Please check your junk folder for from an email from password@ontarget.co.uk if you are still having trouble please contact our technical support on 02920879154.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I change my name, email address, password etc?</a>
				<div class="cd-faq-content">
					<p>Please see the settings section of your account in order to change any of your personal details you used to create an account.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I change my profile picture?</a>
				<div class="cd-faq-content">
					<p>To change your profile picture go to the settings section of your account. From there you will see an option to change your profile picture, click the link and select the photo you want to be displayed from your computer.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">I want to unsubscribe from your newsletter.</a>
				<div class="cd-faq-content">
					<p>To unsubscribe from the OnTarget newsletter, simply go to your account settings and take the tick out of the box next to ‘send me frequent updates and newsletters’.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I update/delete my billing information?</a>
				<div class="cd-faq-content">
					<p>Billing information can be viewed and edited from the settings section of your account.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I delete my OnTarget account?</a>
				<div class="cd-faq-content">
					<p>To delete your account from our database please email help@OnTarget.co.uk from the email address you registered with and set the subject to "Delete Account". Within the email please confirm your name, address and club. Your account will then be deactivated for 14 days before being permanently deleted. To cancel this request, simply log into your account within the 14 day time period.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> 
<script>
    // ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        
        $('#return-to-top').fadeIn(200);    
    } else {
        $('#return-to-top').fadeOut(200);  
    }
});
$('#return-to-top').click(function() {    
    $('body,html').animate({
        scrollTop : 0    
    }, 500);
});</script>


<!-- CONTENT END -->
  
<?php
	include $sroot."/master/templates/footer.php";
?>