<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login / Signup | CarLighting</title>
    <link rel="stylesheet" href="assets/css/style.css?v=5" />
  </head>
  <body class="theme-dark auth-page">
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
          <a href="vehicle-registration.php">Vehicle Registration</a>
        </nav>
        <div class="nav-actions account-slot">
          <button class="theme-toggle" type="button" aria-label="Switch to light theme">Light mode</button>
          <a class="btn btn-ghost" href="auth.php">Sign In</a>
        </div>
      </div>
    </header>

    <main class="auth-shell">
      <div class="auth-card">
        <div class="auth-tabs" role="tablist" aria-label="Authentication options">
          <button class="tab-button active" type="button" data-target="login-panel">Login</button>
          <button class="tab-button" type="button" data-target="signup-panel">Sign Up</button>
        </div>

        <div class="panel active" id="login-panel">
          <h2>Welcome back</h2>
          <p>Access your lighting profile and manage your vehicle setup.</p>

          <form class="form-box auth-form" data-auth-action="login">
            <label>
              Email address
              <input name="email" type="email" placeholder="you@example.com" required />
            </label>

            <label>
              Password
              <input name="password" type="password" placeholder="Enter your password" required />
            </label>

            <div class="row-inline">
              <label class="checkbox-wrap">
                <input type="checkbox" />
                <span>Remember me</span>
              </label>
              <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary full-width">Login</button>
          </form>
        </div>

        <div class="panel" id="signup-panel">
          <h2>Create account</h2>
          <p>Join the CarLighting community and start registering your ride.</p>

          <form class="form-box auth-form" data-auth-action="signup">
            <div class="two-col">
              <label>
                First name
                <input name="first_name" type="text" placeholder="John" required />
              </label>
              <label>
                Last name
                <input name="last_name" type="text" placeholder="Smith" required />
              </label>
            </div>

            <label>
              Email address
              <input name="email" type="email" placeholder="john@example.com" required />
            </label>

            <label>
              Password
              <input name="password" type="password" placeholder="Create strong password" required />
            </label>

            <label>
              Confirm password
              <input name="password_confirm" type="password" placeholder="Repeat your password" required />
            </label>

            <button type="submit" class="btn btn-primary full-width">Sign Up</button>
          </form>
        </div>
      </div>
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
