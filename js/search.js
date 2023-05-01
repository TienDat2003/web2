let json
let numberCart=localStorage.getItem('numberCart')
if (numberCart!=null)
    document.querySelector('.cart span').textContent=numberCart
else
    numberCart=0
json=localStorage.getItem('product')
product=JSON.parse(json)

if (localStorage.getItem('describe')==null){
    json=JSON.stringify(describe)
    localStorage.setItem('describe',json)
}
else{
    json=localStorage.getItem('describe')
    describe=JSON.parse(json)
}
if (localStorage.getItem('customerList')==null){
    json=JSON.stringify(customerList)
    localStorage.setItem('customerList',json)
}
else{
    json=localStorage.getItem('customerList')
    customerList=JSON.parse(json)
}

// Danh sách sản phẩm
json=localStorage.getItem('product')
product=JSON.parse(json)
// search

let select=localStorage.getItem('select')
let searchInputText=localStorage.getItem('searchInputText').toLowerCase()
let maxSearch=localStorage.getItem('maxSearch')
let minSearch=localStorage.getItem('minSearch')
let inSearch=[]
if (maxSearch=='')
    maxSearch='9999999'
for (let i=0;i<product.length;i++)
    inSearch.push(i)
console.log(inSearch)
let tam=0;
if (select!='Thể loại'){
    for (let i=0;i<product.length;i++)
        if (product[i].type!=select||((product[i].name.toLowerCase()).lastIndexOf(searchInputText)==-1&&(product[i].NXB.toLowerCase()).lastIndexOf(searchInputText)==-1&&(product[i].author.toLowerCase()).lastIndexOf(searchInputText)==-1)||((parseInt(product[i].cost))<parseInt(minSearch)||(parseInt(product[i].cost)>parseInt(maxSearch))))
            {
                inSearch.splice(i-tam,1)
                tam++;
            }
}
else{
    for (let i=0;i<product.length;i++)
        if (((product[i].name.toLowerCase()).lastIndexOf(searchInputText)==-1&&(product[i].NXB.toLowerCase()).lastIndexOf(searchInputText)==-1&&(product[i].author.toLowerCase()).lastIndexOf(searchInputText)==-1)||(parseInt(product[i].cost))<parseInt(minSearch)||(parseInt(product[i].cost)>parseInt(maxSearch)))
        {
            inSearch.splice(i-tam,1)
            tam++;
        }
}
let temp=0
let cardList=document.getElementById('card-list')
for (let i=0;i<inSearch.length;i++){
    if (temp==9) break;
    if (product[inSearch[i]].realValue!=product[inSearch[i]].cost){
        cardList.innerHTML += `
        <div class="col-lg-3 m-5">
        <div class="card">
            <button class="m-0 p-0 btn btn-primary btn-modal" style="border: none;background: none;" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                <img class="card-img-top" src="${product[inSearch[i]].code}" alt="Card image">
            </button>
            <div class="card-body" >
                <h4 class="card-title" style="height:60px;margin-bottom:0px;">${product[inSearch[i]].name}</h4>
                <p class="card-text" style="text-decoration-line: line-through">${(parseInt(product[inSearch[i]].realValue)).toLocaleString()}đ</p>
                <div class="row">
                    <div class="col-5">
                        <h5 class="text-danger reduce-cost" style="margin-bottom:0px;margin-top:10px;">${(parseInt(product[inSearch[i]].cost)).toLocaleString()}đ</h5>
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
        cardList.innerHTML += `
        <div class="col-lg-3 m-5">
        <div class="card">
            <button class="m-0 p-0 btn btn-primary btn-modal" style="border: none;background: none;" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                <img class="card-img-top" src="${product[inSearch[i]].code}" alt="Card image">
            </button>
            <div class="card-body" >
                <h4 class="card-title" style="margin-bottom:20px;height:59px;">${product[inSearch[i]].name}</h4>
                <div class="row">
                    <div class="col-5" style="margin-top:10px;">
                        <h5 class="text-danger reduce-cost">${(parseInt(product[inSearch[i]].realValue)).toLocaleString()}đ</h5>
                    </div>
                    <div class="col-7">
                        <a class="btn btn-primary text-light pay-button add-cart" style="float:right;"><i class="ri-shopping-cart-2-fill"></i>Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>      
            `
            temp++
}

// modal
let btnModals=document.querySelectorAll(".btn-modal")

for (let i=0;i<btnModals.length;i++){
  btnModals[i].addEventListener('click',function(){
    document.getElementById('modal-content').innerHTML=`
    <div class="col-8">
                    <h3 id="book-name"></h3>
                    <h6 style="color: blue;" id="book-info"></h6>
                    <h6 id="book-status"></h6>
                    <hr>
                    <h5>Mô tả:</h5>
                    <span id="book-content"> </span>
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
                    <img src="${product[inSearch[i]].code}" alt="" srcset="" style="float: left;width:20rem;">
                </div>
    `
    var btnCart=document.querySelector('.btn-cart')
    var btnMinus=document.querySelector(".minus")
    var btnPlus=document.querySelector(".plus")
    var cart=document.getElementById("number-cart")
    document.getElementById("book-name").innerText=product[inSearch[i]].name
    document.getElementById("book-info").innerText='Nhà xuất bản : '+ product[inSearch[i]].NXB+' | Tác giả : '+product[inSearch[i]].author+' | Thể loại : '+product[inSearch[i]].type
    if (product[inSearch[i]].number>0)
        document.getElementById("book-status").innerText='Tình trạng : Còn hàng'
    else
        document.getElementById("book-status").innerText='Tình trạng : Hết hàng'
    document.getElementById('book-content').innerText=describe[inSearch[i]]
    if (product[inSearch[i]].realValue!=product[inSearch[i]].cost)
        document.getElementById('realValue').innerText=(parseInt(product[inSearch[i]].realValue)).toLocaleString()+'đ'
    else
        document.getElementById('realValue').innerText=''

    document.getElementById('cost').innerText=(parseInt(product[inSearch[i]].cost)).toLocaleString()+'đ'
    cart.innerText=1
    btnMinus.addEventListener('click',function(){
        if (parseInt(cart.innerText)>1)
            cart.innerText=parseInt(cart.innerText)-1
        })
    btnPlus.addEventListener('click',function(){
        cart.innerText=(parseInt(cart.innerText)+1)+''
        })
    btnCart.addEventListener('click',function(){
        if (parseInt(cart.innerText)>product[inSearch[i]].number)
            alert('Hiện chỉ còn ' +product[inSearch[i]].number+' sản phẩm '+product[inSearch[i]].name)
        else{
            inCart[inSearch[i]]+=parseInt(cart.innerText);
            product[inSearch[i]].number=product[inSearch[i]].number-parseInt(cart.innerText)
            numberCart=parseInt(cart.innerText)+parseInt(document.querySelector('.cart span').innerText)
            localStorage.setItem('numberCart',numberCart)
            document.querySelector('.cart span').innerText = numberCart;
            json=JSON.stringify(inCart)
            localStorage.setItem('inCart',json)
            }
    })
    
})
}
// Thêm sản phẩm vào giỏ
let inCart=[]
if (localStorage.getItem('inCart')==null)
    for (let i=0;i<product.length;i++)
    {
        inCart.push(0)
    }
else {
    json=localStorage.getItem('inCart')
    inCart=JSON.parse(json)
}

let carts = document.querySelectorAll('.add-cart')
for (let i = 0; i < carts.length; i++) {
    carts[i].addEventListener('click',function(){
        if ((product[inSearch[i]].number)>0){
            inCart[inSearch[i]]++;
            json=JSON.stringify(inCart)
            localStorage.setItem('inCart',json)
            numberCart=localStorage.getItem('numberCart')
            product[inSearch[i]].number--;
            json=JSON.stringify(product)
            localStorage.setItem('product',json)
            if (document.querySelector('.cart span').textContent=='0') 
                numberCart=1
            else{
                numberCart++;
        }
            localStorage.setItem('numberCart',numberCart)
            document.querySelector('.cart span').innerText = numberCart;
        }
        else
            alert('Đã hết hàng')
})
}


// Phân trang
let countPage=(inSearch.length/9)+1
let pageNumber=1
let pageFooter=document.querySelector(".paging")
if (countPage>1){
    if (pageNumber==2)
        pageFooter.innerHTML+=`<li class="page-item"><a class="page-link page-before" href="./index.html"><i class="ti-angle-left" style="font-size:12px;"></i></a></li>`
    pageFooter.innerHTML+=`<li class="page-item page-index"><a class="page-link" href="./index.html">1</a></li>`
    for (let i=2;i<=countPage;i++)
        pageFooter.innerHTML+=`<li class="page-item page"><a class="page-link" href="./search-page${i}.html">${i}</a></li>`
}
let pageIndex=document.querySelector('.page-index')
let page=document.querySelectorAll('.page')


let btnSearch=document.querySelector("#search-icon")
// let typeSearch=document.querySelector('#select-bottom')
// let inputSearch=document.querySelector('#search-input')

btnSearch.addEventListener('click',function(){
    var e = document.getElementById("select-bottom")
    var select = e.options[e.selectedIndex].innerText
    var searchInput=document.getElementById("search-input")
    var searchInputText=searchInput.value
    let minSearch=document.querySelector('#min-find').value
    let maxSearch=document.querySelector('#max-find').value
    if (minSearch=='') minSearch='0'
    if (maxSearch=='') maxSearch='9999999'
    localStorage.setItem('select',select)
    localStorage.setItem('searchInputText',searchInputText)
    localStorage.setItem('maxSearch',maxSearch)
    localStorage.setItem('minSearch',minSearch)
    window.location.href="search.html"
})