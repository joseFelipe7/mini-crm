document.getElementById('type-collaborator').addEventListener('change',(e)=>{
    if(e.target.value == 1){
        document.querySelectorAll('.display-collaborator').forEach((item)=>{
            item.style.display='flex'
        })
    }
    if(e.target.value == 2){
        document.querySelectorAll('.display-collaborator').forEach((item)=>{
            item.style.display='none'
        })
    }
})

document.getElementById('permissions-collaborator').addEventListener('change',(e)=>{
    if(e.target.value == 3){
        document.querySelectorAll('.display-permission').forEach((item)=>{
            item.style.display='flex'
        })
    }else{
        document.querySelectorAll('.display-permission').forEach((item)=>{
            item.style.display='none'
        })
    }
})