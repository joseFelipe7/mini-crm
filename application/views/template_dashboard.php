<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="position: relative; min-height: 100vh;">
	<?php $this->view('partials/header'); ?>
	<div class="row" style="padding-bottom:150px">
		<div class="col-2 p-0">
			<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 100%; height: 100%; min-height:80vh">
				<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
					<svg class="bi me-2" width="40" height="32">
						<use xlink:href="#bootstrap"></use>
					</svg>
					<span class="fs-4">Sidebar</span>
				</a>
				<hr>
				<ul class="nav nav-pills flex-column mb-auto">
					<li class="nav-item">
						<a href="#" class="nav-link text-white" aria-current="page">
							<svg class="bi me-2" width="16" height="16">
								<use xlink:href="#home"></use>
							</svg>
							Home
						</a>
					</li>
					<li>
						<a href="#" class="nav-link active">
							<svg class="bi me-2" width="16" height="16">
								<use xlink:href="#speedometer2"></use>
							</svg>
							Colaboradores
						</a>
					</li>
					<li>
						<a href="#" class="nav-link text-white">
							<svg class="bi me-2" width="16" height="16">
								<use xlink:href="#table"></use>
							</svg>
							Produtos
						</a>
					</li>
					<li>
						<a href="#" class="nav-link text-white">
							<svg class="bi me-2" width="16" height="16">
								<use xlink:href="#grid"></use>
							</svg>
							Pedidos
						</a>
					</li>
					<li>
						<a href="#" class="nav-link text-white">
							<svg class="bi me-2" width="16" height="16">
								<use xlink:href="#people-circle"></use>
							</svg>
							Customers
						</a>
					</li>
				</ul>
				<hr>
				<div class="dropdown">
					<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
						id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
						<strong>mdo</strong>
					</a>
					<ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
						<li><a class="dropdown-item" href="#">New project...</a></li>
						<li><a class="dropdown-item" href="#">Settings</a></li>
						<li><a class="dropdown-item" href="#">Profile</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="#">Sign out</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-10" style="background-color:#f0f8ff">
			<div class="container mt-5" >
				<?= $contents ?>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<?php $this->view('partials/footer'); ?>
</body>

</html>
