var scripts = document.getElementsByTagName( 'script' );
var me = scripts[ scripts.length - 1 ];
var elem = me.getAttribute( "kitchen" );
//var currentLocation = window.location.hostname;
//var currentLocation = "../";
var currentLocation = '';

var hotToaster = '<link rel="stylesheet" href="css/toaster.css" />';//pick the style of the toaster
hotToaster += '<div class=toaster><!--';//create the toaster

hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791318346.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791335528.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791354328.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791354528.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791359146.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791368724.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791376502.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791386326.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791405306.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791409705.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14415791415129.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14418814309266.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14418817199815.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14418842805114.jpg"></div><!--'
hotToaster += '--><div class="waffle hhhhh"><img src="'+currentLocation+'store/thumb/14419738264304.jpg"></div><!--'
hotToaster += '--></div>';//close the toaster up and push it down
document.getElementById(elem).innerHTML = hotToaster;//Put the toaster on the kitchen counter and plug it in
    var waffles = document.getElementsByClassName("waffle");
    var waffleDisplayBG = document.getElementById("waffleDisplayBG");
    var BigWaffleHolder = document.getElementById("waffleHolder");
    var biggestWaffle = document.getElementById("biggestWaffle");

    var closeWaffleDisplay = function() {waffleDisplayBG.style.display = 'none';BigWaffleHolder.style.display = 'none';};
    var openWaffleDisplay  = function() {waffleDisplayBG.style.display = '';BigWaffleHolder.style.display = '';};
	waffleDisplayBG.addEventListener('click', closeWaffleDisplay);

	
    function touchedWaffle(x){
		openWaffleDisplay();
		
		var img = x.firstChild.getAttribute('src');
		img = img.replace("/thumb/","/original/");
		biggestWaffle.setAttribute('src',img);
		
		//if height > width, then change css so height is 90vw and width is auto
		
		//fix big img holder so clicking isnt dumb
		
		//alert(img);
	}

    for(var i=0;i<waffles.length;i++){
        waffles[i].addEventListener('click', function(){touchedWaffle(this);});
    }

	(function() {waffleDisplayBG.style.display = 'none';BigWaffleHolder.style.display = 'none';})();
