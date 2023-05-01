// <!-- Đức Phật nơi đây xin phù hộ code con chạy không Bug. Nam mô A Di Đà Phật.
//                            _
//                         _ooOoo_
//                        o8888888o
//                        88" . "88
//                        (| -_- |)
//                        O\  =  /O
//                     ____/`---'\____
//                   .'  \\|     |//  `.
//                  /  \\|||  :  |||//  \
//                 /  _||||| -:- |||||_  \
//                 |   | \\\  -  /'| |   |
//                 | \_|  `\`---'//  |_/ |
//                 \  .-\__ `-. -'__/-.  /
//               ___`. .'  /--.--\  `. .'___
//            ."" '<  `.___\_<|>_/___.' _> \"".
//           | | :  `- \`. ;`. _/; .'/ /  .' ; |
//           \  \ `-.   \_\_`. _.'_/_/  -' _.' /
// ===========`-.`___`-.__\ \___  /__.-'_.'_.-'================
//                         `=--=-'         ＜（＾－＾）＞ -->
const adminContent=document.getElementById('admin-content')
let json=localStorage.getItem('product')
const product=JSON.parse(json)
json=localStorage.getItem('order')
const order=JSON.parse(json)

let temp=0
let sumSell=0
let sell=[0,0,0,0]
for (let i=0;i<order.length;i++){
    for (let j=0;j<order[i].detail.length;j++){
        sumSell+=order[i].detail[j];
    }
}
let indexMax=0
let sell1=[]
for (let i=0;i<order[0].detail.length;i++){
    for (let j=0;j<order.length;j++)
        temp+=order[j].detail[i]
    sell1.push(temp)
    if (sell1[indexMax]<temp)
        indexMax=sell1.length-1
    temp=0
    if (product[i].type=='Tiểu thuyết'){
        for (let j=0;j<order.length;j++){
            sell[0]+=order[j].detail[i]
        }
    }
    if (product[i].type=='Tâm lý'){
        for (let j=0;j<order.length;j++){
            sell[1]+=order[j].detail[i]
        }
    }
    if (product[i].type=="Kinh dị - Giả tưởng"){
        for (let j=0;j<order.length;j++){
            sell[2]+=order[j].detail[i]
        }
    }
    if (product[i].type=="Tản văn - Tạp văn"){
        for (let j=0;j<order.length;j++){
            sell[3]+=order[j].detail[i]
        }
    }
}
// let max=0
// let indexMax=0
// for (let i=0;i<4;i++){
//     if (sell>=max){
//         max=a[i]
//         indexMax=i
//     }
// }

adminContent.innerHTML=`
    <br>
    <div class="row" id="row-1">
        <div class="col-4">
            <h3>Thống kê tình hình kinh doanh</h3>
        </div>

        <div class="col-3">
        </div>
        
        <div class="col-4">
        </div>
    </div>
    <hr>
    <div class="row" id="row-2">
        <div class="col-2">
            <h3 style="text-align: left;">Từ ngày:</h3>
            <input type="date" name="bday" value="2022-06-05">
        </div>
        <div class="col-2">
            <h3>Đến ngày:</h3>
            <input type="date" name="kday" value="2022-12-05">
            <input type="submit" value="Xác nhận">
        </div>
        <div class="col-4">
            <canvas id="canvas-0"></canvas>
        </div>
        <div class="col-3">
            <br>
            <br>
            <br>
            <h4>Số khách hàng: ${(JSON.parse(localStorage.getItem('customerList'))).length}</h4>
            <h4>Số sản phẩm đã bán: ${sumSell}</h4>
            <h4>Tổng số đơn hàng: ${order.length}</h4>
            <h4>Sản phẩm bán chạy nhất : ${product[indexMax].name}</h4>
        </div>
    </div>
    <br>
    
    <br>
    <hr>
    <div class="row" id="row-1">
        <div class="col-4">
            <h3>Danh sách sản phẩm đã bán:</h3>
        </div>

        <div class="col-3">
        </div>
        <div class="col-4">
        </div>
    </div>
    <br>
    <div class="row" id="row-1">
        <div class="col-1">
        </div>
        <div class="col-1">
            <h3>STT</h3>
        </div>
        <div class="col-4" style="padding-left:13px;">
            <h3>Tên sản phẩm</h3>
        </div>
        <div class="col-2">
            <h3>Thể loại</h3>
        </div>
        <div class="col-2">
            <h3>Đã bán</h3>
        </div>
        <div class="col-2">
            <h3>Còn lại</h3>
        </div>
    </div>
    <br>
    `
    temp=1
    for (let i=0;i<sell1.length;i++){
        if (sell1[i]>0){
        adminContent.innerHTML+=
        `<div class="row" id="row-1">
            <div class="col-1">
            </div>
            <div class="col-1">
                <h5 style="margin-left:13px;">${temp}</h5>
            </div>
            <div class="col-4">
                <h5 style="margin-left:13px;">${product[i].name}</h5>
            </div>
            <div class="col-2">
                <h5>${product[i].type}</h5>
            </div>
            <div class="col-2">
                <h5 style="margin-left:20px;">${sell1[i]}</h5>
            </div>
            <div class="col-2">
                <h5 style="margin-left:20px;">${product[i].number}</h5>
            </div>
        </div>
        `
        temp++
        }
    }
let data = {
    labels: [
        'Tiểu thuyết',
        'Tâm lí',
        'Kinh dị-Giả tưởng',
        'Tản văn-Tạp văn',
    ],
    datasets: [{
        data: [sell[0], sell[1], sell[2],sell[3]],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'blue',
        'rgb(255, 205, 86)',
        ],
        hoverOffset: 4,
    }]
    };
let config = {
        type: 'pie',
        data: data,
        };

var myPieChart = new Chart(document.getElementById("canvas-0").getContext("2d"),config);
