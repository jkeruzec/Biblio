@ECHO off

set phpBin=C:\wamp\bin\php\php5.3.13
set composerPhar=composer.phar

IF "%1"=="boulot" (
set http_proxy=http://192.168.247.75:3128
)

php %phpBin%\%composerPhar% install --dev