@extends('emails.layouts.app')
    @section('content')
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="color:#141414; font-size:15px;">@lang('custom_admin.label_hello') {{ucwords($user['first_name'])}},</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><a href="{{route('admin.reset-password', $encryptedString)}}" style="color: #1316f7; text-decoration: underline;">@lang('custom_admin.message_admin_reset_password_click_here')</a> @lang('custom_admin.message_reset_your_password').</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>     
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="color:#141414; font-size:15px; line-height: 20px;">@lang('custom_admin.label_thanks_and_regards'),<br>{!! $siteSetting->website_title !!}<br>{!! $siteSetting->tag_line !!}</td>
        </tr>
    </table>
    
    @endsection