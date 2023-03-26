<div style="display:flex; justify-content:center">
   <div class="card w-100" >
      <div class="card-body">
         <h5 class="card-title text-center">Novo produto</h5>
         <form action="<?=base_url()?>/produtos/save" method="post" id="form-collaborator">
            <input type="hidden" name="id" value="">
            
            <div class="mb-3">
               <label for="input-name" class="form-label">Nome</label>
               <input type="text" class="form-control" placeholder="Nome" name="name" value="" id="input-name">
            </div>
            <div class="mb-3">
               <label for="input-name" class="form-label">Preço</label>
               <input type="text" class="form-control" placeholder="Preço" name="price" value="" id="input-price">
            </div>
            <div class="mb-3">
               <label for="input-description" class="form-label">Descrição</label>
               <textarea class="form-control" name="description" id="input-description" cols="30" rows="10"></textarea>
            </div>
           
            <div>
               <button  type="submit" class="btn btn-primary">Cadastrar</button>
               <button id="btn-login" type="button" class="btn btn-secondary">Voltar</button>

            </div>
         </form>
      </div>
   </div>
</div>
<script>
  
      
         
   VMasker(document.querySelector('#input-price')).maskMoney({
      // Decimal precision -> "90"
      precision: 2,
      // Decimal separator -> ",90"
      separator: ',',
      // Number delimiter -> "12.345.678"
      delimiter: '.',
      // Money unit -> "R$ 12.345.678,90"
      unit: 'R$',
      // Money unit -> "12.345.678,90 R$"
      // Force type only number instead decimal,
      // masking decimals with ",00"
      // Zero cents -> "R$ 1.234.567.890,00"
   });
   
   


</script>
<script src="<?=base_url('public/assets/js/collaborator/form.js');?>"></script>