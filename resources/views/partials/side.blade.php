<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li class="sidebar-search">
				<form id="searchForm" class="form-inline" method="post" action="{{route('searching')}}">
					{{csrf_field()}}
					<div class="input-group custom-search-form">
						<input type="text" class="form-control" placeholder="Search..." name="search" id="search">
						<span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"id="searchFormBtn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
					</div>
				</form>
				<!-- /input-group -->
			</li>
			<li>
				<a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
			</li>
			<li>
				<a href="{{ route('detail') }}"><i class="fa fa-table fa-fw"></i> Detailed</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-wrench fa-fw"></i> Add<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ route('home') }}">Coin</a>
					</li>
					<li>
						<a href="{{ route('home') }}">Roll</a>
					</li>
					<li>
						<a href="{{ route('home') }}">Folder</a>
					</li>
					<li>
						<a href="{{ route('home') }}">Set</a>
					</li>
					<li>
						<a href="{{ route('home') }}"> Collection</a>
					</li>
					<li>
						<a href="{{ route('home') }}">Bag</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="{{ route('catList') }}"><i class="fa fa-dashboard fa-fw"></i> Categories</a>
			</li>
			<li>
				<a href="{{ route('getCommemoratives') }}"><i class="fa fa-dashboard fa-fw"></i> Commemoratives</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Metal<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ route('getMetal', ['Gold']) }}">Gold</a>
					</li>
					<li>
						<a href="{{ route('getMetal', ['Silver']) }}">Silver</a>
					</li>
					<li>
						<a href="{{ route('getMetal', ['Platinum']) }}">Platinum</a>
					</li>

				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Designs<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{!! route('getDesign', ['Liberty_Cap']) !!}">Liberty Cap</a>
					</li>
					<li>
						<a href="{!! route('getDesign', ['Draped_Bust']) !!}">Draped Bust</a>
					</li>
					<li>
						<a href="{!! route('getDesign', ['Seated_Liberty']) !!}">Seated</a>
					</li>
					<li>
						<a href="{!! route('getDesign', ['Barber']) !!}">Barber</a>
					</li>
					<li>
					<li><a href="{!! route('getDesign', ['Flowing_Hair']) !!}">Flowing Hair</a></li>
					</li>

				</ul>
				<!-- /.nav-second-level -->
			</li>
				@stack('side-menu')
			<li>
				<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Bulk<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ route('catList') }}">Rolls</a>
					</li>
					<li>
						<a href="{{ route('home') }}">Folders</a>
					</li>
					<li>
						<a href="{{ route('catList') }}">Bags</a>
					</li>
					<li>
						<a href="{{ route('home') }}">Mint Sets</a>
					</li>
					<li>
						<a href="{{ route('catList') }}">First Day</a>
					</li>

				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="{{ route('home') }}"><i class="fa fa-table fa-fw"></i> Tables</a>
			</li>
			<li>
				<a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
			</li>

			<li>
				<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ route('home') }}">Second Level Item</a>
					</li>
					<li>
						<a href="{{ route('home') }}">Second Level Item</a>
					</li>
					<li>
						<a href="#">Third Level <span class="fa arrow"></span></a>
						<ul class="nav nav-third-level">
							<li>
								<a href="{{ route('home') }}">Third Level Item</a>
							</li>
							<li>
								<a href="{{ route('home') }}">Third Level Item</a>
							</li>
							<li>
								<a href="{{ route('home') }}">Third Level Item</a>
							</li>
						</ul>
						<!-- /.nav-third-level -->
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li class="active">
				<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="active" href="blank.html">Blank Page</a>
					</li>
					<li>
						<a href="login.html">Login Page</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->