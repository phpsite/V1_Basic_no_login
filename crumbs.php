<?php
echo "<ul id="crumbs">";
/* build array with each directory name in the path */
$parts = explode("/", dirname($_SERVER['REQUEST_URI']));
echo "<li><a href="/">Home</a></li>";
foreach ($parts as $key => $dir) {
switch ($dir) {
case "about": $label = "About Us"; break;
/* capitalized: if not in the above list use the directory name  */
default: $label = ucwords($dir); break;
}
/* start with nothing and then add each directory back to the URL */
$url = "";
for ($i = 1; $i <= $key; $i++)
{ $url .= $parts[$i] . "/"; }
if ($dir != "")
echo "<li>> <a href="/$url">$label</a></li>";
}
echo "</ul>";
?>