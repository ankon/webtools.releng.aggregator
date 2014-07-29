<html>
<head>



<?php
$parts = explode("/", getcwd());
$parts2 = explode("-", $parts[count($parts) - 1]);
$buildName = $parts2[1];

echo "<title>Diagnosic logs for HTTP requests for $buildName </title>";
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="http://dev.eclipse.org/default_style.css"
       type="text/css">
<title>Diagnosic logs for HTTP requests while Running JUnit Plug-in Tests</title>
</head>
<body>

<h1>Diagnosic logs for HTTP requests while Running JUnit Plug-in Tests</h1>
       <?php
       $rootDir = "testResults/httplogstest/";
       $hasNotes = false;
       $aDirectory = dir($rootDir);
       $index = 0;
       $dirindex = 0;
       while ($anEntry = $aDirectory->read()) {
           if ($anEntry != "." && $anEntry != "..") {
               if (is_file("$rootDir/$anEntry")) {
                   $entries[$index] = $anEntry;
                   $index++;
               }
           }
       }
       $aDirectory->close();


       sort($entries);


       for ($i = 0; $i < $index; $i++) {
           $anEntry = $entries[$i];
           $logsize = filesize("$rootDir/$anEntry");

           echo "<a href=\"$rootDir/$anEntry\">$anEntry</a>  ($logsize bytes) <br />";
           
           $hasNotes = true;
       }

       if (!$hasNotes) {
           echo "<br>If there are no logs here, that (likely) means the HTTP Trace Diagnostic jar needs to be copied to the test JREs lib/ext directory.";
       }
       ?>

       </table>
</body>
</html>
