<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <style>
        
        .row{
            width: 100%;
            display: block;
            padding: 10px 0;
        }
        
        .button{
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            color: #eee;
            background: #977124;
            padding: 7px 15px;
            border-radius: 3px;
            transition: .3s ease-in-out;
        }
        
        img{
            width: 100%;
        }
        
        p{
            font-size: 14px; 
            line-height: 21px
        }

        hr{
            border: none;
            border-bottom: 1px solid #50505075;
            width: 50%;
            padding: 10px 0;
        }
    </style>
    <title>MSBlog Mailer</title>
</head>
<body>
    <div style="font-family: 'Montserrat', sans-serif;width: 100%;padding: 20px 0;background: #eee;margin: 0;color: #222;">
        <div style="background: #fff;width: 50%;margin: 0 auto;padding: 20px;border-radius: 10px;">
            <div class="row">
                <div style="width:100%">
                    <img style="height: 31px;width: auto !important;display: block;margin: 0 auto;" src="/assets/logo.svg" alt="msblog logo" />
                </div>
            </div>
        
            <hr>
            
            <div class="row">
                <h3>Hi {{$subscriber['name']}} 👋🏽</h3>
                <p>
                    It seems that you  subscribed to our newsletter! <br>
                    In order to complete the subscription you have to confirm your email.
                </p>
            </div>
            
            <div align="center" class="row">
                <a href="{{$subscriber['confirm_url']}}" class="button">Confirm my email</a>
            </div>
            
            <div class="row">
                <i>The link is valid only for 24h</i>
            </div>

            <hr>

            <div align="center" class="row">
                <span style="font-weight: 600;color: #AC9E3C">Thank you!</span>
            </div>
        </div>

        <div style="padding: 20px 0;color: rgb(180, 180, 180);font-weight: 600;text-align: center;font-size: 14px;">
            <span>All rights reserved to MEDOSTUDIOS © {{Date('Y')}}</span>
        </div>
    </div>
</body>
</html>