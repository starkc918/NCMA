<div id="sidebar">

				<!-- Widget Area -->
				<div id="widgets">
				
					<!-- Main menu -->
					<nav id="mainmenu">
						<ul>
							<?php if(isLoggedIn()) { 
							$off = hasPerm("officer");
							$dev = hasPerm("developer");
							$cmd = hasPerm("pdcmd");?><li><a href="index.php" class="active">Home</a></li><?php } else {?>
							<li><a href="login.php" class="active">Login</a></li><?php }?>
							<?php
							require_once("php_includes/base.inc.php");
							if($off) {
							?>
                            <li><a href="addBolo.php">BOLO Dashboard</a></li>
                            <li><a href="freq.php">Frequencies & Threat</a></li>
                            <li><a href="#">Records</a>
                            	<ul>
                            		<li><a href="crime.php">Criminal Database</a></li>
                                    <li><a href="traffic.php">Traffic Infractions</a></li>
                                    <li><a href="doc.php">DOC Panel</a></li>
                                    <?php if(hasPerm("doj")) { ?>
                                    <li><a href="expungement.php">Expungements</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php
                            }
							if($off) {
							?>
                            <li><a href="#">Useful Information</a>
                            	<ul>
                            		<li><a href="roster.php">Police Roster</a></li>
                                	<li><a href="arrests.php">Recent Arrests</a></li>
                                	<li><a href="citations.php">Recent Citations</a></li>
                                	<li><a href="info.php">Useful Links</a></li>
                                </ul>
                            </li>
							<?php
                            }
							if($off && $cmd) {
							?>
							<li><a href="#">Command Tools</a>
                            	<ul>
                            		<li><a href="dashboard.php">Dashboard</a></li>
                                	<li><a href="verify.php">User Requests</a></li>
                                	<li><a href="control.php">Officer Management</a></li>
                                </ul>
                            </li>
                            <?php
                            }
							if($dev) {
							?>
							<li><a href="#">Dev - Tools</a>
                            	<ul>
                            		<li><a href="alerts.php">Alerts</a></li>
                            		<li><a href="all.php">All Arrests</a></li>
                            		<li><a href="passhasher.php">Password Hasher</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dev - Pages</a>
                            	<ul>
                                	<li><a href="crime_main.php">New Arrests</a></li>
                                	<li><a href="calc.php">Time Calculator</a></li>
                            		<li><a href="stats.php">Stats</a></li>
                                    <li><a href="addWarrant.php">Add Warrant</a></li>
                            		<li><a href="warrants.php">View Warrants</a></li>
                                </ul>
                            </li>
							<?php
							}
							?>
							<?php if(isLoggedIn()) { ?>
                            <li><a href="settings.php">User Settings</a></li>
                            <li><a href="changes.php">Changelog</a></li>
                            <li><a href="logout.php">Logout</a></li><?php } ?>
						</ul>
					</nav>

				</div>