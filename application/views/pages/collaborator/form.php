<div style="display:flex; justify-content:center">
   <div class="card w-100" >
      <div class="card-body">
         <h5 class="card-title text-center">Novo colaborador</h5>
         <form action="register" method="post" id="form-collaborator">
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Nome</label>
               <input type="text" class="form-control" placeholder="Nome" name="name" id="input-name">
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Email</label>
               <input type="email" class="form-control" placeholder="Email" name="email" id="input-email">
            </div>
            <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label">Senha</label>
               <input type="password" class="form-control" placeholder="Senha" name="password" id="input-pass">
            </div>
            <div>
               <button  type="submit" class="btn btn-primary">Cadastrar</button>
               <button id="btn-login" type="button" class="btn btn-secondary">Voltar</button>

            </div>
         </form>
      </div>
   </div>
</div>
<script src="<?=base_url('public/assets/js/login.js');?>"></script>