<link rel="stylesheet" href="<?php echo $wroot; ?>/master/scripts/alertify/alertify.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300italic,700,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Dosis|Abel|Josefin+Sans|Raleway|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
<style type="text/css">
	/* Default Tags */

	html {
  	height:100%;
  }	
	body {
		height:100%;
        font-family:'Open Sans Condensed', sans-serif;	
		font-size:20px;
		margin:0;
		padding:0;
		overflow-y:scroll;
        background-color: #0B293B;
		background-size:cover;
		background-attachment:fixed;
		background-repeat:no-repeat;
		color:<?php echo $colbody; ?>;
	}	
	img {
		border:none;
		display:block;
	}	
	a {
		-webkit-transition:all 0.2s ease-in-out;
		-ms-transition:all 0.2s ease-in-out;
		transition:all 0.2s ease-in-out;
		color:<?php echo $cola; ?>;
	}	
	a:hover {
		color:<?php echo $colahov; ?>;
	}	
	h1 {
		font-size:40px;
		text-align:center;
		padding:0px;
		margin:0px;
		color:#FFF;
		line-height:35px;
	}
	h2 {
		display:block;
		font-size:24px;
		margin:5px 0px;
		padding:0;
	}
	p {
		padding:0px;
		margin:0px;
	}
	select {
		position:relative;
		top:2px;
	}
	.caption {
		font-size:12px;
		padding-top:2px;
		margin:0px;
	}
	/* Default Table */
	table .space {
        border-collapse:separate;
        border-spacing:5px;
    }
	.pad th, .pad td {
        padding:5px;
    }
	/* No spacing or no padding */
	.nospace {
        border-collapse:collapse;
        border-spacing:0;
    }
	table > .nopad th, table > .nopad td {
        padding:5px 0px;
    }
	
	form input {
		outline:none;
        font-family: "Open Sans Condensed";
	}
		
	/* Sections */
	
	#header {
		width:100%;
		background:<?php echo $colheaderbg; ?>;
		z-index:5 !important;
	}
	#banner {
		height:120px;
		margin:0px auto;
	}
	#page {
		width:<?php echo $pagewidth; ?>px;
		margin:0px auto;
	}
	#nav {
		height:<?php echo $navbutheight; ?>px;
		width:<?php echo $pagewidth; ?>px;
		margin:0px auto;
		position:relative;
	}
	#content0 {
		z-index:1;
		margin:0px auto;
		height:100%;
	}
	#content {
		position:relative;
		width:<?php echo $pagewidth; ?>px;
		margin:0px auto;
		height:100%;
	}	
	#footer {
		width:<?php echo $pagewidth; ?>px;
		margin:0px auto;
		background:<?php echo $colfooterbg; ?>;
		color:<?php echo $colfooter; ?>;
		height:50px;
		text-align:center;
		position:relative ;
        bottom: 0;
	}
	#bigQR {
		position:fixed;
		top:25%;
		height:50%;
		width:100%;
		z-index:100;
	}

	/* ////////// Navigation bar ////////// */
	
	#nav #logo {
		height:<?php echo $navbutheight; ?>px;
		width:142px;
		background-image:url('<?php echo $wroot; ?>/i/logo_small2.png');
		background-repeat:no-repeat;
		background-size:auto 65px;
		background-position:center left;
		position:absolute;
		top:0px;
		left:0px;
        background-color: #185573;
	}	
	#nav ul {
		list-style-type:none;
		margin:0px 0px 0px 842px;
		padding:0;
		width:356px;
		height:<?php echo $navbutheight; ?>px;
        background-color: #185573;
        border-right:1px Solid <?php echo $colnavbutborder; ?>;
	}
	#nav ul li {
		float:right;
        background-color: #185573;
	}
	#nav ul li:first-child > a {
		border-left:1px Solid <?php echo $colnavbutborder; ?>;
                background-color: #185573;
	}
	#nav ul li > a {
		width:<?php if ($navbutwidth == -1) {echo "auto";} else {echo ($navbutwidth-16)."px";} ?>;
		height:<?php echo $navbutheight; ?>px;
		line-height:<?php echo $navbutheight; ?>px;
		display:block;
		text-decoration:none;
		border-left:1px Solid <?php echo $colnavbutborder; ?>;
		padding:0px <?php if ($navbutwidth == -1) {echo $navbutpadding;} else {echo "0";} ?>px 0px <?php echo $navbutpadding; ?>px;
                background-color: #185573;
/*
		background:<?php echo $colnavbutbg; ?>;
		color:<?php echo $colnavbuttxt; ?>;
*/
	}	
	#nav ul li > a:hover {
		background:<?php echo $colnavbutbghov; ?>;
/*		color:#08202E;*/
	}	
	#nav ul li > div {
                background-color: #185573;
		position:absolute;
		left:0px;
		height:0px;
		width:<?php echo $navsubbutwidth; ?>px;
		text-align:left;
		padding:0;
		overflow:hidden;
		background-color:<?php echo $colsubnavbutbg; ?>;
		z-index:1 !important;

	}	
	#nav ul li:hover > div {
		left:0px;
		height:<?php echo $navsubbutheight-1; ?>px;
                background-color: #185573;
	}
	#nav ul li > div:hover {
		background-color:<?php //echo $colsubnavbutbghov; ?>;
                background-color: #185573;
	}
	#nav table {
		border-spacing:0px;
		width:100%;
		font-size:12px;
                background-color: #185573;
	}
	#nav td {
		vertical-align:top;
		border-left:1px Solid #FFF;
		padding:10px 5px;
                background-color: #185573;
	}
	#nav td > a {
		color:<?php echo $colsubnavbuttxt; ?>;
                background-color: #185573;
	}
	#nav td > a:hover {
		color:<?php echo $colsubnavbuttxthov; ?>;
                background-color: #185573;
	}
	#nav td > a:first-child  {
		font-weight:bold;
		display:block;
		font-size:14px;
                background-color: #185573;
	}
    #about {
        display: inline block;
        text-align: center;
        width: 40%;
        margin:0px auto;
    }
	#loginform {
		width:300px;
		height:200px;
		margin:0px auto;
		display:block;
		padding:0;
		padding-left:6px;
	}
	.submitbutton {
		background-color:#FFF;
		display:block;
		color:#000;
		font-size:24px;
		font-weight:bold;
		height:40px;
		line-height:30px;
		transition:all 0.2s ease-in-out 0s;
		outline:none;
		border-radius:15px;
		width:120px;
		position:absolute;
		top:125px;
	}
	.submitbutton:hover {
		background-color:#185573;
		border:2px Solid #111;
		color:#FFF;
		cursor:pointer;
	}
	#email {
		position:relative;
		top:9px;
		font-size:24px;
		border-radius:10px;
		padding-left:5px;
		width:284px;
		font-weight:bold;
		text-align:center;
	}
	#password {
		position:relative;
		top:20px;
		font-size:24px;
		border-radius:10px;
		padding-left:5px;
		width:284px;
		font-weight:bold;
		text-align:center;
	}
	#logoutform {
		width:186px;
		position:absolute;
		right:0px;
		top:0px;
		display:block;
		margin:0;
		padding:0;
	}
	#logout {
		background:none;
		border:none;
		margin:0;
		padding:0px 15px;
		display:block;
		color:#FFF;
		font-size:20px;
		height:<?php echo $navbutheight; ?>px;
		line-height:<?php echo $navbutheight; ?>px;
		border-left:1px Solid <?php echo $colnavbutborder; ?>;
		transition:all 0.2s ease-in-out 0s;
		outline:none;
		float:right;
	}
	#logout:hover {
		background-color: #08202E;
		color:#FFF;
		cursor:pointer;
	}
	.toprightnavbut {
		background:none;
		height:<?php echo $navbutheight; ?>px;
		line-height:<?php echo $navbutheight; ?>px;
		padding:0px 15px;
		text-decoration:none;		
		border-left:1px Solid <?php echo $colnavbutborder; ?>;
		float:right;
	}
	.toprightnavbut:hover {
		background-color:#08202E;
	}
	#settingsbut {
		background-image:url('<?php echo $wroot; ?>/i/settings.png');
		background-size:25px;
		background-repeat:no-repeat;
		background-position:center;
		width:56px;
		border-right:1px Solid <?php echo $colnavbutborder; ?>;
	}
	#adminbut {	*/
	}

	/* Sessions Table */
	
	#sessions {
		width:1000px;
	}
	#sessions tr:first-child {
		font-weight:bold;
	}
	#sessions td {
		border-left:1px Solid #FFF;
		padding-left:15px;
	}

	/* Register */

	#register {
		margin:30px auto;
		width:415px;
		font-size:24px;
	}
	#register input, #register select {
		margin-left:5px;
		font-size:20px;
		font-family: 'Open Sans Condensed';
	}
	#register input[type="text"], #register input[type="password"], #register select {
		width:300px;
	}
	#register input[type="submit"] {
		padding:10px;
		font-size:20px;
	}
	
	/* Scores Table */
	
	#scorestable {
		width:1000px;
	}
	#scorestable tr:first-child {
		font-weight:bold;
	}
	#scorestable td {
		border-left:1px Solid #FFF;
		padding:3px 10px;
	}
	
	/* User Info */
	
	#userinfo {
		width:1200px;
		height:300px;
		background-color:rgba(24,85,115,1);
        border-radius:20px; /*changed this from 30 30 0 0 */
		padding:10px;
	}
	#userinfo > div {
		margin:10px;
	}
	#userinfo td {
		margin:10px;
	}
	#userinfo img {
		height:150px;
	}
	
	/* Target */
	
	#scores {
		overflow:hidden;
	}	
	#target {
		width:540px;
		height:540px;
		background-image:url('<?php echo $wroot; ?>/i/target.png');
		background-repeat:no-repeat;
		background-size:contain;
		position:relative;
		margin:25px 0px 25px 20px;
		float:left;
	}
	.dot {
		background-color:#0F0;
		position:absolute;
		border-radius:99px;
		border:1px Solid #000;
		z-index:5;
		margin:5px;
		width:8px;
		height:8px;
	}
	.targetinfo {
		font-size:10px;
		line-height:20px;
	}	
	.crosshair {
		background-color:#F90;
		position:relative;
	}
	#x {height:2px;width:540px;}
	#y {height:540px;width:2px;}
	
	/* Score Panel */
		
	#selector {
		width:601px;
		padding:6px 0px;
		text-align:center;
		background-color:#051319;
        border-radius: 20px;
	}	
	#panel {
		margin-right:39px;
		float:left;
		min-height:572px;
		background-color:none;
	}
	
	/* Score Sheet */ 
	
	#scoresheet {
		position:relative;
	}
	.set12 {
		margin-bottom:6px;
		height:32px;
	}
	.set3 {
		float:left;
		margin-left:6px;
	}
	.set3:first-child {
		margin:0px;
	}
	.set1 {
		width:34px;
		height:32px;
		line-height:32px;
		background-color:#0C0;
		text-align:center;
		float:left;
		margin-left:3px;
		font-size:18px;
		font-weight:bold;
	}
	.set1:first-child {
		margin:0px;
	}
	.set1:first-child {
		margin:0px;
	}
	.setrt {
		width:50px;
		height:32px;
		line-height:32px;
		background-color:#F90;
		text-align:center;
		float:right;
		margin-left:6px;
		font-size:18px;
		color:#000;
		font-weight:bold;
	}
	.setend {
		width:41px;
		height:32px;
		line-height:32px;
		background-color:#6444B7;
		text-align:center;
		float:left;
		margin-left:6px;
		font-size:18px;
		color:#FFF;
		font-weight:bold;
	}
	.scoreM {background-color:#999;}
	.score1 {background-color:#FFF;color:#000;}
	.score2 {background-color:#FFF;color:#000;}
	.score3 {background-color:#000;}
	.score4 {background-color:#000;}
	.score5 {background-color:#41B7C8;}
	.score6 {background-color:#41B7C8;}
	.score7 {background-color:#F21A13;}
	.score8 {background-color:#F21A13;}
	.score9 {background-color:#FFF535;color:#000;}
	.score10 {background-color:#FFF535;color:#000;}
	.scoreX {background-color:#FFF535;color:#000;}
	
	/* Score Graph */
	
	.scoregraph {
		height:65px;
		width:601px;
		vertical-align:bottom;
		position:relative;
	}
	.graphX {border-bottom:5px Solid #FFF535;}
	.graph10 {border-bottom:5px Solid #FFF535;}
	.graph9 {border-bottom:5px Solid #FFF535;}
	.graph8 {border-bottom:5px Solid #F21A13;}
	.graph7 {border-bottom:5px Solid #F21A13;}
	.graph6 {border-bottom:5px Solid #41B7C8;}
	.graph5 {border-bottom:5px Solid #41B7C8;}
	.graph4 {border-bottom:5px Solid #000;}
	.graph3 {border-bottom:5px Solid #000;}
	.graph2 {border-bottom:5px Solid #FFF;}
	.graph1 {border-bottom:5px Solid #FFF;}
	
	/* Stats */
		
	.stats {
		width:601px;
		font-size:18px;
	}
	.stats td {
		line-height:24px;
		vertical-align:top;
	}
	
	.arrow {
		width:16px;
		display:inline;
		padding-right:8px;
	}
	#clubpic {
		background-color:#051319;
		background-repeat:no-repeat;;
		background-size:130px;
		background-position:10px;
		width:150px;
		height:150px;
		border-radius:10px;
	}

	/* User Score Container */

	.userScoreContainer {
		padding:0px;
		margin:20px 0px 0px 0px;
		background-color:rgba(24,85,115,1);
		border-radius:10px 10px 0px 0px;
		overflow:hidden;
	}

	.scoreButtons {
		background-color:#051319;
		padding:9px 0px 1px 0px;
	}

	/* Score Details */

	.scoreDetails {
		height:0px;
		width:100%;
		overflow:hidden;
		transition:all 0.2s ease-out;
	}
	.scoreDetailsButton {
		width:100%;
		height:35px;
		line-height:35px;
		background-color:#051319;
		transition:all 0.2s ease-in-out;
		text-align:center;
		cursor:pointer;
		border-radius:0px 0px 10px 10px;
		margin:0px 0px 20px 0px;
	}
	.scoreDetailsButton:hover {
		background-color:#16242A;
	}
	
	/* All Time Stats */
	
	#alltimestats {
		width:100%;
		float:left;	
		position:relative;
		background-color:rgba(24,85,115,1);	
        border-radius:20px 20px 0px 0px;
	}
	
	/* Timeline */
	
	#timeline {
		width:100%;
		height:200px;
		position:relative;
		padding-top:16px;
	}
	#timeline .key {
		position:absolute;
		top:25px;
		height:10px;
		width:10px;
		font-size:16px;
		color:#FFF;
		border-radius:99px;
	}
	#timeline .key > div {
		position:relative;
		top:-5px;
		left:20px;
	}
	#timelinedotcontainer {
		position:absolute;
		left:50px;
		height:150px;
		top:30px;
	}
	.timelinedot {
		height:<?php echo $timelinedotsize; ?>px;
		width:<?php echo $timelinedotsize; ?>px;
		border-radius:10px;
		background-color:#C33;
		position:absolute;
		transition:all 0.2 ease-in-out 0s;
		z-index:10;
	}	
	.timelinedot div {
		opacity:0;
		background-color:#fff;
		border-radius:10px;
		border:1px Solid #FFF;
		padding:10px;
		overflow:hidden;
		transition:all 0.2s ease-in-out;
		z-index:10;
		width:0px;
		height:0px;
	}	
	.timelinedot:hover div {
		opacity:1;
		height:80px;
		width:200px;
	}
	#timelineylabel {
		line-height:14px;
		position:relative;
		text-align:right;
		width:45px;
		font-size:12px;
		top:30px;
	}
	#timeline .ylines {
		height:29px;
		width:1150px;
		position:absolute;
		background-color:#08202E;
	}
		
	/* Leaderboards */
	
	.leaderboard {
		width:100%;
		border-spacing:0px;
	}
	.leaderboard tr {height:40px;line-height:40px;}
	.leaderboard tr:nth-child(odd) {background-color:#185573;}
	.leaderboard tr:nth-child(even) {background-color:#1E688C;}
	.leaderboard tr:first-child {background-color:#051319;font-weight:bold;}
	.leaderboard td {
		padding:0px;
		margin:0px;
		text-align:center;
	}
	.leaderboard td a {
		display:block;
		width:100%;
		text-decoration:none;
		background:linear-gradient(to right, rgba(11,41,59,1), rgba(0,0,0,0));
		background-position:-500px;
		background-repeat:no-repeat;
		transition:all 0.2s ease-out 0s;
	}
	.leaderboard td a:hover {
		background-position:0px;
	}

	/* Location */

	#location {
		width:1200px;
		height:400px;
		border:none;
		display:block;
	}

	/* Sign Up Page */
	
	#signup {
		width:400px;
		margin:0px auto;
	}
	#signup input[type="text"]
	#signup input[type="password"] {
		width:150px;
	}
	#signup input[type="submit"] {
		width:100px;
		right:0px;
		position:relative;
	}
	
	/* Teams */
	
	#teams {
		height:300px;
		line-height:300px;
		text-align:center;
	}	
	
	/* Gallery */
	
	#gallery {
		height:650px;
		line-height:300px;
		text-align:center;
	}
	
	/* Home */
	
	#committee h2 {
		height:50px;
	}
	#committee td {
		width:166px;
	}	
	.smallBubble {
		position:relative;
		top:0px;
		left:7px;
		height:120px;
		width:120px;
		border-radius:500px;
		border:10px Solid #FFF;
		background-repeat:no-repeat;
		background-size:cover;
		margin-bottom:15px;
	}
	#live {
		padding-top:1px;
		background-color:rgba(0,0,0,0.5);
		width:480px;
		border-bottom:1px Solid #FFF;
		text-align:center;
		margin-bottom:16px;
	}
	#live table {
		text-align:left;
		width:480px;
		border-spacing:0px;
	}
	#live td {padding:0;}
	#live td.clublogo {
		background-color:#000;
		padding:10px;
		width:100px;
	}
	#live #viewresult {
		display:block;
		width:100%;
		height:40px;
		text-align:center;
		line-height:40px;
		text-decoration:none;
		background-color:#111;
	}

	#faqButton {
		display:block;
		width:150px;
		height:50px;
		line-height:50px;
		background-color:#185573;
		border-radius:99px;
		margin:0px auto;
		font-size:28px;
		text-decoration:none;
		font-weight:bold;
		transition:all 0.2s ease-in-out;
		box-shadow:none;
	}

	#faqButton:hover {
		background-color:#296684;
		box-shadow:3px 6px #112;
	}

	#faq {
		width:460px;
		padding:0px 20px 20px 20px;
		background-color:rgba(0,0,0,0.5);
		float:right;
		margin-left:20px;
		margin-bottom:10px;
	}
	#faq table {
		text-align:left;
		width:480px;
		border-spacing:0px;
		border-top:1px Solid #FFF;
		border-left:1px Solid #FFF;
	}
	#faq td {
		border-bottom:1px Solid #FFF;
		border-right:1px Solid #FFF;
		padding:3px;
	}
	
	/* Results */
	
	.results {
		padding-top:1px;
		background-color:rgba(0,0,0,0.5);
		width:1000px;
		text-align:center;
		margin-bottom:16px;
	}
	.resultsheader {
		background-color:rgba(34,34,34,0.5);
		width:1000px;
	}
	.results table {
		text-align:left;
		border-spacing:0px;
	}
	.results td {padding:0;}
	.results td.clublogo {
		background-color:#000;
		padding:10px;
		width:100px;
	}
	.resultsbreakdown {
		width:984px;
		padding:0;
	}
	.resultsbreakdown table {
		width:984px;
	}
	
	/* Admin Panel */
	
	#adminhome td {
		width:200px;
		height:150px;
		padding:0px 50px;
	}
	#adminhome td a {
		display:block;
		width:200px;
	}
	#adminhome td img {
		width:200px;
	}
	
	#results tr:first-child {
		font-weight:bold;
		background-color:#111;
	}
	
	#results td {
		border-left:1px Solid #FFF;
	}
	
	#leaderboards td {
		border-left:1px Solid #FFF;
	}
	
/*FAQ Section*/
    *, *::after, *::before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

body.cd-faq::after {
  /* overlay layer visible on small devices when the right panel slides in */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
/*  background-color: rgba(78, 83, 89, 0.8);*/
  visibility: hidden;
  opacity: 0;
  -webkit-transition: opacity .3s 0s, visibility 0s .3s;
  -moz-transition: opacity .3s 0s, visibility 0s .3s;
  transition: opacity .3s 0s, visibility 0s .3s;
}
body.cd-overlay::after {
  visibility: visible;
  opacity: 1;
  -webkit-transition: opacity .3s 0s, visibility 0s 0s;
  -moz-transition: opacity .3s 0s, visibility 0s 0s;
  transition: opacity .3s 0s, visibility 0s 0s;
}
.cd-faq {
  width: 90%;
  max-width: 1024px;
  margin: 2em auto;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}
.cd-faq:after {
  content: "";
  display: table;
  clear: both;
}
@media only screen and (min-width: 768px) {
  .cd-faq {
    position: relative;
    margin: 4em auto;
    box-shadow: none;
  }
}
    .cd-faq-categories a {
  position: relative;
  display: block;
  overflow: hidden;
  height: 50px;
  line-height: 50px;
  padding: 0 28px 0 16px;
  background-color: #185573;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  white-space: nowrap;
  border-bottom: 1px solid #fff;
  text-overflow: ellipsis;
        text-decoration: none;
}
.cd-faq-categories a::before, .cd-faq-categories a::after {
  /* plus icon on the right */
  position: absolute;
  top: 50%;
  right: 16px;
  display: inline-block;
  height: 1px;
  width: 10px;
  background-color: #185573;
}
.cd-faq-categories a::after {
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}
.cd-faq-categories li:last-child a {
  border-bottom: none;
}
@media only screen and (min-width: 768px) {
  .cd-faq-categories {
    width: 20%;
    float: left;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
  }
  .cd-faq-categories a {
    font-size: 15px;
/*    font-size: 0.8125rem;*/
    font-weight: 600;
    padding-left: 24px;
    padding: 0 24px;
    -webkit-transition: background 0.2s, padding 0.2s;
    -moz-transition: background 0.2s, padding 0.2s;
    transition: background 0.2s, padding 0.2s;
  }
  .cd-faq-categories a::before, .cd-faq-categories a::after {
    display: none;
  }
  .no-touch .cd-faq-categories a:hover {
    background: #071f2d;
  }
  .no-js .cd-faq-categories {
    width: 100%;
    margin-bottom: 2em;
  }
}
@media only screen and (min-width: 1024px) {
  .cd-faq-categories {
    position: absolute;
    top: 0;
    left: 0;
    width: 200px;
    z-index: 2;
  }
  .cd-faq-categories a::before {
    /* decorative rectangle on the left visible for the selected item */
    display: block;
    top: 0;
    right: auto;
    left: 0;
    height: 100%;
    width: 3px;
    background-color: #185573;
    opacity: 0;
    -webkit-transition: opacity 0.2s;
    -moz-transition: opacity 0.2s;
    transition: opacity 0.2s;
  }
  .cd-faq-categories .selected {
    background: #0b293b !important;
  }
  .cd-faq-categories .selected::before {
    opacity: 1;
  }
  .cd-faq-categories.is-fixed {
    /* top and left value assigned in jQuery */
    position: fixed;
  }
  .no-js .cd-faq-categories {
    position: relative;
  }
}

.cd-faq-items {
  position: fixed;
  height: 100%;
  width: 90%;
  top: 0;
  right: 0;
  background: #185573;
  padding: 0 5% 1em;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
  z-index: 1;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transform: translateZ(0) translateX(100%);
  -moz-transform: translateZ(0) translateX(100%);
  -ms-transform: translateZ(0) translateX(100%);
  -o-transform: translateZ(0) translateX(100%);
  transform: translateZ(0) translateX(100%);
  -webkit-transition: -webkit-transform .3s;
  -moz-transition: -moz-transform .3s;
  transition: transform .3s;
}
.cd-faq-items.slide-in {
  -webkit-transform: translateZ(0) translateX(0%);
  -moz-transform: translateZ(0) translateX(0%);
  -ms-transform: translateZ(0) translateX(0%);
  -o-transform: translateZ(0) translateX(0%);
  transform: translateZ(0) translateX(0%);
}
.no-js .cd-faq-items {
  position: static;
  height: auto;
  width: 100%;
  -webkit-transform: translateX(0);
  -moz-transform: translateX(0);
  -ms-transform: translateX(0);
  -o-transform: translateX(0);
  transform: translateX(0);
}
@media only screen and (min-width: 768px) {
  .cd-faq-items {
    position: static;
    height: auto;
    width: 78%;
    float: right;
    overflow: visible;
    -webkit-transform: translateZ(0) translateX(0);
    -moz-transform: translateZ(0) translateX(0);
    -ms-transform: translateZ(0) translateX(0);
    -o-transform: translateZ(0) translateX(0);
    transform: translateZ(0) translateX(0);
    padding: 0;
    background: transparent;
  }
}
@media only screen and (min-width: 1024px) {
  .cd-faq-items {
    float: none;
    width: 100%;
    padding-left: 220px;
  }
  .no-js .cd-faq-items {
    padding-left: 0;
  }
}

.cd-close-panel {
  position: fixed;
  top: 5px;
  right: -100%;
  display: block;
  height: 40px;
  width: 40px;
  overflow: hidden;
  text-indent: 100%;
  white-space: nowrap;
  z-index: 2;
  /* Force Hardware Acceleration in WebKit */
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  -ms-transform: translateZ(0);
  -o-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transition: right 0.4s;
  -moz-transition: right 0.4s;
  transition: right 0.4s;
}
.cd-close-panel::before, .cd-close-panel::after {
  /* close icon in CSS */
  position: absolute;
  top: 16px;
  left: 12px;
  display: inline-block;
  height: 3px;
  width: 18px;
  background: #6c7d8e;
}
.cd-close-panel::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
}
.cd-close-panel::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
.cd-close-panel.move-left {
  right: 2%;
}
@media only screen and (min-width: 768px) {
  .cd-close-panel {
    display: none;
  }
}

.cd-faq-group {
  /* hide group not selected */
  display: none;
}
.cd-faq-group.selected {
  display: block;
}
.cd-faq-group .cd-faq-title {
  background: transparent;
  box-shadow: none;
  margin: 1em 0;
}
.no-touch .cd-faq-group .cd-faq-title:hover {
  box-shadow: none;
}
.cd-faq-group .cd-faq-title h2 {
  text-transform: uppercase;
  font-size: 12px;
  font-size: 0.75rem;
  font-weight: 700;
  color: #bbbbc7;
}
.no-js .cd-faq-group {
  display: block;
}
@media only screen and (min-width: 768px) {
  .cd-faq-group {
    /* all groups visible */
    display: block;
  }
  .cd-faq-group > li {
    background: #185573;
    margin-bottom: 6px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
    -webkit-transition: box-shadow 0.2s;
    -moz-transition: box-shadow 0.2s;
    transition: box-shadow 0.2s;
  }
  .no-touch .cd-faq-group > li:hover {
    box-shadow: 0 1px 10px rgba(108, 125, 142, 0.3);
  }
  .cd-faq-group .cd-faq-title {
    margin: 2em 0 1em;
  }
  .cd-faq-group:first-child .cd-faq-title {
    margin-top: 0;
  }
}

.cd-faq-trigger {
  position: relative;
  display: block;
  margin: 1.6em 0 .4em;
  line-height: 1.2;
}
@media only screen and (min-width: 768px) {
  .cd-faq-trigger {
    font-size: 24px;
    font-size: 1.5rem;
    font-weight: 300;
    margin: 0;
    padding: 24px 72px 24px 24px;
  }
  .cd-faq-trigger::before, .cd-faq-trigger::after {
    /* arrow icon on the right */
    position: absolute;
    right: 24px;
    top: 50%;
    height: 2px;
    width: 13px;
    background: #fff;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition-property: -webkit-transform;
    -moz-transition-property: -moz-transform;
    transition-property: transform;
    -webkit-transition-duration: 0.2s;
    -moz-transition-duration: 0.2s;
    transition-duration: 0.2s;
  }
  .cd-faq-trigger::before {
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
    right: 32px;
  }
  .cd-faq-trigger::after {
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }
  .content-visible .cd-faq-trigger::before {
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }
  .content-visible .cd-faq-trigger::after {
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
  }
}

.cd-faq-content p {
  font-size: 20px;
  line-height: 1.4;
  color: #9CF;
}
@media only screen and (min-width: 768px) {
  .cd-faq-content {
    display: none;
    padding: 0 24px 30px;
  }
  .cd-faq-content p {
    line-height: 1.6;
  }
  .no-js .cd-faq-content {
    display: block;
  }
}
li {
    list-style-type: none;
}
h3 {
    font-size:40px;
/*    text-align:center;*/
    padding:0px;
    margin-left: 35%;
    color:#FFF;
    line-height:35px;
}
h4 {
    display:block;
    font-size: 25px;
    margin:5px 0px;
    margin-left: 3%;
    padding:0;
}
    /*Arrow*/
    #return-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #185573;
    width: 50px;
    height: 50px;
    display: block;
    text-decoration: none;
    -webkit-border-radius: 35px;
    -moz-border-radius: 35px;
    border-radius: 35px;
    display: none;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top i {
    color: #071f2d;
    margin: 0;
    position: relative;
    left: 16px;
    top: 13px;
    font-size: 19px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top:hover {
    background: rgba(24, 85, 115, 0.9);
}
#return-to-top:hover i {
    color: #071f2d;
    top: 5px;
}
#pass {
    margin-left:7%;
}
    
</style>