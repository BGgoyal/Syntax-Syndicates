<?php
session_start();

if (empty($_SESSION['user_id'])) {
  header('Location: auth.php?redirect=vehicle-registration.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vehicle Registration | CarLighting</title>
    <link rel="stylesheet" href="assets/css/style.css?v=5" />
  </head>
  <body class="theme-dark form-page">
    <header class="topbar">
      <div class="container nav-wrap">
        <div class="brand">
          <span class="brand-mark">CL</span>
          <div>
            <strong>CarLighting</strong>
            <small>Glow & Off</small>
          </div>
        </div>

        <nav class="nav">
          <a href="index.php">Home</a>
          <a href="dashboard.php">Dashboard</a>
          <a href="additive.php">Additive</a>
          <a class="active" href="vehicle-registration.php">Vehicle Registration</a>
        </nav>

        <div class="nav-actions account-slot">
          <button class="theme-toggle" type="button" aria-label="Switch to light theme">Light mode</button>
          <a class="btn btn-ghost" href="auth.php">My Account</a>
        </div>
      </div>
    </header>

    <main class="form-shell registration-layout">
      <div class="form-intro glass-panel">
        <span class="eyebrow">Family garage</span>
        <h1>Add another vehicle</h1>
        <p>
          Keep every family bike, car, SUV, truck, or other vehicle in one profile. Add the family member responsible for each vehicle so the garage stays easy to manage.
        </p>

        <div class="garage-mini">
          <div class="garage-card active">
            <span class="card-tag">Primary</span>
            <h3>Toyota Corolla</h3>
            <p>2022 • Petrol • 1.6L</p>
          </div>
          <div class="garage-card">
            <span class="card-tag subtle">Family</span>
            <h3>Honda Civic</h3>
            <p>2021 • Petrol • 1.8L</p>
          </div>
        </div>
      </div>

      <form class="vehicle-form glass-panel" data-api="vehicles">
        <div class="two-col">
          <label>
            Owner name
            <input name="owner_name" type="text" placeholder="Enter full name" required />
          </label>

          <label>
            Vehicle category
            <select name="category" required>
              <option value="" disabled selected>Select category</option>
              <option>Car</option>
              <option>SUV</option>
              <option>Bike</option>
              <option>Truck</option>
              <option>Other</option>
            </select>
          </label>
        </div>

        <div class="two-col">
          <label>
            Brand
            <select name="brand" required>
              <option value="" disabled selected>Select brand</option>
              <option>Toyota</option>
              <option>Honda</option>
              <option>BMW</option>
              <option>Mercedes</option>
              <option>Ford</option>
              <option>Other</option>
            </select>
          </label>

          <label>
            Model
            <input name="model" type="text" placeholder="e.g. Corolla, Civic, X5" required />
          </label>
        </div>

        <div class="two-col">
          <label>
            Year
            <input name="vehicle_year" type="number" placeholder="2024" min="1990" max="2035" />
          </label>

          <label>
            Engine type
            <select name="engine_type">
              <option value="" disabled selected>Select engine</option>
              <option>Petrol</option>
              <option>Diesel</option>
              <option>Hybrid</option>
              <option>Electric</option>
            </select>
          </label>
        </div>

        <div class="two-col">
          <label>
            Fuel type
            <select name="fuel_type">
              <option value="" disabled selected>Select fuel</option>
              <option>Gasoline</option>
              <option>Diesel</option>
              <option>Hybrid</option>
              <option>Electric</option>
              <option>CNG</option>
            </select>
          </label>

          <label>
            Tank capacity
            <input name="tank_capacity" type="text" placeholder="e.g. 45L" />
          </label>
        </div>

        <div class="two-col">
          <label>
            Registration number
            <input name="registration_number" type="text" placeholder="ABC-1234" />
          </label>

          <label>
            Current mileage
            <input name="current_mileage" type="number" placeholder="24500" />
          </label>
        </div>

        <div class="two-col">
          <label>
            Maintenance reminder type
            <select name="reminder_type">
              <option value="" disabled selected>Select reminder</option>
              <option>By mileage</option>
              <option>By time interval</option>
              <option>Both</option>
            </select>
          </label>

          <label>
            Reminder interval
            <input name="reminder_interval" type="text" placeholder="e.g. 5000 km or 6 months" />
          </label>
        </div>

        <div class="toggle-row">
          <label class="checkbox-wrap big-check">
            <input type="checkbox" checked />
            <span>Add this vehicle to my multi-vehicle profile</span>
          </label>
        </div>

        <label>
          Additional notes
            <textarea name="notes" rows="4" placeholder="Add lighting preferences, servicing notes, or special requirements."></textarea>
        </label>

        <div class="form-actions">
          <button type="reset" class="btn btn-ghost">Clear</button>
          <button type="submit" class="btn btn-primary">Save Vehicle</button>
        </div>
      </form>
    </main>

    <footer class="site-footer">
      <div class="footer-signal" aria-hidden="true"><span class="signal-line"></span><span>Drive smarter. Stay ready.</span><span class="signal-line reverse"></span></div>
      <div class="container footer-grid">
        <div class="footer-brand">
          <div class="brand">
            <span class="brand-mark">CL</span>
            <div>
              <strong>CarLighting</strong>
              <small>Glow & Off</small>
            </div>
          </div>
          <p>Smart vehicle management for modern drivers, families, and fleets.</p>
        </div>

        <div class="footer-col">
          <h4>Company</h4>
          <a href="index.php">Home</a>
          <a href="auth.php">Login</a>
          <a href="vehicle-registration.php">Vehicle Registration</a>
        </div>

        <div class="footer-col">
          <h4>Features</h4>
          <a href="#">Multi-vehicle profiles</a>
          <a href="#">Maintenance reminders</a>
          <a href="#">Owner dashboard</a>
        </div>

        <div class="footer-col">
          <h4>Contact</h4>
          <a href="mailto:hello@carlighting.com">hello@carlighting.com</a>
          <a href="tel:+1234567890">+1 (234) 567-890</a>
          <a href="#">Support center</a>
        </div>
      </div>

      <div class="container footer-bottom">
        <p>© 2026 CarLighting | Glow & Off</p>
        <div class="footer-links">
          <a href="auth.php">Login</a>
          <a href="vehicle-registration.php">Register</a>
        </div>
      </div>
    </footer>

    <script src="assets/js/app.js?v=5"></script>
  </body>
</html>
