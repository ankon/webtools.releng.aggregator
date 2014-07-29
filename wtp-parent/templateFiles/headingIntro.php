
<?php

if (isset($incubating) && ($incubating == "true")) {
    echo '<title>WTP Incubator Downloads</title>';
}
else {
    echo '<title>WTP Downloads</title>';
}

?>


</head>

<body>









<?php if (isset($incubating) && ($incubating == "true")) {
    echo "<table BORDER=0 CELLSPACING=2 CELLPADDING=2 WIDTH=\"100%\">";
    echo " <tr>";
    echo "        <td ALIGN=left><font face=\"'Bitstream Vera',Helvetica,Arial\" size=\"+2\"><b><?php echo \"$type\";?>";
    echo "        Build: $build</b></font></td>";
    echo "        <td align=\"right\" rowspan=\"3\"><a";
    echo "               href=\"http://www.eclipse.org/projects/what-is-incubation.php\"><img";
    echo "               src=\"http://www.eclipse.org/images/egg-incubation.png\"";
    echo "               alt=\"Incubation\" align=\"middle\" border=\"0\"></a></td>";


    echo " <tr valign=\"top\">";
    echo "        <td><font size=\"-1\">" . $builddate . "</font></td>";
    echo " </tr>";
    echo " <tr valign=\"top\">";
    echo "        <td>";
    echo "        <p>The Eclipse Web Tools Platform (WTP) Incubator Project provides";
    echo "        tools for development that are just getting started, or are";
    echo "        experimental in some fashion.</p>";
    echo "        </td>";
    echo " </tr>";
    echo "</table>";

} else {

    echo "<table BORDER=0 CELLSPACING=2 CELLPADDING=2 WIDTH=\"100%\">";
    echo " <tr>";
    echo "        <td ALIGN=left><font face=\"'Bitstream Vera',Helvetica,Arial\" size=\"+2\"><b>$type";
    echo "        Build: " . $build . "</b></font></td>";

    echo " <tr valign=\"top\">";
    echo "        <td><font size=\"-1\">" . $builddate . "</font></td>";
    echo " </tr>";
    echo " <tr valign=\"top\">";
    echo "        <td>";
    echo "        <p>The Eclipse Web Tools Platform Project provides tools for Web";
    echo "               Development, and is a platform for adopters making add-on tools for";
    echo "               Web Development.</p>";
    echo "        </td>";
    echo " </tr>";
    echo "</table>";

} ?>


	<table border=0 cellspacing=2 cellpadding=2 width="100%">
		<tr>
			<td align="left" valign="top" bgcolor="#0080C0"><font
				face="'Bitstream Vera',Helvetica,Arial" color="#FFFFFF">All-in-one
					Packages</font></td>
		</tr>
		<tr>
			<td>
				<p>
					For most uses, we recommend web-developers download the
					"all-in-one" package, <a href="http://www.eclipse.org/downloads/">Eclipse
						IDE for Java EE Developers</a>, from the main Eclipse download
					site.
				</p>
			</td>
		</tr>
	</table>