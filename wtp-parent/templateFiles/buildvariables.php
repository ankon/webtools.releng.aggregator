<?php

// this file is for "variables" that are set/created at
// build time, which can then be included or used
// from mulitiple files, by using
// include('buildvariables.php');

include_once("miscUtil.php");

$incubating="false";
$displayBuildNotes=false;

$build_distribution="@build_distribution@";
$buildBranch="@buildBranch@";
$build="@build@";
$buildtype="@buildtype@";
$builddate="@date@";

$debugScript = false;
$debugFunctions = false;

$defaultMirrorScript="";
$defaultWTPMirrorPrefix="./";

$eclipseMirrorScript="http://www.eclipse.org/downloads/download.php?file=";

// TODO: improve so this hard coding isn't required.
// This depends on the declare script changing webtools/committers to webtools/downloads
// And, the logic is such that if it is not mirrored, this URI is not used at all, just
// a relative reference only
$eclipseWTPMirrorPrefix="/webtools/committers/drops/$buildBranch/$build/";


$mirrorScript=$defaultMirrorScript;
$downloadprefix=$defaultWTPMirrorPrefix;


$keytestMirrorString=$eclipseMirrorScript . $eclipseWTPMirrorPrefix."/".$build_distribution."-".$build.".zip";
if (isMirrored($keytestMirrorString) ) {
    $mirrorScript=$eclipseMirrorScript;
    $downloadprefix=$mirrorScript.$eclipseWTPMirrorPrefix;
}

if ($debugScript)  {
    echo "inferred platform: " . getPlatform();
}


switch ($buildtype) {
    case "I":
        $type="Integration";
        break;
    case "M":
        $type="Maintenance";
        break;
    case "R":
        $type="Release";
        break;
    case "S":
        $type="Stable";
        break;
    case "P":
        $type="Patches";
        break;
    case "N":
        $type="HEAD";
        break;
    default:
        $type=$buildtype;
}


?>
