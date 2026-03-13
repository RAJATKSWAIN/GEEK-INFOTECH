# GIAMS v1.2.0 (Standalone)

This is a standalone implementation of **Geek Infotech Academic Management System v1.2.0**.

> Note: This module is intentionally isolated from `geek_sms`.

## Roles
- ADMIN
- COUNSELOR
- FACULTY
- STUDENT

## Setup
1. Import `database/giams_v1_2_0.sql` in MySQL.
2. Update DB credentials in `core/config.php`.
3. Serve this folder as web root:
   ```bash
   php -S 0.0.0.0:8090 -t giams-v1.2.0
   ```
