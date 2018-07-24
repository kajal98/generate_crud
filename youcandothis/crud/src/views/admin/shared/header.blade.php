	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				@if(Auth::user()->role == 'admin')
				<a href="/admin">
					<p style="font-size: 15px;">Admin</p>
				</a>
				@else
				<a href="/portal">
					<p style="font-size: 15px;">Portal</p>
				</a>
				@endif
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name">{!! Auth::user()->name !!}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{!! route('get-change-pass') !!}"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
						<a class="dropdown-item" href="{!! route('change-profile') !!}"><i class="fa fa-user" aria-hidden="true"></i> Change Profile</a>
						<a class="dropdown-item" href="{!! route('site-settings-get') !!}"><i class="fa fa-cog" aria-hidden="true"></i> Site Settings</a>
						<a class="dropdown-item" href="{!! route('logout') !!}"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>