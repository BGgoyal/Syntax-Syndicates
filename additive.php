<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Additive Calculator | CarLighting</title>
    <link rel="stylesheet" href="assets/css/style.css?v=5" />
  </head>
  <body class="theme-dark">
    <header class="topbar">
      <div class="container nav-wrap">
        <div class="brand">
          <span class="brand-mark">CL</span>
          <div>
            <strong>CarLighting</strong>
            <small>Additive control</small>
          </div>
        </div>
        <nav class="nav">
          <a href="index.php">Home</a>
          <a href="dashboard.php">Dashboard</a>
          <a class="active" href="additive.php">Additive</a>
          <a href="vehicle-registration.php">Vehicle Registration</a>
        </nav>
        <div class="nav-actions account-slot">
          <button class="theme-toggle" type="button" aria-label="Switch to light theme">Light mode</button>
          <a class="btn btn-ghost" href="auth.php">Sign In</a>
        </div>
      </div>
    </header>

    <main class="section additive-shell">
      <div class="container">
        <div class="section-heading additive-heading">
          <span class="eyebrow">Precision dosing</span>
          <h1>Smart additive calculator</h1>
          <p>Enter the fuel volume and use the validated additive ratio to prepare an accurate dispensing target.</p>
        </div>

        <div class="additive-layout">
          <form class="additive-calculator glass-panel" novalidate>
            <div class="panel-heading">
              <div>
                <span class="eyebrow">One-tab dispensing</span>
                <h2>Set your target</h2>
              </div>
              <span class="status online">Validated ratio</span>
            </div>

            <label for="fuel-quantity">
              Fuel quantity
              <div class="input-with-unit">
                <input id="fuel-quantity" type="number" min="0.1" step="0.1" value="50" required />
                <span>litres</span>
              </div>
            </label>

            <label for="additive-ratio">
              Additive ratio
              <select id="additive-ratio">
                <option value="1000">1:1000 - Standard treatment</option>
                <option value="500">1:500 - Heavy-duty treatment</option>
                <option value="250">1:250 - Deep clean treatment</option>
              </select>
            </label>

            <label for="application-type">
              Selected application
              <select id="application-type">
                <option value="diesel">Diesel engine</option>
                <option value="petrol">Petrol engine</option>
                <option value="hybrid">Hybrid engine</option>
              </select>
            </label>

            <label for="reserve-level">
              Reserve additive amount
              <div class="input-with-unit">
                <input id="reserve-level" type="number" min="0" step="0.1" value="1200" required />
                <span>ml</span>
              </div>
            </label>

            <div class="ratio-note">
              <strong>How the ratio works</strong>
              <span>1:1000 means 1 ml additive for every 1 litre of fuel.</span>
            </div>

            <button id="dispense-now" class="btn btn-primary full-width" type="submit">Dispense Now</button>
            <p class="form-hint">The dispenser will only start when the reserve can cover the calculated target.</p>
          </form>

          <div class="additive-results">
            <section class="result-card glass-panel">
              <div class="panel-heading">
                <div>
                  <span class="eyebrow">Calculated target</span>
                  <h2 id="calculated-quantity">50.0 ml</h2>
                </div>
                <span class="result-icon">ml</span>
              </div>
              <p>Required additive quantity for the selected fuel volume and ratio.</p>
            </section>

            <section class="result-card glass-panel reserve-card">
              <div class="panel-heading">
                <div>
                  <span class="eyebrow">Additive level monitoring</span>
                  <h2 id="reserve-output">1,200.0 ml</h2>
                </div>
                <span class="status online">Reserve</span>
              </div>
              <div class="reserve-track"><span></span></div>
              <p id="additive-alert" class="alert-message" hidden>Low additive alert: refill reserve before dispensing.</p>
            </section>

            <section class="result-card glass-panel status-card">
              <div class="panel-heading">
                <div>
                  <span class="eyebrow">Live dispensing status</span>
                  <h2 id="dispensing-status">Ready</h2>
                </div>
                <span class="status online">System ready</span>
              </div>
              <p id="dispensing-detail">Set a target, then select Dispense Now.</p>
              <div class="progress-track"><span id="dispensing-progress"></span></div>
              <ol class="status-steps">
                <li data-status-step>Preparing</li>
                <li data-status-step>Dispensing</li>
                <li data-status-step>Target reached</li>
                <li data-status-step>Complete</li>
              </ol>
            </section>
          </div>
        </div>

        <div class="operations-grid">
          <section class="operation-card glass-panel">
            <div class="panel-heading">
              <div>
                <span class="eyebrow">Fuel log</span>
                <h2>Record refuelling</h2>
              </div>
            </div>
            <form class="fuel-log-form" novalidate>
              <label for="refuel-date">Date<input id="refuel-date" type="date" /></label>
              <label for="refuel-quantity">Fuel quantity (litres)<input id="refuel-quantity" type="number" min="0.1" step="0.1" required /></label>
              <button class="btn btn-ghost" type="submit">Add fuel event</button>
            </form>
            <div id="fuel-log-list" class="record-list"></div>
          </section>

          <section class="operation-card glass-panel">
            <div class="panel-heading">
              <div>
                <span class="eyebrow">Maintenance reminder</span>
                <h2>Service schedule</h2>
              </div>
            </div>
            <form class="maintenance-form" novalidate>
              <label for="vehicle-mileage">Current mileage (km)<input id="vehicle-mileage" type="number" min="0" step="1" value="24500" /></label>
              <label for="service-mileage">Next service at (km)<input id="service-mileage" type="number" min="0" step="1" value="30000" /></label>
              <label for="service-date">Service due date<input id="service-date" type="date" /></label>
              <button class="btn btn-ghost" type="submit">Save reminder</button>
            </form>
            <p id="maintenance-output" class="maintenance-output">Enter your vehicle schedule to see a reminder.</p>
          </section>

          <section class="operation-card glass-panel">
            <div class="panel-heading">
              <div>
                <span class="eyebrow">Dosing accuracy report</span>
                <h2>Commanded vs actual</h2>
              </div>
            </div>
            <div class="accuracy-grid">
              <div><span>Commanded</span><strong id="commanded-total">0.0 ml</strong></div>
              <div><span>Dispensed</span><strong id="dispensed-total">0.0 ml</strong></div>
              <div><span>Variance</span><strong id="variance-total">0.0 ml</strong></div>
            </div>
            <div id="dosing-history-list" class="record-list"></div>
          </section>

          <section class="operation-card glass-panel">
            <div class="panel-heading">
              <div>
                <span class="eyebrow">Additive compatibility database</span>
                <h2 id="compatibility-title">Diesel engine</h2>
              </div>
              <span class="status online">Validated</span>
            </div>
            <p id="compatibility-description" class="compatibility-description"></p>
            <div id="compatibility-list" class="compatibility-list"></div>
          </section>
        </div>

        <section class="analytics-section glass-panel">
          <div class="panel-heading">
            <div>
              <span class="eyebrow">Consumption dashboard</span>
              <h2>Monthly fuel and additive use</h2>
            </div>
            <span id="sync-status" class="status online">Cloud sync pending</span>
          </div>
          <div class="chart-legend"><span class="legend-fuel">Fuel litres</span><span class="legend-additive">Additive ml</span></div>
          <div id="consumption-chart" class="consumption-chart" aria-label="Monthly fuel and additive consumption"></div>
          <p id="consumption-empty" class="empty-records" hidden>No cloud consumption history yet. Record a fuel or dosing event to start the trend.</p>
        </section>

        <div class="insights-grid">
          <section class="operation-card glass-panel">
            <div class="panel-heading">
              <div>
                <span class="eyebrow">Predictive alert</span>
                <h2>Additive outlook</h2>
              </div>
              <span id="prediction-status" class="status online">Learning</span>
            </div>
            <p id="prediction-message" class="prediction-message">Syncing your refuelling history to estimate when additive will run out.</p>
          </section>

          <section class="operation-card glass-panel">
            <div class="panel-heading">
              <div>
                <span class="eyebrow">Diagnostic dashboard</span>
                <h2>System health</h2>
              </div>
              <span id="diagnostic-time" class="status online">Checking</span>
            </div>
            <div id="diagnostic-grid" class="diagnostic-grid">
              <div class="diagnostic-item"><span>System health</span><strong>Checking</strong><small>Waiting for status</small></div>
              <div class="diagnostic-item"><span>Connectivity</span><strong>Checking</strong><small>Waiting for status</small></div>
              <div class="diagnostic-item"><span>Sensor status</span><strong>Checking</strong><small>Waiting for status</small></div>
              <div class="diagnostic-item"><span>Pump status</span><strong>Checking</strong><small>Waiting for status</small></div>
            </div>
          </section>
        </div>
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
          <a href="dashboard.php">Vehicle profiles</a>
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
