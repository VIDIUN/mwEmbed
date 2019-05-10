/**
 * Optional vWidget library
 * Get a user agent player rules
 * @param {Object} ruleSet Object containing the rule set and actions
 * @return {String} What player should the browser lead with:
 * 		 'flash' ( default, lead with flash) | leadWithHTML5 | forceFlash | forceMsg Raw html message string to be displayed ( instead of player )
 */
vWidget.getUserAgentPlayerRulesMsg = function( ruleSet ){
	return vWidget.checkUserAgentPlayerRules( ruleSet, true );
};
vWidget.addUserAgentRule = function( uiconfId, rule, action ){
	var ruleInx = 0;
	// if there are existing rules, get the last rule index:
	if( vWidget.userAgentPlayerRules[ uiconfId ] ){
		for (ruleInx in vWidget.userAgentPlayerRules[ uiconfId ]['rules']) ;
	} else {
		vWidget.userAgentPlayerRules[ uiconfId ] = { 'rules':{}, 'actions': {} };
	}
	var ruleIndex = parseInt( ruleInx) +1;
	// add the rule
	vWidget.userAgentPlayerRules[ uiconfId ]['rules'][ ruleIndex ] = { 'regMatch': rule };
	vWidget.userAgentPlayerRules[ uiconfId ]['actions'][ ruleIndex ] = {'mode': action, 'val': 1 };
};
vWidget.checkUserAgentPlayerRules = function( ruleSet, getMsg ){
	var ua = ( mw.getConfig( 'VidiunSupport_ForceUserAgent' ) )?
			mw.getConfig( 'VidiunSupport_ForceUserAgent' ) : navigator.userAgent;
	var flashMode = {
		mode: 'flash',
		val: true
	};
	// Check for current user agent rules
	if( !ruleSet.rules ){
		// No rules, lead with flash
		return flashMode;
	}
	var getAction = function( inx ){
		if( ruleSet.actions && ruleSet.actions[ inx ] ){
			return ruleSet.actions[ inx ];
		}
		// No defined action for this rule, lead with flash
		return flashMode;
	};
	for( var i in ruleSet.rules ){
		var rule = ruleSet.rules[i];
		if( rule.match ){
			if( ua.indexOf( rule.match ) !== -1 )
				return getAction( i );
		} else if( rule.regMatch  ){
			// Do a regex match
			var regString = rule.regMatch.replace(/(^\/)|(\/$)/g, '');
			if( new RegExp( regString ).test( ua ) ){
				return getAction( i );
			}
		}
	}
	// No rules applied, lead with flash
	return flashMode;
};
