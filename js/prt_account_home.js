function init ()
{
	getAccountActivityTabData('featured-linkads');
	getQuickToolsTabData('stats-overview');
	getMessageCenterTabData('alerts');
}

function getAccountActivityTabData(deal_type)
{
	var tab_name = 'tab-' + deal_type;
	var active_tab = document.getElementById(tab_name);

	document.getElementById('tab-featured-linkads').className = '';
	document.getElementById('tab-pending').className = '';
	document.getElementById('tab-approved').className = '';
	document.getElementById('tab-declined').className = '';
	document.getElementById('tab-cancelled').className = '';
	document.getElementById('tab-expired').className = '';

	if(active_tab != null)
	{
		active_tab.className = 'active';
	}

	currentProduct = 1;
	var url = 'partner/ajax/prt_account_activity.inc.php';
	var rand = Math.random(9999);
	var pars = 'deal_type=' + deal_type + '&rand=' + rand;
	var myAjax = new Ajax.Request( url, {method: 'get', parameters: pars, onLoading: showAccountActivityLoad, onComplete: showAccountActivityResponse} );
}

function getQuickToolsTabData(quick_tool)
{
	var tab_name = 'tab-' + quick_tool;
	var active_tab = document.getElementById(tab_name);

	document.getElementById('tab-stats-overview').className = '';
	document.getElementById('tab-partner-tools').className = '';
	document.getElementById('tab-deal-stats').className = '';
	document.getElementById('tab-partner-faq').className = '';

	if(active_tab != null)
	{
		active_tab.className = 'active';
	}

	var url = 'partner/ajax/prt_quick_tools.inc.php';
	var rand = Math.random(9999);
	var pars = 'quick_tool=' + quick_tool + '&rand=' + rand;
	var myAjax = new Ajax.Request( url, {method: 'get', parameters: pars, onLoading: showQuickToolsLoad, onComplete: showQuickToolsResponse} );
}

function getMessageCenterTabData(message_type)
{
	var tab_name = 'tab-' + message_type;
	var active_tab = document.getElementById(tab_name);

	document.getElementById('tab-alerts').className = '';
	document.getElementById('tab-emails').className = '';
	document.getElementById('tab-messages').className = '';
	//document.getElementById('tab-blog').className = '';
	document.getElementById('tab-reqs').className = '';

	if(active_tab != null)
	{
		active_tab.className = 'active';
	}

	var url = 'partner/ajax/prt_message_center.inc.php';
	var rand = Math.random(9999);
	var pars = 'message_type=' + message_type + '&rand=' + rand;
	var myAjax = new Ajax.Request( url, {method: 'get', parameters: pars, onLoading: showMessageCenterLoad, onComplete: showMessageCenterResponse} );
}

function showAccountActivityLoad ()
{
	$('account_activity_content').innerHTML = '<br /><br /><center><img src="images/loading_ajax.gif" border="0" /></center><br />';
}

function showQuickToolsLoad ()
{
	$('quick_tools_content').innerHTML = '<br /><br /><center><img src="images/loading_ajax.gif" border="0" /></center><br />';
}

function showMessageCenterLoad ()
{
	$('message_center_content').innerHTML = '<br /><br /><center><img src="images/loading_ajax.gif" border="0" /></center><br />';
}

function showAccountActivityResponse (originalRequest)
{
	var newData = originalRequest.responseText;
	$('account_activity_content').innerHTML = newData;
}

function showQuickToolsResponse (originalRequest)
{
	var newData = originalRequest.responseText;
	$('quick_tools_content').innerHTML = newData;
}

function showMessageCenterResponse (originalRequest)
{
	var newData = originalRequest.responseText;
	$('message_center_content').innerHTML = newData;
}