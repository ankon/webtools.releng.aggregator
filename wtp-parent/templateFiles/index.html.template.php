<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php

//ini_set("display_errors", "true");
//error_reporting (E_ALL);

include_once("miscUtil.php");
include_once('buildvariables.php');
include_once('dependency.properties.php');

// our summary results handling requires php 5 (for simple xml file loading)
// so, if not php 5, just don't display any summary results
// This was found to be required, since some mirror our whole site (e.g. IBM)
// and not all mirrors use PHP 5
$displayTestSummary=false;
if (phpversion() >= 5) {

     $code_totalBundles=0;
     $code_totalErrors=0;
     $code_totalWarnings=0;
     $code_totalforbiddenAccessWarningCount=0;
     $code_totaldiscouragedAccessWarningCount=0;

     $test_totalBundles=0;
     $test_totalErrors=0;
     $test_totalWarnings=0;
     $test_totalforbiddenAccessWarningCount=0;
     $test_totaldiscouragedAccessWarningCount=0;


     $displayTestSummary=true;
     // expecting grandTotalErrors and grandTotalTests
     $filename = "unitTestsSummary.xml";
     if (file_exists($filename)) {
          $prefix = "unitTests_";
          $unitTestsSummary = simplexml_load_file($filename);
          foreach ($unitTestsSummary->summaryItem as $summaryItem) {
               $name = $summaryItem->name;
               $value = $summaryItem->value;
               $code= "\$" . $prefix . $name . " = " . $value . ";";
               //echo "<br />code: " . $code;
               eval($code);
          }
     }

     $filename = "compilelogsSummary.xml";
     if (file_exists($filename)) {
          $prefix = "code_";
          $compileSummary = simplexml_load_file($filename);
          foreach ($compileSummary->summaryItem as $summaryItem) {
               $name = $summaryItem->name;
               $value = $summaryItem->value;
               $code= "\$" . $prefix . $name . " = " . $value . ";";
               //echo "<br />code: " . $code;
               eval($code);
          }
     }

     $filename = "testcompilelogsSummary.xml";
     if (file_exists($filename)) {
          $prefix = "test_";
          $compileSummary = simplexml_load_file($filename);
          foreach ($compileSummary->summaryItem as $summaryItem) {
               $name = $summaryItem->name;
               $value = $summaryItem->value;
               $code= "\$" . $prefix . $name . " = " . $value . ";";
               //echo "<br />code: " . $code;
               eval($code);
          }
     }
}


?>

<?php include 'headingIntro.php';?>
<?php include 'displayPrereqs.php';?>

<!-- ***********  P2 Zips **************  -->



<table border=0 cellspacing=2 cellpadding=2 width="100%">
     <tr>
          <td align=left valign=top colspan="2" bgcolor="#0080C0"><font
               face="'Bitstream Vera',Helvetica,Arial" color="#FFFFFF">P2
          repositories in zipped format files.</font></td>
     </tr>

     <tr>
          <td align="left" valign="top" colspan="5">
          <p>These are archive versions of P2 repositories that can be
          downloaded and installed into a development environment or PDE target.
          Its is recommended to install, rather than to to unzip the traditional
          packages, since it is more informative of missing prerequites or
          conflicting dependencies.</p>
          </td>
     </tr>

     <tr>
          <td>
          <table border=0 cellspacing=2 cellpadding=2 width="90%" align="center">

          <?php

          $shortname=$build_distribution."-repo";

          $zipfilename=$shortname."-".$build;
          $filename=$zipfilename.".zip";
          if (file_exists($filename)) {
               ?>
               <tr>
                    <td align="left" valign="top" width="10%"><b>Code Repository</b></td>
                    <td align="left" valign="top">
                    <p>Archived p2 repository of WTP code. Good for product builders. </p>
                    </td>
                    <?php
                    $zipfilesize=fileSizeForDisplay($filename);

                    displayFileLine($downloadprefix, $filename, $zipfilesize, $shortname);
                    ?>
               </tr>
               <?php } ?>
              <?php

              $shortname="$build_distribution-tests-repo";

              $zipfilename=$shortname."-".$build;
              $filename=$zipfilename.".zip";
              if (file_exists($filename)) {
                     ?>
                     <tr>
                            <td align="left" valign="top" width="10%"><b>Tests Repository</b></td>
                            <td align="left" valign="top">
                            <p>Archived p2 repository with unit tests for WTP code (above). Committers shoud download both.</p>
                            </td>
                            <?php
                            $zipfilesize=fileSizeForDisplay($filename);

                            displayFileLine($downloadprefix, $filename, $zipfilesize, $shortname);
                            ?>
                     </tr>
                     <?php } ?>
          </table>

     </tr>
</table>

               <?php include 'webdev.php'; ?>
               <?php include 'fproject.php'; ?>

<!-- ***********  Build Status **************  -->
<table border=0 cellspacing=2 cellpadding=2 width="100%">
     <tr>
          <td align=left valign=top bgcolor="#0080C0"><font
               face="'Bitstream Vera',Helvetica,Arial" color="#FFFFFF">Status, tests
          and other interesting details</font></td>
     </tr>
     <tr>
          <td>
          <table border=0 cellspacing=2 cellpadding=2 width="90%" align="center">

               <tr>
                    <td><?php 
                    if (isset($displayBuildNotes) && $displayBuildNotes) {
                         echo "<a href=\"buildNotes.php\">Build notes</a> <br />";
                    }
                    ?>

		   <!--<a href="directory.txt">map files</a> <br />-->
                    <?php

                    if (file_exists("components")) {
                         echo "<a href=\"components/components.php\">Misc Components</a> <br />\n";
                    }


                    if ($displayTestSummary) {


                         if (isset($unitTests_grandTotalErrors)) {
                              $errorColor="green";
                              if ($unitTests_grandTotalErrors > 0) {
                                   $errorColor="red";
                              }
                              echo "<a href=\"testResults.php\">Unit test results</a>&nbsp;";
                              echo "<img src=\"junit_err.gif\"/><font color=\"" . $errorColor . "\">" . $unitTests_grandTotalErrors . "</font>&nbsp;&nbsp;Total: " . $unitTests_grandTotalTests;
                         }
                         else {
                              $compileProblemMarkerFile="compilationProblems.txt";
                              if (file_exists($compileProblemMarkerFile)) {
                                   echo "<br /> <img src=\"compile_err.gif\"/>&nbsp;&nbsp;No unit tests available. The remaining build and tests were canceled since compilation problems were found. Check compiler output summaries.";
                              } else {
                                   $installLogName="p2DirectorInstall.log.txt";
                                   if (file_exists($installLogName)) {
                                        echo "<br /><img src=\"compile_err.gif\"/>&nbsp;&nbsp;No unit tests available. See <a href=\"" . $installLogName . "\">the p2Director install log file </a>from failed test installation attempt";
                                   } else {
                                        $noTestsProvidedMarkerFile="noTestsProvided.txt";
                                        if (file_exists($noTestsProvidedMarkerFile)) {
                                             echo "<br /><img src=\"compile_warn.gif\"/>&nbsp;&nbsp;No unit tests available. This build component does not providing any unit tests.";
                                        } else {

                                             // we may really be pending (tests still running) or maybe they failed in unexpted way?.
                                             echo "<br /><font color=\"orange\">Unit tests ae pending, or otherwise don't exists, or there is an unanticipated build error.</font>";

                                        }
                                   }
                              }
                         }

//                         echo "<br />";
//                         echo "<br />";
//                         echo "<a href=\"compileResults.php\">Compile logs: Code Bundles</a>";

//                         echo "&nbsp;&nbsp;($code_totalBundles)&nbsp;&nbsp;";
//                         echo "<img src=\"compile_err.gif\"/><font color=red>$code_totalErrors</font>&nbsp;";
//                         echo "<img src=\"compile_warn.gif\"/><font color=orange>$code_totalWarnings</font>&nbsp;";
//                         echo "<img src=\"access_err.gif\"/><font color=red>$code_totalforbiddenAccessWarningCount</font>&nbsp;";
//                         echo "<img src=\"access_warn.gif\"/><font color=orange>$code_totaldiscouragedAccessWarningCount</font>&nbsp;";

//                         echo "<br />";
//                         echo "<a href=\"testCompileResults.php\">Compile logs: Test Bundles</a>";

//                         echo "&nbsp;&nbsp;($test_totalBundles)&nbsp;&nbsp;";
//                         echo "<img src=\"compile_err.gif\"/><font color=red>$test_totalErrors</font>&nbsp;";
//                         echo "<img src=\"compile_warn.gif\"/><font color=orange>$test_totalWarnings</font>&nbsp;";
//                         echo "<img src=\"access_err.gif\"/><font color=red>$test_totalforbiddenAccessWarningCount</font>&nbsp;";
//                         echo "<img src=\"access_warn.gif\"/><font color=orange>$test_totaldiscouragedAccessWarningCount</font>&nbsp;";

			 $fileName = "fullLog.zip";
                         if (file_exists($fileName)) {
                            echo "<br /> <a href='./$fileName'/>Full Log</a> from build ";
                         }
                    }

                    ?> <br />

                    <?php
                    if (file_exists("versioningReportName.php")) {
                         include "versioningReportName.php";
                         $fname=$versionReportFilename.".html";
                         if (file_exists($fname)) {
                              echo "<br /> <a href='$fname'>Versioning Information</a>";
                         }
                    }
                    ?></td>
               </tr>
          </table>
          </td>
     </tr>
</table>

<!-- footer -->
<center>
<hr>
<p>All downloads are provided under the terms and conditions of the <a
     href="http://www.eclipse.org/legal/notice.html">Eclipse.org Software
User Agreement</a> unless otherwise specified.</p>

<p>If you have problems downloading the drops, contact the <font
     face="'Bitstream Vera',Helvetica,Arial" size="-1"><a
     href="mailto:webmaster@eclipse.org">webmaster</a></font>.</p>

</center>
<!-- end footer -->

</body>
</html>
