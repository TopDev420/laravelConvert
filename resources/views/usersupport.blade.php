<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Email Temaplte</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        padding: 0px;
        letter-spacing: 0.5px;
        margin: 0px;
        position: relative;
        width: 100%;
        font-size: 15px;
        max-width: 680px;
    }
    
    h1 {
        font-family: 'Oxygen', sans-serif;
        margin: 0;
        font-size: 17px;
    }
    
    p {
        margin: 0;
        font-size: 13px;
    }
    
    a {
        text-decoration: none;
        color: #06C;
        font-weight: bold;
    }
</style>

<body>
    <div class="main-wrapper">
        <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">

            <tr>
                <td align="center" style="background-color:#fd000d">
                    <div style="margin:0 20px; padding: 10px 0;">
                        <p style="font-size:25px;font-weight:bold;text-align:center;color: #fff;">
                            Beta Globleads</p>
                    </div>
                </td>
            </tr>

            <tr>
                <td align="" style="background-color:#fbfbfb">
                    <div style="margin:0 20px">
                        <p style="font-size:15px;color: #333;margin:15px 0;text-align:left;">
                            Upon logging in, you will be able to access other services including reviewing past orders, printing invoices and editing your account information.</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="" style="background-color:#fff">
                    <table cellpadding="0" cellspacing="0" border="0" style="width: 91%;margin: 0 4%;">
                        <tr>
                            <td width="40%">
                                <div style="padding:10px 0 0px  0;width:100%">
                                    <p style="color:#333;font-size:15px;margin-bottom:5px;margin-top: 0;letter-spacing: 0.5px;text-align:left">Email</p>
                                </div>
                            </td>

                            <td width="60%">
                                <div style="padding:5px 0 0px 0;width:100%;float:right">
                                    <p style="color:#333;font-size:15px;margin-bottom:5px;margin-top: 0;letter-spacing: 0.5px; text-align:left">{{$email}}</p>

                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td width="40%">
                                <div style="padding:5px 0;width:100%">
                                    <p style="color:#333;font-size:15px;margin-bottom:5px;margin-top: 0;letter-spacing: 0.5px;text-align:left">Subject</p>

                                </div>
                            </td>

                            <td width="60%">
                                <div style="padding:5px 0;width:100%;float:right">
                                    <p style="color:#333;font-size:15px;margin-bottom:5px;margin-top: 0;letter-spacing: 0.5px; text-align:left">{{$subject}}</p>

                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td width="40%">
                                <div style="padding:5px 0;width:100%">
                                    <p style="color:#333;font-size:15px;margin-bottom:5px;margin-top: 0;letter-spacing: 0.5px;text-align:left">Message</p>

                                </div>
                            </td>

                            <td width="60%">
                                <div style="padding:5px 0;width:100%;float:right">
                                    <p style="color:#333;font-size:15px;margin-bottom:5px;margin-top: 0;letter-spacing: 0.5px; text-align:left">{{$messagetext}}</p>

                                </div>
                            </td>
                        </tr>
                        
                    </table>
            </tr>
            <tr>
                <td align="" style="background-color:#fbfbfb">
                    <div style="margin:10px 20px 0">
                        <p style="font-size:15px;color: #333;margin:0;text-align:left;">
                            Your account has now been created and you can log in by using your email address and password by visiting our website or at the following URL:</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="" style="background-color:#fbfbfb">
                    <div style="margin:0 20px">
                        <p style="font-size: 13px;margin:30px 0 0 0;color:#333">Thanks,</p>
                    </div>
                </td>
            </tr>

            <tr>
                <td align="" style="background-color:#fbfbfb">
                    <div style="margin:0 20px">
                        <p style="font-size: 23px;margin: 0;font-weight: bold;color:#fd000d;padding-bottom:25px;">beta.globleads.com</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>