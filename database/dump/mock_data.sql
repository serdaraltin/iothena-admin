-- Device Table (device)
INSERT INTO devices (uuid, type, name, location, room_size, base_noise_level, threshold, ip_address, port, mac_address, model)
VALUES
    (gen_random_uuid(), 'Sentinel', 'Huzur Evi İzleme Cihazı 1', 'Oda 101', 18, 30.0, 55.0, '192.168.1.10', 8000, '00:1A:2B:3C:4D:01', 'Raspberry_Pi_4'),
    (gen_random_uuid(), 'Sentinel', 'Kamera Sistemi 2', 'Oda 202', 28, 35.5, 70.0, '192.168.1.11', 8001, '00:1A:2B:3C:4D:02', 'Raspberry_Pi_3'),
    (gen_random_uuid(), 'Sentinel', 'Sesli Uyarı Sistemi 3', 'Oda 303', 25, 27.0, 50.0, '192.168.1.12', 8002, '00:1A:2B:3C:4D:03', 'Raspberry_Pi_Zero_2_W'),
    (gen_random_uuid(), 'Sentinel', 'Oda 404 Kamera', 'Oda 404', 20, 40.0, 65.0, '192.168.1.13', 8003, '00:1A:2B:3C:4D:04', 'Raspberry_Pi_3'),
    (gen_random_uuid(), 'Sentinel', 'Sesli Uyarı Sistemi 4', 'Oda 505', 22, 28.5, 58.0, '192.168.1.14', 8004, '00:1A:2B:3C:4D:05', 'Raspberry_Pi_4'),
    (gen_random_uuid(), 'Sentinel', 'Huzur Evi İzleme Cihazı 5', 'Oda 106', 19, 31.0, 60.5, '192.168.1.15', 8005, '00:1A:2B:3C:4D:06', 'Raspberry_Pi_5'),
    (gen_random_uuid(), 'Sentinel', 'Kamera Sistemi 6', 'Oda 207', 25, 36.0, 72.0, '192.168.1.16', 8006, '00:1A:2B:3C:4D:07', 'Raspberry_Pi_3'),
    (gen_random_uuid(), 'Sentinel', 'Sesli Uyarı Sistemi 7', 'Oda 308', 30, 27.0, 53.5, '192.168.1.17', 8007, '00:1A:2B:3C:4D:08', 'Raspberry_Pi_Zero_2_W'),
    (gen_random_uuid(), 'Sentinel', 'Oda 409 Kamera', 'Oda 409', 15, 41.0, 67.5, '192.168.1.18', 8008, '00:1A:2B:3C:4D:09', 'Raspberry_Pi_3'),
    (gen_random_uuid(), 'Sentinel', 'Sesli Uyarı Sistemi 8', 'Oda 510', 22, 29.5, 56.0, '192.168.1.19', 8009, '00:1A:2B:3C:4D:10', 'Raspberry_Pi_5');


-- Device Status Table (device_statuses)
INSERT INTO device_statuses (device_id, status, health, battery_level, temperature, cpu_usage, memory_usage, disk_usage, last_checked, services)
VALUES
    (1, 'active', 95.5, 50.5, 32.0, 60.0, 45.0, 50.0, '2024-12-28 08:15:00', '[{"name": "Service 1", "version": "1.0.0", "status": "running"}, {"name": "Service 2", "version": "1.1.0", "status": "stopped"}]'),
    (1, 'maintenance', 93.0, 55.0, 33.0, 58.0, 42.0, 48.0, '2024-12-28 10:00:00', '[{"name": "Service 1", "version": "1.0.0", "status": "running"}]'),
    (1, 'booting', 94.0, 60.0, 34.0, 62.0, 43.0, 49.0, '2024-12-28 12:30:00', '[{"name": "Service 1", "version": "1.0.0", "status": "running"}]'),
    (2, 'idle', 80.0, 78.0, 40.0, 50.0, 55.0, 70.0, '2024-12-28 09:10:00', '[{"name": "Service 1", "version": "2.0.0", "status": "running"}, {"name": "Service 3", "version": "3.0.0", "status": "stopped"}]'),
    (2, 'active', 85.0, 80.0, 39.0, 53.0, 60.0, 72.0, '2024-12-28 11:20:00', '[{"name": "Service 1", "version": "2.0.0", "status": "running"}]'),
    (2, 'maintenance', 78.0, 75.0, 38.5, 52.0, 59.0, 68.0, '2024-12-28 13:05:00', '[{"name": "Service 2", "version": "2.1.0", "status": "stopped"}]'),
    (3, 'offline', 0.0, 35.0, 0.0, 0.0, 0.0, 0.0, '2024-12-28 10:30:00', '[{"name": "Service 2", "version": "1.2.0", "status": "stopped"}]'),
    (3, 'offline', 10.0, 35.0, 0.0, 0.0, 0.0, 0.0, '2024-12-28 11:40:00', '[{"name": "Service 1", "version": "1.2.0", "status": "running"}]'),
    (4, 'active', 90.0, 47.0, 36.0, 75.0, 60.0, 40.0, '2024-12-28 11:10:00', '[{"name": "Service 1", "version": "1.1.0", "status": "running"}]'),
    (4, 'recovering', 89.0, 46.0, 36.5, 76.0, 61.0, 41.0, '2024-12-28 12:50:00', '[{"name": "Service 2", "version": "1.0.0", "status": "stopped"}]'),
    (4, 'active', 92.0, 48.0, 37.0, 77.0, 62.0, 42.0, '2024-12-28 14:10:00', '[{"name": "Service 1", "version": "1.1.0", "status": "running"}]'),
    (5, 'maintenance', 85.0, 10.0, 38.0, 65.0, 50.0, 60.0, '2024-12-28 12:05:00', '[{"name": "Service 3", "version": "2.5.0", "status": "stopped"}, {"name": "Service 4", "version": "4.0.0", "status": "running"}]'),
    (5, 'active', 90.0, 15.0, 38.5, 67.0, 55.0, 61.0, '2024-12-28 14:30:00', '[{"name": "Service 3", "version": "2.5.0", "status": "running"}]'),
    (5, 'maintenance', 80.0, 13.0, 39.0, 68.0, 56.0, 62.0, '2024-12-28 15:00:00', '[{"name": "Service 5", "version": "3.0.0", "status": "stopped"}]'),
    (5, 'active', 91.0, 20.0, 40.0, 70.0, 58.0, 63.0, '2024-12-28 16:10:00', '[{"name": "Service 3", "version": "2.5.0", "status": "running"}]'),
    (6, 'maintenance', 88.0, 35.0, 41.0, 66.0, 54.0, 60.0, '2024-12-28 09:30:00', '[{"name": "Service 2", "version": "3.0.0", "status": "stopped"}]'),
    (6, 'active', 94.0, 30.0, 42.0, 63.0, 56.0, 64.0, '2024-12-28 11:40:00', '[{"name": "Service 2", "version": "3.0.0", "status": "running"}]'),
    (7, 'recovering', 86.0, 65.0, 35.5, 60.0, 59.0, 72.0, '2024-12-28 14:00:00', '[{"name": "Service 1", "version": "1.5.0", "status": "stopped"}]'),
    (7, 'active', 92.0, 70.0, 36.0, 58.0, 61.0, 69.0, '2024-12-28 15:30:00', '[{"name": "Service 1", "version": "1.5.0", "status": "running"}]'),
    (8, 'booting', 90.0, 40.0, 30.0, 64.0, 45.0, 50.0, '2024-12-28 13:00:00', '[{"name": "Service 3", "version": "4.0.0", "status": "running"}]'),
    (8, 'active', 87.0, 55.0, 33.0, 62.0, 48.0, 58.0, '2024-12-28 16:30:00', '[{"name": "Service 3", "version": "4.0.0", "status": "running"}]'),
    (9, 'offline', 0.0, 50.0, 0.0, 0.0, 0.0, 0.0, '2024-12-28 09:45:00', '[{"name": "Service 2", "version": "2.1.0", "status": "stopped"}]'),
    (9, 'idle', 92.0, 85.0, 37.0, 55.0, 60.0, 70.0, '2024-12-28 10:50:00', '[{"name": "Service 1", "version": "3.0.0", "status": "running"}]'),
    (10, 'active', 96.0, 25.0, 39.0, 59.0, 54.0, 65.0, '2024-12-28 14:20:00', '[{"name": "Service 3", "version": "4.0.1", "status": "running"}]'),
    (10, 'maintenance', 90.0, 30.0, 38.5, 57.0, 53.0, 64.0, '2024-12-28 16:00:00', '[{"name": "Service 5", "version": "3.1.0", "status": "stopped"}]');

-- Device Operation Table (device_operations)
INSERT INTO device_operations (device_id, priority, operation, delivered, successful, created_at, updated_at)
VALUES
    (1, 'high', 'reboot', true, true, '2024-12-28 08:00:00', '2024-12-28 08:05:00'),
    (2, 'medium', 'suspend', false, false, '2024-12-28 09:15:00', '2024-12-28 09:16:00'),
    (3, 'low', 'reboot', true, true, '2024-12-28 10:00:00', '2024-12-28 10:01:00'),
    (4, 'critical', 'reboot', true, false, '2024-12-28 11:30:00', '2024-12-28 11:45:00'),
    (5, 'low', 'reboot', true, true, '2024-12-28 12:00:00', '2024-12-28 12:02:00'),
    (1, 'medium', 'suspend', true, true, '2024-12-28 13:00:00', '2024-12-28 13:05:00'),
    (2, 'critical', 'reboot', false, false, '2024-12-28 14:00:00', '2024-12-28 14:02:00'),
    (3, 'high', 'suspend', true, false, '2024-12-28 15:00:00', '2024-12-28 15:02:00'),
    (4, 'medium', 'reboot', true, true, '2024-12-28 16:00:00', '2024-12-28 16:01:00'),
    (5, 'high', 'reboot', false, true, '2024-12-28 17:00:00', '2024-12-28 17:05:00');


-- Bad Words Table (bad_words)
INSERT INTO bad_words (priority, word, match, created_at, updated_at)
VALUES
    ('low', 'yavşak', ARRAY['yavsak', 'yavşşak', 'yavşak'], '2024-12-31 18:00:00', '2024-12-31 18:00:00'),
    ('high', 'salak', ARRAY['saak', 'sallak', 'slak'], '2024-12-31 18:10:00', '2024-12-31 18:10:00'),
    ('critical', 'aptal', ARRAY['aptıl', 'aptall', 'aaptal'], '2024-12-31 18:15:00', '2024-12-31 18:15:00'),
    ('medium', 'gerizekalı', ARRAY['grzkalı', 'gerzkalı', 'gerezkalı'], '2024-12-31 18:20:00', '2024-12-31 18:20:00'),
    ('medium', 'pislik', ARRAY['pslik', 'pslk', 'pislk'], '2024-12-31 18:25:00', '2024-12-31 18:25:00');


-- Incidents Table (incidents)
INSERT INTO incidents (device_id, priority, verification, transcript, human_count, additional, created_at, updated_at)
VALUES
    (1, 'high', 'unverified', 'A patient fell in the hallway. Immediate assistance required.', 1, '{"details": "Fall detected near room 12. Patient unresponsive."}', '2024-12-28 08:00:00', '2024-12-28 08:00:00'),
    (2, 'medium', 'correct', 'Unusual noise detected in common area.', 0, '{"details": "Clattering noise, possibly dropped items."}', '2024-12-28 08:45:00', '2024-12-28 08:45:00'),
    (3, 'high', 'unverified', 'Elevator malfunctioned while transporting a patient.', 2, '{"details": "Patient and caregiver stuck in the elevator for 10 minutes."}', '2024-12-28 09:30:00', '2024-12-28 09:30:00'),
    (4, 'critical', 'unverified', 'Patient in room 101 is not responding to repeated calls.', 1, '{"details": "No response to caregiver alerts for over 5 minutes."}', '2024-12-28 10:15:00', '2024-12-28 10:15:00'),
    (5, 'high', 'correct', 'Monitoring device lost connection to the server.', 0, '{"details": "No data transmission for over 20 minutes."}', '2024-12-28 11:00:00', '2024-12-28 11:00:00'),
    (6, 'medium', 'correct', 'Caregiver entered restricted area without authorization.', 1, '{"details": "Caregiver entered medical supply storage."}', '2024-12-28 12:05:00', '2024-12-28 12:05:00'),
    (7, 'critical', 'unverified', 'Fire alarm triggered in the dining area.', 0, '{"details": "Smoke detected near the kitchen area."}', '2024-12-28 13:10:00', '2024-12-28 13:10:00'),
    (8, 'high', 'correct', 'Battery critically low on device monitoring Room 201.', 0, '{"details": "Battery level below 5%, device may shut down."}', '2024-12-28 14:20:00', '2024-12-28 14:20:00'),
    (9, 'medium', 'unverified', 'Patient group discussion turned into a heated argument.', 4, '{"details": "Raised voices detected for several minutes in the recreation room."}', '2024-12-28 15:30:00', '2024-12-28 15:30:00'),
    (10, 'critical', 'correct', 'Unauthorized access attempt on medication cabinet.', 0, '{"details": "Multiple failed attempts to unlock the cabinet."}', '2024-12-28 16:45:00', '2024-12-28 16:45:00'),
    (1, 'high', 'unverified', 'Emergency button pressed by a patient in room 205.', 1, '{"details": "Patient pressed emergency button due to severe chest pain."}', '2024-12-28 17:50:00', '2024-12-28 17:50:00'),
    (2, 'medium', 'unverified', 'Sudden temperature drop detected in room 102.', 0, '{"details": "Temperature fell below 15°C due to a malfunctioning HVAC system."}', '2024-12-28 18:30:00', '2024-12-28 18:30:00'),
    (3, 'high', 'correct', 'Patient wandering detected in unauthorized area.', 1, '{"details": "Patient observed near the loading dock."}', '2024-12-28 19:15:00', '2024-12-28 19:15:00'),
    (4, 'critical', 'unverified', 'Severe agitation detected in dementia patient.', 2, '{"details": "Caregiver reported aggressive behavior, calming measures needed."}', '2024-12-28 20:00:00', '2024-12-28 20:00:00'),
    (5, 'high', 'correct', 'Security camera in room 301 is offline.', 0, '{"details": "No video feed available for over 30 minutes."}', '2024-12-28 20:45:00', '2024-12-28 20:45:00'),
    (6, 'low', 'correct', 'Patient left the premises without supervision.', 1, '{"details": "Patient was found outside the building. No harm occurred."}', '2024-12-29 08:10:00', '2024-12-29 08:10:00'),
    (7, 'medium', 'unverified', 'Unusual behavior detected by motion sensor in patient room.', 1, '{"details": "Patient pacing back and forth near the window."}', '2024-12-29 09:25:00', '2024-12-29 09:25:00'),
    (8, 'critical', 'unverified', 'Defibrillator malfunctioned during an emergency.', 3, '{"details": "Device failed to deliver the shock during cardiac arrest situation."}', '2024-12-29 10:40:00', '2024-12-29 10:40:00'),
    (9, 'low', 'correct', 'Routine cleaning performed in patient’s room.', 2, '{"details": "No incidents occurred during cleaning."}', '2024-12-29 11:55:00', '2024-12-29 11:55:00'),
    (10, 'high', 'unverified', 'Security breach detected at the entrance.', 1, '{"details": "Unauthorized person attempting to enter the facility."}', '2024-12-29 12:30:00', '2024-12-29 12:30:00');

-- Incident Bad Words Table (incident_bad_words)
INSERT INTO incident_bad_words (incident_id, bad_word_id, created_at, updated_at)
VALUES
    (1, 1, '2024-12-28 08:00:00', '2024-12-28 08:00:00'), -- "Çığlık atma" olayında "yavaş" kelimesi bulundu
    (1, 2, '2024-12-28 08:00:00', '2024-12-28 08:00:00'), -- "Çığlık atma" olayında "aptal" kelimesi bulundu
    (2, 3, '2024-12-28 09:30:00', '2024-12-28 09:30:00'), -- Kamera hareketi algılama olayında "salak" kelimesi bulundu
    (3, 4, '2024-12-28 10:15:00', '2024-12-28 10:15:00'), -- Bakıcı tartışması olayında "Bu işin altından kalkamayacaksın" kelimesi bulundu
    (4, 5, '2024-12-28 11:00:00', '2024-12-28 11:00:00'), -- Sert konuşma olayında "salak" kelimesi bulundu
    (5, 2, '2024-12-28 12:05:00', '2024-12-28 12:05:00'), -- Sesli uyarı arızası olayında "aptal" kelimesi bulundu
    (6, 1, '2024-12-28 13:10:00', '2024-12-28 13:10:00'), -- Alarm verilmediği olayda "yavaş" kelimesi bulundu
    (7, 4, '2024-12-28 14:20:00', '2024-12-28 14:20:00'), -- Kamera bağlantısı kesildiğinde "Bu işin altından kalkamayacaksın" kelimesi bulundu
    (8, 3, '2024-12-28 15:30:00', '2024-12-28 15:30:00'), -- Batarya boşalması olayında "salak" kelimesi bulundu
    (9, 5, '2024-12-28 17:50:00', '2024-12-28 17:50:00'); -- Cihaz yanlış sinyal verdiğinde "salak" kelimesi bulundu
