<?php
############################################################################
# A Project of TNET Services, Inc. and Saratoga-Weather.org (Canada/World-ML template set)
############################################################################
#
#   Project:    Sample Included Website Design
#   Module:     sample.php
#   Purpose:    Sample Page
#   Authors:    Kevin W. Reed <kreed@tnet.com>
#               TNET Services, Inc.
#
# 	Copyright:	(c) 1992-2007 Copyright TNET Services, Inc.
############################################################################
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA
############################################################################
#	This document uses Tab 4 Settings
############################################################################
# Version 1.00 - 17-Nov-2011 - initial release
# Version 1.01 - 27-Nov-2011 - display 'Distance to station' mods
#
require_once("Settings.php");
require_once("common.php");
############################################################################
$TITLE = langtransstr($SITE['organ']) . " - " .langtransstr('Nearby METAR Reports');
$showGizmo = true;  // set to false to exclude the gizmo
include("top.php");
############################################################################
?>
<style type="text/css">
.bidi {
	unicode-bidi: embed;
}
</style>
</head>
<body>
<?php
############################################################################
include("header.php");
############################################################################
include("menubar.php");
############################################################################
?>

<div id="main-copy">
  
	<h1><?php langtrans('Nearby METAR Reports'); ?></h1>
    <p>&nbsp;</p>

<?php
// Customize this list with your nearby METARs by
// using http://saratoga-weather.org/wxtemplates/find-metar.php to create the list below

$MetarList = array( // set this list to your local METARs 
// Metar(ICAO) | Name of station | dist-mi | dist-km | direction |
  'KSEA|Seattle/Metro, Washington, USA|10|16|N|', // lat=47.4500,long=-122.3167, elev=136, dated=03-SEP-20
  'KTIW|Tacoma, Washington, USA|11|18|WSW|', // lat=47.2667,long=-122.5833, elev=89, dated=03-SEP-20
  'KTCM|Tacoma/Mc Chord, Washington, USA|14|23|SSW|', // lat=47.1167,long=-122.4667, elev=98, dated=03-SEP-20
  'KPLU|Puyallup/Thun, Washington, USA|15|24|SSE|', // lat=47.1000,long=-122.2833, elev=164, dated=03-SEP-20
  'KRNT|Renton, Washington, USA|15|24|NNE|', // lat=47.5000,long=-122.2167, elev=21, dated=03-SEP-20
  'KBFI|Seattle/Boeing, Washington, USA|17|27|N|', // lat=47.5500,long=-122.3167, elev=4, dated=03-SEP-20
  'KGRF|Fort Lewis/Gray, Washington, USA|19|31|SSW|', // lat=47.0667,long=-122.5667, elev=92, dated=03-SEP-20
  'KPWT|Bremerton Ntnl, Washington, USA|22|36|NW|', // lat=47.5000,long=-122.7500, elev=147, dated=03-SEP-20
  'KOLM|Olympia, Washington, USA|35|56|SW|', // lat=46.9667,long=-122.9000, elev=58, dated=03-SEP-20
  'KSHN|Shelton, Washington, USA|37|59|W|', // lat=47.2333,long=-123.1333, elev=82, dated=03-SEP-20
  'KPAE|Everett, Washington, USA|42|68|N|', // lat=47.9167,long=-122.2833, elev=180, dated=03-SEP-20
  'KSMP|Stampede Pass, Washington, USA|48|77|E|', // lat=47.2833,long=-121.3333, elev=1208, dated=03-SEP-20
// list generated Mon, 22-Nov-2021 1:17pm PST at https://saratoga-weather.org/wxtemplates/find-metar.php

);
$maxAge = 75*60; // max age for metar in seconds = 75 minutes
// end of customizations
#
# Note: you do not need to change the below settings .. your current values from Settings.php
# will be applied and replace what you change below.
#
$condIconDir = './ajax-images/';  // directory for ajax-images with trailing slash
$condIconType = '.jpg'; // default type='.jpg' -- use '.gif' for animated icons from http://www.meteotreviglio.com/
$uomTemp = '&deg;F';
$uomBaro = ' inHg';
$uomWind = ' mph';
$uomRain = ' in';
// optional settings for the Wind Rose graphic in ajaxwindiconwr as wrName . winddir . wrType
$wrName   = 'wr-';       // first part of the graphic filename (followed by winddir to complete it)
$wrType   = '.png';      // extension of the graphic filename
$wrHeight = '58';        // windrose graphic height=
$wrWidth  = '58';        // windrose graphic width=
$wrCalm   = 'wr-calm.png';  // set to full name of graphic for calm display ('wr-calm.gif')
$Lang = 'en'; // default language used (for Windrose display)
?>
<?php
  if(file_exists("include-metar-display.php")) {
	  include_once("include-metar-display.php");
  } else {
	  print "<p>Sorry.. include-metar-display.php not found</p>\n";
  }
?>
    
</div><!-- end main-copy -->

<?php
############################################################################
include("footer.php");
############################################################################
# End of Page
############################################################################
?>
