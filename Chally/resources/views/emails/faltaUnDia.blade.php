@extends('layouts/plantilla-mail')
@section('email_usuario' , $usuario->email)
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
              ><strong>{{$usuario->nombre}}</strong>, el desafio <strong>{{$desafio->titulo}}</strong> ya finalizo! Y falta <strong>1 día</strong> para que terminen las votaciones</div>
              
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
                  height="auto" src="http://localhost:8000/img/emails/waiting-woman.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="500"
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
    
    
    <div  style="background:#343a40;background-color:#343a40;margin:0px auto;max-width:600px;">
      
      <table
      align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#343a40;background-color:#343a40;width:100%;"
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
                  style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:16px;line-height:1;text-align:center;color:#ffffff;"
                  >Tienes <strong style="color:red">24hs</strong> desde la finalización del desafio para elegir tu respuesta ganadora</div>
                  
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
                href="http://localhost:8000/votar-desafio/{{$desafio->id}}" style="display:inline-block;background:#1bb76e;color:white;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:5px;" target="_blank"
                  >
                  Votar respuesta
                </a>
              </td>
            </tr>
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
                
                
                
                
                
                