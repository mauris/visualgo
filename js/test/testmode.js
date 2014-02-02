var MODE = "TRAINING";
var sitePrefix = document.URL.replace("/testmode.html","")+"/php/Test.php";
var studentid = "";
var studentpw = "";

var infoRefresh; //setInterval function
var clientsideTimeRefresh; //setInterval function
const availableTime=2400; //in seconds - is a FINAL CONST so that students cannot give themselves more time!
var timeLeft=availableTime;

//change to get via AJAX:
	var seed = (Math.floor(Math.random()*1000000000));
	nQns = 10;
	topics = ['BST','Heap','Bitmask','UFDS','GraphTraversal','MST','SSSP'];

function startTest() {
	init();
	getQnsAndStart(); //fill qnTextArr, qnGraphArr, and qnTypeArr
}

function submitTest() {
	//get score
	ansArr.shift();
	var ansStr = ansArr.join('&ans[]=');
	var queryStr = sitePrefix+"?mode="+MODE_CHECK_ANSWERS+"&ans[]="+ansStr+"&seed="+seed+"&qAmt="+nQns+"&topics="+topics.toString();
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
		studentid = $('#login-id').val();
		studentpw = $('#login-pw').val();
		//authentificate
		//for now: just enter, later: use AJAX to query database
		if(true) {
			$('#login-err').html("");
			$('#login-screen').fadeOut("fast");
			$('#instructions-screen').fadeIn("fast");
			return false;
		}
	});
	
	/*-------LOAD TEST-------*/
	$('#start-test').click(function() {
		$('#instructions-screen').fadeOut("fast");
		$('#question-nav').html("");
		startTest();
	});

	/*-------SUBMIT QUIZ-------*/
	$('#submit-test').click(function() {
		submitTest();
	});
});










