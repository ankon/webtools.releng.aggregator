<html>
<head>




<?php
//ini_set("display_errors", "true");
//error_reporting (E_ALL);

$parts = explode("/", getcwd());
$parts2 = explode("-", $parts[count($parts) - 1]);
$buildName = $parts2[1];

echo "<title>Test Results for $buildName </title>";
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style>
.bold,.bold TD,.bold TH,.bold TR {
	font-weight: bold;
}

.numeric,.numeric TD {
	text-align: right;
	padding-right: 2em;
}

.normaltable,.normaltable TD,.normaltable TH {
	font-family: Bitstream Vera Sans Mono, monospace;
	font-size: 0.9em;
	color: Black;
	background-color: White;
}

.errorltable,.errortable TD,.errortable TH {
	font-family: Bitstream Vera Sans Mono, monospace;
	font-size: 0.9em;
	color: Black;
	background-color: Red;
	font-weight: Bold;
}

.warningtable,.warningtable TD,.warningtable TH {
	font-family: Bitstream Vera Sans Mono, monospace;
	font-size: 0.9em;
	color: Black;
	background-color: khaki;
}

.extraWarningTable,.extraWarningTable TD,.extraWarningTable TH {
	font-family: Bitstream Vera Sans Mono, monospace;
	font-size: 0.9em;
	color: Black;
	background-color: Yellow;
}
</style>


</head>
<body>
	<p>
		<b><font face="Verdana" size="+3">Test Results</font> </b>
	</p>

	<table border=0 cellspacing=5 cellpadding=2 width="100%">
		<tr>
			<td align=LEFT valign=TOP colspan="3" bgcolor="#0080C0"><b><font
					color="#FFFFFF" face="Arial,Helvetica"> Extra results and logs </font>
			</b>
			</td>
		</tr>
	</table>
	
	





<?php
if (file_exists("testResults"))
{
     $dir = dir("testResults");
     while ($anEntry = $dir->read())
     {
          if ($anEntry != "." && $anEntry != ".." && $anEntry != "consolelogs" && $anEntry != "html" && $anEntry != "xml")

          {
               if (is_dir($anEntry)) {
                    $link = "testResults/".$anEntry."/results/index.php";
                    echo "<p><a href=\"$link\">$anEntry</a></p> \n";
               }
               else {
                    // assume is file
                    $path_parts = pathinfo($anEntry);
                    $file_extension = $path_parts['extension'];
                    if (isset($path_parts['filename'])) {
                         $linkname = $path_parts['filename'];
                    }
                    else {
                         $linkname = $anEntry;
                    }

                    $link = $anEntry;
                    if ("html" === $file_extension || "php" === $file_extension || "log" === $file_extension || "txt" === $file_extension) {
                         echo "<p><a href=testResults/" . $link . ">" . $linkname . "</a></p>\n";
                    }
               }
          }
     }
}
?>




<table border=0 cellspacing=5 cellpadding=2 width="100%">
     <tr>
          <td align=LEFT valign=TOP colspan="3" bgcolor="#0080C0"><b><font
               color="#FFFFFF" face="Arial,Helvetica">Unit Test Results for <?php echo "$buildName"; ?>
          </font></b></td>
     </tr>
</table>

<table id=tableunittestdata align="center" width="75%" border="1">
     <tr>
          <td class="bold" align="center" width="70%">Test Suite</td>
          <td class="bold" align="center" width="15%">Errors &amp; Failures</td>
          <td class="bold" align="center" width="15%">Total Tests</td>
          <td class="bold" align="center" width="15%">Total Time (s)</td>
     </tr>


     %testresults%

</table>
<p></p>
<br>
<table border=0 cellspacing=5 cellpadding=2 width="100%">
     <tr>
          <td align=LEFT valign=TOP colspan="3" bgcolor="#0080C0"><b><font
               color="#FFFFFF" face="Arial,Helvetica"> Console output logs <?php echo "$buildName"; ?>
          </font></b></td>
     </tr>
</table>
<br>
These
<a href="consoleLogs.php">logs</a>
contain the console output captured while running the JUnit automated
tests.
<br>
These
<a href="httplogs.php">http logs</a>
contain logs of http requests captured while running the JUnit automated
tests.
<br>
<br>


</body>
</html>
