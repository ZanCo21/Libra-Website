<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libra</title>
</head>
<body>
    <div style="background-color: #f3f4f6; padding: 40px;">
        <section style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px;">
            <header style="text-align: center;">
                <img src="{{ $message->embed($imagePath) }}" alt="Libra Logo" style="max-width: 200px;">
            </header>
        
            <main style="margin-top: 20px;">
                <p style="color: #4b5563; font-size: 1.5rem; font-weight: bold; margin-bottom: 10px;">Hi {{ $peminjam->userName }},</p>
               
                <p style="color: #6b7280; margin-top: 10px; line-height: 1.6;"> Notice: We've observed that you've returned some books after their due dates. Kindly be informed that if you fail to return the overdue books and clear any fines within the next 3 days, your account will be temporarily suspended. The overdue books were originally due on <span class="formatDate">{{ $tanggalPengembalian }}</span>, and currently, you owe a total fine of Rp{{ number_format($denda, 0, ',', '.') }}.</p>
                
                <p style="color: #6b7280; margin-top: 20px;">Thank you for your attention to this matter.<br>Libra</p>
            </main>
            
        
            <footer style="margin-top: 20px;">
                <p style="color: #6b7280; font-size: 0.8rem;">This email was sent to <a href="#" style="color: #3b82f6; text-decoration: underline;">contact@libra.com</a>. If you'd rather not receive this kind of email, you can <a href="#" style="color: #3b82f6; text-decoration: underline;">unsubscribe</a> or <a href="#" style="color: #3b82f6; text-decoration: underline;">manage your email preferences</a>.</p>
        
                <p style="color: #6b7280; font-size: 0.8rem; margin-top: 10px;">&copy; {{ date('Y') }} Libra. All Rights Reserved.</p>
            </footer>
        </section>
    </div>

    <script>
           document.addEventListener('DOMContentLoaded', function() {
            var dateCells = document.querySelectorAll('.formatDate');
            dateCells.forEach(function(cell) {
                var originalDate = cell.textContent.trim();
                var formattedDate = new Date(originalDate).toLocaleDateString('en-US', {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric'
                });
                cell.textContent = formattedDate;
            });
        });

        function formatDateString(dateString) {
            var dateObj = new Date(dateString);
            return dateObj.toLocaleDateString('en-US', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            });
        }
    </script>
</body>
</html>
