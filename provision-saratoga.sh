#-----------------------------------------------------------------------
# these examples get saratoga running vs. the simulator
# so 'Davis', 'UV', and 'Solar' are set false in Settings-weather.php
#
# this assumes all the additions are under /vagrant so if you run
# this from a different directory you'll need to edit slightly
#-----------------------------------------------------------------------

# copy the customizations to /tmp
cp -r /vagrant/customizations /tmp

# install the prerequisites for saratoga
apt-get install -y php php-fpm curl php-curl php-xml php-gd python3-ephem unzip

# get the pieces
wget --no-verbose https://saratoga-weather.org/wxtemplates/Base-USA.zip              -O /tmp/Base-USA.zip
wget --no-verbose https://saratoga-weather.org/wxtemplates/WEEWX-plugin.zip          -O /tmp/WEEWX-plugin.zip
wget --no-verbose https://saratoga-weather.org/saratoga-icons2.zip                   -O /tmp/saratoga-icons2.zip
wget --no-verbose https://saratoga-weather.org/saratoga-icons2-png-86x86.zip         -O /tmp/saratoga-icons2-png-86x86.zip
wget --no-verbose https://saratoga-weather.org/wxtemplates/Settings-config-USA.php   -O /tmp/Settings-config-USA.php
wget --no-verbose https://saratoga-weather.org/wxtemplates/Settings-config-WeeWX.php -O /tmp/Settings-config-Weewx.php
wget --no-verbose https://github.com/gjr80/weewx-saratoga/releases/download/v0.1.1/ws-0.1.1.tar.gz -O /tmp/weewx-saratoga.tgz

# extract them
cd /var/www/html
unzip -o -q /tmp/Base-USA.zip
unzip -o -q /tmp/saratoga-icons2.zip
unzip -o -q /tmp/Base-USA.zip
unzip -o -q /tmp/WEEWX-plugin.zip
unzip -o -q /tmp/WEEWX-plugin.zip
unzip -o -q /tmp/saratoga-icons2.zip
unzip -o -q /tmp/saratoga-icons2-png-86x86.zip
cd -

# overlay the customizations
cd /tmp/customizations
cp *php /var/www/html
cp *png /var/www/html
cp *xml /var/www/html
cp sites-enabled.default /etc/nginx/sites-enabled/default

# put index.html into place
cd /var/www/html
cp wxindex.php index.php

# clean up static demo files
cd /var/www/html
rm client*.txt WEEWXtags.php
ln -s weewx/clientraw.txt      clientraw.txt
ln -s weewx/clientrawdaily.txt clientrawdaily.txt
ln -s weewx/clientrawextra.txt clientrawextra.txt
ln -s weewx/clientrawhour.txt  clientrawhour.txt
ln -s weewx/WEEWXtags.php WEEWXtags.php

# get the weewx-extension
wee_extension --install /tmp/weewx-saratoga.tgz
systemctl restart weewx

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
   ln -s weewx/${f} ${f}
done

# fix up permissions in web docroot
chown -R www-data:www-data /var/www/html

# restart nginx
systemctl restart nginx

