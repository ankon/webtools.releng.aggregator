<!-- ***********  Required Prerequisites **************  -->
<table border=0 cellspacing=2 cellpadding=2 width="100%">
	<tr>
		<td align="left" valign="top" bgcolor="#0080C0"><font
			face="'Bitstream Vera',Helvetica,Arial" color="#FFFFFF">Prerequisites
				and Handy Extras</font></td>
	</tr>
	<tr>
		<td>
			<p>These are the prerequisites to build or run these packages. All
				are not necessarily required, but instead some subset. Also listed
				are some frequently needed links for committer-required packages
				when creating new development environments, or targets to run
				against.</p>
			<p>
				Note that Java 6 is recommended for using WTP at a whole, even though subsets of WTP
				and other <a href="http://www.eclipse.org/downloads/">Eclipse
					Projects</a> might run with <a
					href="http://www.eclipse.org/downloads/moreinfo/jre.php">other JRE
					levels</a>. See <a href="http://www.eclipse.org/projects/project-plan.php?projectid=webtools#target_environments">planned target environments</a> for more information.
			</p>
			<p></p>
		</td>
	</tr>
	<tr>
		<td>
			<table border=0 cellspacing=1 cellpadding=1 width="90%"
				align="center">

				<tr valign="middle">
					<td colspan="2"><hr /></td>
				</tr>
				
				
				
				

                    <?php
                    include_once('dependency.properties.php');                                        
                    include_once('prereqsToDisplay.php');
                    $eclipse_mirror_script="http://www.eclipse.org/downloads/download.php?file=";
                    
                    if ("true" === $prereq_eclipseplatform) {
                        
                        echo "<td width=\"50%\">";
                        echo $eclipseplatform_name . "&nbsp;" . $eclipseplatform_description ;
                        echo "</td>";

                        //customize page depending on user's browser/platform, if we can detect it
                        $usersPlatform = getPlatform();
                        // assume windows by default, since likely most frequent, even for cases where
                        // platform is "unknown". I've noticed Opera reports 'unknown' :(
                        $recommendedFile=$eclipse_file_win32_win32_x86;
                        if (strcmp($usersPlatform,"linux")== 0) {
                            $recommendedFile=$eclipse_file_linux_gtk_x86;
                        } else if (strcmp($usersPlatform,"mac") == 0) {
                            $recommendedFile=$eclipse_file_macosx_carbon_ppc;
                        }

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $eclipseplatform_mirror_prefixuri, $eclipseplatform_url, $recommendedFile, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $eclipseplatform_url . "\">appropriate platform</a>";
                        echo " or <a href=\"" . $eclipseplatform_build_home . "\">equivalent</a></td>";


                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_eclipse) {
                        
                        echo "<td width=\"50%\">";
                        echo $eclipse_name . "&nbsp;" . $eclipse_description ;
                        echo "</td>";

                        //customize page depending on user's browser/platform, if we can detect it
                        $usersPlatform = getPlatform();
                        // assume windows by default, since likely most frequent, even for cases where
                        // platform is "unknown". I've noticed Opera reports 'unknown' :(
                        $recommendedFile=$eclipse_file_win32_win32_x86;
                        if (strcmp($usersPlatform,"linux")== 0) {
                            $recommendedFile=$eclipse_file_linux_gtk_x86;
                        } else if (strcmp($usersPlatform,"mac") == 0) {
                            $recommendedFile=$eclipse_file_macosx_carbon_ppc;
                        }

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $eclipse_mirror_prefixuri, $eclipse_url, $recommendedFile, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $eclipse_url . "\">appropriate platform</a>";
                        echo " or <a href=\"" . $eclipse_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_e4x) {
                        echo "<tr valign=\"top\">";

                        echo "<td width=\"50%\">";
                        echo $e4x_name . "&nbsp;" . $e4x_description ;
                        echo "</td>";
                    
                    
                    
                        //customize page depending on user's browser/platform, if we can detect it
                        $usersPlatform = getPlatform();
                        // assume windows by default, since likely most frequent, even for cases where
                        // platform is "unknown". I've noticed Opera reports 'unknown' :(
                        $recommendedFile=$e4x_file_win32_win32_x86;
                        if (strcmp($usersPlatform,"linux")== 0) {
                            $recommendedFile=$e4x_eclipse_file_linux_gtk_x86;
                        } else if (strcmp($usersPlatform,"mac") == 0) {
                            $recommendedFile=$e4x_eclipse_file_macosx_carbon_ppc;
                        }
                    
                        echo "<td align=\"right\">";
                    
                        echo getPrereqReferenceOrName($eclipse_mirror_script, $e4x_mirror_prefixuri, $e4x_url, $recommendedFile, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $e4x_url . "\">appropriate platform</a>";
                        echo " or <a href=\"" . $e4x_build_home . "\">equivalent</a></td>";
                    
                    
                        echo " </tr>";
                    }
                    ?>
                    
                    
                    <?php
                    if ("true" === $prereq_emfandxsd) {
                        
                        echo "<td width=\"50%\">";
                        echo $emfandxsd_name . "&nbsp;" . $emfandxsd_description ;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $emfandxsd_mirror_prefixuri, $emfandxsd_url, $emfandxsd_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $emfandxsd_build_home . "\">equivalent</a></td>";
                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_gef) {
                        
                        echo "<td width=\"50%\">";
                        echo $gef_name  . "&nbsp;" . $gef_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $gef_mirror_prefixuri, $gef_url, $gef_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $gef_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_dtp) {
                        
                        echo "<td width=\"50%\">";
                        echo $dtp_name . "&nbsp;" . $dtp_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $dtp_mirror_prefixuri, $dtp_url, $dtp_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $dtp_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>
                    
                    <?php
                    if ("true" === $prereq_emftransaction) {
                        
                        echo "<td width=\"50%\">";
                        echo $emftransaction_name  . "&nbsp;" . $emftransaction_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $emftransaction_mirror_prefixuri, $emftransaction_url, $emftransaction_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $emftransaction_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_emfvalidation) {
                        
                        echo "<td width=\"50%\">";
                        echo $emfvalidation_name  . "&nbsp;" . $emfvalidation_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $emfvalidation_mirror_prefixuri, $emfvalidation_url, $emfvalidation_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $emfvalidation_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_graphiti) {
                        
                        echo "<td width=\"50%\">";
                        echo $graphiti_name  . "&nbsp;" . $graphiti_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $graphiti_mirror_zip_prefixuri, $graphiti_url, $graphiti_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $graphiti_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_wst) {
                        
                        echo "<td width=\"50%\">";
                        echo $wst_name . "&nbsp;" . $wst_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $wst_mirror_prefixuri, $wst_url, $wst_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $wst_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_jst) {
                        
                        echo "<td width=\"50%\">";
                        echo $jst_name . "&nbsp;" . $jst_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $jst_mirror_prefixuri, $jst_url, $jst_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $jst_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_wtp) {
                        
                        echo "<td width=\"50%\">";
                        echo $wtp_name . "&nbsp;" . $wtp_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $wtp_mirror_prefixuri, $wtp_url, $wtp_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $wtp_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_wtptests) {
                        
                        echo "<td width=\"50%\">";
                        echo $wtptests_name . "&nbsp;" . $wtptests_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $wtptests_mirror_prefixuri, $wtptests_url, $wtptests_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $wtptests_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>

                    <?php
                    if ("true" === $prereq_dltk) {
                        
                        echo "<td width=\"50%\">";
                        echo $dltk_name . "&nbsp;" . $dltk_description;
                        echo "</td>";

                        echo "<td align=\"right\">";

                        echo getPrereqReferenceOrName($eclipse_mirror_script, $dltk_mirror_prefixuri, $dltk_url, $dltk_file, $eclipse_fspath_prefix);
                        echo " or <a href=\"" . $dltk_build_home . "\">equivalent</a></td>";

                        echo " </tr>";
                    }
                    ?>
                    
                    <tr valign="middle">
                         <td colspan="2"><hr /></td>
                    </tr>

                     <?php
                     if ("true" === $prereq_eclipsetestframework) {
                            
                         echo "<td width=\"50%\">";
                         echo $eclipseTestFramework_name . "&nbsp;" . $eclipseTestFramework_description;
                         echo "</td>";
 
                            echo "<td align=\"right\">";

                            echo getPrereqReferenceOrName($eclipse_mirror_script, $eclipseTestFramework_mirror_prefixuri, $eclipseTestFramework_url, $eclipseTestFramework_file, $eclipse_fspath_prefix);
                            echo " or <a href=\"" . $eclipseTestFramework_build_home . "\">equivalent</a></td>";
                            echo "</tr>";
                     }
                     ?>

                     <?php
                     if ("true" === $prereq_eclipsereleng) {
                            
                        echo "<td width=\"50%\">";
                        echo $eclipsereleng_name . "&nbsp;" . $eclipsereleng_description;
                        echo "</td>";

                            echo "<td align=\"right\">";

                            echo getPrereqReferenceOrName($eclipse_mirror_script, $eclipsereleng_mirror_prefixuri, $eclipsereleng_url, $eclipsereleng_file, $eclipse_fspath_prefix);
                            echo " or <a href=\"" . $eclipsereleng_build_home . "\">equivalent</a></td>";
                            echo "</tr>";
                     }
                     ?>

                     <?php
                     if ("true" === $prereq_orbitthirdpartyzip) {
                            
                         echo "<td width=\"50%\">";
                        echo $orbitthirdpartyzip_name . "&nbsp;" . $orbitthirdpartyzip_description;
                        echo "</td>";

                            echo "<td align=\"right\">";

                            echo getPrereqReferenceOrName($eclipse_mirror_script, $orbitthirdpartyzip_mirror_prefixuri, $orbitthirdpartyzip_url, $orbitthirdpartyzip_file, $eclipse_fspath_prefix);
                            echo " or <a href=\"" . $orbitthirdpartyzip_build_home . "\">equivalent</a></td>";
                            echo "</tr>";
                     }
                     ?>
                    

              </table>
		</td>
	</tr>
</table>

