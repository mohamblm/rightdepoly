<div id="notification-container" class="relative">
    <!-- Notification Bell Icon with Badge -->
    <button id="notification-bell" class="relative p-2 text-gray-600 hover:text-blue-600 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <!-- Notification Badge -->
        <span id="notification-count" class="hidden absolute top-0 right-0 inline-flex items-center justify-center 
            px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 
            bg-red-600 rounded-full"></span>
    </button>

    <!-- Notification Panel -->
    <div id="notification-panel" class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg overflow-hidden z-50 hidden">
        <div class="py-2 px-3 bg-blue-600 text-white flex justify-between items-center">
            <h3 class="text-sm font-medium">Notifications</h3>
            <button id="mark-all-read" class="text-xs underline hover:text-blue-100">Mark all as read</button>
        </div>
        
        <div id="notification-list" class="max-h-96 overflow-y-auto">
            <p id="no-notifications" class="py-4 px-3 text-gray-500 text-center">Loading...</p>
        </div>
        
        <div class="py-2 px-3 bg-gray-100 text-right">
            <a href="{{ route('notifications.index') }}" class="text-xs text-blue-600 hover:underline">View all notifications</a>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const notificationBell = document.getElementById("notification-bell");
    const notificationPanel = document.getElementById("notification-panel");
    const notificationList = document.getElementById("notification-list");
    const notificationCount = document.getElementById("notification-count");
    const markAllRead = document.getElementById("mark-all-read");
    let notifications = [];
    let unreadCount = 0;
    // Real-time notification listener using Laravel Echo
    Echo.private("admin-notifications")
        .listen(".NewNotification", (data) => {
            console.log('New notification received:', data.notification);
            notifications.unshift(data.notification);
            unreadCount++;
            updateUI();
        });
    // Fetch notifications
    function fetchNotifications() {
        console.log('Fetching notifications');
        
        fetch("/notifications")
            .then(response => response.json())
            .then(data => {
                notifications = data.notifications;
                unreadCount = data.unread_count;
                updateUI();
            }).catch((e) => {
                console.log('Error fetching notifications:', e);
            });
    }

    // Parse notification data if it's a string
    function parseNotificationData(notification) {
        if (notification && notification.data && typeof notification.data === 'string') {
            try {
                return JSON.parse(notification.data);
            } catch (e) {
                console.error('Error parsing notification data:', e);
                return { title: 'Notification', message: 'Unable to display this notification' };
            }
        }
        return notification.data;
    }

    // Update UI with notifications
    function updateUI() {
        notificationList.innerHTML = "";
        if (notifications.length === 0) {
            notificationList.innerHTML = '<p class="py-4 px-3 text-gray-500 text-center">No notifications yet</p>';
            notificationCount.classList.add("hidden");
        } else {
            notifications.forEach(notification => {
                const notificationData = parseNotificationData(notification);
                
                const notificationItem = document.createElement("div");
                notificationItem.className = `py-2 px-3 hover:bg-gray-100 border-b border-gray-100 cursor-pointer ${
                    notification.read_at ? "" : "bg-blue-50"
                }`;
                notificationItem.innerHTML = `
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-900">${notificationData.title}</p>
                            <p class="text-xs text-gray-600 mt-1">${notificationData.message}</p>
                        </div>
                        <span class="text-xs text-gray-500">${formatDate(notification.created_at)}</span>
                    </div>
                `;
                notificationItem.addEventListener("click", () => markAsRead(notification.id));
                notificationList.appendChild(notificationItem);
            });
            notificationCount.textContent = unreadCount;
            notificationCount.classList.toggle("hidden", unreadCount === 0);
        }
    }

    // Mark a single notification as read
    function markAsRead(id) {
        fetch(`/notifications/${id}/mark-as-read`).then(() => {
            notifications = notifications.map(n => (n.id === id ? { ...n, read_at: new Date().toISOString() } : n));
            unreadCount = Math.max(0, unreadCount - 1);
            updateUI();
        });
    }

    // Mark all notifications as read
    markAllRead.addEventListener("click", function (e) {
        e.stopPropagation(); // Prevent panel from closing
        fetch("/notifications/mark-all-as-read").then(() => {
            notifications.forEach(n => (n.read_at = new Date().toISOString()));
            unreadCount = 0;
            updateUI();
        });
    });

    

    // Format timestamps
    function formatDate(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diffInSecs = Math.floor((now - date) / 1000);
        if (diffInSecs < 60) return "just now";
        const diffInMins = Math.floor(diffInSecs / 60);
        if (diffInMins < 60) return `${diffInMins}m ago`;
        const diffInHours = Math.floor(diffInMins / 60);
        if (diffInHours < 24) return `${diffInHours}h ago`;
        return date.toLocaleDateString();
    }

    // Toggle notification panel
    notificationBell.addEventListener("click", function () {
        notificationPanel.classList.toggle("hidden");
    });

    // Hide panel when clicking outside
    document.addEventListener("click", function (event) {
        if (!notificationBell.contains(event.target) && !notificationPanel.contains(event.target)) {
            notificationPanel.classList.add("hidden");
        }
    });

    // Escape key to close panel
    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            notificationPanel.classList.add("hidden");
        }
    });

    // Initial fetch
    fetchNotifications();
});
</script>