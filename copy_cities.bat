@echo off
REM Script para completar las copias de directorios faltantes

echo Copiando template a ciudades restantes...

xcopy /E /I /Y seguridad-santomera seguridad-en-murcia
xcopy /E /I /Y seguridad-santomera seguridad-orihuela
xcopy /E /I /Y seguridad-santomera seguridad-alicante
xcopy /E /I /Y seguridad-santomera seguridad-elche
xcopy /E /I /Y seguridad-santomera seguridad-valencia
xcopy /E /I /Y seguridad-santomera seguridad-almeria

echo.
echo ✓ Directorios cre

ados!
echo.
echo Ahora ejecuta: personalize_pages.php
pause
