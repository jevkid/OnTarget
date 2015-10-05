<!--JQuery-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!--Alertify-->
<script src="<?php echo $wroot; ?>/master/scripts/alertify/alertify.js"></script>
<!--Functions-->
<script type="text/javascript">

	// On page load
	document.addEventListener("DOMContentLoaded", function() {
		if (document.URL.indexOf("/admin/users") > -1) {
			document.getElementById('searchBox').onkeyup = doSearch;
			toggleTB();
		}
		if (document.URL.indexOf("/leaderboards") > -1) {
			document.getElementById('leaderboard0').style.maxHeight = "320px"
			document.getElementById('leaderboard1').style.maxHeight = "320px"
			document.getElementById('leaderboard2').style.maxHeight = "320px"
		}
	},false);
	
	function leaderboardExt(lb, maxheight, but) {
		if (maxheight == 320 || maxheight == "320px") {
			lb.style.maxHeight = "999px";
			but.innerHTML = "&uarr; Click To See Top 10 &uarr; &lt;";
		} else {
			lb.style.maxHeight = "320px";
			but.innerHTML = "&darr; Click To See More &darr;";
		}
	}
	
	// Toggle crosshair on scores page
	function crosshairToggle(box) {
		if (box.checked == true) {
			document.getElementById('x').style.display = 'block';
			document.getElementById('y').style.display = 'block';
		} else {
			document.getElementById('x').style.display = 'none';
			document.getElementById('y').style.display = 'none';
		}
	}
	
	// AJAX calls			
	function callAjax(url, str, arr, callback) {
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				callback.call(xmlhttp.responseText);
			}
		}
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("str="+str+"&arr="+arr);
	}
	
	// Search function
	function doSearch() {
		phrase = document.getElementById('searchBox').value;
		checkboxes = document.getElementsByClassName('checkbox');
		var arr = [];
		for (var i = 0; i < checkboxes.length; i++) { 
			if (checkboxes[i].checked == true) {
				arr.push(checkboxes[i].value);
			}
		}
		// Call PHP script with AJAX
		callAjax("<?php echo $wroot; ?>/master/scripts/admin/search.php", phrase, arr, function() {
			document.getElementById('results').innerHTML = this;
		});
	}
	
	// Create random string
	function randStr(len)	{
		var text = "";
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		for (var i = 0; i < len; i++) {
			text += possible.charAt(Math.floor(Math.random()*possible.length));
		}
		return text;
	}
	
	// Toggle admin edituser textbox
	function toggleTB() {
		action = document.getElementById('edituseraction').value
		document.getElementById('edituserTB').style.display = "none";
		document.getElementById('edituserPW').style.display = "none";
		document.getElementById('edituserCom').style.display = "none";
		document.getElementById('edituserTeam').style.display = "none";
		document.getElementById('edituserReg').style.display = "none";
		document.getElementById('edituserClass').style.display = "none";
		document.getElementById('edituserFN').style.display = "none";
		document.getElementById('edituserSN').style.display = "none";
		if (action == "add_score") {
			document.getElementById('edituserTB').placeholder = " <score> : <direction> ; ...";
		} else if (action == "change_class") {
			document.getElementById('edituserClass').style.display = "block";
		} else if (action == "add_com") {
			document.getElementById('edituserCom').style.display = "block";
		} else if (action == "add_team") {
			document.getElementById('edituserTeam').style.display = "block";
		} else if (action == "reset_pw") {
			document.getElementById('edituserPW').style.display = "block";
			document.getElementById('edituserPW').placeholder = " Default: 'password'";
		} else if (action == "del_user" || action == "remove_com" || action == "del_scores" || action == "deact" || action == "react" || action == "remove_team") {
			var text = randStr(5);
			document.getElementById('edituserTB').style.display = "block";
			document.getElementById('edituserTB').placeholder = " Type "+text+" to Confirm";
			document.getElementById('conftext').value = text;
		} else if (action == "change_name") {
			document.getElementById('edituserFN').style.display = "inline-block";
			document.getElementById('edituserSN').style.display = "inline-block";
		} else if (action == "change_email") {
			document.getElementById('edituserTB').style.display = "block";
			document.getElementById('change_email').placeholder = "E-mail Address";
		} else if (action == "add_reg") {
			document.getElementById('edituserReg').style.display = "block";
		}
	}
	
	/*var checkboxes = document.querySelectorAll('checkbox1');
	var checkall = document.getElementById('checkall1');
	for(var i=0; i<checkboxes.length; i++) {
		checkboxes[i].onclick = function() {
			var checkedCount = document.querySelectorAll('input.checkbox1:checked').length;
			
			checkall.checked = checkedCount > 0;
			checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
		}
	}			
	checkall.onclick = function() {
			for(var i=0; i<checkboxes.length; i++) {
					checkboxes[i].checked = this.checked;
			}
	}*/
	
	function confLink(txt,loc) {
		alertify.confirm(txt, function (e) {
			if (e) {
				window.location = loc;
			} else {
				// user clicked "cancel"
			}
		});
	}
	
function highlight(el) {
	var bgcol = "#393";
	var txtcol = "#FFF";
	var ids = el.id.substring(3).split("-");
	for (var i = 0; i < ids.length; i++) {

		document.getElementById('bar'+ids[i]).style.backgroundColor = bgcol;
		document.getElementById('bar'+ids[i]).style.color = txtcol;
		document.getElementById('box'+ids[i]).style.backgroundColor = bgcol;
		document.getElementById('box'+ids[i]).style.color = txtcol;

		var dots = document.getElementsByClassName('dot');
		for (var j = 0; j < dots.length; j++) {
			if (dots[j].id.substring(3).split("-").indexOf(ids[i]) > -1) {
				dots[j].style.backgroundColor = bgcol;
				dots[j].style.color = txtcol;
			}
		}
	}
}

function unhighlight(el) {
	var ids = el.id.substring(3).split("-");
	for (var i = 0; i < ids.length; i++) {
		var bar = document.getElementById('bar'+ids[i]);
		var box = document.getElementById('box'+ids[i]);
		switch (box.className.split(" ")[1].substring(5)) {
			case '1': box.style.backgroundColor = "#FFF";box.style.color = "#000";break;
			case '2': box.style.backgroundColor = "#FFF";box.style.color = "#000";break;
			case '3': box.style.backgroundColor = "#000";box.style.color = "#FFF";break;
			case '4': box.style.backgroundColor = "#000";box.style.color = "#FFF";break;
			case '5': box.style.backgroundColor = "#41B7C8";box.style.color = "#FFF";break;
			case '6': box.style.backgroundColor = "#41B7C8";box.style.color = "#FFF";break;
			case '7': box.style.backgroundColor = "#F21A13";box.style.color = "#FFF";break;
			case '8': box.style.backgroundColor = "#F21A13";box.style.color = "#FFF";break;
			case '9': box.style.backgroundColor = "#FFF535";box.style.color = "#000";break;
			case '10': box.style.backgroundColor = "#FFF535";box.style.color = "#000";break;
			case 'X': box.style.backgroundColor = "#FFF535";box.style.color = "#000";break;
			case 'M': box.style.backgroundColor = "#999";box.style.color = "#FFF";break;
		}
		bar.style.backgroundColor = "#999";

		var dots = document.getElementsByClassName('dot');
		for (var j = 0; j < dots.length; j++) {
			if (dots[j].id.substring(3).split("-").indexOf(ids[i]) > -1) {
				dots[j].style.backgroundColor = "#0F0";
				dots[j].style.color = "#000";
			}
		}
	}
}

function showHideDetails(id) {
	var details = document.getElementById('scoreDetails'+id);
	var detailsButton = document.getElementById('scoreDetailsButton'+id);
	if (details.style.height == "0px") {
		details.style.height = "258px";
		detailsButton.innerHTML = "Click to Hide Details";
	} else {
		details.style.height = "0px";
		detailsButton.innerHTML = "Click to Show Details";
	}
}

function switchQR() {
	var QR = document.getElementById('bigQR');
	if (QR.style.display == "block") {
		QR.style.display = "none";
	} else {
		QR.style.display = "block";
	}
}

</script>