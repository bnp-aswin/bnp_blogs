<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Registration Notification</title>
    <style>
        body{
            background-color: lightblue;
        }
        .container{
            display: flex;
            justify-content: center;
        }
        .content{
            padding: 20px 25px;
            background-color: aliceblue;
            border-radius: 5px;

        }
        footer{
            text-align: center;
            font-size: 14px;
            color: grey;
        }
        .text-highlight{
            color: #3498db;
        }
        a{
            display: inline-block;
            text-align: center;
            background-color: #3498db;
            color: white;
            padding: 15px 20px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 16px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h4>Hi <span class="text-highlight">{{$user['name']}}</span>,</h4>
            <p>Thanks for registering with BnP blog site. Your username is {{$user['username']}} & email-id is {{$user['email']}} You are our valuable
            customer.</p>
            <a href="" class="call-to-action">Start Creating Blog</a>
            <p>Thanks for registering with BnP blog site. Your username is paki & email-id is paki@yoode.com You are our valuable
            customer.</p>
            <p>Good luck! Hope it works.</p>
            <footer>© 2022 BitsNPixs Technologies Private Limited. All right(s) reserved.</footer>
        </div>
    </div>
</body>
</html>