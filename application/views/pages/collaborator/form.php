<div style="display:flex; justify-content:center">
   <div class="card w-100" >
      <div class="card-body">
         <h5 class="card-title text-center">Novo colaborador</h5>
         <form action="<?=base_url()?>/colaboradores/save" method="post" id="form-collaborator">
            <input type="hidden" name="id" value="<?= isset($collaborator)?$collaborator->id:0 ?>">
            <div class="mb-3">
               <label for="input-name" class="form-label">Tipo de colaborador</label>
               <select class="form-control" name="type_collaborator" id="type-collaborator">
                  <option selected disabled>Escolha</option>
                  <option value="1">Administrativo</option>
                  <option value="2">Fornecedor</option>
               </select>
           </div>
            <div class="mb-3">
               <label for="input-name" class="form-label">Nome</label>
               <input type="text" class="form-control" placeholder="Nome" name="name" value="<?= isset($collaborator)?$collaborator->name:'' ?>" id="input-name">
            </div>
            <div class="mb-3">
               <label for="input-email" class="form-label">Email</label>
               <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($collaborator)?$collaborator->email:'' ?>" id="input-email">
            </div>
            <div class="mb-3">
               <label for="input-pass" class="form-label">Senha</label>
               <input <?= isset($collaborator)?'readonly':''?> type="password" class="form-control" placeholder="Senha" value="<?= isset($collaborator)?$collaborator->email:'' ?>" name="password" id="input-pass">
            </div>
            <div>
               <button  type="submit" class="btn btn-primary">Cadastrar</button>
               <button id="btn-login" type="button" class="btn btn-secondary">Voltar</button>

            </div>
         </form>
      </div>
   </div>
</div>
<script src="<?=base_url('public/assets/js/collaborator/form.js');?>"></script>