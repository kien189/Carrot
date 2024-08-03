<!-- resources/views/emails/verify.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h1 {
            margin-bottom: 20px;
        }

        .container p {
            margin-bottom: 20px;
        }

        .container .code {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Verify Your Account</h1>
        <h2>Hi {{ $customer->name }}</h2>
        <p>Thank you for registering! Please use the following verification code to verify your email address:</p>
        <div class="code">{{ $otp }}</div>
        <p>If you didn't request this, please ignore this email.</p>
    </div>
</body>

</html>
