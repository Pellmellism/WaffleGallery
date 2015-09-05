<?php
$default_page = 'home';
$pages = array(
    'home'      => 'home.html',
    'upload'    => 'upload.html',
    'tags'      => 'tags.html',
	'reorder'   => 'reorder.html',
    'captions'  => 'captions.html',
    'faq'       => 'faq.html',
    'settings'  => 'settings.html',
    '404'       => '404.html'
);

if ( array_key_exists('page', $_GET) ) {
    $page = strtolower($_GET['page']);
    $parts = split('/', $page);
    $parts = array_reverse($parts);//reverse the array to find the last item - this ensures gallery can be a sub domain or sub folder
	$page = $parts[0];// 0 is now the last item of a reversed array
    if ( !array_key_exists($page, $pages) ) {
        $page = '404';
    }
} else {
    $page = $default_page;
}


//get the relative link of the current page for subdomains and subfolders to work properly in the nav
$url =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
$urlPath = parse_url($escaped_url);
$urlPath = $urlPath['path'];
	//check if path already contains a page, if so then strip it off
	$checkLast = split('/', $urlPath);
	$checkLast = array_reverse($checkLast);
	$checkLast = $checkLast[0];
	if(array_key_exists($checkLast, $pages)){$urlPath = rtrim($urlPath, '/');$urlPath = chop($urlPath, $checkLast);}
$urlPath = rtrim($urlPath, '/');

// get the numeric key of the current page to set active on the nave menu
$activePage = array_search($page,array_keys($pages));
$active[$activePage] = 'active';
$content_src = 'pages/'.$pages[$page];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Responsive Nav &middot; Advanced Left Navigation Demo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--[if lte IE 8]><link rel="stylesheet" href="../../responsive-nav.css"><![endif]-->
    <!--[if gt IE 8]><!--><link rel="stylesheet" href="admin.css"><!--<![endif]-->
    <script src="admin.js"></script>
  </head>
  <body>

    <div role="navigation" id="foo" class="nav-collapse">
      <ul>
        <li class="<?php echo $active[0]; ?>"><a href="<?php echo $urlPath; ?>/home">Home</a></li>
        <li class="<?php echo $active[1]; ?>"><a href="<?php echo $urlPath; ?>/upload">Upload</a></li>
        <li class="<?php echo $active[2]; ?>"><a href="<?php echo $urlPath; ?>/tags">Tags</a></li>
        <li class="<?php echo $active[3]; ?>"><a href="<?php echo $urlPath; ?>/reorder">Reorder</a></li>
        <li class="<?php echo $active[4]; ?>"><a href="<?php echo $urlPath; ?>/captions">Captions</a></li>
        <li class="<?php echo $active[5]; ?>"><a href="<?php echo $urlPath; ?>/faq">FAQ</a></li>
        <li class="<?php echo $active[6]; ?>"><a href="<?php echo $urlPath; ?>/settings">Settings</a></li>
      </ul>
    </div>

    <div role="main" class="main">
      <a href="#nav" class="nav-toggle">Menu</a>
      
		
		
		
		
		
		<?php include $content_src; ?>
		
		
		
		
    </div>

    <script>
      var navigation = responsiveNav("foo", {customToggle: ".nav-toggle"});
    </script>
  </body>
</html>
