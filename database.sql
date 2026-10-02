CREATE TABLE IF NOT EXISTS users (
    id BIGSERIAL PRIMARY KEY,
    first_name VARCHAR(80) NOT NULL,
    last_name VARCHAR(80) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS vehicles (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    owner_name VARCHAR(160) NOT NULL,
    category VARCHAR(40) NOT NULL,
    brand VARCHAR(80) NOT NULL,
    model VARCHAR(120) NOT NULL,
    vehicle_year INTEGER,
    engine_type VARCHAR(40),
    fuel_type VARCHAR(40),
    tank_capacity VARCHAR(40),
    registration_number VARCHAR(80),
    current_mileage INTEGER,
    reminder_type VARCHAR(40),
    reminder_interval VARCHAR(80),
    notes TEXT,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS fuel_logs (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    vehicle_id BIGINT REFERENCES vehicles(id) ON DELETE SET NULL,
    event_date DATE NOT NULL DEFAULT CURRENT_DATE,
    fuel_quantity NUMERIC(10, 2) NOT NULL CHECK (fuel_quantity > 0),
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS dosing_history (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    vehicle_id BIGINT REFERENCES vehicles(id) ON DELETE SET NULL,
    event_date DATE NOT NULL DEFAULT CURRENT_DATE,
    fuel_quantity NUMERIC(10, 2) NOT NULL CHECK (fuel_quantity > 0),
    commanded_quantity NUMERIC(10, 2) NOT NULL CHECK (commanded_quantity >= 0),
    dispensed_quantity NUMERIC(10, 2) NOT NULL CHECK (dispensed_quantity >= 0),
    ratio INTEGER NOT NULL CHECK (ratio > 0),
    application_type VARCHAR(40) NOT NULL,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS maintenance_reminders (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    vehicle_id BIGINT REFERENCES vehicles(id) ON DELETE CASCADE,
    current_mileage INTEGER NOT NULL DEFAULT 0,
    service_mileage INTEGER,
    service_date DATE,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS additive_formulations (
    id BIGSERIAL PRIMARY KEY,
    application_type VARCHAR(40) NOT NULL,
    formulation VARCHAR(120) NOT NULL,
    description TEXT NOT NULL,
    validated BOOLEAN NOT NULL DEFAULT TRUE
);

INSERT INTO additive_formulations (application_type, formulation, description)
SELECT * FROM (VALUES
    ('diesel', 'Cetane booster', 'Injector and compression-ignition compatible treatment.'),
    ('diesel', 'Anti-gel treatment', 'Cold-flow support for diesel fuel systems.'),
    ('petrol', 'Injector detergent', 'Petrol-safe detergent for injector cleanliness.'),
    ('petrol', 'Octane support', 'Petrol formulation for combustion support.'),
    ('hybrid', 'Low-ash detergent', 'Low-ash treatment for hybrid fuel systems.'),
    ('hybrid', 'Storage stabiliser', 'Fuel stability support for stop-start operation.'),
    ('fleet', 'Fleet detergent', 'Fleet-approved treatment for documented fuel batches.'),
    ('fleet', 'Water dispersant', 'Helps manage water contamination in fleet systems.')
) AS seed(application_type, formulation, description)
WHERE NOT EXISTS (SELECT 1 FROM additive_formulations);
