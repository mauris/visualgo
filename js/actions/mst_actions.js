var actionsWidth = 150;
var statusCodetraceWidth = 430;

var isSamplesOpen = false;
var isKruskalsOpen = false;
var isPrimsOpen = false;

function openSamples() {
	if(!isSamplesOpen) {
		$('.samples').fadeIn('fast');
		isSamplesOpen = true;
	}
}
function closeSamples() {
	if(isSamplesOpen) {
		$('.samples').fadeOut('fast');
		$('#samples-err').html("");
		isSamplesOpen = false;
	}
}
function openKruskals() {
	if(!isKruskalsOpen) {
		$('.kruskals').fadeIn('fast');
		isKruskalsOpen = true;
	}
}
function closeKruskals() {
	if(isKruskalsOpen) {
		$('.kruskals').fadeOut('fast');
		$('#kruskals-err').html("");
		isKruskalsOpen = false;
	}
}
function openPrims() {
	if(!isPrimsOpen) {
		$('.prims').fadeIn('fast');
		isPrimsOpen = true;
	}
}
function closePrims() {
	if(isPrimsOpen) {
		$('.prims').fadeOut('fast');
		$('#prims-err').html("");
		isPrimsOpen = false;
	}
}

function hideEntireActionsPanel() {
	closeSamples();
	closeKruskals();
	closePrims();
	hideActionsPanel();
}

$( document ).ready(function() {
	
	//action pullouts
	$('#samples').click(function() {
		closePrims();
		closeKruskals();
		openSamples();
	})
	
	$('#prims').click(function() {
		closeSamples();
		closeKruskals();
		openPrims();
	});
	
	$('#kruskals').click(function() {
		closeSamples();
		closePrims();
		openKruskals();
	});
		
	//tutorial mode
	$('#heap-tutorial-1 .tutorial-next').click(function() {
		showActionsPanel();
	});
	$('#heap-tutorial-2 .tutorial-next').click(function() {
		hideEntireActionsPanel();
	});
	$('#heap-tutorial-3 .tutorial-next').click(function() {
		showStatusPanel();
	});
	$('#heap-tutorial-4 .tutorial-next').click(function() {
		hideStatusPanel();
		showCodetracePanel();
	});
	$('#heap-tutorial-5 .tutorial-next').click(function() {
		hideCodetracePanel();
	});
});