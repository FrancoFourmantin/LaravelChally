@extends('layouts/plantilla-mail')
@section('email_usuario' , $notifiable->email)

@section('main')

<div  style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
        
  <table
     align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;"
  >
    <tbody>
      <tr>
        <td
           style="direction:ltr;font-size:0px;padding:0px;text-align:center;"
        >
          <!--[if mso | IE]>
            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
          
  <tr>

      <td
         class="" style="vertical-align:top;width:600px;"
      >
    <![endif]-->
      
<div
   class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"
>
  
<table
   border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"
>
  
      <tr>
        <td
           align="center" style="font-size:0px;padding:10px 25px;padding-top:0;word-break:break-word;"
        >
          
<div
   style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;line-height:30px;text-align:center;color:#1bb76e;"
>{{$notifiable->nombre}}, recibimos una solicitud para cambiar tu contraseña en Chally.</div>

        </td>
      </tr>
    
      <tr>
        <td
           align="center" style="font-size:0px;padding:0px;word-break:break-word;"
        >
          
<table
   border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;"
>
  <tbody>
    <tr>
      <td  style="width:500px;">
        
<img
   height="auto" src="http://localhost:8000/img/emails/password-image.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="500"
/>

      </td>
    </tr>
  </tbody>
</table>

        </td>
      </tr>
    
</table>

</div>

    <!--[if mso | IE]>
      </td>
    
  </tr>

            </table>
          <![endif]-->
        </td>
      </tr>
    </tbody>
  </table>
  
</div>


<!--[if mso | IE]>
    </td>
  </tr>
</table>

<table
   align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
>
  <tr>
    <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
<![endif]-->


<div  style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
  
  <table
     align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;"
  >
    <tbody>
      <tr>
        <td
           style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;"
        >
          <!--[if mso | IE]>
            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
          
  <tr>

      <td
         class="" style="vertical-align:top;width:600px;"
      >
    <![endif]-->
      
<div
   class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"
>
  
<table
   border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"
>
  
      <tr>
        <td
           align="center" style="font-size:0px;padding:10px 25px;padding-top:0;word-break:break-word;"
        >
          
<div
   style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:16px;font-weight:bold;line-height:1;text-align:center;color:#777777;"
>Clickeá acá para generar una nueva contraseña</div>

        </td>
      </tr>
    
      <tr>
        <td
           align="center" vertical-align="middle" style="font-size:0px;padding:10px 25px;word-break:break-word;"
        >
          
<table
   border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;"
>
  <tr>
    <td
       align="center" bgcolor="#1bb76e" role="presentation" style="border:none;border-radius:5px;cursor:auto;mso-padding-alt:10px 25px;background:#1bb76e;" valign="middle"
    >
      <a
         href="http://localhost:8000/password/reset/{{$token}}" style="display:inline-block;background:#1bb76e;color:white;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:5px;" target="_blank"
      >
        CAMBIAR CONTRASEÑA
      </a>
    </td>
  </tr>
</table>

        </td>
      </tr>
    
      <tr>
        <td
           align="center" style="font-size:0px;padding:10px 25px;padding-top:0;word-break:break-word;"
        >
          
<div
   style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:12px;line-height:1;text-align:center;color:#777777;"
>Si el botón no funciona, utiliza el siguiente enlace <a href="http://localhost:8000/password/reset/{{$token}}">http://localhost:8000/password/reset/{{$token}}</a></div>

        </td>
      </tr>
    
      <tr>
        <td
           style="font-size:0px;padding:10px 25px;word-break:break-word;"
        >
          
<p
   style="border-top:solid 1px #e1e2e3;font-size:1px;margin:0px auto;width:100%;"
>
</p>

<!--[if mso | IE]>
  <table
     align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 1px #e1e2e3;font-size:1px;margin:0px auto;width:550px;" role="presentation" width="550px"
  >
    <tr>
      <td style="height:0;line-height:0;">
        &nbsp;
      </td>
    </tr>
  </table>
<![endif]-->


        </td>
      </tr>
    
      <tr>
        <td
           align="center" style="font-size:0px;padding:10px 25px;padding-top:20px;word-break:break-word;"
        >
          
<div
   style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:16px;line-height:1;text-align:center;color:#777777;"
>Por favor, ignorá este mail si no solicitaste cambiar tu contraseña.</div>

        </td>
      </tr>
    
</table>

</div>

    <!--[if mso | IE]>
      </td>
    
  </tr>

            </table>
          <![endif]-->
        </td>
      </tr>
    </tbody>
  </table>
  
</div>


<!--[if mso | IE]>
    </td>
  </tr>
</table>

<table
   align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
>
  <tr>
    <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
<![endif]-->


<div  style="margin:0px auto;max-width:600px;">
  
  <table
     align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"
  >
    <tbody>
      <tr>
        <td
           style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;"
        >
          <!--[if mso | IE]>
            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
          
  <tr>

      <td
         class="" style="vertical-align:top;width:600px;"
      >
    <![endif]-->

@endsection