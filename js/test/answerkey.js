var MODE = "TRAINING";
var sitePrefix = document.URL.replace("/answerkey.html","")+"/php/Test.php";
var studentid = "";
var studentpw = "";

function startAns() {
	init();
	getQnsAndStart(); //fill qnTextArr, qnGraphArr, and qnTypeArr
}

/*-------START TEST FUNCTIONS-------*/
//store config data for use later
function useConfig(data) {
	seed = data.seed;
	topics = data.topics;
	nQns = data.questionAmount;
}

//this function gets all the qn data, and displays the ui for qn 1
function getQnsAndStart() {
	$.ajax({
		url: sitePrefix+"?mode="+MODE_GENERATE_QUESTIONS+"&qAmt="+nQns+"&seed="+seed+"&topics="+topics.toString()
	}).done(function(data) {
		MODE = "TRAINING";
		
		data = JSON.parse(data);
		for(var i=1; i<=nQns; i++) {
			extractInfo(i, data[i-1]);
		}
		
		//switch screens
		prepareQnNav(nQns);
		$('#test-screen').fadeIn("fast");
		
		//show first question
		gw.startAnimation(qnGraphArr); //start graph widget
		gw.pause();
		qnNo = 1; //start with qn 1
		showQn(qnNo);
	});
	$.ajax({//get name to display
		url: sitePrefix+"?mode="+MODE_TEST_GET_INFO+"&username="+studentid+"&password="+studentpw
	}).done(function(data) {
		data = JSON.parse(data);
		var studentname = data.name;
		$('#student-name').html(studentname);
	});
}

$(document).ready (function() {
	$('#question-nav').css("background-color", surpriseColour);
	
	/*-------LOG IN CSS-------*/
	$('#login-id').focusin(function() {
		$(this).css('box-shadow','0px 0px 3px '+surpriseColour+' inset');
		if ($(this).val() == "user id") {
			$(this).css('color','black');
			$(this).val("");
		}
	}).focusout(function() {
		$(this).css('box-shadow','0px 0px 3px #929292 inset');
		if ($(this).val() == "") {
			$(this).css('color','#aaa');
			$(this).val("user id");
		}
	});
	$('#login-pw').focusin(function() {
		$(this).css('box-shadow','0px 0px 3px '+surpriseColour+' inset');
		if ($(this).val() == "password") {
			$(this).attr('type','password');
			$(this).css('color','black');
			$(this).val("");
		}
	}).focusout(function() {
		$(this).css('box-shadow','0px 0px 3px #929292 inset');
		if ($(this).val() == "") {
			$(this).css('color','#aaa');
			$(this).attr('type','text');
			$(this).val("password");
		}
	});
	
	/*-------LOG IN AUTHENTIFICATION-------*/
	$('#login-go').click(function() {
		event.preventDefault();
		studentid = $('#login-id').val();
		studentpw = $('#login-pw').val();
		//authentificate
		$.ajax({
			url: sitePrefix+"?mode="+MODE_LOGIN+"&username="+studentid+"&password="+studentpw
		}).done(function(passed) {
			passed = parseInt(passed);
			if(passed == 1) {
				$.ajax({
					url: sitePrefix+"?mode="+MODE_TEST_BEGIN+"&username="+studentid+"&password="+studentpw //change later to get answers
				}).done(function(data) {
					if(data != 0) {
						//show current configurations
						data = JSON.parse(data);
						if(data.answerIsOpen==1) {
							useConfig(data);
							$('#login-err').html("");
							$('#login-screen').fadeOut("fast");
							$('#question-nav').html("");
							startAns();
						} else {
							customAlert("The answer key is locked at the moment.");
						}
					}
				});
			} else {
				$('#login-err').html("Incorrect username or password");
			}
		});
	});
	
});