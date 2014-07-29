<html>
<head>




<?php
//ini_set("display_errors", "true");
//error_reporting (E_ALL);

include("../miscUtil.php");
include("../buildvariables.php");

// todo: could use some index array of general descriptions in future
$known_component_prefixes = array();
$known_component_prefixes[]="wtp-jaxws";
$known_component_prefixes[]="wtp-common-fproj";


echo "<title>Components from build </title> \n";
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style>
.bold,.bold TD,.bold TH,.bold TR {
	font-weight: bold;
}
</style>


</head>
<body>
	<p>
		<b><font face="Verdana" size="+3">Components</font> </b>
	</p>
	<p>These are special-purpose subsets of the WTP build. They are not
		needed for normal use or construction of WTP (if they are needed, they
		are already included in other zip files or repositories). These are
		provided here by special request of committers, for custom
		distribtions or tests.</p>
	<table border=0 cellspacing=5 cellpadding=2 width="100%">
		<tr>
			<td align=LEFT valign=TOP colspan="3" bgcolor="#0080C0"><b><font
					color="#FFFFFF" face="Arial,Helvetica"> component subsets</font> </b>
			</td>
		</tr>
	</table>
	
	





<?php

// Assuse this file is in the directory we are interested in
$dir = dir(getcwd());

//echo "dir: " . $dir->path . "<br /> \n";
while ($anEntry = $dir->read())
{

     echo "<table>";

     if ($anEntry != "." && $anEntry != ".." && is_file($anEntry))

     {

          $path_parts = pathinfo($anEntry);
          $file_extension = $path_parts['extension'];

          if ("zip" === $file_extension) {
               // echo "       path parts: " . print_r($path_parts) . "<br /> \n";

               echo "<tr>\n";

               echo "<td align=\"left\" valign=\"top\" width=\"10%\"></td>\n";
               // todo: could use indexed general description here?
               //echo "    <td align=\"left\" valign=\"top\">\n";
               //echo "     <p>The Automated Test zip contains the unit tests.</p>\n";

               $zipfilename=$path_parts['basename'];

               $filename=$zipfilename;
               $zipfilesize=fileSizeForDisplay($filename);
               $fileShortDescription=$zipfilename;
               displayFileLineSubdir($downloadprefix, "components", $filename, $zipfilesize, $fileShortDescription);

               echo "</tr>\n";



          }


     }
     echo "</table>";
}

?>


</body>
</html>
