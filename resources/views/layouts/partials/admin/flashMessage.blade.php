@if ($message = Session::get('success'))
    <div id="notification" class="alert alert-success show mb-2 absolute right-0 m-4" role="alert">
        {{ $message }} 
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
    <div id="notification" class="alert alert-danger show mb-2 absolute right-0 m-4" role="alert">
        {{ $message }}
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
    <div id="notification" class="alert alert-danger show mb-2 absolute right-0 m-4" role="alert">
        {{ $message }}
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
    <div id="notification" class="alert alert-success show mb-2 absolute right-0 m-4" role="alert">
        {{ $message }}
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
