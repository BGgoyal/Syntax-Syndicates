<?php
session_start();
require_once __DIR__ . '/config/database.php';

$connectionMessage = '';
$vehicles = [];
$user = null;

if (empty($_SESSION['user_id'])) {
  header('Location: auth.php');
  exit;
}

try {
    $database = database();

  $userStatement = $database->prepare('SELECT first_name, last_name FROM users WHERE id = ?');
  $userStatement->execute([(int) $_SESSION['user_id']]);
  $user = $userStatement->fetch();
  if (!$user) {
    session_destroy();
    header('Location: auth.php');
    exit;
  }

    $tableCheck = $database->query("SELECT to_regclass('public.vehicles')")->fetchColumn();
    if ($tableCheck) {
    $vehicleStatement = $database->prepare('SELECT id, owner_name, category, brand, model, vehicle_year, engine_type, fuel_type, registration_number, current_mileage, notes FROM public.vehicles WHERE user_id = ? ORDER BY created_at DESC');
    $vehicleStatement->execute([(int) $_SESSION['user_id']]);
    $vehicles = $vehicleStatement->fetchAll();
        $connectionMessage = 'PostgreSQL connected successfully.';
    } else {
        $connectionMessage = 'PostgreSQL connected, but the public.vehicles table does not exist yet.';
    }
} catch (Throwable $error) {
    $connectionMessage = 'Database connection is not available. Check PostgreSQL, the PHP PDO_PGSQL extension, and your environment variables.';
}

function dashboardValue($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | CarLighting</title>
    <link rel="stylesheet" href="assets/css/style.css?v=5" />
  </head>
  <body class="theme-dark">
    <header class="topbar">
      <div class="container nav-wrap">
        <div class="brand">
          <span class="brand-mark">CL</span>
          <div>
            <strong>CarLighting</strong>
            <small>Vehicle dashboard</small>
          </div>
        </div>
        <nav class="nav">
          <a href="index.php">Home</a>
          <a class="active" href="dashboard.php">Dashboard</a>
          <a href="additive.php">Additive</a>
          <a href="vehicle-registration.php">Vehicle Registration</a>
        </nav>
        <div class="nav-actions account-slot">
          <button class="theme-toggle" type="button" aria-label="Switch to light theme">Light mode</button>
          <a class="btn btn-ghost" href="auth.php">Sign In</a>
        </div>
      </div>
    </header>

    <main class="section">
      <div class="container">
        <div class="section-heading">
          <span class="eyebrow">Family garage</span>
          <h1><?= dashboardValue($user['first_name'] ?? 'Your') ?>'s vehicle profile</h1>
          <p><?= dashboardValue($connectionMessage) ?> Save every family bike, car, truck, SUV, or other vehicle in one place.</p>
        </div>

        <div class="dashboard-toolbar">
          <div>
            <strong><?= count($vehicles) ?> <?= count($vehicles) === 1 ? 'vehicle' : 'vehicles' ?></strong>
            <span>managed in this family profile</span>
          </div>
          <a class="btn btn-primary" href="vehicle-registration.php">Add another vehicle</a>
        </div>

        <?php if ($vehicles): ?>
          <div class="garage-grid">
            <?php foreach ($vehicles as $vehicle): ?>
              <article class="garage-card dashboard-vehicle-card">
                <div class="vehicle-card-heading">
                  <span class="card-tag"><?= dashboardValue($vehicle['category']) ?></span>
                  <span class="vehicle-owner"><?= dashboardValue($vehicle['owner_name']) ?></span>
                </div>
                <h2><?= dashboardValue(trim(($vehicle['brand'] ?? '') . ' ' . ($vehicle['model'] ?? ''))) ?></h2>
                <p class="vehicle-meta">
                  <?= dashboardValue($vehicle['vehicle_year'] ?: 'Year not set') ?>
                  <?php if (!empty($vehicle['engine_type'])): ?> · <?= dashboardValue($vehicle['engine_type']) ?><?php endif; ?>
                  <?php if (!empty($vehicle['fuel_type'])): ?> · <?= dashboardValue($vehicle['fuel_type']) ?><?php endif; ?>
                </p>
                <div class="vehicle-card-details">
                  <span><?= !empty($vehicle['registration_number']) ? 'Reg. ' . dashboardValue($vehicle['registration_number']) : 'Registration not set' ?></span>
                  <span><?= $vehicle['current_mileage'] !== null ? dashboardValue(number_format((int) $vehicle['current_mileage'])) . ' km' : 'Mileage not set' ?></span>
                </div>
                <?php if (!empty($vehicle['notes'])): ?>
                  <p class="vehicle-notes"><?= dashboardValue($vehicle['notes']) ?></p>
                <?php endif; ?>
              </article>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <div class="empty-garage glass-panel">
            <span class="eyebrow">Your garage is ready</span>
            <h2>No vehicles saved yet</h2>
            <p>Add the first family vehicle, then return here to see every bike, car, and other vehicle together.</p>
            <a class="btn btn-primary" href="vehicle-registration.php">Register your first vehicle</a>
          </div>
        <?php endif; ?>
      </div>
    </main>

    <footer class="site-footer">
      <div class="footer-signal" aria-hidden="true"><span class="signal-line"></span><span>Drive smarter. Stay ready.</span><span class="signal-line reverse"></span></div>
      <div class="container footer-grid">
        <div class="footer-brand">
          <div class="brand">
            <span class="brand-mark">SS</span>
            <div>
              <strong>Syntax</strong>
              <small>Syndicate</small>
            </div>
          </div>
          <p>Smart vehicle management for modern drivers, families, and fleets.</p>
        </div>

        <div class="footer-col">
          <h4>Navigate</h4>
          <a href="index.php">Home</a>
          <a href="dashboard.php">Dashboard</a>
          <a href="vehicle-registration.php">Vehicle Registration</a>
        </div>

        <div class="footer-col">
          <h4>Tools</h4>
          <a href="additive.php">Additive calculator</a>
          <a href="dashboard.php">Consumption history</a>
          <a href="vehicle-registration.php">Vehicle profiles</a>
        </div>

        <div class="footer-col">
          <h4>Contact</h4>
          <a href="mailto:hello@syntaxsyndicate.com">hello@syntaxsyndicate.com</a>
          <a href="tel:+1234567890">+1 (234) 567-890</a>
          <a href="auth.php">Account support</a>
        </div>
      </div>

      <div class="container footer-bottom">
        <p>&copy; 2026 Syntax Syndicate</p>
        <div class="footer-links">
          <a href="auth.php">Login</a>
          <a href="vehicle-registration.php">Register</a>
        </div>
      </div>
    </footer>

    <script src="assets/js/app.js?v=5"></script>
  </body>
</html>
