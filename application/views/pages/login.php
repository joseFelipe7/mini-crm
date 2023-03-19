<div style="display:flex; justify-content:center">
   <div class="card" style="width: 18rem;">
      <div class="card-body">
         <h5 class="card-title">Login</h5>
         <form action="login/singin" method="post" id="form-login">
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Email address</label>
               <input type="email" class="form-control" placeholder="Email" name="email" id="input-email">
               <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label">Password</label>
               <input type="password" class="form-control" placeholder="Senha" name="password" id="input-pass">
            </div>
            <div class="mb-3 form-check">
               <input type="checkbox" class="form-check-input" id="exampleCheck1">
               <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button id="btn-login" type="button" class="btn btn-primary">Submit</button>
         </form>
      </div>
   </div>
</div>


<script src="<?=base_url('public/assets/js/login.js');?>"></script>
