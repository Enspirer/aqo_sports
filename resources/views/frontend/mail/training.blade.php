<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <!-- <td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
              <img src="https://assets.codepen.io/210284/h1.png" alt="" width="300" style="height:auto;display:block;" />
            </td> -->
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 30px 0;color:#153643;" align="left">
                    <h1 style="font-size:20px;margin:0 0 20px 0;font-family:Arial,sans-serif;">AQO Sports and Entertainment - Training</h1>
                  </td>
                  <td style="padding:0 0 30px 0;color:#153643;" align="right">
                    <img src="{{url('img/logo.png')}}" style="width:100%; max-width:60px; margin:0 0 20px 0;">                    
                  </td>
                </tr>
                <tr>
                  <td style="padding:0 0 30px 0;color:#153643;">
                    <p style="color: black; margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Dear {{ $details['first_name'] }},</p>
                    <p style="color: black; margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">We appreciate you contacting us. One of our member will get back in touch with you soon! Have a great day!</p>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">Name:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['first_name'] }} {{ $details['last_name'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">Phone Number:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['time_zone'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">Email Address:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['phone'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">Time Zone:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['email'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">Country:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['country'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">State:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['state'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">Address:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['address'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">City:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['city'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">Postal Code:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['postal_code'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">What Tournament:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['assist_tournament'] }}</td>
                      </tr>
                      <tr>
                        <td style="width:30%; color: black; padding: 6px;font-size:15px;line-height:24px;font-family:Arial,sans-serif;">Questions & Comments:</td>
                        <td style="padding:6px;font-size:15px;vertical-align:top;color:#153643;">{{ $details['questions'] }}</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background:transparent linear-gradient(180deg, #002a89 0%, #002855 100%) 0% 0%;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0;width:50%;" align="center">
                    <p style="margin:0;font-size:20px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                        AQO Sports and Entertainment &reg;
                    </p>
                  </td>
                  <!-- <td style="padding:0;width:50%;" align="right">
                    <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                      </tr>
                    </table>
                  </td> -->
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>