var scripts = document.getElementsByTagName( 'script' );
var me = scripts[ scripts.length - 1 ];
var elem = me.getAttribute( "kitchen" );
var hotToaster = '<link rel="stylesheet" href="//www.brightideasfl.com/gallery/css/toaster.css" />';//pick the style of the toaster
hotToaster += '<div class=toaster><!--';//create the toaster
var currentLocation = window.location.hostname;
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791318346.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791335528.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791354328.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791354528.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791359146.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791368724.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791376502.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791386326.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791405306.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791409705.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="//'+currentLocation+'/gallery/store/thumb/14415791415129.jpg"></div><!--'
hotToaster += '--></div>';//close the toaster up and push it down
document.getElementById(elem).innerHTML = hotToaster;//Put the toaster on the kitchen counter and plug it in