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
			<td>@lang('custom_api.message_quote_to_super_admin')</td>
		</tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
		<tr>
			<td>
			  <table width="100%" border="0" cellspacing="0" cellpadding="5">
				<tr>
				  	<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_name')</td>
				  	<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
				  	<td width="40%" align="left" valign="top" style="line-height:20px;">{{ ucwords($details->name) }}</td>
				</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_business_name')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->business_name }}</td>
			  	</tr>
			  	<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_how_many_emplyees')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->how_many_employees }}</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_phone_number')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->phone_number }}</td>
			  	</tr>
			  	<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_email')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->email }}</td>
			  	</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_city')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->city }}</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_hear_about_us')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->hear_about_us }}</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_briefly_describe_your_website')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->website_description }}</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_static_website_html_non_flash')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->static_website_html_non_flash == 'Y')
						@lang('custom_api.label_yes')
					@else
					@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_dynamic_website_flash_website_animated')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->dynamic_website_flash_website_animated == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_static_website_with_flash_intro')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->static_website_with_flash_intro == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_logo_creation')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->logo_creation == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_domain_name_registration')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->domain_name_registration == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_website_maintenance')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->website_maintenance == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_website_hosting')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->website_hosting == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_search_engine_submission')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->search_engine_submission == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_english_language_website')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->english_language_website == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_french_language_website')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->french_language_website == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_bilingual_website')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">
					@if ($details->bilingual_language_website == 'Y')
						@lang('custom_api.label_yes')
					@else
						@lang('custom_api.label_no')
					@endif
					</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_number_of_english_pages_to_create')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->number_of_english_pages }}</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_number_of_english_graphics_to_create')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->number_of_english_graphics }}</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_number_of_french_pages_to_create')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->number_of_french_pages }}</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_number_of_french_graphics_to_create')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->number_of_french_graphics }}</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_target_launch_date')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->day.'/'.$details->month.'/'.$details->year }}</td>
		  		</tr>
				<tr>
					<td width="58%" align="left" valign="top" style="color:#141414; font-weight:bold; line-height:20px;">@lang('custom_api.label_budget')</td>
					<td width="2%" align="left" valign="top" style="line-height:20px;">:</td>
					<td width="40%" align="left" valign="top" style="line-height:20px;">{{ $details->budget }}</td>
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
            <td style="color:#141414; font-size:15px; line-height: 20px;">@lang('custom_api.label_thanks_and_regards'),<br>{{$siteSetting->website_title}}</td>
        </tr>
    </table>
    
    @endsection