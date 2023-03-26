<div class="mt-4">
	<div class="card  card-custom">
		<div class="card-body">
			<h5 class="card-title">Pedidos</h5>
			<div class="d-flex justify-content-between mt-4">
				<div class="d-flex flex-column">
					<input type="text" class="form-control"  placeholder="Pesquisar..." id="search-collaborator">
					<small class="text-color-default">Buscar pedidos</small>
				</div>
				<a href="<?= base_url()?>pedidos/novo"> <button  class="btn btn-default-custom">Novo pedidos</button></a>
			</div>
			<table class="table table-striped table-centered mb-0 mt-3">
				<thead class="table-header-custom">
					<tr>
						<th>#</th>
						<th>Fornecedor</th>
						<th>Status do pedido</th>
						<th>Quantidade de itens</th>
						<th>Data do pedido</th>
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
<script src="<?=base_url('public/assets/js/order/list.js');?>"></script>
