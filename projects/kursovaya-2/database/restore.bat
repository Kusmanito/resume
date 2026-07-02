@echo off

del database.sqlite

copy student_portfolio_backup.sqlite database.sqlite

echo Restore completed.
pause