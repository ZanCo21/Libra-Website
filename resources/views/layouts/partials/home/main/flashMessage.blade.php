@if ($message = Session::get('success'))
    <div id="notification" class="flex absolute right-0 bottom-6 me-4 w-auto items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <span class="sr-only">Info</span>
        <div class="text-2xl flex items-center">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="font-medium">Success! </span>{{ $message }} 
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notificationContent = document.getElementById('notification');

            notificationContent.style.display = 'block';

            setTimeout(function() {
                notificationContent.style.display = 'none';
            }, 4000);
        });
    </script>
@elseif($message = Session::get('delete'))
    <div id="notification" class="flex absolute right-0 bottom-6 me-4 w-auto items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <span class="sr-only">Info</span>
        <div class="text-2xl flex items-center">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="font-medium">Danger! </span> {{ $message }}.
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notificationContent = document.getElementById('notification');

            notificationContent.style.display = 'block';

            setTimeout(function() {
                notificationContent.style.display = 'none';
            }, 4000);
        });
    </script>
@elseif($message = Session::get('error'))
    <div id="notification" class="flex absolute right-0 bottom-6 me-4 w-auto items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <span class="sr-only">Info</span>
        <div class="text-2xl flex items-center">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="font-medium">Error! </span>{{ $message }}.
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notificationContent = document.getElementById('notification');

            notificationContent.style.display = 'block';

            setTimeout(function() {
                notificationContent.style.display = 'none';
            }, 4000);
        });
    </script>
@elseif($message = Session::get('updated'))
    <div id="notification" class="flex absolute right-0 bottom-6 me-4 w-auto items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <span class="sr-only">Info</span>
        <div class="text-2xl flex items-center">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="font-medium">Success! </span>{{ $message }} 
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notificationContent = document.getElementById('notification');

            notificationContent.style.display = 'block';

            setTimeout(function() {
                notificationContent.style.display = 'none';
            }, 4000);
        });
    </script>
@elseif($message = Session::get('info'))
    <div id="notification" class="flex absolute right-0 bottom-6 me-4 w-auto items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
        <span class="sr-only">Info</span>
        <div class="text-2xl flex items-center">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
          <span class="font-medium">Info! </span>{{ $message }} 
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notificationContent = document.getElementById('notification');

            notificationContent.style.display = 'block';

            setTimeout(function() {
                notificationContent.style.display = 'none';
            }, 4000);
        });
    </script>
@endif
