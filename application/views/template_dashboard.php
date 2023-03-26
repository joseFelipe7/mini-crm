<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/gh/lagden/vanilla-masker@lagden/build/vanilla-masker.min.js"></script>

</head>

<style>
body{
	min-height: 100vh;
}
a{
	text-decoration: none; 
}
ul{
	list-style-type: none;
}
.icon-edit{
	color:#f39200
}
.icon-del{
	color:#f30036
}
.btn-edit{
	border: solid 1px #f39200;
    transition: 0.3s;
	color:#f39200
}
.btn-edit:hover{
	color:#FFF;
	background:#f39200
}
.btn-del{
	border: solid 1px #f30036;
    transition: 0.3s;
	color:#f30036
}
.btn-del:hover{
	color:#FFF;
	background:#f30036
}
.container-sidebar{
	width: 100%; 
	height: 100%; 
	min-height:80vh; 
	background:#1b8fc8
}
.option-sidebar{
	padding: 12px;
	transition: 0.3s;
	cursor:pointer;
}
.option-sidebar:hover{
	background: #f39200
}
.option-sidebar.active{
	background: #f39200
}
.option-sidebar span{
	margin-left: 20px; 
	color: #FFF;
}

.nav-container-header{
  display: flex; 
  justify-content: flex-end; 
  width: 100%; align-items: center;
}
.text-color-default{
  color: #666
}
.text-highlighted{
  font-weight: 700; 
  color: #1b8fc8;
}
.btn-default-custom{
  background:#1b8fc8; 
  color:#FFF;
  transition:0.3s;
}
.btn-default-custom:hover{
  background:#f39200; 
  color:#FFF;

}
.line-dividing{
  border-bottom: 1px solid #f39200;  
  width: 100%
}

.table-header-custom tr{
	background: #1b8fc8; 
	color: #fff;
 }

 .card-custom{
	border: none;
    box-shadow: 1.5px 2px 10px;
 }
.title-card-custom{
	font-size: 26px;
    font-weight: 600;
    color: #333;
}

</style>

<body>
	<div class="row m-0" style="min-height: 100vh;" >
		<div class="col-2 p-0">
			<div class="d-flex flex-column flex-shrink-0 container-sidebar text-white">
				<a href="<?= base_url()?>" class="d-flex align-items-center p-3 mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
					<svg class="bi me-2" width="40" height="32">
						<use xlink:href="#bootstrap"></use>
					</svg>
					<span class="fs-4">Mini CRM</span>
				</a>
				<hr>
				<ul class="nav nav-pills flex-column mb-auto">
					<a href="<?= base_url()?>" aria-current="page" style="">
						<li class="option-sidebar <?= $sidebarOption=='home'?'active':'text-white'?>">
							<span>
								<i class="fas fa-home mx-2" style="width:12px;"></i>
								Home
							</span>
								
						</li>
					</a>
					
					
					<a href="<?= base_url()?>colaboradores" >
						<li class="option-sidebar <?= $sidebarOption=='collaborator'?'active':'text-white'?>">
							<span>
								<i class="fas fa-users mx-2" style="width:12px;"></i> Colaboradores
							</span>
						</li>
					</a>


					<a href="<?= base_url()?>produtos">
						<li class="option-sidebar <?= $sidebarOption=='product'?'active':'text-white'?>">
							<span>
								<i class="fas fa-boxes mx-2" style="width:12px;"></i> Produtos
							</span>
						</li>
					</a>

					<a href="<?= base_url()?>pedidos">
						<li class="option-sidebar <?= $sidebarOption=='order'?'active':'text-white'?>">
							<span>
								<i class="fas fa-clipboard-list mx-2" style="width:12px;"></i> Pedidos
							</span>
						</li>
					</a>

				</ul>
				<!--<hr>
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
				</div> -->
			</div>
		</div>
		<div class="col-10 p-0" style="background-color:#f0f8ff; display: flex; flex-direction: column; justify-content: space-between">
			<?php $this->view('partials/header'); ?>
			<div class="container mt-5" >
				<?= $contents ?>
			</div>
			<?php $this->view('partials/footer'); ?>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	
</body>

</html>
