<div style="display:flex; justify-content:center; min-height: 580px;">
   <div class="card  card-custom w-100" >
      <div class="card-body">
         <h5 class="card-title text-center title-card-custom my-4">Novo colaborador</h5>
         <form action="<?=base_url()?>/colaboradores/save" method="post" id="form-collaborator">
            <input type="hidden" name="id" value="<?= isset($collaborator)?$collaborator->id:0 ?>">
            <div class="row mb-2">
               <div class="col-md-2">
                  <label for="input-name" class="form-label text-color-default">Tipo de colaborador</label>
                  <select class="form-control" name="type_collaborator" id="type-collaborator">
                     <option selected disabled>Escolha</option>
                     <option value="1" <?= (isset($collaborator) && $collaborator->type_collaborator==1)?'selected':''; ?>>Usúario</option>
                     <option value="2" <?= (isset($collaborator) && $collaborator->type_collaborator==2)?'selected':''; ?>>Fornecedor</option>
                  </select>
               </div>
               
            </div>
            <div class="row display-collaborator mb-2" style="display:none">
               <div class="col-md-4">
                  <label for="input-name" class="form-label text-color-default">Nome</label>
                  <input type="text" class="form-control" placeholder="Nome" name="name" value="<?= isset($collaborator)?$collaborator->name:'' ?>" id="input-name">
               </div>
               <div class="col-md-5">
                  <label for="input-email" class="form-label text-color-default">Email</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($collaborator)?$collaborator->email:'' ?>" id="input-email">
               </div>
               <div class="col-md-3">
                  <label for="input-pass" class="form-label text-color-default">Senha</label>
                  <input <?= isset($collaborator)?'readonly':''?> type="password" class="form-control" placeholder="Senha" value="<?= isset($collaborator)?$collaborator->email:'' ?>" name="password" id="input-pass">
               </div>
            </div>
            <div class="row display-collaborator mb-2" style="display:none">
               <div class="col-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Endereços</h5>
                        <div class="row mb-3">
                           <div class="col-md-2">
                              <label for="input-name" class="form-label text-color-default">CEP</label>
                              <input type="text" class="form-control" placeholder="Nome" name="name" value="<?= isset($collaborator)?$collaborator->name:'' ?>" id="input-name">
                           </div>
                           <div class="col-md-1">
                              <label for="input-name" class="form-label text-color-default">UF</label>
                              <input type="text" class="form-control" placeholder="Nome" name="name" value="<?= isset($collaborator)?$collaborator->name:'' ?>" id="input-name">
                           </div>
                           <div class="col-md-3">
                              <label for="input-name" class="form-label text-color-default">Cidade</label>
                              <input type="text" class="form-control" placeholder="Nome" name="name" value="<?= isset($collaborator)?$collaborator->name:'' ?>" id="input-name">
                           </div>
                           <div class="col-md-4">
                              <label for="input-name" class="form-label text-color-default">Endereço</label>
                              <input type="text" class="form-control" placeholder="Nome" name="name" value="<?= isset($collaborator)?$collaborator->name:'' ?>" id="input-name">
                           </div>
                           <div class="col-md-2">
                              <label for="input-name" class="form-label text-color-default">Número</label>
                              <input type="text" class="form-control" placeholder="Nome" name="name" value="<?= isset($collaborator)?$collaborator->name:'' ?>" id="input-name">
                           </div>
                        </div>
                        <button class="btn btn-default-custom"><i class="far fa-plus"></i> Adicionar endereço</button>
                        <h6 class="card-subtitle mt-3 text-muted">Endereços do colaborador</h6>
                        <div class="list-group ">
                           <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                 <h5 class="mb-1">Rua proferssor brasilio barni, 301B</h5>
                                 <small>São Paulo/SP</small>
                              </div>
                              <div class="d-flex w-100 justify-content-between">
                                 <small>CEP: 03959-050</small>
                                 <div>
                                    <button class="btn btn-edit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-del"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                 </div>
                              </div>
                           </a>
                           <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">
                                 <h5 class="mb-1">Rua vitorio azzalin, 259A</h5>
                                 <small>São Paulo/SP</small>
                              </div>
                              <div class="d-flex w-100 justify-content-between">
                                 <small>CEP: 03959-050</small>
                                 <div>
                                    <button class="btn btn-edit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-del"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row display-collaborator mb-2" style="display:none">
               <div class="col-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Permissões</h5>
                        <div class="row mb-3">
                           <div class="col-md-3">
                              <label for="input-name" class="form-label text-color-default">Nivel do usuario</label>
                              <select class="form-control" name="permissions_collaborator" id="permissions-collaborator">
                                 <option selected disabled>Escolha</option>
                                 <option value="1">Master</option>
                                 <option value="2">Admin</option>
                                 <option value="3">Usuario</option>
                              </select>
                           </div>
                        </div>
                        <div class="row display-permission mb-3" style="display:none">
                           <div class="col-md-2">
                              <label for="input-name" class="form-label text-color-default">Pagina</label>
                              <select class="form-control" name="type_collaborator" id="type-collaborator">
                                 <option selected disabled>Escolha</option>
                                 <option value="1">Pedidos</option>
                                 <option value="2">Produtos</option>
                              </select>
                           </div>
                           <div class="col-md-2 d-flex align-items-end">
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                 <label for="input-name" class="form-label text-color-default">Visualizar</label>
                              </div>
                           </div>
                           <div class="col-md-2 d-flex align-items-end">
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                 <label for="input-name" class="form-label text-color-default">Editar</label>
                              </div>
                           </div>
                           <div class="col-md-2 d-flex align-items-end">
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                 <label for="input-name" class="form-label text-color-default">Excluir</label>
                              </div>
                           </div>
                        </div>
                        <div class="row display-permission" style="display:none">
                           <div>
                              <button class="btn btn-default-custom"><i class="far fa-plus"></i> Adicionar Permissão</button>
                           </div>
                           <h6 class="card-subtitle mt-3 text-muted">Pemissões do colaborador</h6>
                           <div class="list-group mx-2">
                              <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                 <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Produtos</h5>
                                 </div>
                                 <div class="d-flex w-100 justify-content-between">
                                    <small>Visualizar, Editar</small>
                                    <div>
                                       <button class="btn btn-edit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                                       <button class="btn btn-del"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                    </div>
                                 </div>
                              </a>
                              <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                 <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Pedidos</h5>
                                 </div>
                                 <div class="d-flex w-100 justify-content-between">
                                    <small>Visualizar</small>
                                    <div>
                                       <button class="btn btn-edit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                                       <button class="btn btn-del"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
            
            <!-- <br>
            <br>
            <br>
            <br>
            <br>
            <div class="mb-3">
            <label for="input-name" class="form-label text-color-default">Tipo de colaborador</label>
                  <select class="form-control" name="type_collaborator" id="type-collaborator">
                     <option selected disabled>Escolha</option>
                     <option value="1" <?= (isset($collaborator) && $collaborator->type_collaborator==1)?'selected':''; ?>>Administrativo</option>
                     <option value="2" <?= (isset($collaborator) && $collaborator->type_collaborator==2)?'selected':''; ?>>Fornecedor</option>
                  </select>
           </div>
           <div>
               <div class="mb-3">
                     <label for="input-name" class="form-label text-color-default">Nivel de usuario</label>
                     <select class="form-control" name="type_collaborator" id="type-collaborator">
                        <option selected disabled>Escolha</option>
                        <option value="1" <?= (isset($collaborator) && $collaborator->type_collaborator==1)?'selected':''; ?>>Administrativo</option>
                        <option value="2" <?= (isset($collaborator) && $collaborator->type_collaborator==2)?'selected':''; ?>>Fornecedor</option>
                     </select>
               </div>
               <div class="mb-3">
                  <label for="input-name" class="form-label text-color-default">Nome</label>
                  <input type="text" class="form-control" placeholder="Nome" name="name" value="<?= isset($collaborator)?$collaborator->name:'' ?>" id="input-name">
               </div>
               <div class="mb-3">
                  <label for="input-email" class="form-label text-color-default">Email</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($collaborator)?$collaborator->email:'' ?>" id="input-email">
               </div>
               <div class="mb-3">
                  <label for="input-email" class="form-label text-color-default">Data de Nascimento</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($collaborator)?$collaborator->email:'' ?>" id="input-email">
               </div>
               <?php if(!isset($collaborator)){ ?>
               <div class="mb-3">
                  <label for="input-pass" class="form-label text-color-default">Senha</label>
                  <input <?= isset($collaborator)?'readonly':''?> type="password" class="form-control" placeholder="Senha" value="<?= isset($collaborator)?$collaborator->email:'' ?>" name="password" id="input-pass">
               </div>
               <?php } ?>
               <div class="mb-3">
                  <label for="input-email" class="form-label text-color-default">Endereços</label>
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
           </div> -->
            

            <div>
               <button  type="submit" class="btn btn-primary">Cadastrar</button>
               <button id="btn-login" type="button" class="btn btn-secondary">Voltar</button>

            </div>
         </form>
      </div>
   </div>
</div>
<script src="<?=base_url('public/assets/js/collaborator/form.js');?>"></script>