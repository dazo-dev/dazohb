<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Demystifying Email Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <style type="text/css">
    a[x-apple-data-detectors] {color: inherit !important;}
  </style>

</head>
<body style="margin: 0; padding: 0;">
  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td style="padding: 20px 0 30px 0;">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
  <tr>
    <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;background-color: black;color: #fff;">
      <img src="https://scontent.fcrk1-1.fna.fbcdn.net/v/t1.0-9/120512493_150040810121381_7503650522071299891_o.jpg?_nc_cat=103&ccb=2&_nc_sid=09cbfe&_nc_ohc=-GWpiMipEdgAX-2zqE8&_nc_ht=scontent.fcrk1-1.fna&oh=ba56c8ee25cc8a9487f73cd7cf35f8f0&oe=5FED13C4" alt="DazoPh" width="300" height="230" style="display: block;" />
    </td>
  </tr>
  <tr>
    <td bgcolor="#454545" style="padding: 40px 30px 40px 30px;">
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <tr>
          <td style="color: #ffff; font-family: Arial, sans-serif;">
            <h1 style="font-size: 24px; margin: 0;">Welcome to Dazo Philippines!</h1>
          </td>
        </tr>
        <tr>
          <td style="color: #ffff; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
            <p style="margin: 0;">
              Hi! Customer,
              <br><br>
              We in Dazo would like to welcome you in joining Dazo Philippines.
              <br>
              To complete your registration, please use the Authentication Code below.
            </p>
            <br>
            <p>
              {{url('/')}}/verifyChangePass/{{ Auth::user()->id }}/{{ $details['newpassword'] }}
            </p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td bgcolor="#ee4c50" style="padding: 30px 30px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <tr>
          <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
            <p style="margin: 0;">&reg; Dazo Ph 2020<br/>
           <!-- <a href="#" style="color: #ffffff;">Unsubscribe</a> to this newsletter instantly</p> -->
          </td>
          <td align="right">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
              <tr>
                <td>
                  <a href="http://www.twitter.com/">
                    <img src="https://assets.codepen.io/210284/tw.gif" alt="Twitter." width="38" height="38" style="display: block;" border="0" />
                  </a>
                </td>
                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                <td>
                  <a href="http://www.facebook.com/">
                    <img src="https://assets.codepen.io/210284/fb.gif" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
                  </a>
                </td>
              </tr>
            </table>
          </td>
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
