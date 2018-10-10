@echo OFF
rem version 1.1
rem 要测试是否能成功运行，请在配置好以下参数后，直接运行，看能否正常备份MySQL数据。如果能正常备份，那么就可以配置到计划任务中了。

rem 设置删除历史备份文件。删除多少次备份之前的备份文件。0--不删除历史备份文件；1，表示一次，2，表示2次，以此类推。如set deleteHistoryBackFile=30表示删除30次以前的备份文件；
set deleteHistoryBackFile=30

rem 备份时发生错误是否删除历史备份文件。yes--删除；no--不删除。
set onErrorDeleteBackFile=no

rem 修改backupPath 为具体的要存放的路径。注意：文件夹名存在空格不需要引号括起来。警告：如果配置了删除历史备份文件，将会删除该目录下的符合删除条件的文件夹，所以该目录应该为备份专用目录。
set backupPath=E:\db_bak

rem 修改dbhost为主机名或IP地址
set dbhost=localhost

rem 登陆mysql数据库的用户名
set dbuser=root

rem 登陆mysql的密码
set dbpwd=Centerm123.!@#


rem set backupFolder=%date:~0,10% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2%
rem 修改保存路径方式，解决无法自动删除bug
set backupFolder=%date:~0,4%-%date:~5,2%-%date:~8,2% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2%

set dblist=%temp%\dblist.txt
set autobat=%temp%\bakmysql.bat
set errorFile=%backupPath%\%backupFolder%\__error.txt
set backupLogFile=%backupPath%\MySQLBackLog.txt


if not exist "%backupPath%" md "%backupPath%"
if not %errorlevel%==0 goto mdfail

if not exist "%backupPath%\%backupFolder%" md "%backupPath%\%backupFolder%"
if not %errorlevel%==0 goto mdfail

rem 创建数据库列表文件,保存在临时文件中 %dblist%

rem 循环输出所有库，备份所有库
rem echo show databases; | mysql -h%dbhost% -u%dbuser% -p%dbpwd% > %dblist%
rem if not %errorlevel%==0 goto cffail

rem 备份指定库，第一行会被忽略
rem 添加系统数据库
echo database >> %dblist%
echo centerm >> %dblist%
echo centerm_corporation >> %dblist%

rem 是否存在错误标示
set isExistError=no
rem 创建自动批处理文件
echo @echo off > %autobat%
echo echo 未成功备份的数据库: ^> "%errorFile%" >> "%autobat%"
for /f "skip=1 tokens=*" %%i in (%dblist%) do echo mysqldump --single-transaction %%i -h%dbhost% -u%dbuser% -p%dbpwd% ^> "%backupPath%\%backupFolder%\%%i.sql" >>%autobat% && echo if not %%errorlevel%%==0 (echo %%i ^>^> "%errorFile%" ^& set isExistError=yes) >> "%autobat%"

call %autobat%

echo %date:~0,10% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2% 完成数据库备份： >> %backupLogFile%
if %isExistError%==yes echo         但是存在备份错误，请查看备份文件"%errorFile%" >> %backupLogFile%
if %isExistError%==no  echo         已经完成数据备份，备份文件夹"%backupPath%\%backupFolder%" >> %backupLogFile%

:ClearTmpFile
rem 清理零时文件
del /s /q "%dblist%" > nul
del /s /q "%autobat%" > nul


rem 如果不存在错误，删除错误文件。
if %isExistError%==no del "%errorFile%" /s /q > nul

rem 删除历史备份文件
if %deleteHistoryBackFile%==0 GOTO end
if %isExistError%==no GOTO DeleteHistoryFile
if %onErrorDeleteBackFile%==no GOTO end

:DeleteHistoryFile
echo         删除%deleteHistoryBackFile%次以前的备份记录。>> %backupLogFile%
for /f "skip=%deleteHistoryBackFile% tokens=*" %%i in ('dir "%backupPath%" /o-n /ad /b') do rd "%backupPath%\%%i" /s /q
goto end

:mdfail
echo %date:~0,10% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2% 备份数据库失败:>> %backupLogFile%
echo         创建备份文件夹"%backupPath%\%backupFolder%"失败,请检查是否有写入权限。>> %backupLogFile%
if not %errorlevel%==0 echo 创建备份文件夹"%backupPath%\%backupFolder%"失败,请检查是否有写入权限。&& pause
goto end

:cffail
echo %date:~0,10% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2% 备份数据库失败:>> %backupLogFile%
echo         无法登陆到数据库或者对"%temp%"目录没有读写权限。>> %backupLogFile%
if not %errorlevel%==0 echo 无法登陆到数据库或者对"%temp%"目录没有读写权限。&& pause
goto end

:end
echo. >> %backupLogFile%