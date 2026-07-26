HealthCare Management System (Lite) - PHP Edition (College Mini Project)

How to run (XAMPP):
1. Extract this project folder into C:\xampp\htdocs\healthcare_system (or /opt/lampp/htdocs/ on Linux).
2. Start Apache and MySQL via XAMPP Control Panel.
3. Open phpMyAdmin (http://localhost/phpmyadmin) and import the SQL file: healthcare_schema_v2.sql
4. Visit: http://localhost/healthcare_system/index.php
5. Admin login: admin / admin123

Files of interest:
- config/db.php (DB connection)
- admin/ (login, dashboard)
- patients/, doctors/, appointments/, inventory/ modules
- assets/css/style.css, assets/js/script.js

Notes:
- Uses MySQLi prepared statements for inserts/updates/deletes.
- JS provides live search and confirmation modal (no Bootstrap).
- This is a college-level implementation; suitable for submission.
