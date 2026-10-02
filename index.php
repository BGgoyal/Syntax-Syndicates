<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CarLighting | Vehicle Management</title>
    <meta
      name="description"
      content="Smart user and vehicle management platform with premium vehicle registration and maintenance reminders."
    />
    <link rel="stylesheet" href="assets/css/style.css?v=5" />
  </head>
  <body class="theme-dark">
    <header class="topbar">
      <div class="container nav-wrap">
        <div class="brand">
          <span class="brand-mark">SS</span>
          <div>
            <strong>Syntax</strong>
            <small>Syndicate</small>
          </div>
        </div>

        <nav class="nav">
          <a class="active" href="index.php">Home</a>
          <a href="dashboard.php">Dashboard</a>
          <a href="additive.php">Additive</a>
          <a href="vehicle-registration.php">Vehicle Registration</a>
        </nav>

        <div class="nav-actions account-slot">
          <button class="theme-toggle" type="button" aria-label="Switch to light theme">Light mode</button>
          <a class="btn btn-ghost" href="auth.php">Sign In</a>
          <a class="btn btn-primary" href="vehicle-registration.php">Register Vehicle</a>
        </div>
      </div>
    </header>

    <main>
      <section class="hero">
        <div class="container hero-grid">
          <div class="hero-copy">
            <span class="eyebrow">Vehicle management platform</span>
            <h1>Keep every ride <span>tracked, protected, and ready.</span></h1>
            <p>
              Manage user profiles, save multiple vehicles, track essential specs like engine type,
              fuel type, tank capacity, and stay ahead with smart maintenance reminders based on mileage or time.
            </p>

            <div class="hero-actions">
              <a class="btn btn-primary" href="auth.php">Create Account</a>
              <a class="btn btn-ghost" href="vehicle-registration.php">Add Vehicle</a>
            </div>

            <ul class="feature-badges">
              <li>Multi-vehicle profiles</li>
              <li>Smart reminders</li>
              <li>Garage dashboard</li>
            </ul>
          </div>

          <div class="hero-visual" aria-label="Vehicle management dashboard preview">
            <div class="dashboard-preview">
              <div class="dashboard-header">
                <span class="dot green"></span>
                <span class="dot yellow"></span>
                <span class="dot red"></span>
              </div>

              <div class="dashboard-body">
                <aside class="mini-panel">
                  <p>Garage</p>
                  <h3>3 vehicles</h3>
                  <div class="mini-row">
                    <span>Corolla</span>
                    <strong>82%</strong>
                  </div>
                  <div class="mini-row">
                    <span>Civic</span>
                    <strong>64%</strong>
                  </div>
                  <div class="mini-row">
                    <span>BMW X5</span>
                    <strong>91%</strong>
                  </div>
                </aside>

                <div class="mini-card highlight">
                  <span class="label">Maintenance</span>
                  <h4>Next service in 650 km</h4>
                  <button type="button" class="tiny-btn">Review</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="stats">
        <div class="container stats-grid">
          <div>
            <strong>3x</strong>
            <span>Faster vehicle setup</span>
          </div>
          <div>
            <strong>24/7</strong>
            <span>Reminder tracking</span>
          </div>
          <div>
            <strong>1 app</strong>
            <span>Manage all profiles</span>
          </div>
          <div>
            <strong>100%</strong>
            <span>User-focused UX</span>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-heading">
            <span class="eyebrow">Core features</span>
            <h2>Everything a modern vehicle account should have.</h2>
          </div>

          <div class="cards-grid">
            <article class="info-card">
              <div class="icon">👤</div>
              <h3>User profile</h3>
              <p>Store personal details, favorite vehicles, and quick access to every profile in one secure dashboard.</p>
            </article>

            <article class="info-card">
              <div class="icon">🚗</div>
              <h3>Multi-vehicle profiles</h3>
              <p>Allow families and fleet users to save multiple bikes, cars, or SUVs under one account with individual details.</p>
            </article>

            <article class="info-card">
              <div class="icon">🛠️</div>
              <h3>Maintenance reminders</h3>
              <p>Send reminders based on mileage, service date, or maintenance interval so every vehicle stays road-ready.</p>
            </article>
          </div>
        </div>
      </section>

      <section class="section section-alt">
        <div class="container showcase-wrap">
          <div class="showcase-copy">
            <span class="eyebrow">Premium user experience</span>
            <h2>Designed to feel premium, clear, and effortless.</h2>
            <p>
              The previous interface was too plain. This updated experience introduces cleaner spacing,
              richer contrast, a polished dashboard, and a simple flow that makes vehicle registration easier for every user.
            </p>
            <ul class="check-list">
              <li>Vehicle profile fields for engine, fuel, and tank capacity</li>
              <li>One account with multiple registered vehicles</li>
              <li>Service alerts for time and mileage-based maintenance</li>
            </ul>
          </div>

          <div class="showcase-card">
            <div class="summary-card">
              <div class="card-top">
                <span>Owner</span>
                <strong>Sarah Khan</strong>
              </div>
              <div class="vehicle-row">
                <div>
                  <small>Model</small>
                  <strong>Honda Civic</strong>
                </div>
                <span class="status online">Active</span>
              </div>
              <div class="spec-grid">
                <div><small>Engine</small><strong>1.8L</strong></div>
                <div><small>Fuel</small><strong>Petrol</strong></div>
                <div><small>Tank</small><strong>45L</strong></div>
                <div><small>Next service</small><strong>860 km</strong></div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
