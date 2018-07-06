<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>eDoc 24x7</title>
</head>
<body style="margin: 0; padding: 0;">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="center" style="background: #f5f5f5; padding: 20px 0 20px 0; font-family: Helvetica , Arial, sans-serif; font-size: 16px;">
				<table cellpadding="0" cellspacing="0" width="800" align="center">
					<tr>
						<td style="width: 800px; background: #ffffff;">
							<table cellpadding="0" cellspacing="0" width="100%">
								<tr style="background-color:#00bed0">
									<td style="padding: 10px 0px 10px 0px;text-align: center;">
										<a href="{{ url('/') }}" target="_blank">
											<img src="{{asset('images/dashboard-logo.png') }}"> 
										</a>
									</td>
								</tr>
								<tr>
									<td style="padding: 30px 10px 0 10px;">Hi {{ title_case($name) }},</td>
								</tr>
								<tr>
									<td style="padding: 10px;">Admin has {{ $status }} your payment.</td>
								</tr>
								<tr>
									<td style="padding: 10px;">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="padding: 0px 0 20px 0;">
													Any questions please contact our support team on 
													<a href="mailTo:info@edoc24x7.com">info@edoc24x7.com</a>.
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 20px 0;">Thank you</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 10px 0;">
													<strong>eDoc 24x7</strong>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0px 0px 0px;">
													<a href="tel:+919726481969" style="text-decoration: none; color: #000;">
														+91-9726481969
													</a>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 0px 0;">
													<a href="mailto:info@edoc24x7.com" style="text-decoration: none; color: #000;">
														info@edoc24x7.com
													</a>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 20px 0;">
													<a href="http://www.edoc24x7.com/" style="text-decoration: none; color: #000;" target="_blank">
														www.edoc24x7.com
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="padding: 10px; background: #00bed0; text-align: center; font-size: 16px; color: #ffffff;" align="center">© <?= date('Y'); ?> 
										eDoc 24x7
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