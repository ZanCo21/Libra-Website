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
                <p style="color: #4b5563; font-size: 1.5rem; font-weight: bold; margin-bottom: 10px;">Hi {{ $getuser->userName }},</p>
        
                <p style="color: #6b7280; margin-top: 10px; line-height: 1.6;">Welcome to our community! Your account has been successfully approved. We're thrilled to have you on board. <span style="font-weight: bold;">Libra</span>.</p>
                
                <p style="color: #6b7280; margin-top: 20px;">Thanks,<br>Libra</p>
            </main>
            
        
            <footer style="margin-top: 20px;">
                <p style="color: #6b7280; font-size: 0.8rem;">This email was sent to <a href="#" style="color: #3b82f6; text-decoration: underline;">contact@libra.com</a>. If you'd rather not receive this kind of email, you can <a href="#" style="color: #3b82f6; text-decoration: underline;">unsubscribe</a> or <a href="#" style="color: #3b82f6; text-decoration: underline;">manage your email preferences</a>.</p>
        
                <p style="color: #6b7280; font-size: 0.8rem; margin-top: 10px;">&copy; {{ date('Y') }} Libra. All Rights Reserved.</p>
            </footer>
        </section>
    </div>
</body>
</html>
