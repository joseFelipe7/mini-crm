<div class="mt-4">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Produtos</h5>
			<div style="display: flex; justify-content: space-between;" class="mt-4">
				<div style="display: flex; flex-direction: column;">
					<input type="text" placeholder="Pesquisar..." id="search-collaborator">
					<small>Buscar produtos</small>
				</div>
				<a href="<?= base_url()?>produtos/novo"> <button>Novo produtos</button></a>
			</div>
			<table class="table table-striped table-centered mb-0">
				<thead>
					<tr>
						<th>#</th>
						<th>Produto</th>
						<th>Preço</th>
						<th>Data de cadastro</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody id="tbody-collaborator">
					<?php foreach ($collaborator as $key => $value){ ?>
						<tr>
							<td class="table-user">
								<!-- <img src="assets/images/users/avatar-2.jpg" alt="table-user" class="me-2 rounded-circle" /> -->
								<?= $value->id ?>
							</td>
							<td><?= $value->name ?></td>
							<td><?= $value->email ?></td>
							<td class="table-action">
								<a href="javascript: void(0);" class="action-icon"> <i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
								<a href="javascript: void(0);" class="action-icon"> <i class="fa-sharp fa-solid fa-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
					
					
				</tbody>
			</table>
			<div class="mt-4">
				<ul class="pagination" id="pagination-container">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
					</li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item " aria-current="page">
						<a class="page-link" href="#">2</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</div>

		</div>
	</div>
</div>
<script src="<?=base_url('public/assets/js/product/list.js');?>"></script>
