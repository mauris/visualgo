//actions panel stuff
var actionsWidth = 150;
var statusCodetraceWidth = 420;

var isSearchOpen = false;
var isInsertOpen = false;
var isRemoveOpen = false;
var isInorderOpen = false;

function openSearch() {
	if(!isSearchOpen) {
		$('.search').fadeIn('fast');
		isSearchOpen = true;
	}
}
function closeSearch() {
	if(isSearchOpen) {
		$('.search').fadeOut('fast');
		$('#search-err').html("");
		isSearchOpen = false;
	}
}
function openInsert() {
	if(!isInsertOpen) {
		$('.insert').fadeIn('fast');
		isInsertOpen = true;
	}
}
function closeInsert() {
	if(isInsertOpen) {
		$('.insert').fadeOut('fast');
		$('#insert-err').html("");
		isInsertOpen = false;
	}
}
function openRemove() {
	if(!isRemoveOpen) {
		$('.remove').fadeIn('fast');
		isRemoveOpen = true;
	}
}
function closeRemove() {
	if(isRemoveOpen) {
		$('.remove').fadeOut('fast');
		$('#remove-err').html("");
		isRemoveOpen = false;
	}
}
function openInorder() {
	if(!isInorderOpen) {
		$('.inorder').fadeIn('fast');
		isInorderOpen = true;
	}
}
function closeInorder() {
	if(isInorderOpen) {
		$('.inorder').fadeOut('fast');
		$('#inorder-err').html("");
		isInorderOpen = false;
	}
}

//
function hideEntireActionsPanel() {
	closeSearch();
	closeInsert();
	closeRemove();
	closeInorder();
	hideActionsPanel();
}

$( document ).ready(function() {
	
	//action pullouts
	$('#search').click(function() {
		closeInsert();
		closeRemove();
		closeInorder();
		openSearch();
	});
	$('#insert').click(function() {
		closeSearch();
		closeRemove();
		closeInorder();
		openInsert();
	});
	$('#remove').click(function() {
		closeSearch();
		closeInsert();
		closeInorder();
		openRemove();
	});
	
	$('#inorder').click(function() {
		closeSearch();
		closeInsert();
		closeRemove();
		openInorder();
	});
	
	//tutorial mode
	$('#bst-tutorial-2 .tutorial-next').click(function() {
		showActionsPanel();
	});
	$('#bst-tutorial-3 .tutorial-next').click(function() {
		hideEntireActionsPanel();
	});
	$('#bst-tutorial-4 .tutorial-next').click(function() {
		showStatusPanel();
	});
	$('#bst-tutorial-5 .tutorial-next').click(function() {
		hideStatusPanel();
		showCodetracePanel();
	});
	$('#bst-tutorial-6 .tutorial-next').click(function() {
		hideCodetracePanel();
	});
});