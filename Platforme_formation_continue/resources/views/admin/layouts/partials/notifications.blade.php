<!-- notifications-modal.blade.php -->
<div id="notificationsModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4">
        <div class="flex justify-between items-center border-b p-4">
            <h3 class="text-lg font-semibold text-gray-900">Notifications</h3>
            <button type="button" class="text-gray-400 hover:text-gray-500" onclick="closeNotificationsModal()">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div class="p-4 max-h-96 overflow-y-auto" id="notificationsContainer">
            <!-- Notifications will be loaded here -->
            <div class="flex justify-center items-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
            </div>
        </div>
        
        <div class="border-t p-4 flex justify-between">
            <button type="button" class="text-blue-600 hover:text-blue-800 text-sm font-medium" onclick="markAllAsRead()">
                Mark all as read
            </button>
            <span class="text-sm text-gray-500" id="notificationCount">0 notifications</span>
        </div>
    </div>
</div>

<script>
    function openNotificationsModal() {
        document.getElementById('notificationsModal').classList.remove('hidden');
        loadNotifications();
    }
    
    function closeNotificationsModal() {
        document.getElementById('notificationsModal').classList.add('hidden');
    }
    
    function loadNotifications() {
        const container = document.getElementById('notificationsContainer');
        
        fetch('/admin/notifications')
            .then(response => response.json())
            .then(data => {
                container.innerHTML = '';
                
                if (data.notifications.length === 0) {
                    container.innerHTML = '<div class="text-center py-8 text-gray-500">No notifications</div>';
                    document.getElementById('notificationCount').textContent = '0 notifications';
                    return;
                }
                
                data.notifications.forEach(notification => {
                    const notificationEl = document.createElement('div');
                    notificationEl.className = notification.read_at ? 'p-3 border-b' : 'p-3 border-b bg-blue-50';
                    
                    const iconClass = getNotificationIcon(notification.type);
                    
                    notificationEl.innerHTML = `
                        <div class="flex items-start">
                            <div class="flex-shrink-0 pt-1">
                                <i class="${iconClass}"></i>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-sm font-medium text-gray-900">${notification.data.title}</p>
                                <p class="text-sm text-gray-500">${notification.data.message}</p>
                                <p class="text-xs text-gray-400 mt-1">${formatTime(notification.created_at)}</p>
                            </div>
                            <div class="ml-3 flex-shrink-0">
                                <button type="button" class="text-gray-400 hover:text-gray-500" onclick="markAsRead('${notification.id}', this)">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    `;
                    
                    container.appendChild(notificationEl);
                });
                
                document.getElementById('notificationCount').textContent = `${data.unread_count} unread`;
                
                // Update notification badge in navbar
                const badge = document.getElementById('notificationBadge');
                if (badge) {
                    if (data.unread_count > 0) {
                        badge.textContent = data.unread_count;
                        badge.classList.remove('hidden');
                    } else {
                        badge.classList.add('hidden');
                    }
                }
            })
            .catch(error => {
                console.error('Error loading notifications:', error);
                container.innerHTML = '<div class="text-center py-8 text-red-500">Failed to load notifications</div>';
            });
    }
    
    function markAsRead(id, button) {
        fetch(`/admin/notifications/${id}/mark-as-read`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const notificationEl = button.closest('div.flex').parentNode.parentNode;
                notificationEl.classList.remove('bg-blue-50');
                button.closest('div.ml-3').classList.add('invisible');
                loadNotifications(); // Refresh counts
            }
        })
        .catch(error => console.error('Error marking notification as read:', error));
    }
    
    function markAllAsRead() {
        fetch('/admin/notifications/mark-all-as-read', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadNotifications();
            }
        })
        .catch(error => console.error('Error marking all notifications as read:', error));
    }
    
    function getNotificationIcon(type) {
        switch (type) {
            case 'App\\Notifications\\NewUserRegistration':
                return 'fas fa-user-plus text-green-500';
            case 'App\\Notifications\\NewContactMessage':
                return 'fas fa-envelope text-blue-500';
            default:
                return 'fas fa-bell text-gray-500';
        }
    }
    
    function formatTime(timestamp) {
        const date = new Date(timestamp);
        const now = new Date();
        const diffMs = now - date;
        const diffMins = Math.floor(diffMs / 60000);
        const diffHours = Math.floor(diffMins / 60);
        const diffDays = Math.floor(diffHours / 24);
        
        if (diffMins < 1) {
            return 'just now';
        } else if (diffMins < 60) {
            return `${diffMins} min${diffMins > 1 ? 's' : ''} ago`;
        } else if (diffHours < 24) {
            return `${diffHours} hour${diffHours > 1 ? 's' : ''} ago`;
        } else if (diffDays < 7) {
            return `${diffDays} day${diffDays > 1 ? 's' : ''} ago`;
        } else {
            return date.toLocaleDateString();
        }
    }
</script>