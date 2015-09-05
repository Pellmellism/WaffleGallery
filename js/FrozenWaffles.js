var scripts = document.getElementsByTagName( 'script' );
var me = scripts[ scripts.length - 1 ];
var elem = me.getAttribute( "kitchen" );
var hotToaster = '<link rel="stylesheet" href="css/toaster.css" />';//pick the style of the toaster
hotToaster += '<div class=toaster><!--';//create the toaster

// fake pics. real pics need to be added differently
var picCount = 30;
for (var i = 0; i < picCount; i++) hotToaster += '--><div class=waffle><img src="http://placehold.it/350x150"></div><!--';// put a (demo) waffle in the toaster

hotToaster += '--></div>';//close the toaster up and push it down
document.getElementById(elem).innerHTML = hotToaster;//Put the toaster on the kitchen counter and plug it in
