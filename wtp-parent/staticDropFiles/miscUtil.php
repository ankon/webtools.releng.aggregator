<?php

// todo: unsure if can handle filenames that are URLs?
// handy constant to compute file size in megabytes

include_once('buildvariables.php');


function fileSizeInMegs($filename) {
    $onemeg=1024*1024;
    $zipfilesize=filesize($filename);
    $zipfilesize=round($zipfilesize/$onemeg, 0);
    return $zipfilesize;
}

function fileSizeForDisplay($filename) {
    $onekilo=1024;
    $onemeg=$onekilo * $onekilo;
    $criteria = 10 * $onemeg;
    $scaleChar = "M";
    if (file_exists($filename)) {
        $zipfilesize=filesize($filename);
        if ($zipfilesize > $criteria) {
            $zipfilesize=round($zipfilesize/$onemeg, 0);
            $scaleChar = "M";
        }
        else {
            $zipfilesize=round($zipfilesize/$onekilo, 0);
            $scaleChar = "K";
        }
    }
    else {
        $zipfilesize = 0;
    }
    $result =  "(" . $zipfilesize . $scaleChar . ")";
    return $result;
}


function displayFileLine($downloadprefix, $filename, $zipfilesize, $fileShortDescription) {
    echo "<td align=\"right\" valign=\"top\" width=\"30%\">";
    echo "<a href=\"$downloadprefix$filename\">" . $fileShortDescription . "</a>";
    echo "</td><td align=\"right\" valign=\"top\" width=\"3%\">";
    echo $zipfilesize;
    echo "</td>";
    echo "<td align=\"right\" valign=\"top\" width=\"7%\">";
    echo "[<a href=\"checksum/$filename.md5\">md5</a>][<a href=\"checksum/$filename.sha1\">sha1</a>]";
    echo "</td>";
}

/*
 * This function needs to add the subdir, if on mirrored server, but not add it if not,
* since assumed the calling page is such that a relative URL (already in subdir) is correct.
*/
function displayFileLineSubdir($downloadprefix, $subdir, $filename, $zipfilesize, $fileShortDescription) {
    echo "<td align=\"right\" valign=\"top\" width=\"30%\">";
    $fullURL=$downloadprefix.$subdir."/".$filename;
    if (isMirrored($fullURL)) {
        echo "<a href=\"" . $fullURL . "\">" . $fileShortDescription . "</a>";
    }
    else {
        echo "<a href=\"" . $filename . "\">" . $fileShortDescription . "</a>";
    }
    echo "</td><td align=\"right\" valign=\"top\" width=\"3%\">";
    echo $zipfilesize;
    echo "</td>";
    echo "<td align=\"right\" valign=\"top\" width=\"7%\">";
    echo "[<a type=\"text/plain\" href=\"checksum/$filename.md5\">md5</a>][<a type=\"text/plain\" href=\"checksum/$filename.sha1\">sha1</a>]";
    echo "</td>";
}

function displayFileLineWithSHA($downloadprefix, $filename, $zipfilesize, $fileShortDescription) {
    echo "<td align=\"right\" valign=\"top\" width=\"15%\">";
    echo "<a href=\"$downloadprefix$filename\">" . $fileShortDescription . "</a>";
    echo "</td><td align=\"right\" valign=\"top\" width=\"2%\">";
    echo $zipfilesize;
    echo "</td>";
    echo "<td align=\"right\" valign=\"top\" width=\"7%\">";
    echo "[<a type=\"text/plain\" href=\"checksum/$filename.md5\">md5</a>][<a type=\"text/plain\" href=\"checksum/$filename.sha1\">sha1</a>]";
    echo "</td>";
}

function displayRepoFileLine($downloadprefix, $subdir, $filename, $zipfilesize, $fileShortDescription) {
    echo "<td align=\"right\" valign=\"top\" width=\"30%\">";
    echo "<a href=\"" . $downloadprefix . $subdir . "/" . $filename . "\">" . $fileShortDescription . "</a>";
    echo "</td><td align=\"right\" valign=\"top\" width=\"3%\">";
    echo $zipfilesize;
    echo "</td>";
    echo "<td align=\"right\" valign=\"top\" width=\"7%\">";
    echo "[<a type=\"text/plain\" href=\"$subdir/checksum/$filename.md5\">md5</a>][<a type=\"text/plain\" href=\"$subdir/checksum/$filename.sha1\">sha1</a>]";
    echo "</td>";
}


function displayp2repoarchives($zipfilename, $subdir, $downloadprefix, $fileShortDescription, $label, $description) {

    $filename=$zipfilename.".zip";
    $wholepath="./".$subdir."/".$filename;
    if (file_exists($wholepath)) {
        echo "<tr>";

        echo "<td align=\"left\" valign=\"top\" width=\"10%\"><b>".$label."</b></td>";
        echo "<td align=\"left\" valign=\"top\">";
        echo "<p>".$description."</p>";
        echo "</td>";

        $zipfilesize=fileSizeForDisplay($wholepath);

        displayRepoFileLine($downloadprefix, $subdir, $filename, $zipfilesize, $fileShortDescription);

        echo "</tr>";
    } else {

        // debug only
        // echo $wholepath."<br/>";
    }

}



function resourceExist($url, $mirrorPrefixuri, $prereqfilename, $eclipseFSpathPrefix)
{
    $result = false;

    $allowURLopen = ini_get('allow_url_fopen');

    if ($allowURLopen && stream_last_modified($url)) {
        $result = true;
    }
    else {
        // TODO: for now, we'll do a raw check on the whole file name, since enable_url_open
        // is off. better would be to check if we are on build.eclipse.org or download.eclipse.org?
        $wholePath = trim($eclipseFSpathPrefix) . "/" . trim($mirrorPrefixuri) . "/" . trim($prereqfilename);
        if (file_exists($wholePath)) {
            $result = true;
        }
    }
    return $result;
}

function stream_last_modified($url)
{
    if (function_exists('version_compare') && version_compare(phpversion(), '4.3.0') > 0)
    {
        if (!($fp = @fopen($url, 'r')))
        return NULL;

        $meta = stream_get_meta_data($fp);
        for ($j = 0; isset($meta['wrapper_data'][$j]); $j++)
        {
            if (strstr(strtolower($meta['wrapper_data'][$j]), 'last-modified'))
            {
                $modtime = substr($meta['wrapper_data'][$j], 15);
                break;
            }
        }
        fclose($fp);
    }
    else
    {
        $parts = parse_url($url);
        $host  = $parts['host'];
        $path  = $parts['path'];

        if (!($fp = @fsockopen($host, 80)))
        return NULL;

        $req = "HEAD $path HTTP/1.0\r\nUser-Agent: PHP/".phpversion()."\r\nHost: $host:80\r\nAccept: */*\r\n\r\n";
        fputs($fp, $req);

        while (!feof($fp))
        {
            $str = fgets($fp, 4096);
            if (strstr(strtolower($str), 'last-modified'))
            {
                $modtime = substr($str, 15);
                break;
            }
        }
        fclose($fp);
    }
    return isset($modtime) ? strtotime($modtime) : time();
}

function isMirrored($uriToCheck) {
    global $debugScript;
    global $debugFunctions;
    $localuri = $uriToCheck;

    $debugMirrorList = false;
    if ($debugScript) {
        echo "uriToCheck: " . $localuri . "<br />";
    }

    $xmlcount = 0;

    /* This method true and accurate method of parsing mirror results
     * may be expensive, and would
    * likely cause artificially high counts of "downloads".
    * Could maybe use if somehow only checked once ever 5 minutes or something.


    // turn off warnings, as sometimes HTML is returned, which causes lots of warnings
    $holdLevel = error_reporting(E_ERROR);
    $mirrorsxml=simplexml_load_file(rawurlencode($localuri) . urlencode("&format=xml"));
    error_reporting($holdLevel);


    if ($mirrorsxml) {
    if ($debugFunctions) {
    echo "root node: " . $mirrorsxml->getName() . "<br />";
    }
    if (strcmp($mirrorsxml->getName(), "mirrors") == 0) {
    foreach ($mirrorsxml->children() as $mirror) {
    if (strcmp($mirror->getName(),"mirror") == 0) {
    $xmlcount=$xmlcount+1;
    }
    if ($debugMirrorList) {
    print_r($mirror);
    echo "<br />";
    }
    }
    }
    if ($debugFunctions) {
    echo "Mirror count: " . $xmlcount . "<br />";
    }
    }
    */
    /*
     * Use simple heuristic based on pattern
    * in the URI ... if it contains "/downloads/" then assume it's mirrored
    */
    if (strpos($uriToCheck, "webtools/downloads/") > 0) {
        $xmlcount = 1;
    }
    return ($xmlcount > 0);

}

// TODO: replace with Phoenix variables
function getPlatform () {
    global $debugScript;
    global $debugFunctions;
    // getBrowser is expensive, so cache the data
    static $browser;
    $platform = "unknown";


    if(ini_get("browscap")) {
        if(!isset($browser)){
            $browser = get_browser(null, true);
        }

        if ($browser) {
            $rawPlatform = $browser['platform'];
            if ($debugFunctions) {
                echo "browser platfrom: " . $rawPlatform . "<br />" ;
            }

            if ($debugFunctions) {
                $browserKeys = array_keys($browser);
                foreach ($browserKeys as $key) {
                    echo $key . ": " . $browser[$key] . "<br />";
                }
            }
        }
        if (strpos($rawPlatform, "Win") === 0) {
            $platform="windows";
        } else if (strpos($rawPlatform, "Linux") === 0) {
            $platform="linux";
        } else if (strpos($rawPlatform, "Mac") === 0) {
            $platform="mac";
        }
    }
    return $platform;
}

function getPrereqReferenceOrName($eclipseMirrorScript, $mirrorPrefixuri, $prerequrl, $prereqfilename, $eclipseFSpathPrefix) {
    // todo: we really only need "if exists" so could make a bit more efficient
    // I tried "file_exists" but is didn't seem to work on my test server
    // For these pre-reqs, we assume if they exist, they are mirrored. This is true
    // 99% of the time.

    if (resourceExist($prerequrl, $mirrorPrefixuri, $prereqfilename, $eclipseFSpathPrefix)) {
        $reflink="<a href=\"" . $eclipseMirrorScript . $mirrorPrefixuri . "/" . $prereqfilename . "\">" . $prereqfilename . "</a>";
    } else {
        $reflink=$prereqfilename;
    }
    return $reflink;
}
?>
