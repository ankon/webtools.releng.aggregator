<html>
<head>



<?php
$parts = explode("/", getcwd());
$parts2 = explode("-", $parts[count($parts) - 1]);
$buildName = $parts2[1];

echo "<title>Build Notes for $buildName </title>";
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="http://dev.eclipse.org/default_style.css"
	type="text/css">
</head>
<body>

	<p>
		<b><font face="Verdana" size="+3">Build Notes</font> </b>
	</p>

	<table border=0 cellspacing=5 cellpadding=2 width="100%">
		<tr>
			<td align=LEFT valign=TOP colspan="3" bgcolor="#0080C0"><b><font
					color="#FFFFFF" face="Arial,Helvetica"> Build Notes for <?php echo "$buildName"; ?>
				</font> </b>
			</td>
		</tr>
	</table>
	<table border="0">




	<?php
	$hasNotes = false;
	$aDirectory = dir("buildnotes");
	while ($anEntry = $aDirectory->read()) {
	    if ($anEntry != "." && $anEntry != "..") {
	        $nameprefixlen=strlen("buildnotes_");
	        $baseName = substr($anEntry,$nameprefixlen);
	        $extpos=strrpos($baseName,".html");
	        $component=substr($baseName,0,$extpos);
	        $line = "<td>Component: <a href=\"buildnotes/$anEntry\">$component</a></td>";
	        echo "<tr>";
	        echo "$line";
	        echo "</tr>";
	        $hasNotes = true;

	    }
	}
	$aDirectory.closedir();
	if (!$hasNotes) {
	    echo "<br>There are no build notes for this build.";
	}
	?>

	</table>
</body>
</html>
