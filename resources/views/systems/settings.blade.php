
<x-app-layout :assets="$assets ?? []">

    <div class="col-sm-12">
        <div class="card" style="height: 100vh;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="card-title mb-0">Settings</h4>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="container-fluid mt-4">
                    <hr>
                    <div class="row">
                        <!-- Sidebar for settings categories -->
                        <div class="col-md-3">
                            <div class="list-group">
                                <a href="#device-settings" class="list-group-item list-group-item-action active" data-bs-toggle="list" role="tab">Device Settings</a>
                                <a href="#event-settings" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab">Event & System Settings</a>
                                <a href="#dashboard-settings" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab">Dashboard Settings</a>
                                <a href="#user-settings" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab">User & Access Settings</a>
                                <a href="#security-settings" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab">Security Settings</a>
                                <a href="#notification-settings" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab">Notification & Alert Settings</a>
                                <a href="#data-settings" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab">Data Management & Backup Settings</a>
                                <a href="#system-settings" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab">System Settings</a>
                                <a href="#monitoring-settings" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab">Performance & Monitoring Settings</a>
                                <a href="#other-settings" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab">Other Settings</a>
                            </div>
                        </div>

                        <!-- Settings form -->
                        <div class="col-md-9">
                            <div class="tab-content">

                                <!-- Device Settings -->
                                <div  id="device-settings" class="tab-pane fade show active">
                                    <h4 class="mb-3">Device Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form >
                                            <div class="mb-3">
                                                <label for="device_default_noise_threshold" class="form-label">Device Default Noise Threshold</label>
                                                <input type="text" class="form-control" id="device_default_noise_threshold" placeholder="75 dB">
                                            </div>
                                            <div class="mb-3">
                                                <label for="device_default_power_mode" class="form-label">Device Default Power Mode</label>
                                                <input type="text" class="form-control" id="device_default_power_mode" placeholder="low">
                                            </div>
                                            <div class="mb-3">
                                                <label for="device_default_update_interval" class="form-label">Device Default Update Interval</label>
                                                <input type="text" class="form-control" id="device_default_update_interval" placeholder="24 hours">
                                            </div>
                                            <div class="mb-3">
                                                <label for="device_default_notification_type" class="form-label">Device Default Notification Type</label>
                                                <input type="text" class="form-control" id="device_default_notification_type" placeholder="info">
                                            </div>
                                            <div class="mb-3">
                                                <label for="device_max_temperature_threshold" class="form-label">Device Max Temperature Threshold</label>
                                                <input type="text" class="form-control" id="device_max_temperature_threshold" placeholder="80°C">
                                            </div>
                                            <div class="mb-3">
                                                <label for="device_max_battery_level" class="form-label">Device Max Battery Level</label>
                                                <input type="text" class="form-control" id="device_max_battery_level" placeholder="90%">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- Event & System Settings -->
                                <div id="event-settings" class="tab-pane fade">
                                    <h4 class="mb-3">Event & System Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="event_log_retention_period" class="form-label">Event Log Retention Period</label>
                                                <input type="text" class="form-control" id="event_log_retention_period" placeholder="30 days">
                                            </div>
                                            <div class="mb-3">
                                                <label for="event_default_priority" class="form-label">Event Default Priority</label>
                                                <input type="text" class="form-control" id="event_default_priority" placeholder="medium">
                                            </div>
                                            <div class="mb-3">
                                                <label for="event_default_type" class="form-label">Event Default Type</label>
                                                <input type="text" class="form-control" id="event_default_type" placeholder="info">
                                            </div>
                                            <div class="mb-3">
                                                <label for="event_sync_frequency" class="form-label">Event Sync Frequency</label>
                                                <input type="text" class="form-control" id="event_sync_frequency" placeholder="5 minutes">
                                            </div>
                                            <div class="mb-3">
                                                <label for="incident_auto_resolve_time" class="form-label">Incident Auto Resolve Time</label>
                                                <input type="text" class="form-control" id="incident_auto_resolve_time" placeholder="48 hours">
                                            </div>
                                            <div class="mb-3">
                                                <label for="incident_default_priority" class="form-label">Incident Default Priority</label>
                                                <input type="text" class="form-control" id="incident_default_priority" placeholder="high">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- Dashboard Settings -->
                                <div id="dashboard-settings" class="tab-pane fade">
                                    <h4 class="mb-3">Dashboard Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="dashboard_theme" class="form-label">Dashboard Theme</label>
                                                <input type="text" class="form-control" id="dashboard_theme" placeholder="Light">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_refresh_interval" class="form-label">Dashboard Refresh Interval</label>
                                                <input type="text" class="form-control" id="dashboard_refresh_interval" placeholder="30 seconds">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_layout" class="form-label">Dashboard Layout</label>
                                                <input type="text" class="form-control" id="dashboard_layout" placeholder="grid">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_widget_defaults" class="form-label">Dashboard Widget Defaults</label>
                                                <input type="text" class="form-control" id="dashboard_widget_defaults" placeholder="device status, alerts">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_notifications_enabled" class="form-label">Dashboard Notifications Enabled</label>
                                                <input type="text" class="form-control" id="dashboard_notifications_enabled" placeholder="true">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_alert_threshold" class="form-label">Dashboard Alert Threshold</label>
                                                <input type="text" class="form-control" id="dashboard_alert_threshold" placeholder="high">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_max_device_display" class="form-label">Dashboard Max Device Display</label>
                                                <input type="text" class="form-control" id="dashboard_max_device_display" placeholder="20">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_device_status_refresh_interval" class="form-label">Dashboard Device Status Refresh Interval</label>
                                                <input type="text" class="form-control" id="dashboard_device_status_refresh_interval" placeholder="5 minutes">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- User & Access Settings -->
                                <div id="user-settings" class="tab-pane fade">
                                    <h4 class="mb-3">User & Access Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="user_default_timezone" class="form-label">User Default Timezone</label>
                                                <input type="text" class="form-control" id="user_default_timezone" placeholder="UTC">
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_default_language" class="form-label">User Default Language</label>
                                                <input type="text" class="form-control" id="user_default_language" placeholder="en">
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_default_notifications" class="form-label">User Default Notifications</label>
                                                <input type="text" class="form-control" id="user_default_notifications" placeholder="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_session_timeout" class="form-label">User Session Timeout</label>
                                                <input type="text" class="form-control" id="user_session_timeout" placeholder="30 minutes">
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_max_device_access" class="form-label">User Max Device Access</label>
                                                <input type="text" class="form-control" id="user_max_device_access" placeholder="50">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- Event & System Settings -->
                                <div id="event-settings" class="tab-pane fade">
                                    <h4 class="mb-3">Event & System Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="event_log_retention_period" class="form-label">Event Log Retention Period</label>
                                                <input type="text" class="form-control" id="event_log_retention_period" placeholder="30 days">
                                            </div>
                                            <div class="mb-3">
                                                <label for="event_default_priority" class="form-label">Event Default Priority</label>
                                                <input type="text" class="form-control" id="event_default_priority" placeholder="medium">
                                            </div>
                                            <div class="mb-3">
                                                <label for="event_default_type" class="form-label">Event Default Type</label>
                                                <input type="text" class="form-control" id="event_default_type" placeholder="info">
                                            </div>
                                            <div class="mb-3">
                                                <label for="event_sync_frequency" class="form-label">Event Sync Frequency</label>
                                                <input type="text" class="form-control" id="event_sync_frequency" placeholder="5 minutes">
                                            </div>
                                            <div class="mb-3">
                                                <label for="incident_auto_resolve_time" class="form-label">Incident Auto Resolve Time</label>
                                                <input type="text" class="form-control" id="incident_auto_resolve_time" placeholder="48 hours">
                                            </div>
                                            <div class="mb-3">
                                                <label for="incident_default_priority" class="form-label">Incident Default Priority</label>
                                                <input type="text" class="form-control" id="incident_default_priority" placeholder="high">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- Dashboard Settings -->
                                <div id="dashboard-settings" class="tab-pane fade">
                                    <h4 class="mb-3">Dashboard Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="dashboard_theme" class="form-label">Dashboard Theme</label>
                                                <input type="text" class="form-control" id="dashboard_theme" placeholder="Light">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_refresh_interval" class="form-label">Dashboard Refresh Interval</label>
                                                <input type="text" class="form-control" id="dashboard_refresh_interval" placeholder="30 seconds">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_layout" class="form-label">Dashboard Layout</label>
                                                <input type="text" class="form-control" id="dashboard_layout" placeholder="grid">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_widget_defaults" class="form-label">Dashboard Widget Defaults</label>
                                                <input type="text" class="form-control" id="dashboard_widget_defaults" placeholder="device status, alerts">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_notifications_enabled" class="form-label">Dashboard Notifications Enabled</label>
                                                <input type="text" class="form-control" id="dashboard_notifications_enabled" placeholder="true">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_alert_threshold" class="form-label">Dashboard Alert Threshold</label>
                                                <input type="text" class="form-control" id="dashboard_alert_threshold" placeholder="high">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_max_device_display" class="form-label">Dashboard Max Device Display</label>
                                                <input type="text" class="form-control" id="dashboard_max_device_display" placeholder="20">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dashboard_device_status_refresh_interval" class="form-label">Dashboard Device Status Refresh Interval</label>
                                                <input type="text" class="form-control" id="dashboard_device_status_refresh_interval" placeholder="5 minutes">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- User & Access Settings -->
                                <div id="user-settings" class="tab-pane fade">
                                    <h4 class="mb-3">User & Access Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="user_default_timezone" class="form-label">User Default Timezone</label>
                                                <input type="text" class="form-control" id="user_default_timezone" placeholder="UTC">
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_default_language" class="form-label">User Default Language</label>
                                                <input type="text" class="form-control" id="user_default_language" placeholder="en">
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_default_notifications" class="form-label">User Default Notifications</label>
                                                <input type="text" class="form-control" id="user_default_notifications" placeholder="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_session_timeout" class="form-label">User Session Timeout</label>
                                                <input type="text" class="form-control" id="user_session_timeout" placeholder="30 minutes">
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_max_device_access" class="form-label">User Max Device Access</label>
                                                <input type="text" class="form-control" id="user_max_device_access" placeholder="50">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- Security Settings -->
                                <div id="security-settings" class="tab-pane fade">
                                    <h4 class="mb-3">Security Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="security_device_access" class="form-label">Security Device Access</label>
                                                <input type="text" class="form-control" id="security_device_access" placeholder="role-based">
                                            </div>
                                            <div class="mb-3">
                                                <label for="security_notification_on_fail_login" class="form-label">Security Notification on Fail Login</label>
                                                <input type="text" class="form-control" id="security_notification_on_fail_login" placeholder="true">
                                            </div>
                                            <div class="mb-3">
                                                <label for="security_max_failed_login_attempts" class="form-label">Security Max Failed Login Attempts</label>
                                                <input type="text" class="form-control" id="security_max_failed_login_attempts" placeholder="5">
                                            </div>
                                            <div class="mb-3">
                                                <label for="security_password_complexity" class="form-label">Security Password Complexity</label>
                                                <input type="text" class="form-control" id="security_password_complexity" placeholder="8 characters, 1 uppercase, 1 special character">
                                            </div>
                                            <div class="mb-3">
                                                <label for="security_two_factor_authentication" class="form-label">Security Two Factor Authentication</label>
                                                <input type="text" class="form-control" id="security_two_factor_authentication" placeholder="true">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- Notification & Alert Settings -->
                                <div id="notification-settings" class="tab-pane fade">
                                    <h4 class="mb-3">Notification & Alert Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="notification_default_method" class="form-label">Notification Default Method</label>
                                                <input type="text" class="form-control" id="notification_default_method" placeholder="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="notification_max_retries" class="form-label">Notification Max Retries</label>
                                                <input type="text" class="form-control" id="notification_max_retries" placeholder="3">
                                            </div>
                                            <div class="mb-3">
                                                <label for="notification_delivery_time_limit" class="form-label">Notification Delivery Time Limit</label>
                                                <input type="text" class="form-control" id="notification_delivery_time_limit" placeholder="15 minutes">
                                            </div>
                                            <div class="mb-3">
                                                <label for="notification_alert_level_threshold" class="form-label">Notification Alert Level Threshold</label>
                                                <input type="text" class="form-control" id="notification_alert_level_threshold" placeholder="high">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- Data Management & Backup Settings -->
                                <div id="data-settings" class="tab-pane fade">
                                    <h4 class="mb-3">Data Management & Backup Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="data_retention_period" class="form-label">Data Retention Period</label>
                                                <input type="text" class="form-control" id="data_retention_period" placeholder="6 months">
                                            </div>
                                            <div class="mb-3">
                                                <label for="data_encryption_enabled" class="form-label">Data Encryption Enabled</label>
                                                <input type="text" class="form-control" id="data_encryption_enabled" placeholder="true">
                                            </div>
                                            <div class="mb-3">
                                                <label for="backup_schedule" class="form-label">Backup Schedule</label>
                                                <input type="text" class="form-control" id="backup_schedule" placeholder="weekly">
                                            </div>
                                            <div class="mb-3">
                                                <label for="backup_encryption" class="form-label">Backup Encryption</label>
                                                <input type="text" class="form-control" id="backup_encryption" placeholder="true">
                                            </div>
                                            <div class="mb-3">
                                                <label for="backup_storage_location" class="form-label">Backup Storage Location</label>
                                                <input type="text" class="form-control" id="backup_storage_location" placeholder="cloud">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- System Settings -->
                                <div id="system-settings" class="tab-pane fade">
                                    <h4 class="mb-3">System Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="system_time_zone" class="form-label">System Time Zone</label>
                                                <input type="text" class="form-control" id="system_time_zone" placeholder="UTC">
                                            </div>
                                            <div class="mb-3">
                                                <label for="system_max_cpu_usage" class="form-label">System Max CPU Usage</label>
                                                <input type="text" class="form-control" id="system_max_cpu_usage" placeholder="90%">
                                            </div>
                                            <div class="mb-3">
                                                <label for="system_max_memory_usage" class="form-label">System Max Memory Usage</label>
                                                <input type="text" class="form-control" id="system_max_memory_usage" placeholder="80%">
                                            </div>
                                            <div class="mb-3">
                                                <label for="system_max_disk_usage" class="form-label">System Max Disk Usage</label>
                                                <input type="text" class="form-control" id="system_max_disk_usage" placeholder="85%">
                                            </div>
                                            <div class="mb-3">
                                                <label for="system_maintenance_mode" class="form-label">System Maintenance Mode</label>
                                                <input type="text" class="form-control" id="system_maintenance_mode" placeholder="true">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- Performance & Monitoring Settings -->
                                <div id="monitoring-settings" class="tab-pane fade">
                                    <h4 class="mb-3">Performance & Monitoring Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="monitoring_interval" class="form-label">Monitoring Interval</label>
                                                <input type="text" class="form-control" id="monitoring_interval" placeholder="5 seconds">
                                            </div>
                                            <div class="mb-3">
                                                <label for="alert_thresholds" class="form-label">Alert Thresholds</label>
                                                <input type="text" class="form-control" id="alert_thresholds" placeholder="CPU 80%, Memory 70%">
                                            </div>
                                            <div class="mb-3">
                                                <label for="system_health_check_frequency" class="form-label">System Health Check Frequency</label>
                                                <input type="text" class="form-control" id="system_health_check_frequency" placeholder="10 minutes">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                                <!-- Other Settings -->
                                <div id="other-settings" class="tab-pane fade">
                                    <h4 class="mb-3">Other Settings</h4>
                                    <fieldset disabled="disabled">
                                        <form>
                                            <div class="mb-3">
                                                <label for="logging_enabled" class="form-label">Logging Enabled</label>
                                                <input type="text" class="form-control" id="logging_enabled" placeholder="true">
                                            </div>
                                            <div class="mb-3">
                                                <label for="logging_level" class="form-label">Logging Level</label>
                                                <input type="text" class="form-control" id="logging_level" placeholder="info">
                                            </div>
                                            <div class="mb-3">
                                                <label for="log_retention_period" class="form-label">Log Retention Period</label>
                                                <input type="text" class="form-control" id="log_retention_period" placeholder="30 days">
                                            </div>
                                            <div class="mb-3">
                                                <label for="api_rate_limit" class="form-label">API Rate Limit</label>
                                                <input type="text" class="form-control" id="api_rate_limit" placeholder="1000 requests per hour">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </fieldset>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
