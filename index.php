<!-- 

By: Shane A. Weddle
Email: phpsite@slorobotics.com
Version: 1.0 
Date: First build and use 06/12/2007  -  First open to public 04/30/2015

This is the most basic version. It has no login no join no admin no install and no MySQL db needs.

Install/setup
1) Rename all "http://xRoot_Domainx.com" to use your domain:
Example: If domain is www.BigRobotFish.com then rename/change all "http://xRoot_Domainx.com" to "http://www.BigRobotFish.com"

2) Rename Folder1, Folder2, Folder3 and Folder4 in this file and the folders in the root to match the top menu names you want.


-->


<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="Shane Weddle">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>xHome_Titlex</title>
<link rel="stylesheet" type="text/css" href="/css/base.css" />

<?php


// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = Array("<a style='display: inline' href=\"$base\">$home</a>");

    // Find out the index for the last value in our path array
    $last = end(array_keys($path));

    // Build the rest of the breadcrumbs
    foreach ($path AS $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

        // If we are not on the last index, then display an <a> tag
        if ($x != $last)
            $breadcrumbs[] = "<a style='display: inline' href=\"$base$crumb\">$title</a>";
        // Otherwise, just display the title (minus)
        else
            $breadcrumbs[] = $title;
    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}


$pathx = $_SERVER['REQUEST_URI'];
$arrayx = explode("/", $pathx);

//echo $arrayx[1] . "<p>";
?> 


 </head>
 <body>

<div id="wrap">
  <div id="main">
  
  <center>
  <img src="/images/logo.gif" width="368" height="147" border="0" alt="">

<table width="100%" cellpadding="0" cellspacing="0">
<tr class="bb" >
	<td width="20%">&nbsp;</td>


	<td <?php  if ($arrayx[1] == '') { ?>
	bgcolor="000000" <?php }; ?>width="12%" align="center" class="ch">
	<a <?php  if ($arrayx[1] == '') { ?> style="color:white;"<?php }; ?>  href="http://xRoot_Domainx.com">
	Home(root)
	</a>
	</td>


	<td <?php  if ($arrayx[1] == 'Folder1') { ?>
	bgcolor="000000" <?php }; ?>width="12%" align="center" class="ch">
	<a <?php  if ($arrayx[1] == 'Folder1') { ?> style="color:white;"<?php }; ?>  href="http://xRoot_Domainx.com/Folder1/">
	Folder1
	</a>
	</td>
	
	<td <?php  if ($arrayx[1] == 'Folder2') { ?>
	bgcolor="000000" <?php }; ?>width="12%" align="center" class="ch">
	<a <?php  if ($arrayx[1] == 'Folder2') { ?> style="color:white;"<?php }; ?>  href="http://xRoot_Domainx.com/Folder2/">
	Folder2
	</a>
	</td>


	<td <?php  if ($arrayx[1] == 'projects') { ?>
	bgcolor="000000" <?php }; ?>width="12%" align="center" class="ch">
	<a <?php  if ($arrayx[1] == 'projects') { ?> style="color:white;"<?php }; ?>  href="http://xRoot_Domainx.com/Folder3/">
	Folder3
	</a>
	</td>


	<td <?php  if ($arrayx[1] == 'admin') { ?>
	bgcolor="000000" <?php }; ?>width="12%" align="center" class="ch">
	<a <?php  if ($arrayx[1] == 'temp') { ?> style="color:white;"<?php }; ?>  href="http://xRoot_Domainx.com/Folder4/">
	Folder4
	</a>
	</td>


	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%">&nbsp;</td>
	<td width="100%" colspan="5" align="center">


<?= breadcrumbs() ?>


</td>
	<td width="20%">&nbsp;</td>

</tr>
	<td width="20%">&nbsp;</td>
	<td width="100%" colspan="5" align="center">


<?php 
include("info.php");
?>


</td>
	<td width="20%">&nbsp;</td>


<tr>
</tr>
</table>
</center>
  </center>
  </div>
</div>



<div id="footer">
<?php 

include("footer.php");

?>
</div>

 </body>
</html>

