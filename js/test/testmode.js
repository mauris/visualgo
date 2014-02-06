var MODE = "TRAINING";
var sitePrefix = document.URL.replace("/testmode.html","")+"/php/Test.php";
var studentid = "";
var studentpw = "";

var infoRefresh; //setInterval function
var clientsideTimeRefresh; //setInterval function
var availableTime = 0; //in seconds
var timeLeft;

function startTest() {
	init();
	getQnsAndStart(); //fill qnTextArr, qnGraphArr, and qnTypeArr
}

function submitTest() {
	//get score
	ansArr.shift();
	var ansStr = ansArr.join('&ans[]=');
	var queryStr = sitePrefix+"?mode="+MODE_TEST_SUBMIT+"&ans[]="+ansStr+"&username="+studentid+"&password="+studentpw;
	console.log(queryStr); //to remove later
	$.ajax({
		url: queryStr
	}).done(function(score) {
		score = parseInt(score);
		if(score >= 0) {
			clearInterval(infoRefresh);
			clearInterval(clientsideTimeRefresh);
			$('#score').html(score+" out of "+nQns);
			$('#test-screen').fadeOut("fast");
			$('#result-screen').fadeIn("fast");
		} else if(score == -1) {
			clearInterval(infoRefresh);
			clearInterval(clientsideTimeRefresh);
			$('#result-screen').html('<div id="result-name"></div><br/>You have already attempted this quiz.<br/>This score will not be recorded.');
			$('#test-screen').fadeOut("fast");
			$('#result-screen').fadeIn("fast");
		}
	});
}

/*-------START TEST FUNCTIONS-------*/
//store config data for use later
function useConfig(data) {
	seed = data.seed;
	topics = data.topics;
	nQns = data.questionAmount;
	availableTime = data.timeLimit;
	timeLeft = availableTime;
}

//this function gets all the qn data, and displays the ui for qn 1
function getQnsAndStart() {
	console.log(sitePrefix+"?mode="+MODE_GENERATE_QUESTIONS+"&qAmt="+nQns+"&seed="+seed+"&topics="+topics.toString());
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
		$('#submit-test').hide();
		
		//show first question
		gw.startAnimation(qnGraphArr); //start graph widget
		gw.pause();
		qnNo = 1; //start with qn 1
		showQn(qnNo);
		
		//time, attempt no, and date update
		updateInfo();
		infoRefresh = setInterval(function(){updateInfo()}, 10000); //10 sec
		clientsideTimeUpdate();
		clientsideTimeRefresh = setInterval(function() {clientsideTimeUpdate();},1000); //1 sec
	});
}

/*-------INFO/TIME UPDATE FUNCTIONS-------*/
function updateInfo() {
	/* later use AJAX
	$.ajax({//update timer
		url: sitePrefix+"?uid="+studentid+"&pwd="+studentpw+"&mode=6"
	}).done(function(timeElapsed) {
		timeLeft = availableTime-timeElapsed;
		if(timeLeft <=0) {
			submitTest();
		}
	});
	$.ajax({//update name
		url: sitePrefix+"?uid="+studentid+"&pwd="+studentpw+"&mode=7"
	}).done(function(name) {
		$('#student-name').html(name);
		studentname = name;
	});
	*/
	//for now:
	$('#student-name').html("John Doe");
}

function clientsideTimeUpdate() {
	var m = Math.floor(timeLeft/60).toString();
	var s = (timeLeft%60).toString();
	if(s.length <2){ s = "0"+s; }
	if(timeLeft > 60) {
		//m = parseInt(m)+1;
		$('#time-left').html(m+" min left");
	} else {
		$('#time-left').html(s+" s left");
	}
	if(timeLeft <=0) {
		submitTest();
	} else {
		timeLeft--;
	}
}

$(document).ready (function() {
	$('#question-nav').css("background-color", surpriseColour);
	
	/*-------BUTTONS CSS-------*/
	$('.button').css('background',surpriseColour);
	$('.button').hover(function() {
		$(this).css('background','black');
	}, function() {
		$(this).css('background',surpriseColour);
	});
	
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
				$('#login-err').html("");
				$('#login-screen').fadeOut("fast");
				$('#instructions-screen').fadeIn("fast");
			} else {
				$('#login-err').html("Incorrect username or password");
			}
		});
	});
	
	/*-------LOAD TEST-------*/
	$('#start-test').click(function() {
		$.ajax({
			url: sitePrefix+"?mode="+MODE_TEST_BEGIN+"&username="+studentid+"&password="+studentpw
		}).done(function(data) {
			if(data != 0) {
				//show current configurations
				data = JSON.parse(data);
				if(data.testIsOpen==1) {
					useConfig(data);
					$('#instructions-screen').fadeOut("fast");
					$('#question-nav').html("");
					startTest();
				} else {
					$('#dark-overlay').fadeIn(function(){
						$('#no-test').fadeIn(function() {
							setTimeout(function(){ $('#no-test').fadeOut(function() { $('#dark-overlay').fadeOut();});}, 1000);
						});
					});
				}
			}
		});
	});

	/*-------SUBMIT QUIZ-------*/
	$('#submit-test').click(function() {
		submitTest();
	});
});










