<?php
############################################################################
# A Project of TNET Services, Inc. and Saratoga-Weather.org (WD-USA template set)
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
require_once("Settings.php");
require_once("common.php");
############################################################################
$TITLE= $SITE['organ'] . " - About Us";
$showGizmo = true;  // set to false to exclude the gizmo
include("top.php");
############################################################################
?>
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

	<h3>About This Station</h3> 

	<p>The station is powered by a <a href="http://www.davisnet.com/weather/products/vantage-pro-professional-weather-stations.asp">Davis Vantage Pro 2</a> wireless weather station.  The data is collected every 5 seconds and the site is updated every 5 minutes. This site and its data is collected using the <a href="http://www.weewx.com/">WeeWX</a> Software, hosted on a Seagate Dockstar running <a href="http://www.debian.org">Debian Linux</a>. The station is comprised of an anemometer, a rain gauge and thermo/hydro sensors situated in optimal positions for highest accuracy possible. </p>

<p>The Vantage Pro 2 has been online since early March 2009 and has had a few easy repairs since then:
<ul>
<li> mid-2011: replaced the external ISS sensor main board.  Davis was nice enough to send me a new board for free, even though the station was technically a month out of maintenance.</li> 
<li> late-2017: replaced the tipper Reed Switch that I broke while being a little heavy-handed cleaning things.  Again, Davis sent me a few for free. Not too bad a process to desolder the old one and solder the new one in.</li>
<li> mid-2018: replaced a failed anemometer with a new-style one.  A bit expensive but future replacements should just be the cartridge.</li>
<li> mid-2020: upgraded by adding the new-style rain cone and a DFARS</li>
</ul>
</p>

<p>From late 2003 until early 2009, the station was a LaCrosse 2315 which was ok as a starter system, but it had a number of flaws related to poor accuracy in sunlight as well as issues with spurious bad wind readings and wireless sensor to console signal drops.</p>

<p>The station has been on Internet since Nov-2006. Previously, we also ran several other weather station software packages under Linux, first open2300 and then several years running  Wview.  We switched to WeeWX in January 2011 and haven't looked back :-) </p>

<p> We feed the following weather sites on the Internet:
<ul>
<li>Weather Underground - <a href="https://www.wunderground.com/history/daily/us/wa/federal-way/KWAFEDER15">KWAFEDER15</a></li>
<li>CWOP - <a href="http://www.findu.com/cgi-bin/wxpage.cgi?call=CW6881">CW6881</a></li>
<li>PWS - <a href="http://www.pwsweather.com/obs/KWFEDER15.html">KWFEDER15</a></li>
</ul>
</p>
<hr>
	<h3>About This City</h3> 
<p>
<dl>
<dd>
Federal Way began in the late 1800s as a logging settlement. By the 1920s, Federal Highway 99 was complete, linking the community to the economic centers of Seattle and Tacoma, and suggesting a name for the young community. The name Federal Way was first used in 1929 when five existing schools consolidated operations into School District #210 and planned construction of Federal Way High School next to Highway 99. 
</dd>
<p>
<dd>
By the end of the 1950s, the community featured a number of housing areas and a 10-block commercial district with a shopping center and family-oriented theme park. During the 1960s, residential development continued, providing homes to Boeing engineers and Weyerhaeuser executives. Retail growth followed, including the construction of SeaTac Mall (now The Commons at Federal Way) in the mid-1970s. 
</dd>
</dl>
<p>
<em>Rapid Growth</em>
<dl>
<dd>
Rapid retail and residential growth created significant changes in the community during the 1970s and 1980s. Desiring controlled, quality growth and community identity, Federal Way citizens organized to form what was then Washington's sixth largest city, incorporating in February of 1990. In November 2010 Federal Way citizens decided to change from a council-manager form of government to a mayor-council form. 
</dd>
<p>
<dd>
Today, the Federal Way community is residential and commercial with a population employed locally and in neighboring cities such as Sea Tac, Kent, Tacoma, Bellevue and Seattle. An estimated 22,485 people are employed within the city limits. 
</dd>
</dl>
<p>
<em>Since Incorporation</em>
<dl>
<dd>
In the years since incorporation, Federal Way has fostered quality commercial and residential growth, and enhanced the quality of life for its residents with infrastructure improvements, diverse recreational opportunities and high-quality parks. The city's Comprehensive Plan looks to Federal Way's future and includes plans for a vibrant City Center, with mixed-use commercial and residential development in the downtown business area and access to public transportation. 
</dd>
</dl>
<p>
(above synopsis copied from the <a href="http:////www.cityoffederalway.com">City of Federal Way</a> official web site on May 30, 2013.)
<p>
<hr>
<h3> Home Automation Setup </h3>
This is a simplified diagram of the home automation here, which centers around MQTT as a unifying transport mechanism for IoT - 
<a href="home-automation-setup.png"/>(link)</a>
<p>
<hr>

	<h3>About This Website</h3> 

	<p>This site is based on the <a href="http://saratoga-weather.org/">Saratoga-Weather.org</a> templates with Gary Roderick's <a href="https://github.com/gjr80/weewx-saratoga">weewx extension</a> to connect WeeWX to the Saratoga template engine.
<p>

</div><!-- end main-copy -->

<?php
############################################################################
include("footer.php");
############################################################################
# End of Page
############################################################################
?>
