#-----------------------------------------------------------------------
# these examples get saratoga running vs. the simulator
# so 'Davis', 'UV', and 'Solar' are set false in Settings-weather.php
#-----------------------------------------------------------------------

# install the prerequisites for saratoga
apt-get install -y php php-fpm curl php-curl php-xml php-gd python3-ephem unzip

# get the pieces
wget https://saratoga-weather.org/wxtemplates/Base-USA.zip
wget https://saratoga-weather.org/wxtemplates/WEEWX-plugin.zip
wget https://saratoga-weather.org/saratoga-icons2.zip
wget https://saratoga-weather.org/saratoga-icons2-png-86x86.zip
wget https://saratoga-weather.org/wxtemplates/Settings-config-USA.php
wget https://saratoga-weather.org/wxtemplates/Settings-config-WeeWX.php

# extract them
cd /var/www/html
unzip ~/Base-USA.zip
unzip ~/saratoga-icons2.zip
unzip ~/Base-USA.zip
unzip -t ~/WEEWX-plugin.zip
unzip  ~/WEEWX-plugin.zip
unzip ~/saratoga-icons2.zip
unzip ~/saratoga-icons2-png-86x86.zip

# overlay the patched files
cd customizations
for f in Settings-weather.php Settings.php flyout-menu.xml wxabout.php wxmetar.php wxquake.php wxsimforecast.php wxstatus.php
do
   cp -v ${f} /var/www/html/${f}
done

cd /var/www/html
cp wxindex.php index.php

# symlink to weewx for NOAA and all images
cd /var/www/html
for f in NOAA \
daybarometer.png dayhum.png dayhumidity.png dayhumin.png dayradiation.png \
dayrain.png dayrx.png daytemp.png daytempchill.png daytempdew.png \
daytempfeel.png daytempin.png dayuv.png dayvolt.png daywind.png \
daywinddir.png daywindvec.png \
monthbarometer.png monthhum.png monthhumidity.png monthhumin.png monthradiation.png \
monthrain.png monthrx.png monthtemp.png monthtempchill.png \
monthtempdew.png monthtempfeel.png monthtempin.png monthuv.png \
monthvolt.png monthwind.png monthwinddir.png monthwindvec.png \
weekbarometer.png weekhum.png weekhumidity.png weekhumin.png weekradiation.png \
weekrain.png weekrx.png weektemp.png weektempchill.png \
weektempdew.png weektempfeel.png weektempin.png weekuv.png \
weekvolt.png weekwind.png weekwinddir.png weekwindvec.png \
yearbarometer.png yearhum.png yearhumidity.png yearhumin.png yearradiation.png \
yearrain.png yearrx.png yeartemp.png yeartempchill.png \
yeartempdew.png yeartempfeel.png yeartempin.png yearuv.png \
yearvolt.png yearwind.png yearwinddir.png yearwindvec.png
do
   ln -s -v weewx/${f} ${f}
done

# fix up permissions in web docroot
chown -R www-data:www-data /var/www/html


