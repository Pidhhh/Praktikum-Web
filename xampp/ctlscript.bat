@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist D:\Pidh\UMS\Praktikum-Web\xampp\hypersonic\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\server\hsql-sample-database\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\ingres\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\ingres\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\mysql\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\mysql\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\postgresql\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\postgresql\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\apache\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\apache\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\openoffice\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\openoffice\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\apache-tomcat\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\resin\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\resin\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\jetty\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\jetty\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\subversion\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist D:\Pidh\UMS\Praktikum-Web\xampp\lucene\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\lucene\scripts\ctl.bat START)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\third_application\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist D:\Pidh\UMS\Praktikum-Web\xampp\third_application\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\third_application\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\lucene\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist D:\Pidh\UMS\Praktikum-Web\xampp\subversion\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\subversion\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\jetty\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\jetty\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\hypersonic\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\resin\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\resin\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT D:\Pidh\UMS\Praktikum-Web\xampp\apache-tomcat\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\openoffice\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\openoffice\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\apache\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\apache\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\ingres\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\ingres\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\mysql\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\mysql\scripts\ctl.bat STOP)
if exist D:\Pidh\UMS\Praktikum-Web\xampp\postgresql\scripts\ctl.bat (start /MIN /B D:\Pidh\UMS\Praktikum-Web\xampp\postgresql\scripts\ctl.bat STOP)

:end

