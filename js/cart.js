// header
let headerLogin=document.querySelector('.header-login')
let headerUser=document.querySelector('.header-user-name')
let headerLogout=document.querySelector('.header-log-out')
let status1=localStorage.getItem('status')
status1=parseInt(status1)
if (status1==1){
    headerLogin.classList.add('disappear')
    headerUser.classList.remove('disappear')
    headerLogout.classList.remove('disappear')
    headerUser.innerHTML=`<a class="nav-link me-lg-3" href=""><i class="ti-user"></i>${localStorage.getItem('username1')}</a>`
}

let numberCart=localStorage.getItem('numberCart')
if (numberCart==null)
numberCart=0 
document.querySelector('.cart span').innerText = numberCart;

// Giỏ hàng
let productTotal = document.querySelector(".total-price");
let productContainer = document.querySelector(".products");
let json=localStorage.getItem('inCart')
let cart=JSON.parse(json)
if (cart==null) cart=[]
let sum=0
let count=[]
let dem=0
json=localStorage.getItem('product')
let product=JSON.parse(json)
for (let i=0;i<cart.length;i++){
    if (cart[i]!=0){
        count.push(i)
        var temp=parseInt(cart[i])*parseInt(product[i].cost)
        sum=sum+temp        
        temp=temp.toLocaleString();
        productContainer.innerHTML += `
        <div class="small-middle-container" id="cart-child-${dem}" style="text-align: center;margin-bottom: 1rem">
        <div class="row">
            <div class="col-1">
                <button type="button" class="navbar-toggler delete">
                    <span class="text-danger d-flex align-items-center">
                        <i class="ri-delete-bin-5-line"></i>
                    </span>
                </button>
            </div>
            <div class="col-3">
                <span>${product[i].name}</span>
            </div>
            <div class="col-2">
                <span>${(parseInt(product[i].cost)).toLocaleString()}</span>
            </div>
            <div class="col-3 in-cart">
                <button class="navbar-toggler minus" type="button" style="margin-right:20px;" ><i class="ti-minus text-danger"></i></button>
                <span style="font-size:19px;">${cart[i]}</span>
                <button class="navbar-toggler plus" type="button" style="margin-left:20px;"><i class="ti-plus text-primary"></i></button>
            </div>
            <div class="col-3 d-flex justify-content-end">
                <h5 class="sum-cart">${temp}đ</h5>
            </div>
            
        </div>
    </div>            `
    dem++;
    } 
}
let sum1=sum.toLocaleString();
productTotal.innerHTML+=`
            <span>${sum1}đ<span>
        `
let btnMinus=document.querySelectorAll(".minus")
let btnPlus=document.querySelectorAll(".plus")
let cart1=document.querySelectorAll(".in-cart span")
let sumCart=document.querySelectorAll(".sum-cart")
let btnDeletes=document.querySelectorAll(".delete")
for (let i=0;i<btnDeletes.length;i++)
{
    btnDeletes[i].addEventListener('click',function(){
            var deleteChild=document.getElementById("cart-child-"+i)
            numberCart=numberCart-cart[count[i]];
            document.querySelector('.cart span').innerText = numberCart;
            localStorage.setItem("numberCart",numberCart)
            temp=parseInt(product[count[i]].cost)*parseInt(cart[count[i]])
            sum=sum-temp
            let sum1=sum.toLocaleString();
            productTotal.innerHTML=`
            <span>${sum1}đ<span>
        `
            sumCart[i].innerText=temp
            cart[count[i]]=0
            temp=JSON.stringify(cart)
            localStorage.setItem("inCart",temp)
            deleteChild.innerHTML=``
    })
}
for (let i=0;i<btnMinus.length;i++)
{
    btnMinus[i].addEventListener('click',function(){
        if (cart[count[i]]>1){
            cart1[i].innerHTML=cart[count[i]]-1;
            cart[count[i]]--;
            numberCart--;
            product[count[i]].number++;
            json=JSON.stringify(product)
            localStorage.setItem('product',json)
            document.querySelector('.cart span').innerText = numberCart;
            localStorage.setItem("numberCart",numberCart)
            json=JSON.stringify(cart)
            localStorage.setItem("inCart",json)
            temp=parseInt(product[count[i]].cost)
            sum=sum-temp
            sum1=sum.toLocaleString();
            productTotal.innerHTML=`
            <span>${sum1}đ<span>
        `
            temp=parseInt(product[count[i]].cost)*parseInt(cart[count[i]])
            temp=temp.toLocaleString();
            sumCart[i].innerText=temp
        }
    })
}

for (let i=0;i<btnPlus.length;i++)
{
    btnPlus[i].addEventListener('click',function(){
        if (product[count[i]].number>0){
            cart1[i].innerHTML=cart[count[i]]+1;
            cart[count[i]]++;
            numberCart++;
            document.querySelector('.cart span').innerText = numberCart;
            localStorage.setItem("numberCart",numberCart)
            json=JSON.stringify(cart)
            localStorage.setItem("inCart",json)
            product[count[i]].number--;
            json=JSON.stringify(product)
            localStorage.setItem('product',json)
            temp=parseInt(product[count[i]].cost)
            sum=sum+temp
            sum1=sum.toLocaleString();
            productTotal.innerHTML=`
            <span>${sum1}đ<span>
        `
            temp=parseInt(product[count[i]].cost)*parseInt(cart[count[i]])
            temp=temp.toLocaleString();
            sumCart[i].innerText=temp
        }
        else{
            alert('Chỉ còn '+cart[count[i]]+' sản phẩm')
        }
    })
}

headerLogout.addEventListener('click',function(){
    localStorage.setItem('status',0)
    for (let i=0;i<product.length;i++){
        cart[i]=0
    }
    localStorage.setItem('numberCart',0)
    json=JSON.stringify(cart)
    localStorage.setItem('inCart',json)
    headerLogin.classList.remove('disappear')
    headerUser.classList.add('disappear')
    headerLogout.classList.add('disappear')
})

// Thanh toán

let payBtn=document.querySelector('.btn-pay')
let modalContent=document.getElementById('modal-pay')
let confirmBtn=document.querySelector('.confirm-button')
payBtn.addEventListener('click',function(){
    if (status1!=1)
        modalContent.innerHTML=`<h3>Vui lòng đăng nhập để thanh toán</h3>`
    else{
        modalContent.innerHTML=`
        <form>
            <div class="row">
                <label for="inputImg" class="col-sm-3 col-form-label">Tên khách hàng:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="customer-name">
                </div>
            </div>
            <div class="row">
                <label for="inputImg" class="col-sm-3 col-form-label">Địa chỉ giao hàng:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="address">
                </div>
            </div>
            <div class="row">
                <label for="inputImg" class="col-sm-3 col-form-label">Số điện thoại:</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="phone-number">
                </div>
            </div>
            <div class="form-check">
                <h3 for="inputImg" class="col-form-label">Phương thức thanh toán:</h3>
                <input checked="true" class="form-check-input" type="radio" id="gridRadios1" value="Tiểu thuyết">
                <label class="form-check-label" for="gridRadios1">
                    Thanh toán khi nhận hàng
                </label>
            </div>
            <div class="form-check">
                <h3 for="inputImg" class="col-form-label">Phương thức vận chuyển:</h3>
                <input checked="true" class="form-check-input" type="radio" id="gridRadios1" value="Tiểu thuyết">
                <label class="form-check-label" for="gridRadios1">
                    Vận chuyển nhanh miễn phí
                </label>
            </div>
        </form>
        
        `
        let address=document.getElementById('address')
        let phoneNumber=document.getElementById('phone-number')
        confirmBtn.addEventListener('click',function(){
            if (address.value==''||phoneNumber.value==''){
                alert('Vui lòng nhập đầy đủ thông tin')
                window.location.href="shopping-cart.html"
            }
            else{
                
                alert('Thanh toán thành công')
                json=localStorage.getItem('order')
                let order=JSON.parse(json)
                order.push({
                    status:0,
                    phone:phoneNumber.value,
                    address:address.value,
                    detail:cart,
                    customer:localStorage.getItem('username1'),
                })
                json=localStorage.getItem('bill')
                let bill=[]
                if (json!=null)
                    bill=JSON.parse(json)
                bill.push(order.length-1)
                json=JSON.stringify(bill)
                localStorage.setItem('bill',json)
                json=JSON.stringify(order)
                localStorage.setItem('order',json)
                for (let i=0;i<cart.length;i++)
                    cart[i]=0
                json=JSON.stringify(cart)
                localStorage.setItem('inCart',json)
                localStorage.setItem('numberCart',0)
                window.location.href="shopping-cart.html"
            }
        })
    }
})

let headerLogo=document.querySelector('.header-logo')
headerLogo.addEventListener('click',function(){
    localStorage.setItem('pageNumber',1)
})

// Đơn hàng đã đặt
let cartBtn=document.querySelector('#cart-1')
if (status1!=1) cartBtn.href="shopping-cart.html"

