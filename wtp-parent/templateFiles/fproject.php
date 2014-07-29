                            <?php

                            $bellwether_zipfilename="wtp-common-fproj-".$build.".zip";
                            if (file_exists($bellwether_zipfilename)) {
                                // if-then-include section
                                // include this whole section if (and only if) the bellwether file exists.
                                // For example, it may not exist on builds for "old" streams.
                                ?>

<!-- ***********  Faceted Project Framework **************  -->
<table border=0 cellspacing=2 cellpadding=2 width="100%">
	<tr>
		<td align=left valign=top colspan="5" bgcolor="#0080C0"><font
			face="'Bitstream Vera',Helvetica,Arial" color="#FFFFFF">Faceted
				Project Framework</font></td>
	</tr>

	<tr>
		<td align="left" valign="top" colspan="5">
			<p>The Faceted Project Framework allows creation of modular projects
				in Eclipse so that the user can easily add and remove functionality.
				All WTP projects leverage this framework, but it can also be used
				independent of WTP.</p>
			<p>The JDT Enablement component extends the Faceted Project Framework
				to integrate with Java Development Tools. The component includes the
				Java facet, modeling of the JVM-based runtimes and tools for
				simplifying Java library management for facet authors.</p>
			<p>Note: you only need this zip file(s) if you want to use only this
				function. If you download the WTP (or WST) zip file, it is already
				included there.</p>
		</td>
	</tr>
	<tr>
		<td>
			<table border=0 cellspacing=2 cellpadding=2 width="90%"
				align="center">


				<tr>
					<td align="left" valign="top" width="10%"><b>Framework</b></td>
					<td align="left" valign="top">
						<p>Runtime</p>
					</td>
					
					
					
					








                            <?php

                            $zipfilename="wtp-common-fproj-$build";

                            $filename=$zipfilename.".zip";
                            $zipfilesize=fileSizeForDisplay($filename);
                            $fileShortDescription="wtp-common-fproj";
                            displayFileLine($downloadprefix, $filename, $zipfilesize, $fileShortDescription);

                            ?>
                     </tr>

				<tr>
					<td align="left" valign="top" width="10%"><b>&nbsp;</b></td>
					<td align="left" valign="top">
						<p>SDK</p>
					</td>
					
					
					
					








                            <?php

                            $zipfilename="wtp-common-fproj-sdk-$build";

                            $filename=$zipfilename.".zip";
                            $zipfilesize=fileSizeForDisplay($filename);
                            $fileShortDescription="wtp-common-fproj-sdk";
                            displayFileLine($downloadprefix, $filename, $zipfilesize, $fileShortDescription);

                            ?>
                     </tr>

				<tr>
					<td align="left" valign="top" width="10%"><b>JDT Enablement</b></td>
					<td align="left" valign="top">
						<p>Runtime</p>
					</td>
					
					
					
					








                            <?php

                            $zipfilename="wtp-common-fproj-enablement-jdt-$build";

                            $filename=$zipfilename.".zip";
                            $zipfilesize=fileSizeForDisplay($filename);
                            $fileShortDescription="wtp-common-fproj-enablement-jdt";
                            displayFileLine($downloadprefix, $filename, $zipfilesize, $fileShortDescription);

                            ?>
                     </tr>

				<tr>
					<td align="left" valign="top" width="10%"><b>&nbsp;</b></td>
					<td align="left" valign="top">
						<p>SDK</p>
					</td>
					
					
					
					








                            <?php

                            $zipfilename="wtp-common-fproj-enablement-jdt-sdk-$build";

                            $filename=$zipfilename.".zip";
                            $zipfilesize=fileSizeForDisplay($filename);
                            $fileShortDescription="wtp-common-fproj-enablement-jdt-sdk";
                            displayFileLine($downloadprefix, $filename, $zipfilesize, $fileShortDescription);

                            ?>
                     </tr>

			</table>
		</td>
	</tr>

</table>




<?php
// end the if-then-include section
                            }
                            ?>
