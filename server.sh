#!/bin/bash

# File to save PIDs
PID_FILE="pids.txt"

# Function to start the services
start_services() {
    echo "Starting Laravel development server..."
    php artisan serve --host=0.0.0.0 --port=8000 &  # Start Laravel server
    echo $! >> $PID_FILE  # Save PHP process ID

    echo "Starting Laravel queue listener..."
    php artisan queue:listen &  # Start queue listener
    echo $! >> $PID_FILE  # Save Queue listener PID

    echo "Starting Reverb service..."
    php artisan reverb:start &  # Start Reverb service
    echo $! >> $PID_FILE  # Save Reverb process ID

    echo "Starting NPM service..."
    #npm run dev &  # Start npm service
    echo $! >> $PID_FILE  # Save npm process ID

    echo "Services started and PIDs are saved."
}

# Function to stop the services
stop_services() {
    if [[ -f "$PID_FILE" ]]; then
        echo "Stopping services..."

        # Read PIDs from the file and kill the processes
        while IFS= read -r pid; do
            echo "Killing process with PID: $pid"
            kill $pid  # Kill process using the PID
        done < "$PID_FILE"

        # Remove the PID file after stopping services
        rm "$PID_FILE"

        echo "Services stopped."
    else
        echo "No PIDs file found. Services might not be running."
    fi
}

# Start or stop services based on the argument
if [ "$1" == "start" ]; then
    start_services
elif [ "$1" == "stop" ]; then
    stop_services
else
    echo "Usage: $0 {start|stop}"
    exit 1
fi
