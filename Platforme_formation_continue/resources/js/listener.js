import './echo.js';

console.log('kan hna nit')
Echo.private("admin-notifications")
        .listen(".NewNotification", (data) => {
            console.log('New notification received:', data.notification);
            notifications.unshift(data.notification);
            unreadCount++;
            updateUI();
        });
        