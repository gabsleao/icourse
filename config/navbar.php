<!-- icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- algumas coisas do bootstrap 3.3.7 sao necessárias na navbar -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
	body {
		background: #eeeeee;
		padding-top: 70px;
	}

	.form-inline {
		display: inline-block;
	}

	.navbar {
		background: #fff;
		padding-left: 16px;
		padding-right: 16px;
		border-bottom: 1px solid #d6d6d6;
		box-shadow: 0 0 4px rgba(0, 0, 0, .1);
	}

	.nav img {
		border-radius: 50%;
		width: 36px;
		height: 36px;
		margin: -8px 0;
		float: left;
		margin-right: 10px;
	}

	.navbar .navbar-brand {
		color: #555;
		padding-left: 0;
		padding-right: 50px;
		font-family: 'Merienda One', sans-serif;
	}

	.navbar .navbar-brand i {
		font-size: 20px;
		margin-right: 5px;
	}

	.search-box {
		position: relative;
	}

	.search-box input {
		box-shadow: none;
		padding-right: 35px;
		border-radius: 3px !important;
	}

	.search-box .input-group-addon {
		min-width: 35px;
		border: none;
		background: transparent;
		position: absolute;
		right: 0;
		z-index: 9;
		padding: 7px;
		height: 100%;
	}

	.search-box i {
		color: #a0a5b1;
		font-size: 19px;
	}

	.navbar ul li i {
		font-size: 18px;
	}

	.navbar .dropdown-menu i {
		font-size: 16px;
		min-width: 22px;
	}

	.navbar .dropdown.open>a {
		background: none !important;
	}

	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: #e5e5e5;
		box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
	}

	.navbar .dropdown-menu li a {
		color: #777;
		padding: 8px 20px;
		line-height: normal;
	}

	.navbar .dropdown-menu li a:hover,
	.navbar .dropdown-menu li a:active {
		color: #333;
	}

	.navbar .dropdown-menu .material-icons {
		font-size: 21px;
		line-height: 16px;
		vertical-align: middle;
		margin-top: -2px;
	}

	.navbar .badge {
		background: #f44336;
		font-size: 11px;
		border-radius: 20px;
		position: absolute;
		min-width: 10px;
		padding: 4px 6px 0;
		min-height: 18px;
		top: 5px;
	}

	.navbar ul.nav li a.notifications,
	.navbar ul.nav li a.messages {
		position: relative;
		margin-right: 10px;
	}

	.navbar ul.nav li a.messages {
		margin-right: 20px;
	}

	.navbar a.notifications .badge {
		margin-left: -8px;
	}

	.navbar a.messages .badge {
		margin-left: -4px;
	}

	.navbar .active a,
	.navbar .active a:hover,
	.navbar .active a:focus {
		background: transparent !important;
	}

	@media (min-width: 1200px) {
		.form-inline .input-group {
			width: 300px;
			margin-left: 30px;
		}
	}

	@media (max-width: 1199px) {
		.form-inline {
			display: block;
			margin-bottom: 10px;
		}

		.input-group {
			width: 100%;
		}
	}

	.fa-map-marker {
		margin-right: 7px;
	}
</style>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="./index.php"><img src="./assets/brand/favicon.svg" height="25px" width="50px"></a>
			<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
				<span class="navbar-toggler-icon"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div id="navbarCollapse" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="./index.php">Home</a></li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">Níveis Escolares </a>
					<ul class="dropdown-menu">
						<li><a href="#">Ensino Infantil</a></li>
						<li><a href="#">Ensino Fundamental</a></li>
						<li><a href="#">Ensino Médio</a></li>
						<li><a href="#">Ensino Técnico</a></li>
						<li><a href="#">Graduação</a></li>
						<li><a href="#">Pós-Graduação</a></li>
						<li><a href="#">Idiomas</a></li>
					</ul>
				</li>
				<!-- meio inutil nesse projeto, melhor em um site institucional -->
				<!-- <li><a href="#">Sobre nós</a></li> -->
				<li><a href="#">Suporte</a></li>
			</ul>

			<form class="navbar-form form-inline">
				<div class="input-group search-box">
					<input type="text" id="search" class="form-control" placeholder="Busque por cursos e instituições">
					<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
				</div>
			</form>

			<!--TODO: adicionar uma animaçãozinha -->
			<div class="form-inline" id="endereco" onclick="getLocation();" style="cursor: pointer;">
				<i class="fa fa-map-marker" aria-hidden="true"></i>Usar o meu endereço
			</div>

			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['iduser'])) { ?>
					<!-- numero de notificações (futuro) -->
					<li><a href="#" class="notifications"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="badge">1</span></a></li>

					<!-- numero de mensagens (futuro) -->
					<li><a href="#" class="messages"><i class="fa fa-envelope-o" aria-hidden="true"></i><span class="badge">10</span></a></li>

				<?php } ?>
				<!-- buscar session do user e popular essas infos dinamicamente (entrega futura) -->
				<li class="dropdown">

					<a href="#" data-toggle="dropdown" class="dropdown-toggle user-action"><img src="<?php echo isset($_SESSION['iduser']) ? 'https://avatars.githubusercontent.com/u/39320521?v=4' : './assets/imagens/avatarguest.jpg'; ?>" class="avatar" alt="Avatar"><?php echo isset($_SESSION['iduser']) ? $_SESSION['nome'] : 'Visitante'; ?> </a>

					<?php if (isset($_SESSION['iduser'])) { ?>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-user-o"></i> Perfil</a></li>
							<li><a href="#"><i class="fa fa-sliders"></i> Configurações</a></li>
							<?php
							if ($_SESSION['tipo'] == 'ADMIN') { ?>
								<li><a href="#" data-toggle="modal" data-target="#modalRegistro"><i class="fa fa-user-o"></i> Registrar Usuário</a></li>
							<?php
							}
							?>
							<li class="divider"></li>
							<li><a href="#" data-toggle="modal" data-target="#modalLogout"><i class="material-icons">&#xE8AC;</i> Sair</a></li>
						</ul>

					<?php } else { ?>
						<ul class="dropdown-menu">
							<li><a href="#" data-toggle="modal" data-target="#modalLogin"><i class="fa fa-sign-in"></i> Logar</a></li>
							<li><a href="#" data-toggle="modal" data-target="#modalRegistro"><i class="fa fa-user-o"></i> Registrar</a></li>
						</ul>
					<?php
					} ?>
				</li>
			</ul>
		</div>
	</nav>

</body>

</html>