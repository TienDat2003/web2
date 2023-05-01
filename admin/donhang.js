let json=localStorage.getItem('order')
let order=JSON.parse(json)
document.getElementById('count-order').innerText='Số đơn hàng:'+order.length
json=localStorage.getItem('product')
let product=JSON.parse(json)
for (let i=0;i<order.length;i++){
    document.getElementById('order-list').innerHTML+=`
    <div class="row">
        <div class="col-2">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="check" class="check-box">
            <label class="form-check-label" for="gridRadios1">
                <h5 id="check-${i}">Chưa xử lí</h5>
            </label>
            </div>
        </div>
        <div class="col-2">
            <h5>${order[i].customer}</h5>
        </div>
        <div class="col-4">
            <h5>${order[i].address}</h5>
        </div>
        <div class="col-2">
            <h5>${order[i].phone}</h5>
        </div>
        
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary btn-edit" data-bs-toggle="modal" data-bs-target="#myModal-edit"><i class="ri-file-text-fill"></i></button>
        </div>
    </div>
    <hr>
    `
}
let checkBox=document.getElementsByName('check')
for (let i=0;i<checkBox.length;i++){
    if (order[i].status==1){
        checkBox[i].checked=true
        document.getElementById('check-'+i).innerText='Đã xử lí'
    }
}
for (let i=0;i<checkBox.length;i++){
    checkBox[i].addEventListener('change',function(){
        order[i].status=parseInt(order[i].status)*-1
        if (order[i].status==1){
            checkBox[i].checked=true
            document.getElementById('check-'+i).innerText='Đã xử lí'
        }
        else{
            checkBox[i].checked=true
            document.getElementById('check-'+i).innerText='Đã xử lí'
        }
        json=JSON.stringify(order)
        localStorage.setItem('order',json)
    })
}
let editBtn=document.querySelectorAll(".btn-edit")
for (let i=0;i<editBtn.length;i++){
    editBtn[i].addEventListener('click',function(){
        document.getElementById('modal-order').innerHTML=`<div class="row">
        <div class="col-1">
        </div>
        <div class="col-4">
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
        for(let j=0;j<(order[i].detail).length;j++)
        if ((order[i]).detail[j]!=0){
            sum+=(parseInt(product[j].cost)*parseInt(order[i].detail[j]))
            document.getElementById('modal-order').innerHTML+=
    `<div class="row">
    <div class="col-1">
    </div>
        <div class="col-4">
            <span>${product[j].name}</span>
        </div>
        <div class="col-2">
            <span>${(parseInt(product[j].cost)).toLocaleString()}đ</span>
        </div>
        <div class="col-2">
            <span style="font-size:19px;margin-left:20px;">${(order[i]).detail[j]}</span>
        </div>
        <div class="col-3 d-flex">
            <h5 class="sum-cart">${(parseInt(product[j].cost)*parseInt(order[i].detail[j])).toLocaleString()}đ</h5>
        </div>

    </div>`
    
        }
        document.getElementById('modal-order').innerHTML+=
    `<div class="row">
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