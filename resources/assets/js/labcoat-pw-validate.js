function updatePWRequirements(field, matchId) {
	var password = $(field).val();
	
	// The ID of the match field is optional
	// if it's not passed in, then that's not a requirement
	var matchId = matchId || false;
	var numberOfTests = 5;
	if(matchId) {
		numberOfTests = 6;
	}
	
	var $requirements = $("#userPWRequire");
	
	var tests = 0;
	if(password.search(/[a-z]/) !== -1) {
		$requirements.find('.PWRlower').removeClass('no').addClass('yes');
		tests++;
	} else {
		$requirements.find('.PWRlower').removeClass('yes').addClass('no');
	}
	if(password.search(/[A-Z]/) !== -1) {
		$requirements.find('.PWRupper').removeClass('no').addClass('yes');
		tests++;
	} else {
		$requirements.find('.PWRupper').removeClass('yes').addClass('no');
	}
	if(password.search(/[0-9]/i) !== -1) {
		$requirements.find('.PWRnumber').removeClass('no').addClass('yes');
		tests++;
	} else {
		$requirements.find('.PWRnumber').removeClass('yes').addClass('no');
	}
	if(password.search(/[^A-Za-z0-9]/i) !== -1) {
		$requirements.find('.PWRspecial').removeClass('no').addClass('yes');
		tests++;
	} else {
		$requirements.find('.PWRspecial').removeClass('yes').addClass('no');
	}
	
	if(password.length >= 15) {
		$requirements.find('.PWRmin').removeClass('no').addClass('yes');
		tests++;
	} else {
		$requirements.find('.PWRmin').removeClass('yes').addClass('no');
	}
	// Just for matching, since it's optional
	if(matchId) {
		if(password === $("#"+matchId).val() && password !== '') {
			$requirements.find('.PWRmatch').removeClass('no').addClass('yes');
			tests++;
		} else {
			$requirements.find('.PWRmatch').removeClass('yes').addClass('no');
		}
	}

	if(tests >= numberOfTests) {
		if($requirements.css('display') === 'block') {
			$requirements.slideUp();
			$('#pwdSubmit').removeClass('btn-default').addClass('btn-success').removeAttr("disabled");
		}
	} else {
		if($requirements.css('display') !== 'block') {
			$requirements.slideDown();
			$('#pwdSubmit').removeClass('btn-success').addClass('btn-default').attr("disabled","disabled");
		}
	}
}

function checkPWMatch(pwdId, matchId) {
	updatePWRequirements($("#"+pwdId).get(0), matchId);
}