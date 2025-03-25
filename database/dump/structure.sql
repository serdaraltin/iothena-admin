-- Enum type for event types
CREATE TYPE type_enum AS ENUM (
    'info',         -- Informational events, typically non-urgent and for tracking purposes
    'warning',      -- Warning events, indicating potential issues or risks
    'error',        -- Error events, indicating a failure or malfunction
    'success',      -- Success events, indicating successful execution or outcomes
    'critical'      -- Critical events, indicating severe issues requiring immediate attention
    );

-- Enum type for event priority levels
CREATE TYPE level_enum AS ENUM (
    'low',          -- Low priority event, non-urgent and can be addressed later
    'medium',       -- Medium priority event, should be addressed in a timely manner
    'high',         -- High priority event, requires prompt attention and action
    'critical'      -- Critical priority event, requires immediate action or intervention
    );

CREATE TYPE incident_verification_enum AS ENUM (
    'unverified',
    'correct',
    'faulty'
    );

-- Enum type for types of operations that can trigger events
CREATE TYPE event_operation_enum AS ENUM (
    'create',         -- Creation of a new record or entity (e.g., device, service, user)
    'update',         -- Update of an existing record or entity (e.g., device status, user info)
    'delete',         -- Deletion of an existing record (e.g., device or user removal)
    'restart',        -- Restart of a service or device to recover from an error or restart the system
    'failure',        -- System failure, such as a service interruption or hardware malfunction
    'recovery',       -- Recovery after a failure, such as restarting a service or repairing a device
    'suspend',        -- Suspension of a service or device, putting it into a low-power or inactive state
    'resume',         -- Resumption of a suspended service or device, restoring normal operation
    'migrate',        -- Migration of data or system components to another location or service
    'upgrade',        -- Upgrade of software or hardware to a newer version or more powerful version
    'downgrade',      -- Downgrade of software or hardware to an older or less powerful version
    'diagnostic',     -- Diagnostic check of a system or device to detect errors or issues
    'maintenance',    -- Scheduled or necessary maintenance of the system or device
    'monitor',        -- Monitoring system performance or device health
    'shutdown',       -- Shutdown of a system or device, typically for power off or termination
    'start',          -- Start of a service or device, initializing its operation
    'stop',           -- Stop of a service or device, halting its operation
    'trigger',        -- Triggering an action or operation within the system or device
    'acknowledge'    -- Acknowledging a reported error or warning event
    );

-- Enum type for types of source that can trigger events
CREATE TYPE event_type_enum AS ENUM (
    'device',       -- Physical devices (e.g., ESP32, Raspberry Pi)
    'system',       -- System-related components (e.g., Main Controller)
    'backend',      -- Backend services (e.g., auth-service, notification-service)
    'user',         -- User-related actions (e.g., manual interactions, user errors)
    'network',      -- Network-related events (e.g., connection loss, IP address changes)
    'database',     -- Database-related events (e.g., table updates, errors)
    'application',  -- Application-level events (e.g., frontend, API operations)
    'security',     -- Security-related events (e.g., unauthorized access attempts)
    'third_party',  -- Third-party services (e.g., payment providers, external APIs)
    'scheduler',    -- Scheduler or cron job events
    'hardware',     -- Hardware components (e.g., sensors, CPU, disk)
    'integration'   -- System integrations (e.g., IoT platforms, external system connections)
    );

CREATE TYPE recipient_type_enum AS ENUM(
    'user',
    'device'
    );

-- Enum type for different methods of delivering notifications
CREATE TYPE delivery_method_enum AS ENUM(
    'email',         -- Notification delivered via email, typically for non-urgent communications
    'sms',           -- Notification delivered via SMS, suitable for more immediate or short messages
    'push',          -- Notification delivered via push notification, often used for real-time alerts on mobile devices
    'webhook',       -- Notification delivered via webhook, used for system-to-system communication
    'in_app',        -- Notification delivered within an application, displayed as alerts or banners
    'voice_call'     -- Notification delivered via a voice call, useful for critical or urgent messages
    );

-- Enum type for device model
CREATE TYPE device_model_enum AS ENUM (
    'Raspberry_Pi_Zero_2_W',  -- Raspberry Pi Zero 2 W (compact and low-power model)
    'Raspberry_Pi_3',      -- Raspberry Pi 3 (popular general-purpose model)
    'Raspberry_Pi_4',      -- Raspberry Pi 4 (more powerful, capable of higher workloads)
    'Raspberry_Pi_5',      -- Raspberry Pi 5 (latest model with better performance and features)
    'ESP32',               -- ESP32 (popular Wi-Fi and Bluetooth-enabled microcontroller)
    'ESP32_C3',            -- ESP32-C3 (RISC-V core, lower power, IoT applications)
    'ESP32_S2',            -- ESP32-S2 (single-core variant optimized for low-cost applications)
    'ESP32_S3',            -- ESP32-S3 (AI and machine learning optimized variant)
    'ESP8266',             -- ESP8266 (older, cost-effective Wi-Fi microcontroller)
    'ESP8266_12E',         -- ESP8266 12E (enhanced version with more GPIOs and features)
    'Arduino_Uno',         -- Arduino Uno (ATmega328P-based, general-purpose microcontroller)
    'Arduino_Nano',        -- Arduino Nano (small form factor, compact version of Uno)
    'Arduino_Mega',        -- Arduino Mega 2560 (larger model with more I/O and memory)
    'Arduino_Zero',        -- Arduino Zero (32-bit ARM-based microcontroller)
    'BeagleBone_Black',    -- BeagleBone Black (powerful single-board Linux computer)
    'BeagleBone_AI',       -- BeagleBone AI (AI-focused version of BeagleBone)
    'Jetson_Nano',         -- NVIDIA Jetson Nano (AI-focused, for deep learning and computer vision)
    'Jetson_Xavier',       -- NVIDIA Jetson Xavier (high-performance AI computing platform)
    'STM32F4',             -- STM32F4 series (ARM Cortex-M4 microcontroller, high performance)
    'STM32F7',             -- STM32F7 series (ARM Cortex-M7 microcontroller, high performance)
    'Teensy_4_0',          -- Teensy 4.0 (high-performance microcontroller, ideal for real-time applications)
    'Teensy_4_1',          -- Teensy 4.1 (enhanced version of Teensy 4.0 with more features)
    'ODROID_C4',           -- ODROID-C4 (ARM-based single-board computer, powerful and efficient)
    'ODROID_N2+',          -- ODROID-N2+ (high-performance ARM-based SBC)
    'Tinker_Board',        -- ASUS Tinker Board (powerful single-board computer for diverse applications)
    'RockPi_4',            -- RockPi 4 (high-performance ARM-based single-board computer)
    'Pine_H64'             -- Pine H64 (64-bit ARM-based single-board computer)
    );

-- Enum type for device type
CREATE TYPE device_type_enum AS ENUM (
    'Sentinel',            -- Device for event analysis based on audio detection (e.g., security systems)
    'Guardian',            -- Device for detecting theft using motion sensors
    'Watchdog',            -- General security device for monitoring environmental changes
    'Echo',                -- Device for sound-based environmental analysis
    'Vigilant',            -- Sensor for monitoring potential threats or suspicious activities
    'Sentry',              -- Security device that detects changes in the environment (e.g., doors/windows)
    'Perimeter',           -- Device for perimeter monitoring and security
    'Seer',                -- Device for predictive analytics based on sensor data
    'Tracker',             -- Device for tracking movement and location of objects or people
    'Alertor',             -- Device that detects anomalies or unusual events
    'Patrol',              -- Device that continuously monitors a specified area
    'MagLockControl',      -- Device for controlling magnetic door locks in security systems
    'AccessMonitor',       -- Device for monitoring access points (e.g., doors, windows)
    'IntruderBlock',       -- Device for detecting and blocking intruders (e.g., motion or RFID-based)
    'LockGuard',           -- Smart lock system with access control management
    'SafeGuard',           -- Device that ensures the safety of valuable items or areas
    'AlarmSystem',         -- Security system that triggers alerts on breaches or threats
    'NetworkDefender',     -- Device that protects against unauthorized network access or intrusions
    'EnvironmentalSensor', -- Device for monitoring environmental factors (e.g., smoke, temperature)
    'IoTBarrier'           -- Virtual security barrier or zone management device for IoT systems
    );

-- Enum type for device status
CREATE TYPE device_status_enum AS ENUM (
    'active',            -- Device is operational and fully functional
    'offline',           -- Device is offline and not connected to the network or service
    'maintenance',       -- Device is undergoing maintenance and is unavailable for regular operation
    'idle',              -- Device is powered on but not actively performing tasks or operations
    'booting',           -- Device is starting up or initializing
    'updating',          -- Device is in the process of updating its firmware or software
    'error',             -- Device encountered an error and is in a malfunctioning state
    'disconnected',      -- Device is disconnected from the network or service
    'restarting',        -- Device is restarting (either manually or due to error recovery)
    'suspended',         -- Device is suspended, typically in low-power or pause state
    'unavailable',       -- Device is temporarily unavailable due to failure or maintenance
    'locked',            -- Device is locked, preventing access or operation
    'ready',             -- Device is ready to be used, waiting for commands or tasks
    'paused',            -- Device operation is paused and can be resumed
    'recovering',        -- Device is recovering from a failure or error
    'shutdown',          -- Device is powered off or in the process of shutting down
    'overloaded',        -- Device is overwhelmed and cannot handle additional tasks
    'quarantined'        -- Device is isolated from the network or system due to security concerns
    );

-- Enum type for device operations
CREATE TYPE device_operation_enum AS ENUM(
    'reboot',            -- Reboot the device to restart its operating system or service
    'suspend',           -- Put the device into a suspended state (e.g., low-power mode)
    'resume',            -- Resume the operation of a suspended device
    'power_off',         -- Completely shut down the device
    'service_restart',   -- Restart a service or application on the device
    'service_stop',      -- Stop an active service on the device
    'service_start',     -- Start a service or application on the device
    'update_firmware',   -- Update the device's firmware to the latest version
    'reset',             -- Reset the device to its factory settings
    'check_status',      -- Retrieve or check the current status of the device or service
    'get_logs',          -- Retrieve logs for troubleshooting or system monitoring
    'shutdown',          -- Shutdown the device gracefully, ensuring data integrity
    'enable_device',     -- Enable the device or specific device functionality
    'disable_device',    -- Temporarily disable the device or a specific functionality
    'set_configuration', -- Change or update the device's configuration settings
    'network_test',      -- Perform a network connectivity test (e.g., ping or latency check)
    'sync_time',         -- Synchronize the device's clock with an external time source
    'backup',            -- Perform a backup of the device's data or settings
    'restore',           -- Restore the device from a backup
    'upgrade',           -- Perform an upgrade of the device's hardware or software
    'factory_reset'      -- Perform a full factory reset, returning the device to its original state
    );


-- Devices table stores information about all devices
CREATE TABLE devices (
    id SERIAL PRIMARY KEY,             -- Unique identifier for the device
    uuid UUID NOT NULL UNIQUE NOT NULL,-- Universally Unique Identifier for the device
    type device_type_enum NOT NULL DEFAULT 'Sentinel',    -- Device type (e.g., Raspberry Pi, Arduino, etc.)
    model device_model_enum NOT NULL DEFAULT 'Raspberry_Pi_Zero_2_W',  -- Model of the device (enum)
    name VARCHAR(255) NOT NULL,                 -- Name of the device
    location VARCHAR(255) NOT NULL ,             -- Location of the device
    room_size INT,                     -- Size of the room in square meters
    base_noise_level FLOAT,            -- Base noise level of the device in decibels
    threshold FLOAT,                   -- Noise threshold value for the device
    ip_address VARCHAR(45),            -- Device's IP address
    port INT,                          -- Port number the device listens to
    mac_address VARCHAR(17),           -- MAC address of the device
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp when the device was created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Timestamp when the device was last updated
);

-- Table to track device status information
CREATE TABLE device_statuses (
    id SERIAL PRIMARY KEY,                                -- Unique identifier for the status record
    device_id INT NOT NULL ,                              -- Device ID (references devices table)
    status device_status_enum NOT NULL DEFAULT 'active',  -- Device status (e.g., active, offline, maintenance)
    health FLOAT,                                     -- Health status (e.g., CPU usage, RAM status)
    temperature FLOAT,                                -- Temperature of the device
    battery_level FLOAT,                              -- Battery level (if applicable)
    cpu_usage FLOAT,                                  -- CPU usage in percentage
    memory_usage FLOAT,                               -- Memory usage in percentage
    disk_usage FLOAT,                                 -- Disk usage in percentage
    services JSON,                                    -- JSON object to store services information
    last_checked TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Last checked timestamp
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,   -- Timestamp when the record was created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,   -- Timestamp when the record was last updated
    FOREIGN KEY (device_id) REFERENCES devices (id)   -- Foreign key reference to devices table
);

-- Table for operations performed on devices
CREATE TABLE device_operations (
    id SERIAL PRIMARY KEY,                          -- Unique identifier for the operation record
    device_id INT NOT NULL ,                        -- Device ID (references devices table)
    priority level_enum NOT NULL DEFAULT 'low',     -- Priority level of the operation
    operation device_operation_enum NOT NULL,       -- Type of operation (e.g., reboot, suspend)
    delivered BOOLEAN,                              -- Whether the command was successfully delivered
    successful BOOLEAN,                             -- Whether the operation was successful
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp when the record was created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp when the record was last updated
    FOREIGN KEY (device_id) REFERENCES devices (id) -- Foreign key reference to the devices table
);

-- Table for storing bad words detected in system logs or transcripts
CREATE TABLE bad_words (
    id SERIAL PRIMARY KEY,
    priority level_enum NOT NULL DEFAULT 'low',                            -- Type of bad word (e.g., keyword, sentence)
    word VARCHAR(255) NOT NULL ,                              -- The bad word or sentence
    match VARCHAR[] NOT NULL ,                                -- Array of matching words found
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp when the bad word was created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Timestamp when the bad word was last updated
);

-- Table for storing incidents related to devices
CREATE TABLE incidents (
    id SERIAL PRIMARY KEY,                                    -- Unique identifier for the incident
    device_id INT NOT NULL,                                   -- Device ID (references devices table, if applicable)
    priority level_enum NOT NULL DEFAULT 'low',               -- Type of the incident (e.g., low, medium, high)
    verification incident_verification_enum NOT NULL DEFAULT 'unverified',      -- Status of the incident (e.g., open, resolved, in_progress)
    transcript TEXT NOT NULL,                                 -- Description of the incident
    human_count INT NOT NULL DEFAULT 0,                       -- Number of humans involved (if applicable)
    additional JSON,                                 -- Additional data in JSON format
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Timestamp when the incident was created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Timestamp when the incident was last updated
    FOREIGN KEY (device_id) REFERENCES devices (id)  -- Foreign key reference to devices table
);

-- Table to track bad words found in incidents
CREATE TABLE incident_bad_words (
    id SERIAL PRIMARY KEY,                                                  -- Unique identifier for the relationship
    incident_id INT,                                                        -- Reference to the incident table
    bad_word_id INT,                                                        -- Reference to the bad_word table
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,                         -- Timestamp when the record was created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,                         -- Timestamp when the record was last updated
    FOREIGN KEY (incident_id) REFERENCES incidents (id) ON DELETE SET NULL, -- Foreign key to incident table
    FOREIGN KEY (bad_word_id) REFERENCES bad_words (id) ON DELETE SET NULL  -- Foreign key to bad_word table
);

-- Table for events that occur within the system
CREATE TABLE events (
    id SERIAL PRIMARY KEY,                    -- Unique identifier for the event
    type type_enum NOT NULL DEFAULT 'info',                 -- Type of event (e.g., info, error)
    operation event_operation_enum NOT NULL DEFAULT 'low',  -- Type of operation performed (e.g., create, update)
    model_type source_type_enum NOT NULL,     -- Type of source performed (e.g., device, system)
    model_id JSON NOT NULL,                   -- Source of the event as a JSON object
    title VARCHAR(255) NOT NULL,              -- Title of the event
    details TEXT,                             -- Detailed description of the event
    additional JSON,                          -- Additional metadata for the event
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp of event creation
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Timestamp of the last update
);

CREATE TABLE settings (
    id SERIAL PRIMARY KEY,                           -- Unique identifier for the setting
    key VARCHAR(255) UNIQUE NOT NULL,                -- Unique key for the setting
    value TEXT NOT NULL,                             -- Value for the setting
    description TEXT,                                -- Optional description for the setting
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- When the setting was created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP   -- When the setting was last updated
);
