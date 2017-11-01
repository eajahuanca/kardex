<ul class="nav nav-list">
	<li class="">
		<a href="{{ url('/home') }}">
			<i class="menu-icon fa fa-home"></i>
			<span class="menu-text"> Principal </span>
		</a>
		<b class="arrow"></b>
	</li>

	@if(strcmp(Auth::user()->us_tipo,'ADMINISTRADOR')==0)
	<li class="">
		<a href="{{ url('/user') }}">
			<i class="menu-icon fa fa-user"></i>
			<span class="menu-text">Usuarios</span>
		</a>
		<b class="arrow"></b>
	</li>
	@endif

	<li class="">
		<a href="{{ url('/proveedor') }}">
			<i class="menu-icon fa fa-fire"></i>
			<span class="menu-text"> Proveedores </span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ url('/articulo') }}">
			<i class="menu-icon fa fa-inbox"></i>
			<span class="menu-text">Articulos</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ url('/pcliente') }}">
			<i class="menu-icon fa fa-user"></i>
			<span class="menu-text">Clientes Padres</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ url('/hcliente') }}">
			<i class="menu-icon fa fa-pencil-square-o"></i>
			<span class="menu-text">Clientes Hijos</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ url('/salida') }}">
			<i class="menu-icon fa fa-shopping-cart"></i>
			<span class="menu-text">Salida Articulos</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ url('/kardexin') }}">
			<i class="menu-icon fa fa-desktop"></i>
			<span class="menu-text">Ingreso de Articulos</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ url('/lkardex') }}">
			<i class="menu-icon fa fa-bars"></i>
			<span class="menu-text">Listar Kardex</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ url('/reporteh') }}">
			<i class="menu-icon fa fa-file-pdf-o"></i>
			<span class="menu-text">Reporte Normal</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="{{ url('/reporteph') }}">
			<i class="menu-icon fa fa-file-pdf-o"></i>
			<span class="menu-text">Reporte default</span>
		</a>
		<b class="arrow"></b>
	</li>
</ul><!-- /.nav-list -->