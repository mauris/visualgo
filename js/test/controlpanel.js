var MODE = "TRAINING";
var sitePrefix = document.URL.replace("/controlpanel.html","")+"/php/Test.php";

var seed = (Math.floor(Math.random()*1000000000));
nQns = 10;
var timeLimit = 2400; // in seconds
var maxAttemptCount = 1;
var testOn = true;
var ansOn = true;
var studentListFile;

var qnSettingsOpen = false;
var moreSettingsOpen = false;

if(surpriseColour == '#fec515' || surpriseColour == '#a7d41e') { //discard yellow or lime
	surpriseColour = '#52bc69';
}

function loadTraining() {
	$('#result-screen').fadeOut("fast");
	$('#question-nav').html("");
	if(topics.length > 0) {
		startTraining();
	} else {
		alert("Select some topics first!");
	}
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
function displayConfig(data) { //data is a JSON object
	seed = data.seed;
	$('#set-seed').val(seed);
	topics = data.topics;
	for(var i=0; i<topics.length; i++) {
		topicName = topics[i];
		$('.topic[name='+topicName+']').addClass('topic-selected');
		$('.topic[name='+topicName+']').css('background', surpriseColour).css('color','white');
	}
	nQns = data.questionAmount;
	$('#set-nqns').val(nQns);
	timeLimit = data.timeLimit;
	$('#set-time').val(Math.floor(timeLimit/60));
	if(data.testIsOpen==1) {
		testOn = true;
		$('#toggle-test').val("ON").css('border','1px solid '+surpriseColour);
	} else if(data.testIsOpen==0) {
		testOn = false;
		$('#toggle-test').val("OFF").css('background','#eee').css('border','1px solid #aaa').css('color','#aaa');
	}
	if(data.answerIsOpen==1) {
		ansOn = true;
		$('#toggle-ans').val("ON").css('border','1px solid '+surpriseColour);
	} else if(data.answerIsOpen==0) {
		ansOn = false;
		$('#toggle-ans').val("OFF").css('background','#eee').css('border','1px solid #aaa').css('color','#aaa');
	}
}

function saveConfig() {
	loadTraining();
	$.ajax({
		url: sitePrefix+"?mode="+MODE_ADMIN_EDIT_CONFIG+"&password="+adminpw+"&seed="+seed+"&topics="+topics.toString()+"&questionAmount="+nQns+"&timeLimit="+timeLimit+"&maxAttemptCount="+maxAttemptCount+"&testIsOpen="+(testOn?1:0)+"&answerIsOpen="+(ansOn?1:0)
	}).done(function(passed) {
		customAlert("New test configurations have been saved.");
	});
}

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

function uploadFile() {
	event.stopPropagation();
    event.preventDefault();
	var data = new FormData();
	$.each(studentListFile, function(key, value) {
		data.append(key, value);
	});
	
	 $.ajax({
        url: sitePrefix+'?studentListFile',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
    }).done(function() {
		alert("File uploaded!");
	});
}

/*-------OVERRIDE TEST_COMMON.JS-------*/
function checkComplete() {}

$(document).ready (function() {
	$('#question-nav').css("background-color", surpriseColour);
	
	/*-------LOG IN CSS-------*/
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
		adminpw = $('#login-pw').val();
		//authentificate
		$.ajax({
			url: sitePrefix+"?mode="+MODE_ADMIN+"&password="+adminpw
		}).done(function(passed) {
			passed = parseInt(passed);
			if(passed == 1) {
				$('#login-err').html("");
				$('#login-screen').fadeOut("fast");
				$.ajax({
					url: sitePrefix+"?mode="+MODE_ADMIN_GET_CONFIG+"&password="+adminpw
				}).done(function(data) {
					//show current configurations
					data = JSON.parse(data);
					displayConfig(data);
					$('#settings-screen').fadeIn("fast");
					if(topics.length > 0) {
						startTraining();
					}
				});
			} else {
				$('#login-err').html("Incorrect password");
			}
		});
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
		var temp = $('#set-nqns').val().replace(/[^\0-9]/ig, "");
		$(this).val(temp);
		if(temp != "") {
			if(parseInt(temp) > 20) {
				temp = 20;
				$(this).val(20);
			}
			nQns = parseInt(temp);
		} else {
			timeLimit = 10;
			$(this).val(10);
		}
	});
	
	/*-------SET TIME LIMIT-------*/
	$('#set-time').focusin(function() {
		$(this).css('box-shadow','0px 0px 3px '+surpriseColour+' inset');
	}).focusout(function() {
		$(this).css('box-shadow','0px 0px 3px #929292 inset');
	});
	
	$('#set-time').change(function() {
		var temp = $('#set-time').val().replace(/[^\0-9]/ig, "");
		$(this).val(temp);
		if(temp != "") {
			timeLimit = parseInt(temp)*60;
		} else {
			timeLimit = 2400;
			$(this).val(40);
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
		loadTraining();
	});
	
	/*-------SAVE TEST DEMO-------*/
	$('#save').click(function() {
		event.preventDefault();
		saveConfig();
	});
	
	/*-------TOGGLE TEST-------*/
	$('#toggle-test').hover(function() {
		if(testOn) {
			$(this).val("Turn OFF").css('border','1px solid black');
		} else {
			$(this).val("Turn ON").css('border','1px solid black').css('color','white');
		}
	}, function() {
		if(testOn) {
			$(this).val("ON").css('border','1px solid '+surpriseColour);
		} else {
			$(this).val("OFF").css('background','#eee').css('border','1px solid #aaa').css('color','#aaa');
		}
	});
	$('#toggle-test').click(function() {
		testOn = !testOn;
		if(testOn) {
			$(this).val("ON").css('background',surpriseColour).css('border','1px solid '+surpriseColour).css('color','white');
		} else {
			$(this).val("OFF").css('background','#eee').css('border','1px solid #aaa').css('color','#aaa');
		}
		saveConfig();
	});
	
	/*-------TOGGLE ANS-------*/
	$('#toggle-ans').hover(function() {
		if(ansOn) {
			$(this).val("Turn OFF").css('border','1px solid black');
		} else {
			$(this).val("Turn ON").css('border','1px solid black').css('color','white');
		}
	}, function() {
		if(ansOn) {
			$(this).val("ON").css('border','1px solid '+surpriseColour);
		} else {
			$(this).val("OFF").css('background','#eee').css('border','1px solid #aaa').css('color','#aaa');
		}
	});
	$('#toggle-ans').click(function() {
		ansOn = !ansOn;
		if(ansOn) {
			$(this).val("ON").css('background',surpriseColour).css('border','1px solid '+surpriseColour).css('color','white');
		} else {
			$(this).val("OFF").css('background','#eee').css('border','1px solid #aaa').css('color','#aaa');
		}
		saveConfig();
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
	$('#reset').click(function() {
		var stName = $('#reset-attempt').val();
		$.ajax({
			url: sitePrefix+"?mode="+MODE_ADMIN_RESET_ATTEMPT+"&password="+adminpw+"&username="+stName
		}).done(function(success) {
			if(success==1) {
				customAlert("Attempt for "+stName+" has been reset.");
			} else {
				customAlert("No such student in database.");
			}
		});
	});
	
	/*-------STUDENT LIST FILE UPLOAD-------*/
	$('input[type=file]').on('change', function(event) {
		studentListFile = event.target.files;
	});
	$('#upload-file').click(function() {
		event.preventDefault();
		uploadFile();
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