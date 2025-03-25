window.Echo.channel('notification')
    .listen('NotificationEvent', (event) => {
        console.log(event);
        const model_id = event.model_id;
        const notification_id = event.notification_id;

        const modalActions = {
            'App\\Models\\Incident\\Incident': 'openNotificationIncidentModal',
            'App\\Models\\Device\\Device': 'openNotificationDeviceModal',
            'App\\Models\\Service\\Service': 'openNotificationServiceModal'
        };

        if (modalActions[event.model_type]) {

            //Livewire.dispatch(modalActions[event.model_type], [model_id, notification_id]);
            //Livewire.dispatch('refreshNotificationList');
        }
    });
