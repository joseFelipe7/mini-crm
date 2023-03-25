
document.addEventListener('DOMContentLoaded', async function() {
   console.log('document is ready. I can sleep now');
   await listCollaborator()
})

async function listPagination(){
   let searchCollaborator = document.getElementById('search-collaborator')
   let request = await fetch(`http://localhost/login/api/order?page=${page}&filter[search]=${searchCollaborator.value}`,{
      method:"GET",
      headers:{
            "Content-Type":'application/json'
      }
   })
   let dataJson = await request.json()
   if(!request.ok){
      return alert(dataJson.message)
   }
}
async function pagination(pageData){
   //let pageData = dataJson.meta.page
   
   let indexStart = pageData.current_page-2>=1?pageData.current_page-2:1
   let indexEnd = indexStart+4<=pageData.last_page?indexStart+4:pageData.last_page

   let pagination = ''
   for(let i = indexStart; i<= indexEnd;i++){
      pagination+=`<li class="page-item ${i==pageData.current_page?'active':''}" onClick="listCollaborator(${i})"><a class="page-link" href="#">${i}</a></li>`
   }
   document.getElementById('pagination-container').innerHTML = `${pagination}`

}
async function listCollaborator(page = 1){
   let searchCollaborator = document.getElementById('search-collaborator')
   let request = await fetch(`http://localhost/login/api/order?page=${page}&filter[search]=${searchCollaborator.value}`,{
      method:"GET",
      headers:{
            "Content-Type":'application/json'
      }
   })
   let dataJson = await request.json()
   if(!request.ok){
      return alert(dataJson.message)
   }
   
   let pageData = dataJson.meta.page
   
   let indexStart = pageData.current_page-2>=1?pageData.current_page-2:1
   let indexEnd = indexStart+4<=pageData.last_page?indexStart+4:pageData.last_page

   let pagination = ''
   for(let i = indexStart; i<= indexEnd;i++){
      pagination+=`<li class="page-item ${i==pageData.current_page?'active':''}" onClick="listCollaborator(${i})"><a class="page-link" href="#">${i}</a></li>`
   }
   document.getElementById('pagination-container').innerHTML = `${pagination}`

   let td = ''
   if(dataJson.data.orders.length == 0){
      td =`<tr class="text-center"> <td colspan="5" class="table-user text-center">Sem dados</td></tr>`
   }
   dataJson.data.orders.forEach(item => {
      td += `
            <tr>
               <td class="table-user">
                  <!-- <img src="assets/images/users/avatar-2.jpg" alt="table-user" class="me-2 rounded-circle" /> -->
                  ${item.id}
               </td>
               <td>${item.provider}</td>
               <td>${item.status_order}</td>
               <td>${item.quantity_products}</td>
               <td>${item.date_order}</td>
               <td class="table-action">
                  <a href="colaboradores/editar/${item.id}" class="action-icon"> <i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                  <a href="colaboradores/delete/${item.id}" class="action-icon"> <i class="fa-sharp fa-solid fa-trash"></i></a>
               </td>
            </tr>
      `
   });

   document.getElementById('tbody-collaborator').innerHTML = `${td}`
}
document.getElementById('search-collaborator').addEventListener('keyup', ()=>{listCollaborator(1)})
    