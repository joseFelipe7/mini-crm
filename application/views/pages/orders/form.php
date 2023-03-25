<div style="display:flex; justify-content:center">
   <div class="card w-100" >
      <div class="card-body">
         <h5 class="card-title text-center">Novo pedido</h5>
         <form action="<?=base_url()?>/pedidos/save" method="post" id="form-collaborator">
            <input type="hidden" name="id" value="<?= isset($collaborator)?$collaborator->id:0 ?>">
            <div class="mb-3">
               <label for="input-provider" class="form-label">Fornecedor</label>
               <select class="form-control" name="id_provider" id="input-provider">
                  <option selected disabled>Escolha</option>
                  <?php foreach ($provider as $key => $value) { ?>
                     <option value="<?= $value->id; ?>"><?= $value->name; ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="mb-3">
               <label for="input-observation" class="form-label">Observações</label>
               <textarea class="form-control" name="observation" id="input-observation" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
               <label for="input-product" class="form-label">Produtos</label>
               <div style="display: flex">
                  <select class="form-control" name="product" id="input-product">
                     <option value='0' selected disabled>Escolha</option>
                     <?php foreach ($products as $key => $value) { ?>
                        <option value="<?= $value->id; ?>"><?= $value->name; ?></option>
                     <?php } ?>
                  </select>
                  <button type="button" class="btn btn-primary" style="margin-left:15px" id="btn-add-product">Adicionar</button>
               </div>
               
            </div>
            <div class="card mb-3" id="container-products" >
               <div style="display: flex; justify-content: space-between; margin: 0px 15px; margin: 5px 15px; border-bottom: 1px solid; padding: 5px;"> 
                  <div>produto numero 1</div>
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
            <div>
               <button  type="submit" class="btn btn-primary">Cadastrar</button>
               <button id="btn-login" type="button" class="btn btn-secondary">Voltar</button>

            </div>
         </form>
      </div>
   </div>
</div>
<script>
  
      
         
   document.getElementById('btn-add-product').addEventListener('click', ()=>{ let product = document.getElementById("input-product");
      let productText = product.options[product.selectedIndex].text;
      console.log(product.value)
      if(product.value!='0'){
         let hasItem = false
         document.getElementsByName('products[]').forEach(item=>{
            if(item.value == product.value) hasItem = true
         })    
         if(!hasItem){
            document.getElementById('container-products').innerHTML += `
                     <div id='product-line-${product.value}' style="display: flex; justify-content: space-between; margin: 0px 15px; margin: 5px 15px; border-bottom: 1px solid; padding: 5px;"> 
                        <input hidden type="text" value="${product.value}" name="products[]" />
                        <input hidden type="text" id="input-quantity-product-${product.value}" value="1" name="productsQuantity[]" />
                        <div>${productText}</div>
                        <div style="display:flex;">
                           <div>
                              <span onClick="lessProduct(${product.value})">-</span>
                              <span id="quantity-product-${product.value}">1</span>
                              <span onClick="moreProduct(${product.value})">+</span>
                           </div>
                           <button class="btn btn-danger" onClick="removeProduct(${product.value})">X</button>
                        </div>
                     </div>
            `
         }
      }
   })
   function removeProduct(id){
      document.getElementById('product-line-'+id).remove()
   }
   function lessProduct(id){

      let inputQuantityProduct = document.getElementById('input-quantity-product-'+id)
      let quantityProduct = inputQuantityProduct.value

      if(Number(quantityProduct) > 1){
         quantityProduct = Number(quantityProduct)-1

         inputQuantityProduct.value = quantityProduct
         document.getElementById('quantity-product-'+id).innerHTML = quantityProduct
         
      }
   }
   function moreProduct(id){
      let inputQuantityProduct = document.getElementById('input-quantity-product-'+id)
      let quantityProduct = inputQuantityProduct.value

         quantityProduct = 1+Number(quantityProduct)
         console.log(quantityProduct)
         inputQuantityProduct.value = quantityProduct
         document.getElementById('quantity-product-'+id).innerHTML =quantityProduct
      
      
   }
   
   


</script>
<script src="<?=base_url('public/assets/js/collaborator/form.js');?>"></script>