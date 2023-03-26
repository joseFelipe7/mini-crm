<div style="display:flex; justify-content:center">
   <div class="card  card-custom w-100" >
      <div class="card-body">
         <h5 class="card-title text-center">Novo colaborador</h5>
         <form action="<?=base_url()?>/colaboradores/save" method="post" id="form-collaborator">
            <input type="hidden" name="id" value="<?= isset($collaborator)?$collaborator->id:0 ?>">
            <div class="mb-3">
               <label for="input-name" class="form-label">Tipo de colaborador</label>
               <select class="form-control" name="type_collaborator" id="type-collaborator">
                  <option selected disabled>Escolha</option>
                  <option value="1" <?= (isset($collaborator) && $collaborator->type_collaborator==1)?'selected':''; ?>>Administrativo</option>
                  <option value="2" <?= (isset($collaborator) && $collaborator->type_collaborator==2)?'selected':''; ?>>Fornecedor</option>
               </select>
           </div>
           <div>
               <div class="mb-3">
                     <label for="input-name" class="form-label">Nivel de usuario</label>
                     <select class="form-control" name="type_collaborator" id="type-collaborator">
                        <option selected disabled>Escolha</option>
                        <option value="1" <?= (isset($collaborator) && $collaborator->type_collaborator==1)?'selected':''; ?>>Administrativo</option>
                        <option value="2" <?= (isset($collaborator) && $collaborator->type_collaborator==2)?'selected':''; ?>>Fornecedor</option>
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
                  <label for="input-email" class="form-label">Data de Nascimento</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($collaborator)?$collaborator->email:'' ?>" id="input-email">
               </div>
               <?php if(!isset($collaborator)){ ?>
               <div class="mb-3">
                  <label for="input-pass" class="form-label">Senha</label>
                  <input <?= isset($collaborator)?'readonly':''?> type="password" class="form-control" placeholder="Senha" value="<?= isset($collaborator)?$collaborator->email:'' ?>" name="password" id="input-pass">
               </div>
               <?php } ?>
               <div class="mb-3">
                  <label for="input-email" class="form-label">Endereços</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($collaborator)?$collaborator->email:'' ?>" id="input-email">
               </div>
               <div class="card mb-3" id="container-products" >
                  <div style="display: flex; justify-content: space-between; margin: 0px 15px; margin: 5px 15px; border-bottom: 1px solid; padding: 5px;"> 
                     <div>Endereço 1</div>
                     <div style="display:flex;">
                        <div style="background: #ba79f5; border-radius: 5px; display: flex; align-items: center; margin-right: 10px; ">
                           <span style="cursor:pointer; border-radius: 5px; padding: 10px; background:#ba79f5;">-</span>
                           <span>5</span>
                           <span style="cursor:pointer; border-radius: 5px; padding: 10px; background:#ba79f5;">+</span>
                        </div>
                        <button type="button" class="btn btn-danger">X</button>
                     </div>
                     
                  </div>
               </div>
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