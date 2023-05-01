const fileUpload = document.querySelector('#img-upload');
const inputName=document.querySelector('#inputName');
const inputParValue=document.querySelector('#inputParValue')
const inputPrice=document.querySelector('#inputPrice')
const inputNXB=document.querySelector('#inputNXB')
const inputNumber=document.querySelector('#inputNumber')
const inputContent=document.querySelector("#inputContent")
const inputAuthor=document.querySelector('#inputAuthor')
const gridRadios=document.getElementsByName('gridRadios')
const btnCheck=document.querySelector('#btn-check')
const newProduct=document.querySelector('#product')
const btnConfirm=document.querySelector('#btn-confirm')
const reader = new FileReader();
let json
let img
json=localStorage.getItem('product')
let product=JSON.parse(json)
json=localStorage.getItem('imgLink')
let imgLink=JSON.parse(json)
let product1
fileUpload.addEventListener('change', (event) => {
    const files = event.target.files;
    const file = files[0];
    reader.readAsDataURL(file);
    
    reader.addEventListener('load', (event) => {
      img = document.createElement('img');
      img.src = event.target.result;
      img.alt = file.name;
    });
  });
let radios=''
let describe 
btnCheck.addEventListener('click',function(){
    for (var i = 0; i < gridRadios.length; i++){
        if (gridRadios[i].checked == true){
            radios=gridRadios[i].value;
        }
    }
    if (inputName.value==''||inputParValue.value==''||inputPrice.value==''||radios==''||inputNumber=='')
        alert('Vui lòng nhập đầy đủ thông tin')
    else
    {
        product1={
            name: inputName.value,
            NXB:inputNXB.value,
            author:inputAuthor.value,
            type: radios, 
            realValue: inputParValue.value, 
            cost: inputPrice.value, 
            number: inputNumber.value,
            code:img.src,
        }
        describe=inputContent.value;
        if (inputParValue.value!=inputPrice.value){
            newProduct.innerHTML = `
            <div style="margin-left: 45rem;min-width: 350px;" >
            <div class="card">
            <button class="m-0 p-0 btn btn-primary btn-modal" style="border: none;background: none;" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                <img class="card-img-top" src="${product1.code}" alt="Card image">
            </button>
            <div class="card-body" >
                <h4 class="card-title" style="height:60px;margin-bottom:0px;">${product1.name}</h4>
                <p class="card-text" style="text-decoration-line: line-through">${(parseInt(product1.realValue)).toLocaleString()}đ</p>
                <div class="row">
                    <div class="col-5">
                        <h5 class="text-danger reduce-cost" style="margin-bottom:0px;margin-top:10px;">${(parseInt(product1.cost)).toLocaleString()}đ</h5>
                    </div>
                    <div class="col-7">
                        <a class="btn btn-primary text-light pay-button add-cart" style="float:right;"><i class="ri-shopping-cart-2-fill"></i>Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
        </div>
                </div>    
            `
        }
        else
            newProduct.innerHTML = `
            <div style="margin-left: 45rem;min-width: 350px;" >
            <div class="card">
            <button class="m-0 p-0 btn btn-primary btn-modal" style="border: none;background: none;" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                <img class="card-img-top" src="${product1.code}" alt="Card image">
            </button>
            <div class="card-body" >
                <h4 class="card-title" style="height:60px;margin-bottom:0px;">${product1.name}</h4>
                <div class="row">
                    <div class="col-5">
                        <h5 class="text-danger reduce-cost" style="margin-bottom:0px;margin-top:10px;">${(parseInt(product1.cost)).toLocaleString()}đ</h5>
                    </div>
                    <div class="col-7">
                        <a class="btn btn-primary text-light pay-button add-cart" style="float:right;"><i class="ri-shopping-cart-2-fill"></i>Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
        </div>
        </div>     
                `
    }
    document.getElementById('modal-content').innerHTML=`
    <div class="col-8">
            <h3 id="book-name">${product1.name}</h3>
            <h6 style="color: blue;" id="book-info">Nhà xuất bản :  ${product1.NXB} | Tác giả : ${product1.author} | Thể loại : ${product1.type}</h6>
            <h6 id="book-status"></h6>
            <hr>
            
            <h5>Mô tả:</h5>
            <span id="book-content">${describe}</span>
            <hr>
            <div class="row">
                <div class="col-2 text-danger">
                    <h5 id="cost"></h5>
                </div>
                <div class="col-2">
                    <h6 id="realValue" style="text-decoration-line: line-through"></h6>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <b style="font-size: 30px;">Số lượng:</b>
                </div>
                <div class="col-3" style="margin-top: 10px;" class="in-cart">
                        <button class="navbar-toggler minus" type="button" style="margin-right:20px;" ><i class="ti-minus"></i></button>
                        <span style="font-size:19px;" id="number-cart">1</span>
                        <button class="navbar-toggler plus" type="button" style="margin-left:20px;"><i class="ti-plus"></i></button>
                </div>
                <div class="col-2">
                </div>
                <div class="col-4" style="padding-left: 55px;">
                    <a class="btn-cart cart 1 btn btn-primary text-light"><i class="ri-shopping-cart-2-fill"> Thêm vào giỏ hàng</i></a>
                </div>
                
            </div>
            
        </div>
        <div class="col-4">
            <img src="${product1.code}" alt="" srcset="" style="float: left;width:20rem;">
        </div>
    `
    if (product1.number>0)
        document.getElementById("book-status").innerText='Tình trạng : Còn hàng'
    else
        document.getElementById("book-status").innerText='Tình trạng : Hết hàng'
        if (product1.realValue!=product1.cost)
        document.getElementById('realValue').innerText=(parseInt(product1.realValue)).toLocaleString()+'đ'
    else
        document.getElementById('realValue').innerText=''

    document.getElementById('cost').innerText=(parseInt(product1.cost)).toLocaleString()+'đ'
})
btnConfirm.addEventListener('click',function(){
    if (inputName.value==''||inputParValue.value==''||inputPrice.value==''||radios=='')
        alert('Vui lòng nhập đầy đủ thông tin')
    else{
        product.push(product1)
        json=JSON.stringify(product)
        localStorage.setItem('product',json)
        json=localStorage.getItem('describe')
        let describe1=JSON.parse(json)
        describe1.push('describe')
        json=JSON.stringify(describe1)
        localStorage.setItem('describe',json)
        alert("Đã thêm sản phẩm")
        window.location.href="addProduct.html"
    }
})