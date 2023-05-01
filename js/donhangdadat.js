let headerUser=document.querySelector('#header-user-name')
let status1=localStorage.getItem('status')
status1=parseInt(status1)
if (status1==1){
    headerUser.innerHTML=`<a class="nav-link me-lg-3" href=""><i class="ti-user"></i>${localStorage.getItem('username1')}</a>`
}

let numberCart=localStorage.getItem('numberCart')
if (numberCart==null)
numberCart=0 
document.querySelector('.cart span').innerText = numberCart;
let json=localStorage.getItem('order')
let order=JSON.parse(json)
json=localStorage.getItem('product')
let product=JSON.parse(json)
json=localStorage.getItem('bill')
let bill=[]
if (json!=0){
    bill=JSON.parse(json)
    for (let i=0;i<bill.length;i++)
    document.getElementById('order-list').innerHTML+=`
    <div class="row">
        <div class="col-2">
            <div class="form-check">
                <h6 id="check">Chưa xử lí</h6>
            </div>
        </div>
        <div class="col-2">
            <h6>${order[bill[i]].customer}</h6>
        </div>
        <div class="col-4">
            <h6>${order[bill[i]].address}</h6>
        </div>
        <div class="col-2">
            <h6>${order[bill[i]].phone}</h6>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary btn-edit" data-bs-toggle="modal" data-bs-target="#myModal-edit"><i class="ri-file-text-fill"></i></button>
        </div>
    </div>
    <hr>
    `
}
let checkBox=document.getElementsByClassName('check')
for (let i=0;i<checkBox.length;i++){
    if (order[i].status==1){
        document.getElementById('check-'+i).innerText='Đã xử lí'
    }
}
let editBtn=document.querySelectorAll(".btn-edit")
for (let i=0;i<editBtn.length;i++){
    editBtn[i].addEventListener('click',function(){
        document.getElementById('modal-order').innerHTML=`<div class="row">
        <div class="col-2">
        </div>
        <div class="col-3">
            <h5>Tên sản phẩm</h5>
        </div>
        <div class="col-2">
            <h5>Đơn giá</h5>
        </div>
        <div class="col-2">
            <h5 style="font-size:19px;">Số lượng</h5>
        </div>
        <div class="col-3 d-flex">
            <h5 class="sum-cart">Tổng tiền</h5>
        </div>

    </div>`
        let sum=0
        for(let j=0;j<(order[bill[i]].detail).length;j++)
        if ((order[bill[i]]).detail[j]!=0){
            sum+=(parseInt(product[j].cost)*parseInt(order[bill[i]].detail[j]))
            document.getElementById('modal-order').innerHTML+=
    `<div class="row">
        <div class="col-2" style="padding-left:60px;">
            <img src="${product[j].code}" style="width:100px;">
        </div>
        <div class="col-3" style="padding-top:40px;">
            <span>${product[j].name}</span>
        </div>
        <div class="col-2" style="padding-top:40px;">
            <span>${(parseInt(product[j].cost)).toLocaleString()}đ</span>
        </div>
        <div class="col-2" style="padding-top:40px;">
            <span style="font-size:19px;margin-left:20px;">${(order[bill[i]]).detail[j]}</span>
        </div>
        <div class="col-2 d-flex" style="padding-top:40px;">
            <h5 class="sum-cart">${(parseInt(product[j].cost)*parseInt(order[bill[i]].detail[j])).toLocaleString()}đ</h5>
        </div>
    </div>
    <br>
    `
    
        }
        document.getElementById('modal-order').innerHTML+=
    `<br>
    <div class="row">
        <div class="col-1">
        </div>
        <div class="col-4">
        </div>
        <div class="col-2">
        </div>
        <div class="col-2">
        <h4>Tổng cộng: </h4>
        </div>
        <div class="col-3 d-flex">
            <h5 class="sum-cart">${sum.toLocaleString()}đ</h5>
        </div>

    </div>`
    })
}