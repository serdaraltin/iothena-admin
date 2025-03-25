import pusher

pusher_client = pusher.Pusher(
    app_id='test',
    key='test',
    secret='test',
    cluster='test',
    ssl=True
)

def send_notification(message):
    pusher_client.trigger('notification-channel', 'NotificationEvent', {'message': message})

send_notification("Yeni bir IoT olayı gerçekleşti!")
