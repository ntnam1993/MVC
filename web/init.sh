#!/bin/sh

DOCUMENT_ROOT="/var/www/html"

echo $DOCUMENT_ROOT

apache2ctl -D FOREGROUND
