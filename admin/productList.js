let json=localStorage.getItem('product')
const product=JSON.parse(json)
const newProduct=document.getElementById('product')
let header=document.getElementById('header')
header.innerHTML+=product.length;
let productList=document.getElementById('product-list')
let code=[]
for (let i=0;i<product.length;i++)
    if (product[i].code.indexOf(".")==0)
        code.push("."+ product[i].code)
    else
        code.push(product[i].code)

for (let i=0;i<product.length;i++){
    productList.innerHTML+=`
    <hr>
    <div class="row" id="row-${i+1}">
        <div class="col-1" style="text-align:center;">
            <h5>${i+1}</h5>
        </div>
        <div class="col-2">
            <h5>${product[i].name}</h5>
        </div>
        <div class="col-1">
            <img class="card-img-top" style="width:100%;height:100%;" src="${code[i]}" alt="Book image">
        </div>
        <div class="col-2">
            <h5 style="text-align:center;">${product[i].type}</h5>
            </div>
        <div class="col-1">
            <h5> ${parseInt(product[i].realValue).toLocaleString()}</h5>
        </div>
        <div class="col-1">
            <h5>${parseInt(product[i].cost).toLocaleString()}</h5>
        </div>
        <div class="col-1">
            <h5>${product[i].NXB}</h5>
        </div>
        <div class="col-1">
            <h5>${product[i].author}</h5>
        </div>
        <div class="col-1" style="text-align:center;">
            <h5>${product[i].number}</h5>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-outline-success btn-edit" data-bs-toggle="modal" data-bs-target="#myModal-edit"><i class="ri-edit-2-line"></i></button>
            <button type="button" class="btn btn-outline-danger btn-delete" data-bs-toggle="modal" data-bs-target="#myModal-delete"><i class="ri-delete-bin-6-line"></i></button>
        </div>   
    </div>
    
    `
}

// xóa
let deleteBtn=document.querySelectorAll('.btn-delete')
for (let i=0;i<deleteBtn.length;i++){
    deleteBtn[i].addEventListener('click',function(){
        document.getElementById('header-name').innerText=`
            ${product[i].name}       
        `
        let confirmBtn=document.querySelector('.confirm-button')
        confirmBtn.addEventListener('click',function(){
            describe.splice(i,1)
            product.splice(i,1)
            json=JSON.stringify(product)
            localStorage.setItem('product',json)
            json=JSON.stringify(describe)
            localStorage.setItem('describe',json)
            window.location.href='productList.html'
        })
    })
}

// Sửa
const fileUpload = document.querySelector('#img-upload');
const reader = new FileReader();
let img=''
fileUpload.addEventListener('change', (event) => {
    const files = event.target.files;
    const file = files[0];
    reader.readAsDataURL(file);
    
    reader.addEventListener('load', (event) => {
      img = document.createElement('img');
      img.src = event.target.result;
      img.alt = file.name;
    document.getElementById('image').innerHTML=`<img src="${img.src}" alt="" srcset=""  style="width:20em;">`
    });
  });

json=localStorage.getItem('describe')
let describe=JSON.parse(json)
let editBtn=document.querySelectorAll('.btn-edit')
const gridRadios=document.getElementsByName('gridRadios')
for (let i=0;i<editBtn.length;i++){
    editBtn[i].addEventListener('click',function(){
        document.getElementById('inputName').value=product[i].name
        document.getElementById('inputParValue').value=product[i].realValue
        document.getElementById('inputPrice').value=product[i].cost
        document.getElementById('inputNumber').value=product[i].number
        document.getElementById('inputNXB').value=product[i].NXB
        document.getElementById('inputAuthor').value=product[i].author
        document.getElementById('inputContent').value=describe[i]
        document.getElementById('image').innerHTML=`<img src="${code[i]}" alt="" srcset=""  style="width:20em;">`  
        for (var j = 0; j < gridRadios.length; j++){
            if (gridRadios[j].value == product[j].type){
                gridRadios[j].checked = true;
            }
        }
        let confirmBtn=document.getElementById("btn-confirm")
        confirmBtn.addEventListener('click',function(){
        product[i].name=document.getElementById('inputName').value
        product[i].realValue=document.getElementById('inputParValue').value
        product[i].cost=document.getElementById('inputPrice').value
        product[i].number=document.getElementById('inputNumber').value
        product[i].NXB=document.getElementById('inputNXB').value
        product[i].author=document.getElementById('inputAuthor').value
        describe[i]=document.getElementById('inputContent').value
        if (img!='') code[i]=img.src;
        for (var j = 0; j < gridRadios.length; j++){
            if (gridRadios[j].checked == true)
                product[i].type=gridRadios[j].value
        }
        json=JSON.stringify(product)
        localStorage.setItem('product',json)
        json=JSON.stringify(describe)
        localStorage.setItem('describe',json)
        alert("Thay đổi thành công")
        window.location.href="productList.html"
        })
})
}
  


