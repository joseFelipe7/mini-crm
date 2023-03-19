
document.getElementById("btn-login").addEventListener('click', async ()=>{
    let inputMail = document.getElementById('input-email')
    let inputPass = document.getElementById('input-pass')
    console.log(inputMail.value)
    console.log(inputPass.value)
    if(inputMail.value.trim() == '' || inputPass.value.trim() == '' ){
        return alert('preencha todos os campos para logar')
    }
    try {
        let request = await fetch('http://localhost/login/api/login',{
            method:"POST",
            headers:{
                "Content-Type":'application/json'
            },
            body:JSON.stringify({
                "email":inputMail.value,
                "password":inputPass.value
            })
        })
        let dataJson = await request.json()
        if(!request.ok){
            return alert(dataJson.message)
        }
        alert('login feito com sucesso')
        document.getElementById('form-login').submit()
    } catch (error) {
        alert('ocorreu um erro')
    }
})
    