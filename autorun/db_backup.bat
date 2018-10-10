@echo OFF
rem version 1.1
rem Ҫ�����Ƿ��ܳɹ����У��������ú����²�����ֱ�����У����ܷ���������MySQL���ݡ�������������ݣ���ô�Ϳ������õ��ƻ��������ˡ�

rem ����ɾ����ʷ�����ļ���ɾ�����ٴα���֮ǰ�ı����ļ���0--��ɾ����ʷ�����ļ���1����ʾһ�Σ�2����ʾ2�Σ��Դ����ơ���set deleteHistoryBackFile=30��ʾɾ��30����ǰ�ı����ļ���
set deleteHistoryBackFile=30

rem ����ʱ���������Ƿ�ɾ����ʷ�����ļ���yes--ɾ����no--��ɾ����
set onErrorDeleteBackFile=no

rem �޸�backupPath Ϊ�����Ҫ��ŵ�·����ע�⣺�ļ��������ڿո���Ҫ���������������棺���������ɾ����ʷ�����ļ�������ɾ����Ŀ¼�µķ���ɾ���������ļ��У����Ը�Ŀ¼Ӧ��Ϊ����ר��Ŀ¼��
set backupPath=E:\db_bak

rem �޸�dbhostΪ��������IP��ַ
set dbhost=localhost

rem ��½mysql���ݿ���û���
set dbuser=root

rem ��½mysql������
set dbpwd=Centerm123.!@#


rem set backupFolder=%date:~0,10% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2%
rem �޸ı���·����ʽ������޷��Զ�ɾ��bug
set backupFolder=%date:~0,4%-%date:~5,2%-%date:~8,2% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2%

set dblist=%temp%\dblist.txt
set autobat=%temp%\bakmysql.bat
set errorFile=%backupPath%\%backupFolder%\__error.txt
set backupLogFile=%backupPath%\MySQLBackLog.txt


if not exist "%backupPath%" md "%backupPath%"
if not %errorlevel%==0 goto mdfail

if not exist "%backupPath%\%backupFolder%" md "%backupPath%\%backupFolder%"
if not %errorlevel%==0 goto mdfail

rem �������ݿ��б��ļ�,��������ʱ�ļ��� %dblist%

rem ѭ��������п⣬�������п�
rem echo show databases; | mysql -h%dbhost% -u%dbuser% -p%dbpwd% > %dblist%
rem if not %errorlevel%==0 goto cffail

rem ����ָ���⣬��һ�лᱻ����
rem ���ϵͳ���ݿ�
echo database >> %dblist%
echo centerm >> %dblist%
echo centerm_corporation >> %dblist%

rem �Ƿ���ڴ����ʾ
set isExistError=no
rem �����Զ��������ļ�
echo @echo off > %autobat%
echo echo δ�ɹ����ݵ����ݿ�: ^> "%errorFile%" >> "%autobat%"
for /f "skip=1 tokens=*" %%i in (%dblist%) do echo mysqldump --single-transaction %%i -h%dbhost% -u%dbuser% -p%dbpwd% ^> "%backupPath%\%backupFolder%\%%i.sql" >>%autobat% && echo if not %%errorlevel%%==0 (echo %%i ^>^> "%errorFile%" ^& set isExistError=yes) >> "%autobat%"

call %autobat%

echo %date:~0,10% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2% ������ݿⱸ�ݣ� >> %backupLogFile%
if %isExistError%==yes echo         ���Ǵ��ڱ��ݴ�����鿴�����ļ�"%errorFile%" >> %backupLogFile%
if %isExistError%==no  echo         �Ѿ�������ݱ��ݣ������ļ���"%backupPath%\%backupFolder%" >> %backupLogFile%

:ClearTmpFile
rem ������ʱ�ļ�
del /s /q "%dblist%" > nul
del /s /q "%autobat%" > nul


rem ��������ڴ���ɾ�������ļ���
if %isExistError%==no del "%errorFile%" /s /q > nul

rem ɾ����ʷ�����ļ�
if %deleteHistoryBackFile%==0 GOTO end
if %isExistError%==no GOTO DeleteHistoryFile
if %onErrorDeleteBackFile%==no GOTO end

:DeleteHistoryFile
echo         ɾ��%deleteHistoryBackFile%����ǰ�ı��ݼ�¼��>> %backupLogFile%
for /f "skip=%deleteHistoryBackFile% tokens=*" %%i in ('dir "%backupPath%" /o-n /ad /b') do rd "%backupPath%\%%i" /s /q
goto end

:mdfail
echo %date:~0,10% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2% �������ݿ�ʧ��:>> %backupLogFile%
echo         ���������ļ���"%backupPath%\%backupFolder%"ʧ��,�����Ƿ���д��Ȩ�ޡ�>> %backupLogFile%
if not %errorlevel%==0 echo ���������ļ���"%backupPath%\%backupFolder%"ʧ��,�����Ƿ���д��Ȩ�ޡ�&& pause
goto end

:cffail
echo %date:~0,10% %time:~0,2%-%time:~3,2%-%time:~6,2%.%time:~9,2% �������ݿ�ʧ��:>> %backupLogFile%
echo         �޷���½�����ݿ���߶�"%temp%"Ŀ¼û�ж�дȨ�ޡ�>> %backupLogFile%
if not %errorlevel%==0 echo �޷���½�����ݿ���߶�"%temp%"Ŀ¼û�ж�дȨ�ޡ�&& pause
goto end

:end
echo. >> %backupLogFile%