<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Information Message</title>
</head>
<style>
    #messagerespo-section {
        height:100vh;
    }
</style>
<body>

    <section id="messagerespo-section">
        <div class="container" style="padding: 18%;">
            <div class="message-header">
                <h3>{{ $header }}</h3>
            </div>

            <div class="message-content">
                <p>{{ $content }}</p>
            </div>
            <div class="home-button">
                <a class="btn btn-primary" href="{{ url('/') }}" role="button">Go Home</a>
            </div>
        </div>
    </section>
    
    
</body>
</html>