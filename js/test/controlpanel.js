var MODE = "TRAINING";
var seed = (Math.floor(Math.random()*1000000000));
nQns = 10;
var sitePrefix = document.URL.replace("/controlpanel.html","")+"/php/Test.php";
var testOn = true;
var ansOn = true;

var qnSettingsOpen = true;
var moreSettingsOpen = false;

if(surpriseColour == '#fec515' || surpriseColour == '#a7d41e') { //discard yellow or lime
	surpriseColour = '#52bc69';
}

function startTraining() {
	init();
	getQnsAndStart(); //fill qnTextArr, qnGraphArr, and qnTypeArr
}

function submitTraining() {
	//get score
	ansArr.shift();
	var ansStr = ansArr.join('&ans[]=');
	var queryStr = sitePrefix+"?mode="+MODE_CHECK_ANSWERS+"&ans[]="+ansStr+"&seed="+seed+"&qAmt="+nQns+"&topics="+topics.toString();
	console.log(queryStr); //to remove later
	$.ajax({
		url: queryStr
	}).done(function(score) {
		score = parseInt(score);
		$('#score').html(score+" out of "+nQns);
		$('#test-screen').fadeOut("fast");
		$('#result-screen').fadeIn("fast");
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
		$('#undo-ans').show();
		$('#clear-ans').show();
		$('#info').show();
		$('#ans-key').hide();
		
		//show first question
		gw.startAnimation(qnGraphArr); //start graph widget
		gw.pause();
		qnNo = 1; //start with qn 1
		showQn(qnNo);
	});
}

/*-------SETTINGS PANEL FUNCTIONS-------*/
function toggleQnSettings() {
	if(qnSettingsOpen) {
		$('.qn-settings').slideUp();
		$('#qn-settings img').removeClass('rotateLeft').addClass('rotateRight');
	} else {
		$('.qn-settings').slideDown();
		$('#qn-settings img').removeClass('rotateRight').addClass('rotateLeft');
	}
	qnSettingsOpen = !qnSettingsOpen;
}

function toggleMoreSettings() {
	if(moreSettingsOpen) {
		$('.more-settings').slideUp();
		$('#more-settings img').removeClass('rotateLeft').addClass('rotateRight');
	} else {
		$('.more-settings').slideDown();
		$('#more-settings img').removeClass('rotateRight').addClass('rotateLeft');
	}
	moreSettingsOpen = !moreSettingsOpen;
}

/*-------OVERRIDE TEST_COMMON.JS-------*/
function checkComplete() {}

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
		adminid = $('#login-id').val();
		adminpw = $('#login-pw').val();
		//authentificate
		//for now: just enter, later: use AJAX to query database
		if(true) {
			$('#login-err').html("");
			$('#login-screen').fadeOut("fast");
			$('#settings-screen').fadeIn("fast");
			if(topics.length > 0) {
				startTraining();
			}
			return false;
		}
	});
	
	/*-------SETTINGS MENUS-------*/
	$('#qn-settings').click(function(){
		toggleQnSettings();
	});
	$('#more-settings').click(function(){
		toggleMoreSettings();
	});
	
	/*-------SET SEED-------*/
	$('#set-seed').val(seed);
	$('#set-seed').change(function() {
		seed = parseInt($('#set-seed').val());
	});
	
	$('#new-seed').click(function() {
		seed = (Math.floor(Math.random()*1000000000));
		$('#set-seed').val(seed);
		return false;
	});
	
	/*-------SET NO OF QNS-------*/
	$('#set-nqns').focusin(function() {
		$(this).css('box-shadow','0px 0px 3px '+surpriseColour+' inset');
	}).focusout(function() {
		$(this).css('box-shadow','0px 0px 3px #929292 inset');
	});
	
	$('#set-nqns').change(function() {
		nQns = parseInt($('#set-nqns').val());
		var reg = /^\d+$/;
		if(!reg.test(nQns)) { //not numeric value
			nQns = 10;
			$(this).val(10);
		} 
		if(nQns > 20) {
			nQns = 20;
			$('#set-nqns').val(20);
		}
	});
	
	/*-------TOPIC SELECTION-------*/
	$('.topic').click(function() {
		if($(this).hasClass('topic-selected')) { //deselect it
			$(this).css('background', '#eee').css('color', 'black');
			$(this).removeClass('topic-selected');
			var indexToDel = topics.indexOf($(this).attr('name'));
			topics.splice(indexToDel,1);
		} else { //select it
			$(this).css('background', surpriseColour).css('color', 'white');
			$(this).addClass('topic-selected');
			topics.push($(this).attr('name'));
		}
	});
	$('.topic').hover(function() {
		$(this).css('background', 'black').css('color','white');
	}, function() {
		if($(this).hasClass('topic-selected')) {
			$(this).css('background', surpriseColour).css('color','white');
		} else { //select it
			$(this).css('background', '#eee').css('color','black');
		}
	});
	
	/*-------LOAD TEST DEMO-------*/
	$('#load-test').click(function() {
		$('#result-screen').fadeOut("fast");
		$('#question-nav').html("");
		if(topics.length > 0) {
			startTraining();
		} else {
			alert("Select some topics first!");
		}
	});
	
	/*-------TOGGLE TEST-------*/
	$('#toggle-test').hover(function() {
		if(testOn) {
			$(this).html("Turn OFF");
		} else {
			$(this).html("Turn ON");
		}
	}, function() {
		if(testOn) {
			$(this).html("ON");
		} else {
			$(this).html("OFF");
		}
	});
	$('#toggle-test').click(function() {
		testOn = !testOn;
		if(testOn) {
			$(this).html("ON");
		} else {
			$(this).html("OFF");
		}
	});
	
	/*-------TOGGLE ANS-------*/
	$('#toggle-ans').hover(function() {
		if(ansOn) {
			$(this).html("Turn OFF");
		} else {
			$(this).html("Turn ON");
		}
	}, function() {
		if(ansOn) {
			$(this).html("ON");
		} else {
			$(this).html("OFF");
		}
	});
	$('#toggle-ans').click(function() {
		ansOn = !ansOn;
		if(ansOn) {
			$(this).html("ON");
		} else {
			$(this).html("OFF");
		}
	});
	
	/*-------RESET STUDENT ATTEMPT-------*/
	$('#reset-attempt').focusin(function() {
		$(this).css('box-shadow','0px 0px 3px '+surpriseColour+' inset');
		if ($(this).val() == "student id") {
			$(this).css('color','black');
			$(this).val("");
		}
	}).focusout(function() {
		$(this).css('box-shadow','0px 0px 3px #929292 inset');
		if ($(this).val() == "") {
			$(this).css('color','#aaa');
			$(this).val("student id");
		}
	});

	/*-------SUBMIT QUIZ-------*/
	$('#submit-test').click(function() {
		submitTraining();
	});
	$('#goto-answer').css("background-color", surpriseColour);
	$('#goto-answer').hover(function() {
		$(this).css("background-color", "black");
	}, function() {
		$(this).css("background-color", surpriseColour);
	});
	$('#goto-answer').click(function() {
		MODE = "ANSWER";
		$('#result-screen').fadeOut('fast');
		$('#test-screen').fadeIn('fast');
		$('#ans-key').show();
		$('#undo-ans').hide();
		$('#clear-ans').hide();
		$('#info').hide();
		
		ansArr.unshift(false);
		
		$('#question-nav .qnno').removeClass('selected');
		$('#question-nav .qnno').eq(0).addClass('selected');
		qnNo = 1; //start with qn 1
		showQn(qnNo);
	});	
});










