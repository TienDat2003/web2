let json=localStorage.getItem('customerList')
let customerList=JSON.parse(json)
document.getElementById('header').innerText+=' '+customerList.length
for (let i=0;i<customerList.length;i++)
{
    document.getElementById('product-list').innerHTML+=
    `
    <div class="row">
        <div class="col-2" style="padding-left:3em;text-align:center;">
            <h4>${customerList[i].username}</h4>
        </div>
        <div class="col-4" style="text-align:center;">
            <h4>${customerList[i].email}</h4>
            </div>
        <div class="col-1" style="text-align:center;">
            <h4>${customerList[i].password}</h4>
        </div>
        <div class="col-2" style="padding-left:2em;text-align:center;">
            <h4>${customerList[i].address}</h4>
        </div>
        <div class="col-2" style="text-align:center;">
            <h4>${customerList[i].phonenumber}</h4>
        </div>
        <div class="col-1" style="text-align:center;">
            <button type="button" class="btn btn-outline-primary lock-btn"  data-bs-toggle="modal" data-bs-target="#myModal-delete"><i class="ri-lock-unlock-line"></i></button>
            <button type="button" class="btn btn-outline-success btn-edit" data-bs-toggle="modal" data-bs-target="#myModal-edit"><i class="ri-file-settings-line"></i></button>
        </div>
    </div>
    <hr>
    `
}
let lockBtn=document.getElementsByClassName('lock-btn')
for (let i=0;i<lockBtn.length;i++){
    if (customerList[i].status=='-1'){
        lockBtn[i].innerHTML=`<i class="ri-lock-line"></i>`
        lockBtn[i].classList.add('btn-outline-danger')
        document.getElementById('modal-text').innerText='Xác nhận mở khóa tài khoản?'
    }
    lockBtn[i].addEventListener('click',function(){
        let confirmBtn1=document.querySelector('.confirm-button-1')
        document.getElementById('header-name').innerText=customerList[i].username
        confirmBtn1.addEventListener('click',function(){
        customerList[i].status=-parseInt(customerList[i].status)
        json=JSON.stringify(customerList)
        localStorage.setItem('customerList',json)
        // if (lockBtn[i].innerHTML==`<i class="ri-lock-unlock-line"></i>`){
        //     lockBtn[i].classList.add('btn-outline-danger')
        //     lockBtn[i].innerHTML=`<i class="ri-lock-line"></i>`
        // }
        // else{
        //     lockBtn[i].classList.remove('btn-outline-danger')
        //     lockBtn[i].innerHTML=`<i class="ri-lock-unlock-line"></i>`
        // }
        window.location.href='customer.html'
    })
})
}
for (let i=0;i<customerList.length;i++){
    let user = {
        username: customerList[i].username,
        password: customerList[i].password,
      };
    json = JSON.stringify(user);
    if (customerList[i].status=='1')
        localStorage.setItem(user.username, json);
    else 
        localStorage.setItem(user.username,' ');
      
}

let editBtn=document.querySelectorAll('.btn-edit')
for (let i=0;i<editBtn.length;i++){
    editBtn[i].addEventListener('click',function(){
        document.getElementById('inputName').value=customerList[i].username
        document.getElementById('inputParValue').value=customerList[i].email
        document.getElementById('inputPrice').value=customerList[i].password
        document.getElementById('inputNumber').value=customerList[i].address
        document.getElementById('inputNXB').value=customerList[i].phonenumber
        let confirmBtn=document.querySelector("#btn-confirm")
        confirmBtn.addEventListener('click',function(){
            customerList[i].email=document.getElementById('inputParValue').value
            customerList[i].password=document.getElementById('inputPrice').value
            customerList[i].address=document.getElementById('inputNumber').value
            customerList[i].phonenumber=document.getElementById('inputNXB').value
            json=JSON.stringify(customerList)
            localStorage.setItem('customerList',json)
            window.location.href="customer.html"
        })
    })
}