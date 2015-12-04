/* We are using some JS to help the layout of the sidebar columns to fill the full vertical hight. */
function columnShim(){
	$('#site-sidebar-wrapper').css('min-height','0');
	$('#page-sidebar-wrapper').css('min-height','0');
	var mainWrapperHeight = $('#main-page-wrapper').innerHeight();
	var offsetHeight = $('nav.navbar').innerHeight() + $('footer.security-footer').innerHeight() + $('.security-topper').innerHeight();
	var newHeight = mainWrapperHeight - offsetHeight;

	$('#site-sidebar-wrapper').css('min-height',newHeight);
	$('#page-sidebar-wrapper').css('min-height',newHeight-6);
	if ($('#page-help-flyout')){
		var pageHeaderHeight = $('#page-header').innerHeight();
		var newHelpHeight = newHeight - pageHeaderHeight;
		$('#page-help-flyout').css('min-height',newHelpHeight);
	}
	
}
columnShim();
$(window).resize(columnShim);
$(window).scroll(columnShim);

/* Navigation Menu actions */
$('li.has-sub-menu .title-wrapper').on('click',function(){
	$(this).parent().toggleClass('open');
	return false;
});
$('li.menu-toggle > a').on('click',function(){
	var that = this;
	$('li.menu-toggle > a').each(function(){
		if (this !== that) {
			$(this).parent().removeClass('open');
		}
	});
	$(that).parent().toggleClass('open');
	return false;
});

function sideMenuAction(target){
	if($(target).hasClass('sidebar-toggler-wrapper')){
		$('ul.nav-sidebar > li').removeClass('selected');
	}
	else {
		if ($(target).hasClass('selected')){
			$(target).removeClass('selected');
		}
		else if ($(target).hasClass('has-sub-menu')){
			$(target).addClass('selected');
		}
		else {
			$('ul.nav-sidebar > li').removeClass('selected');
			$(target).addClass('selected');
		}
	}
}

/* Mobile Detection */
var md = new MobileDetect(window.navigator.userAgent);
if (md.mobile()) {
	$('body').addClass('mobile');
	$('ul.nav-sidebar > li i').on('touchstart', function(){
		var target = $(this).parent();
		sideMenuAction(target);
	});
	$('ul.sub-menu > li.has-sub-menu .title-wrapper').on('touchstart', function(){
		var target = $(this).parent();
		sideMenuAction(target);
	});
}

/* Sidebar Toggle Actions */
$('#site-sidebar li.sidebar-toggler-wrapper').on('click',function(){
	$('body').toggleClass('site-sidebar-closed');
	if (md.mobile()){
		$('body').addClass('page-sidebar-closed');
	}
	return false;
});
$('#page-sidebar li.sidebar-toggler-wrapper').on('click',function(){
	$('body').toggleClass('page-sidebar-closed');
	if (md.mobile()){
		$('body').addClass('site-sidebar-closed');
	}
	return false;
});

/* Help Toggle */
$('#page-help a').on('click',function(){
	$('#page-help').toggleClass('help-open');
	$('#page-help-flyout').toggleClass('help-open');
	return false;
});

// Bootstrap Tooltip & Popover demos
$('[data-toggle="tooltip"]').tooltip({
	placement : 'top'
});
$('[data-toggle="popover"]').popover({
	placement : 'top'
});

// Popover Confirmation
// Details: https://github.com/Ifnot/PopConfirm
// NOTE: If you define a click event on the button here then 
// it must be defined before the popConfirm() bind shown below.
$('[data-toggle="confirmation"]').popConfirm({
	title: 'Are you sure?',
	content: 'No Takebacks!',
	placement: 'top',
});

/* Alerts Demo.
*** Alert links action ***
*/
$('.alert-link').on('click',function(){
	var target = this;
	//update the class for new-alerts
	$(target).siblings('i').removeClass('new-alert');
	//update the count
	var count = $('.nav-alerts.new-alerts .alert-count').html();
	if (count >= 1) {
		var newCount = count-1;
		$('.nav-alerts .alert-count').html(newCount);
		if (newCount < 1){
			$('.nav-alerts').removeClass('new-alerts');
			$('.nav-alerts .alert-count').html('<i class="fa fa-lg fa-exclamation-circle"></i>');
		}
	}
	//this alert action can be removed or replaced for real content.
	var demoTitle = $(target).html();
	alert('"'+demoTitle+'" has been read.');
});
$('.alert-clear').on('click',function(){
	$('.alerts-menu.menu-content i').removeClass('new-alert');
	$('.nav-alerts').removeClass('new-alerts');
	$('.nav-alerts .alert-count').html('<i class="fa fa-lg fa-exclamation-circle"></i>');
});
$('.alert-all').on('click',function(){
	//Using this to reset the count, etc. for the demo
	$('.alerts-menu.menu-content i').addClass('new-alert');
	$('.nav-alerts').addClass('new-alerts');
	$('.nav-alerts .alert-count').html('3');
});
/* End Alerts Demo */

// Gritter
// Full options at http://boedesign.com/blog/2009/07/11/growl-for-jquery-gritter/
// Global vars
$.extend($.gritter.options, {
position: 'top-center', // defaults to 'top-right' but can be 'bottom-left', 'bottom-right', 'top-left', 'top-right'
	fade_in_speed: 'medium', // how fast notifications fade in (string or int)
	fade_out_speed: 500, // how fast the notices fade out
	time: 6000 // hang on the screen for...
});
$('.gritter-action').on('click',function(){
	var gritterTitle = $(this).data('gritter-title');
	var gritterText = $(this).data('gritter-text');
	$.gritter.add({
		// (string | mandatory) the heading of the notification
		title: gritterTitle,
		// ((bool | optional) if you want it to fade out on its own or just sit there
		// sticky: true,
		// (string | mandatory) the text inside the notification
		text: gritterText
	});
	return false;
});

// Ajax button
$('button.ajax').on('click',function(){
	if ($(this).hasClass('ajax-active')){
		return false;
	}
	else {
		$(this).addClass('ajax-active');
	}
});
// Ajax Button stop. This simulates the end of the ajax callback
$('#ajax-demo-1-cancel').on('click',function(){
	$('#ajax-demo-1').children('.ajax-indicator').popover('hide');
	$('#ajax-demo-1').removeClass('ajax-active');
	return false;
});
// Ajax DIV
$('.ajax-trigger').on('click', function(){
	var target = '#'+$(this).data('ajax-target');
	if ($(target).hasClass('ajax')){
		$(target).addClass('ajax-active');
	}
});
// Ajax DIV stop. This simulates the end of the ajax callback
$('#ajax-demo-2-cancel').on('click',function(){
	$('#ajax-demo-2 > p').html('Dynamic Content Inserted!');
	$('#ajax-demo-2').removeClass('ajax-active');
	return false;
});

/* Table Filter Action */
$('#table-filter').on('click', function(){
	var target = '#' + $(this).data('tableid');
	$(target).toggle();
});

/* Treeview */
function getTree() {
	// Some logic to retrieve, or generate tree structure
	var data = [
	{
	    text: "Node 1",
	    icon: "glyphicon glyphicon-play",
	    selectedIcon: "glyphicon glyphicon-pause",
	    color: "#000000",
	    backColor: "#FFFFFF",
	    href: "#node-1",
	    selectable: true,
	    state: {
	      checked: true,
	      disabled: false,
	      expanded: true,
	      selected: false
	    },
	    tags: ['available'],
		nodes: [
			{
				text: "Child 1",
				nodes: [
					{
						text: "Grandchild 1"
					},
					{
						text: "Grandchild 2"
					}
				]
			},
			{
				text: "Child 2"
			}
		]
	},
	{
		text: "Parent 2",
		nodes: [
			{
				text: "Child 1",
				nodes: [
					{
						text: "Grandchild 1"
					},
					{
						text: "Grandchild 2"
					}
				]
			},
			{
				text: "Child 2"
			}
		]
	},
];
	return data;
}

$('#tree').treeview({data: getTree()});
