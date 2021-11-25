@extends('emails.layouts.app')
    @section('content')
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="color:#141414; font-size:15px;">@lang('custom_api.label_hello') @lang('custom_api.label_administrator'),</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
		<tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
			<td>@lang('custom_api.message_contact_to_super_admin')</td>
		</tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
		<tr>
			<td>
			  <table width="100%" border="0" cellspacing="0" cellpadding="5">
				<tr>
				  	<td width="20%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_name')</td>
				  	<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
				  	<td width="88%" align="left" valign="top" style="line-height:20px;">{{ ucwords($details['name']) }}</td>
				</tr>
				<tr>
				  	<td width="20%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_email')</td>
				  	<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
				  	<td width="88%" align="left" valign="top" style="line-height:20px;">{{ $details['email'] }}</td>
				</tr>
				<tr>
				  	<td width="20%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_message')</td>
				  	<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
				  	<td width="88%" align="left" valign="top" style="line-height:20px;">{{ $details['message'] }}</td>
				</tr>
			  </table>
			</td>
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
            <td style="color:#141414; font-size:15px; line-height: 20px;">@lang('custom_api.label_thanks_and_regards'),<br>{{$siteSetting['website_title']}}</td>
        </tr>
    </table>
    
    @endsection