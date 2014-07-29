                            <?php

                            $bellwether_zipfilename="wst-sdk-".$build.".zip";
                            if (file_exists($bellwether_zipfilename)) {
                                // if-then-include section
                                // include this whole section if (and only if) the bellwether file exists.
                                // For example, it may not exist on builds for "old" streams.
                                ?>

<!-- ***********  WST **************  -->
<table border=0 cellspacing=2 cellpadding=2 width="100%">
	<tr>
		<td align=left valign=top colspan="5" bgcolor="#0080C0"><font
			face="'Bitstream Vera',Helvetica,Arial" color="#FFFFFF">Traditional
				zip files for Web Development Tools</font></td>
	</tr>

	<tr>
		<td align="left" valign="top" colspan="5">
			<p>These zip files includes the features and plugins for (non-Java
				EE) Web Development, including JavaScript, XML, HTML, CSS.</p>
			<p>Note: you only need this zip file(s) if you want to use only this
				function. If you download the WTP zip file, it is already included
				there.</p>
		</td>
	</tr>
	<tr>
		<td>
			<table border=0 cellspacing=2 cellpadding=2 width="90%"
				align="center">


				<tr>
					<td align="left" valign="top" width="10%"><b>Tool Developers:</b></td>

					<td align="left" valign="top">
						<p>The SDK package includes source code and developer
							documentation for those using WST as a platform to build more
							tools, as well as everything that is in the non-SDK version.</p>
						
						
						
						









                            <?php

                            $zipfilename="wst-sdk-$build";

                            $filename=$zipfilename.".zip";
                            $zipfilesize=fileSizeForDisplay($filename);
                            $fileShortDescription="wst-sdk";
                            displayFileLine($downloadprefix, $filename, $zipfilesize, $fileShortDescription);
                            ?>









                    
				
				
				
				</tr>

				<tr>

					<td align="left" valign="top" width="10%"></td>
					<td align="left" valign="top">
						<p>The Automated Test zip contains the unit tests.</p>
						
						
						
						








                            <?php

                            $zipfilename="wst.tests-$build";

                            $filename=$zipfilename.".zip";
                            $zipfilesize=fileSizeForDisplay($filename);
                            $fileShortDescription="wst.tests";
                            displayFileLine($downloadprefix, $filename, $zipfilesize, $fileShortDescription);

                            ?>









                    
				
				
				
				</tr>

			</table>
		</td>


	</tr>

</table>



<?php } ?>
