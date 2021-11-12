<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailTemplates extends Controller {

	protected $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Envelop</title>
      <style type="text/css">
      /*Hotmail and Yahoo specific code*/
      .ReadMsgBody { width: 100%;}.ExternalClass { width: 100%;}.yshortcuts { color: #ffffff;}
      .yshortcuts a span { color: #ffffff; border-bottom: none !important; background: none !important;
      }
      /*Hotmail and Yahoo specific code*/
      body {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-font-smoothing: antialiased;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
      }
       @media only screen and (max-width: 599px) {
      body { width: auto !important;}
      table[class="table"] { max-width: 630px !important; width: 100% !important;}
      img[class="banner"] { max-width:590px !important; width: 100% !important; height: auto; display: block;}
      img[class="img186"] { max-width: 186px !important; width: 100% !important; height: auto; display: block;}
      img[class="img268"] { max-width:268px !important; width: 100% !important; height: auto; display: block;}
      img[class="border"] { max-width:580px !important; width: 100% !important; height: auto; display: block;}
      td[class="erase"] { width:0 !important; display: none !important;}
      td[class="small"] { width:5px !important;}
      td[class="small2"] { width:5px; display:block;}
      td[class="button"] { max-width:100px; display:block;}
      td[class="con_text"]{max-width:180px !important; width:100% !important; height:auto; display:block; margin:0 auto;}
      td[class="con_text2"]{max-width:180px !important; width:100% !important; height:auto; display:block; margin:15px auto; margin-bottom:inherit !important;}
      }
       @media only screen and (max-width: 479px) {
      body { width: auto !important;}
      table[class="table"] { max-width: 630px !important; width: 100% !important;}
      img[class="img186"] { max-width:268px !important; width:100%; height: auto; display: block;}
      img[class="banner"] { max-width: 600px !important; width: 100% !important; height: auto; display: block;}
      td[class="logo"] { max-width: 176px !important; width: 100% !important; height: auto; margin:0 auto !important; display: block;}
      img[class="border"] { max-width:268px !important; width: 100% !important; height: auto; display: block; overflow:hidden !important;}
      td[class="box1"] { max-width:268px !important; width:100% !important; height:auto; display:block; margin:0 auto;}
      td[class="box2"] { max-width:268px !important; width: 100% !important; height: auto; display: block; margin: 18px auto; margin-bottom: inherit;}
      td[class="box3"] { max-width:268px !important; width:100% !important; height:auto; display:block; margin:0 auto;}
      td[class="box4"] { max-width:268px !important; width: 100% !important; height: auto; display: block; margin: 20px auto; margin-bottom: inherit; border-top:1px solid #EBEFF2; padding-top:18px;}
      td[class="box5"] { max-width:268px !important; width:100% !important; height:auto; display:block; margin:0 auto;}
      td[class="box6"] { max-width:268px !important; width: 100% !important; height: auto; display: block; margin: 20px auto; margin-bottom: inherit;}
      td[class="border"] { width: 0px; display: none;}
      td[class="hide"] { width: 0px; display: none;}
      td[class="social_logo"] { max-width:140px !important; width:100% !important; height:auto; display:block; margin:12px auto; margin-bottom:inherit;}
      td[class="hide1"] { width:0; display:none;}
      td[class="font"] { font-size:16px !important;}
      td[class="menu_left"]{max-width:300px !important; width:100% !important; height:auto; display:block; margin:0 auto; padding-bottom:10px;}
      td[class="menu_right"]{max-width:300px !important; width:100% !important; height:auto; display:block; margin:0 auto; margin-bottom:inherit; border-top:1px solid #86D6EE; padding-top:10px;}
      td[class="small2"] { width:0px; display:none;}
      td[class="con_text"]{max-width:180px !important; width:100% !important; height:auto; display:block; margin:0 auto;}
      td[class="con_text2"]{max-width:180px !important; width:100% !important; height:auto; display:block; margin:15px auto; margin-bottom:inherit !important;}
      td[class="border001"]{max-width:268px !important; width:100% !important; height:auto; display:block; margin:0 auto; overflow:hidden !important;}
      }
      </style>
      </head>

      <body bgcolor="#EBEFF2" style="margin:0px;">
      <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff">
        <tbody><tr>
          <td valign="top"><table width="630" cellspacing="0" cellpadding="0" border="0" align="center" class="table">
              <tbody><tr>
                <td width="5"></td>
                <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                    <!--==============header area start here===============-->
                    <tbody><tr>
                      <td valign="top" bgcolor="#0b2938" style="border-bottom:1px solid #FFFFFF;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                          <tbody><tr>
                            <td width="20"></td>
                            <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody><tr>
                                  <td height="10"></td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                      <tbody><tr>
                                        <!--==============logo start here===============-->
                                        <td valign="top" class="logo"><a href="#" target="_blank"><img width="118" height="auto" border="0" style="display:block;" src="'.$logo.'" alt=""></a></td>
                                        <!--==============logo end here===============-->
                                        <td width="72%" class="hide1"></td>
                                        <!--social logo start here-->
                                        <td valign="middle" class="social_logo"></td>
                                        <!--social logo end here-->
                                      </tr>
                                    </tbody></table></td>
                                </tr>
                                <tr>
                                  <td height="10"></td>
                                </tr>
                              </tbody></table></td>
                            <td width="20"></td>
                          </tr>
                        </tbody></table></td>
                    </tr>
                    <!--==============header area end here===============-->
                    <!--==============banner area start here===============-->
                    <tr>
                      <td valign="top" bgcolor="#fde6e0"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                          <tbody><tr>
                            <td width="35"></td>
                            <td><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody><tr>
                                  <td height="35"></td>
                                </tr>
                                <!--==============banner start here===============-->
                                <tr>
                                  <td style="background:#fde6e0; line-height:22px; color:#ee3775; text-align:center;"><h1 style="letter-spacing: 8px;font-family: Arial; text-align: center; margin-top: 25px; margin-bottom: 0; color: #111111;  font-weight: 100; font-size: 20px;" class="border">&nbsp;&nbsp;'.$bannertext.' &nbsp;&nbsp; </h1><br><span style="text-align:center;"></span><h5 style="color: #737272;display: block; font-family:Times New Roman; font-size: 19px; font-style: italic; letter-spacing:5px; margin-top:15px; margin-bottom:29px; text-align: center;"</h5></td>
                                </tr>
                                <!--==============banner end here===============-->
                                <tr>
                                  <td height="15"></td>
                                </tr>
                                <tr>
                                  <td height="15"></td>
                                </tr>
                              </tbody></table></td>
                            <td width="35"></td>
                          </tr>
                        </tbody></table></td>
                    </tr>
                    <!--==============banner area end here===============-->
                    <!--==============content area start here===============-->
                    <tr>
                      <td valign="top" bgcolor="#FFFFFF" style="border-left:solid 1px #ccc; border-right:solid 1px #ccc;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                          <tbody><tr>
                            <td width="20"></td>
                            <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody>



                                <!--==============part5 start here===============-->
                                <tr>
                                  <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                      <tbody><tr>
                                        <td width="100%" valign="top" bgcolor="#FFFFFF" class="box5"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr>
                                              <td width="12"></td>
                                              <td valign="top"><table bgcolor="#FFFFFF" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                  <tbody><tr>
                                                    <td height="12"></td>
                                                  </tr>
                                                  <tr>
                                                    <td height="8" style="font-family:Arial, Trebuchet MS, Helvetica, sans-serif; font-size:20px; line-height:24px; color:#666666;text-align:center;"><strong> Order Details are as Follows</strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td height="8"></td>
                                                  </tr>';
                                                  if (!empty($storename)) {
                                                   $body.='<tr>
                                                    <td style="font-family:Arial, Trebuchet MS, Helvetica, sans-serif; font-size:14px; line-height:24px; color:#666666;"><strong>Store Name: </strong> '.$storename.'</td>
                                                  </tr>';
                                              		}
                                                  $body.='<tr>
                                                    <td style="font-family:Arial, Trebuchet MS, Helvetica, sans-serif; font-size:14px; line-height:24px; color:#666666;"><strong>Contact Person: </strong> '.$con_person.'</td>
                                                  </tr>
                                                  <tr>
                                                    <td style="font-family:Arial, Trebuchet MS, Helvetica, sans-serif; font-size:14px; line-height:24px; color:#666666;"><strong>Email: </strong> '.$email.'</td>
                                                  </tr>
                                                   <tr>
                                                    <td style="font-family:Arial, Trebuchet MS, Helvetica, sans-serif; font-size:14px; line-height:24px; color:#666666;"><strong>Phone No: </strong> '.$phone.'</td>
                                                  </tr>';
                                                  if (!empty($storename)) {
                                                  $body.='<tr>
                                                    <td style="font-family:Arial, Trebuchet MS, Helvetica, sans-serif; font-size:14px; line-height:24px; color:#666666;"><strong>Website: </strong> '.$website.'</td>
                                                  </tr>
                                                  <tr>
                                                    <td style="font-family:Arial, Trebuchet MS, Helvetica, sans-serif; font-size:14px; line-height:24px; color:#666666;"><strong>How Did You Find Us?: </strong> '.$find_us.'</td>
                                                  </tr>';
                                                  }
                                                  $body.='<tr>
                                                    <td style="font-family:Arial, Trebuchet MS, Helvetica, sans-serif; font-size:14px; line-height:24px; color:#666666;"><strong>Comment: </strong> '.$comment.'</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="14"></td>
                                                  </tr>
                            <tr>
                                                    <td height="14"></td>
                                              </tr>
                            <tr>
                                                    <td height="14"></td>
                                                  </tr>
                            <tr>
                                                    <td height="14"></td>
                                                  </tr>
                            <tr>
                                                    <td style="font-family:Arial, Trebuchet MS, Helvetica, sans-serif; font-size:14px; line-height:24px; color:#666666;">Thank You!</td>
                                                  </tr>
                            <tr>
                                                    <td height="14"></td>
                                                  </tr>
                            <tr>
                                                    <td height="14"></td>
                                                  </tr>
                            <tr>
                                                    <td height="14"></td>
                                                  </tr>
                                                  <tr>
                                                    <td height="14"></td>
                                                  </tr>
                                                  <tr>
                                                    <td height="18"></td>
                                                  </tr>
                                                </tbody></table></td>
                                              <td width="12"></td>
                                            </tr>
                                          </tbody></table></td>
                                        <td width="24" class="hide"></td>

                                      </tr>
                                    </tbody></table></td>
                                </tr>

                                <tr>
                                  <td height="20"></td>
                                </tr>
                              </tbody></table></td>
                            <td width="20"></td>
                          </tr>
                        </tbody></table></td>
                    </tr>
                    <!--==============content area end here===============-->
                    <!--==============footer area start here===============-->
                    <tr>
                      <td valign="top" bgcolor="#252525" style="border-top:4px solid #1F2A37;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                          <tbody><tr>
                            <td width="20"></td>
                            <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody><tr>
                                  <td height="20"></td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                      <tbody><tr>
                                        <td valign="top" class="con_text"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr>
                                              <td valign="top"><img width="29" height="29" style="display:block;" src="'.$emailicon.'" alt=""></td>
                                              <td width="10"></td>
                                              <td valign="middle" style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:12px; line-height:22px; color:#eeeeee;"><strong>Email Us</strong>: <a href="mailto:info@zipcodecals.com" target="_top">info@zipcodecals.com</a></td>
                                            </tr>
                                          </tbody></table></td>
                                        <td width="20" class="erase"></td>
                                        <td width="20" class="erase"></td>
                                        <td valign="top" class="con_text2"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr>
                                              <td valign="top"><img width="29" height="29" style="display:block;" src="'.$webicon.'" alt=""></td>
                                              <td width="10"></td>
                                              <td valign="middle" style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:12px; line-height:22px; color:#eeeeee;"><strong>Web</strong>: <a href="#" target="_blank" style="color:#eeeeee; text-decoration:none;">www.zipcodedecals.com</a></td>
                                            </tr>
                                          </tbody></table></td>
                                      </tr>
                                    </tbody></table></td>
                                </tr>
                                <tr>
                                  <td height="22" style="border-bottom:1px dashed #6f6f6f"></td>
                                </tr>
                                <tr>
                                  <td height="16"></td>
                                </tr>
                                <tr>
                                  <td height="6"></td>
                                </tr>
                                <tr>
                                  <td align="center" style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:12px; line-height:20px; color:#eeeeee;">Copyright &copy; 2017 -&nbsp;&nbsp;  Zipcode,&nbsp;&nbsp; All rights reserved.</td>
                                </tr>
                                <tr>
                                  <td height="20"></td>
                                </tr>
                              </tbody></table></td>
                            <td width="20"></td>
                          </tr>
                        </tbody></table></td>
                    </tr>
                    <!--==============footer area end here===============-->
                  </tbody></table></td>
                <td width="5"></td>
              </tr>
            </tbody></table></td>
        </tr>
      </tbody></table>
      </body></html>';
}
