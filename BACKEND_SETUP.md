# CarLighting backend setup

## Required software

- XAMPP with Apache and PHP 8.1 or newer
- PostgreSQL 14 or newer
- pgAdmin is optional; it is only a database management tool

No JavaScript package or Composer package is required.

## Enable PostgreSQL in PHP

1. Open the `php.ini` used by XAMPP Apache.
2. Find these lines and remove the leading semicolon:

```ini
extension=pdo_pgsql
extension=pgsql
```

3. Save the file and restart Apache from the XAMPP Control Panel.
4. Open `http://localhost/dashboard/phpinfo.php` and confirm `pdo_pgsql` appears.

## Create the database

Create a PostgreSQL database named `carlighting`, then run `database.sql` in that database using pgAdmin Query Tool or `psql`.

The default connection values are:

- Host: `127.0.0.1`
- Port: `5432`
- Database: `carlighting`
- User: `postgres`
- Password: empty unless you set one

For a password-protected PostgreSQL user, set these Windows environment variables before starting Apache:

```text
PGHOST=127.0.0.1
PGPORT=5432
PGDATABASE=carlighting
PGUSER=postgres
PGPASSWORD=your_postgres_password
```

The PHP connection is centralized in `config/database.php`.

## Backend endpoints

- `api/auth.php`: signup, login, logout
- `api/vehicles.php`: save and list vehicles
- `api/fuel-log.php`: save and list refuelling events
- `api/dosing.php`: save and list dosing records
- `api/maintenance.php`: save and list service reminders
- `api/compatibility.php`: read validated additive formulations

Open the application at `http://localhost/SS/`. Users must sign up or log in before protected records can be saved.

The dispensing action remains a UI simulation until a physical dispenser API is available. The current simulated actual quantity is equal to the commanded quantity; replace that value with the device response when the hardware endpoint is ready.
