let json
let customerList=[
    {
        username: 'NguyenA',
        email:'Anguyen1@gmail.com',
        address:'01 Số 1,P.12,Alsaska',
        phonenumber:'043489234',
        password: 1223435,
        status:'1',
    },
    {
        username: 'TranB',
        email:'Btran2@gmail.com',
        address:'27 Số 2,P.10,Đồng Hới',
        phonenumber:'0936721892',
        password: 8594385,
        status:'1',
    },
    {
        username: 'LeC',
        email:'Cle3@gmail.com',
        address:'02 Số 3,P.2,Đồng Nai',
        phonenumber:'0947284620',
        password: 1526374,
        status:'1',
    },
    {
        username: 'HoangD',
        email:'Dhoang4@gmail.com',
        address:'72 Số 4,P.Thảo Điền,Quận 2, Tp. Hồ Chí Minh',
        phonenumber:'0193856294',
        password: 3836274,
        status:'1',
    },
    {
        username: 'VoE',
        email:'Evo5@gmail.com',
        address:'50 Số 5,P.22,Quận Bình Thạnh',
        phonenumber:'0384739184',
        password: 8462846,
        status:'1',
    },
    {
        username: 'DoF',
        email:'Fdo6@gmail.com',
        address:'05 Số 6,P.Phú Mỹ Hưng,Quận 7',
        phonenumber:'0385628471',
        password: 2846374,
        status:'1',
    },
    {
        username: 'HuynhG',
        email:'Ghuynh7@gmail.com',
        address:'100 Số 7,P.Bến Thành,Quận 1',
        phonenumber:'0482749284',
        password: 3857264,
        status:'1',
    },
]
if (localStorage.getItem('customerList')==null){
    json=JSON.stringify(customerList)
    localStorage.setItem('customerList',json)
}
else{
    json=localStorage.getItem('customerList')
    customerList=JSON.parse(json)
}

for (let i=0;i<customerList.length;i++){
    if (customerList[i].code==1)
    localStorage.setItem(customerList[i].username,{
        username:customerList[i].username,
        password:customerList[i].password,
    })
}

let order=[
    {
        status:'-1',
        phone:'0394827938',
        address:'101, đường Số 1, p.Số 2, quận 3, TP.Hồ Chí Minh',
        customer:'Bảo',
        detail:[0,0,2,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,4],

    },
    {
        status:'1',
        phone:'0394839483',
        address:'202, đường Số 2, p.Số 3, quận 4, TP.Hồ Chí Minh',
        customer:'Yến',
        detail:[0,0,0,0,0,0,0,0,3,1,0,0,0,0,0,0,0,0,0,0,0,0,0,3],

    },
    {
        status:'-1',
        phone:'0485628492',
        address:'303, đường Số 4, p.Số 5, quận 6, TP.Hồ Chí Minh',
        customer:'Hà',
        detail:[0,0,2,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1],

    },
    {
        status:'-1',
        phone:'0837483729',
        address:'404, đường Số 5, p.Số 6, quận 7, TP.Hồ Chí Minh',
        customer:'Châu',
        detail:[0,0,0,6,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0],

    },
    {
        status:'-1',
        phone:'0938475829',
        address:'505, đường Số 6, p.Số 7, quận 8, TP.Hồ Chí Minh',
        customer:'fuaisf231',
        detail:[0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    },
    {
        status:'-1',
        phone:'0183746294',
        address:'66, đường Số 7, p.Số 2, quận 1, TP.Hồ Chí Minh',
        customer:'Tiến',
        detail:[0,0,0,1,0,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    },
]

if (localStorage.getItem('order')==null){
    json=JSON.stringify(order)
    localStorage.setItem('order',json)
}
else{
    json=localStorage.getItem('order')
    order=JSON.parse(json)
}


// Danh sách sản phẩm
let numberCart=0
let product=[]

document.querySelector('.cart span').innerText = numberCart;
numberCart=localStorage.getItem('numberCart')
if (numberCart!=null)
    document.querySelector('.cart span').textContent=numberCart
else
    numberCart=0
product=[
    {name: 'Cây Cam Ngọt Của Tôi',code:'', type: 'Tiểu thuyết', realValue: '108000', cost: '97000', number: 10, NXB:'Nhà Xuất Bản Hội Nhà Văn' , author:'José Mauro de Vasconcelos'},
    {name: 'Tàn Ngày Để Lại',code:'', type: 'Tiểu thuyết', realValue: '160000', cost: '148000', number: 10, NXB:'Nhà Xuất Bản Văn Học' , author:'Kazuo Ishiguro'},
    {name: 'Và Rồi Núi Vọng',code:'', type: 'Tiểu thuyết', realValue: '133500', cost: '88800', number: 10, NXB:'Nhà Xuất Bản Hội Nhà Văn' , author:'Khaled Hosseini'},
    {name: 'Trái Tim Của Quỷ',code:'', type: 'Tiểu thuyết', realValue: '117400', cost: '89500', number: 10, NXB:'Nhà Xuất Bản Dân Trí' , author:'Mahokaru Numata'},
    {name: 'Chết Giữa Mùa Hè',code:'', type: 'Tiểu thuyết', realValue: '184000', cost: '176200', number: 10, NXB:'Nhà Xuất Bản Hội Nhà Văn' , author:'Yukio Mishima'},
    {name: 'Những Chuyện Tình Thế Kỷ Mới',code:'', type: 'Tiểu thuyết', realValue: '201000', cost: '166000', number: 10, NXB:'Nhà Xuất Bản Phụ Nữ' , author:'Tàn Tuyết'},
    {name: 'Sắc Màu Nội Tâm',code:'', type: 'Tâm lý', realValue: '122000', cost: '97000', number: 10, NXB:'Nhà Xuất Bản Thanh Niên' , author:'Thượng Quan Chiêu Nghi'},
    {name: 'Bản Chất Của Dối Trá',code:'', type: 'Tâm lý', realValue: '149000', cost: '119000', number: 10, NXB:'Nhà Xuất Bản Lao Động Xã Hội' , author:'Dan Ariely'},
    {name: 'Tôi Ước Mình Chưa Từng Được Sinh Ra',code:'', type: 'Tâm lý', realValue: '90000', cost: '72300', number: 10, NXB:'' , author:'Yim Minkyung'},
    {name: 'Những Kẻ Cuồng Nhạc',code:'', type: 'Tâm lý', realValue: '230000', cost: '184500', number: 10, NXB:'Nhà Xuất Bản Thế Giới' , author:'Oliver Sacks'},
    {name: 'Thấu Hiểu Chính Mình',code:'', type: 'Tâm lý', realValue: '96000', cost: '76500', number: 10, NXB:'Nhà Xuất Bản Dân Trí' , author:'Megan Logan'},
    {name: 'Bạn Đắt Giá Bao Nhiêu?',code:'', type: 'Tâm lý', realValue: '119000', cost: '95000', number: 10, NXB:'Nhà Xuất Bản Thế Giới' , author:'Vãn Tình'},    
    {name: 'Quán Canh Bò Hầm Của Kẻ Cắp Quá Khứ',code:'', type: 'Kinh dị - Giả tưởng', realValue: '212000', cost: '176500', number: 10, NXB:'Nhà Xuất Bản Hà Nội' , author:'Youngtak Kim'},
    {name: 'Trăng Tròn Lần Tới Xin Hãy Đến Gặp Tôi',code:'', type: 'Kinh dị - Giả tưởng', realValue: '99000', cost: '79000', number: 10, NXB:'Nhà Xuất Bản Thế Giới' , author:'Kim Seong Joong'},
    {name: 'Sát Nhân Mạng',code:'', type: 'Kinh dị - Giả tưởng', realValue: '145000', cost: '116000', number: 10, NXB:'Nhà Xuất Bản Lao Động' , author:'Jeffery Deaver'},
    {name: 'Người Vô Hình',code:'', type: 'Kinh dị - Giả tưởng', realValue: '80000', cost: '64000', number: 10, NXB:'Nhà Xuất Bản Văn Học' , author:'H.G.Wells'},
    {name: 'Người Minh Họa',code:'', type: 'Kinh dị - Giả tưởng', realValue: '118000', cost: '94400', number: 10, NXB:'Nhà Xuất Bản Văn Học' , author:'Ray Bradbury'},
    {name: 'Nắm Bàn Tay Lạnh Giá',code:'', type: 'Kinh dị - Giả tưởng', realValue: '179000', cost: '142000', number: 10, NXB:'Nhà Xuất Bản Hà Nội' , author:'Robert Aickman'},
    {name: 'Trưởng Thành Là Khi Nỗi Buồn',code:'', type: 'Tản văn - Tạp văn', realValue: '88000', cost: '70800', number: 10, NXB:'Nhà Xuất Bản Văn Học' , author:'Writinman'},
    {name: 'Hẹn Nhau Phía Sau Tan Vỡ',code:'', type: 'Tản văn - Tạp văn', realValue: '86000', cost: '68800', number: 10, NXB:'Nhà Xuất Bản Phụ Nữ' , author:'An'},
    {name: 'Những Người Đàn Ông Không Có Đàn Bà',code:'', type: 'Tản văn - Tạp văn', realValue: '100000', cost: '80800', number: 10, NXB:'Nhà Xuất Bản Hội Nhà Văn' , author:'Haruki Murakami'},
    {name: 'Thiên Tài Bên Trái, Kẻ Điên Bên Phải ',code:'', type: 'Tản văn - Tạp văn', realValue: '179000', cost: '143000', number: 10, NXB:'Nhà Xuất Bản Thế Giới' , author:'Cao Minh'},
    {name: 'Chắc Gì Ta Đã Yêu Nhau',code:'', type: 'Tản văn - Tạp văn', realValue: '88000', cost: '70000', number: 10, NXB:'Nhà Xuất Bản Phụ Nữ' , author:'Minh Nhật'},
    {name: 'Lắng Nghe Gió Hát',code:'', type: 'Tản văn - Tạp văn', realValue: '75000', cost: '60000', number: 10, NXB:'Nhà Xuất Bản Hội Nhà Văn' , author:'Haruki Murakami'},
    {name: 'Những Nỗi Sợ Sâu Thẳm',code:'', type: 'Tiểu thuyết', realValue: '109000', cost: '87000', number: 10, NXB:'Nhà Xuất Bản Hà Nội' , author:'Fran Krause'},
    {name: 'Đời Nhẹ Khôn Kham',code:'', type: 'Tiểu thuyết', realValue: '129000', cost: '103000', number: 10, NXB:'Nhà Xuất Bản Hội Nhà Văn' , author:'Milan Kundera'},
    {name: 'Bụi Sao',code:'', type: 'Tiểu thuyết', realValue: '119000', cost: '97000', number: 10, NXB:'Nhà Xuất Bản Hà Nội' , author:'Neil Gaiman'},
    {name: 'Hy Vọng Mong Manh',code:'', type: 'Tiểu thuyết', realValue: '158000', cost: '126000', number: 10, NXB:'Nhà Xuất Bản Hà Nội' , author:'Shizukui Shusuke'},
    {name: 'Tâm Lý Học Nói Gì Về Nỗi Đau?',code:'', type: 'Tâm lý', realValue: '86000', cost: '68000', number: 10, NXB:'Nhà Xuất Bản Thế Giới' , author:'Richard Gross'},
    {name: 'Thế Giới Không Có Người Xấu',code:'', type: 'Tâm lý', realValue: '89000', cost: '71000', number: 10, NXB:'Nhà Xuất Bản Dân Trí' , author:'Whon Jaehun'},
    {name: 'Hiểu Tâm Lý Rành Tâm Ý',code:'', type: 'Tâm lý', realValue: '123000', cost: '97000', number: 10, NXB:'Nhà Xuất Bản Phụ Nữ' , author:'Huy Đức'},
    {name: 'Tâm Lý Học Tính Cách',code:'', type: 'Tâm lý', realValue: '109000', cost: '87000', number: 10, NXB:'Nhà Xuất Bản Phụ Nữ' , author:'Trâu Hoàng Minh'},
    {name: 'Bí Ẩn Sun Down',code:'', type: 'Kinh dị - Giả tưởng', realValue: '155000', cost: '127000', number: 10, NXB:'Nhà Xuất Bản Thanh Niên' , author:'Simone ST. James'},
    {name: 'Tiệm Cắt Tóc Lúc Nửa Đêm',code:'', type: 'Kinh dị - Giả tưởng', realValue: '119000', cost: '92000', number: 10, NXB:'Nhà Xuất Bản Thanh Niên' , author:'Kousuke Sawamura'},
    {name: 'Bóng Đêm Ám Ảnh',code:'', type: 'Kinh dị - Giả tưởng', realValue: '152000', cost: '121000', number: 10, NXB:'Nhà Xuất Bản Thanh Niên' , author:'Egan Hughes'},
    {name: 'Về Nhà Trước Trời Tối',code:'', type: 'Kinh dị - Giả tưởng', realValue: '155000', cost: '124000', number: 10, NXB:'Nhà Xuất Bản Lao Động' , author:'Riley Sager'},
    {name: 'Và Sao Không Thể Hết Yêu Em?',code:'', type: 'Tản văn - Tạp văn', realValue: '88000', cost: '70000', number: 10, NXB:'Nhà Xuất Bản Phụ Nữ' , author:'Nhiều Tác Giả'},
    {name: 'Có Một Nỗi Buồn Vừa Ngang Qua Đây',code:'', type: 'Tản văn - Tạp văn', realValue: '88000', cost: '70000', number: 10, NXB:'Nhà Xuất Bản Văn Học' , author:'Gã'},
    {name: 'Từ Điển Của Những Nỗi Buồn Không Tên',code:'', type: 'Tản văn - Tạp văn', realValue: '129000', cost: '103000', number: 10, NXB:'Nhà Xuất Bản Thế Giới' , author:'John Koenig'},
    {name: 'Những Đứa Trẻ Chưa Lớn',code:'', type: 'Tản văn - Tạp văn', realValue: '109000', cost: '97000', number: 10, NXB:'Nhà Xuất Bản Thế Giới' , author:'Elvis Nguyễn'},

]
for (let i=0;i<product.length;i++){
    product[i].code="./asset/image/"+(i+1)+".png"
}
if (localStorage.getItem('product')==null){
    json=JSON.stringify(product)
    localStorage.setItem('product',json)
}
else{
    json=localStorage.getItem('product')
    product=JSON.parse(json)
}
let describe=[
'Cây Cam Ngọt Của Tôi là một câu chuyện về nổi đau và tình yêu thương, đưa chúng ta vào một hành trình khám phá để tự trả lời câu hỏi: Cuộc đời có đáng sống không? Zezé có đủ sự hoạt bát và tinh nghịch mà một đứa trẻ năm tuổi có thể có, cậu bé cũng có đủ sự thông minh và những suy nghĩ rối ren phức tạp mà ít đứa trẻ năm tuổi nào có thể có.',
'Stevens là một quản gia người Anh với tất cả mọi hàm nghĩa của từ này: tận tụy, chỉn chu, trung thành, và trên hết, luôn luôn có một ý thức mãnh liệt về phẩm giá nghề nghiệp. Mong muốn cải thiện chất lượng phục vụ tại dinh thự và chấm dứt những sa sút hiện tại, Stevens dấn thân vào một cuộc hành trình đi qua Miền Tây nước Anh. Mỗi chặng trên cuộc hành trình mở ra một cánh cửa nối về quá khứ, và dần dà hành trình ấy làm hé lộ những mất mát và nuối tiếc theo sau những ảo tưởng của một đời người',
'Abdullah và Pari sống cùng cha, mẹ kế và em khác mẹ trong ngôi làng nhỏ xác xơ Shadbagh, nơi đói nghèo và mùa đông khắc nghiệt luôn chực chờ cướp đi sinh mệnh lũ trẻ. Abdullah yêu thương em vô ngần, còn với Pari, anh trai chẳng khác gì người cha, chăm lo cho nó từng bữa ăn, giấc ngủ. Mùa thu năm ấy hai anh em theo cha băng qua sa mạc tới thành Kabul náo nhiệt, không mảy may hay biết số phận nào đang chờ đón phía trước: một cuộc chia ly sẽ mãi đè nặng lên Abdullah và để lại nỗi trống trải mơ hồ không thể lấp đầy trong tâm hồn Pari…',
'Ryosuke là một chàng trai với gia cảnh bình thường, vốn dĩ anh tưởng rằng cuộc đời mình sẽ trôi qua êm đềm như vậy mãi. Cho đến một ngày mọi sự đen đủi trên đời theo nhau ập đến cuộc đời anh. Vị hôn thê sắp cưới đột nhiên biến mất, người mẹ anh yêu quý gặp tai nạn giao thông qua đời, bố anh mắc phải căn bệnh ung thư khó lòng cứu chữa, bà ngoại thì bệnh tật nằm trong viện dưỡng lão. Những tưởng những sự việc kỳ quái chỉ dừng lại ở đó, thì trong một lần về thăm bố Ryosuke tình cờ phát hiện 4 cuốn sổ cũ nằm trong tủ âm tường. Những cuốn sổ với tiêu đề Yurigokoro cùng với lời lẽ vô cùng dị thường.',
'Chết Giữa Mùa Hè là tập truyện kết tinh những lý tưởng sống cốt lõi cùng những góc khuất ẩn ức thậm sâu trong con người Yukio Mishima. Đó là sự ngợi ca và nỗi ám ảnh thường trực dành cho cái chết, là tiếng khóc hoan lạc và bi ai của những tâm hồn đang yêu muốn được giải phóng khỏi sự hạn hẹp của giới tính và xác thịt, là nỗi cô đơn vĩnh cửu của nhân loại lúc bình',
'Những Chuyện Tình Thế Kỷ Mới là câu chuyện dốc lòng theo đuổi cuộc sống xứng đáng của những con người bình thường nhất, có thể gặp ở bất cứ đâu trên cõi đời này. Họ khao khát một cuộc sống tự do và bất chấp tất cả để theo đuổi thứ tự do ấy. Mà tình yêu chính là tột đỉnh của tự do. Nhưng giữa thế kỷ mới đầy biến động và phức tạp, chủ nghĩa vật chất lên ngôi, trên trái đất còn được bao nhiêu người tin vào tình yêu?',
'Trong sâu thẳm nội tâm chúng ta, mỗi một cảm xúc trỗi dậy, mỗi một suy nghĩ xao động, tất cả những thay đổi về ý niệm và ý thức đều có thể tạo ra những kỳ tích mới. Sự sáng tạo đó được thể hiện thông qua năng lượng màu sắc và phương pháp chữa lành bằng màu sắc. Bậc thầy về màu sắc Thượng Quan Chiêu Nghi sẽ tiết lộ bí mật của màu sắc và tinh thần cho bạn thông qua cuốn sách này. 13 màu sắc giúp bạn giải mã những nút thắt trong lòng và làm vơi bớt những cảm xúc tiêu cực nặng nề! 13 màu sắc tương ứng với 13 phương pháp chữa lành giúp bạn được thả mình trong trò chơi sắc màu, phục hồi cuộc sống mới!',
'Trong cuốn sách "Bản chất của dối trá" cuốn sách từng đoạt giải thưởng lớn - tác giả sách bán chạy nhất, Dan Ariely cho thấy tại sao một số điều dễ nói dối hơn những điều khác, làm thế nào để gặp ít vấn đề hơn chúng ta tưởng hơn khi bị lừa dối, và cách hoạt động kinh doanh đã mở đường cho các hành vi phi đạo đức, cả cố ý lẫn vô ý như thế nào. Ariely đã khám phá ra cách thức hoạt động của các hành vi phi đạo đức trong cuộc sống riêng, công việc và chính trị, và nó đã ảnh hưởng đến tất cả chúng ta như thế nào, ngay cả khi chúng ta nghĩ mình có những tiêu chuẩn đạo đức cao. Ariely cũng xác định những gì giúp chúng ta trung thực, chỉ đường cho việc trở thành người có đạo đức hơn trong cuộc sống hàng ngày của chúng ta.',
'Tác giả của cuốn sách này, với vai trò là một chuyên gia về tâm lý học, sẽ giải đáp những câu hỏi xoay quanh tâm lý của những người có ý định tự sát thông qua những "trải nghiệm" văn học. Một phương thức để "hiểu đầy đủ về tự tử" thông qua những nhân vật trong các cuốn tiểu thuyết kinh điển mà chúng ta có thể đã từng đọc qua. Những nhân vật được phân tích trong cuốn sách này là những người muốn hoặc đang cố gắng tự tử, thường xuyên nghĩ đến việc tự tử hoặc gây tổn hại tới chính mình. Họ cũng là những người mắc chứng trầm cảm, ảo tưởng thính giác hoặc nghiện chất kích, liên tục tiến gần hơn tới việc tự sát.',
'Musicophilia là một chứng bệnh “lạ”, những người mắc nó trở nên say mê âm nhạc tột độ. Họ sống, thở trong bầu không khí âm nhạc, như thể bị âm nhạc chiếm hữu linh hồn, như thể trong tâm hồn họ đầy nhạc tính, chỉ chực chờ để “bật lên”. Từ các ca có triệu chứng trên, đột khởi hay vốn có, nhưng điểm chung ở họ là đều mắc những căn bệnh bẩm sinh liên quan đến thần kinh hoặc từng trải qua những tai nạn ảnh hưởng đến não bộ - Oliver Sacks đưa chúng ta bước vào thế giới của mối liên hệ giữa âm nhạc và não bộ: vùng não nào đóng vai trò trong việc chi phối sự cuồng mê nhạc; những căn bệnh, tai nạn ảnh hưởng đến vùng não này lại khiến vùng não kia đột ngột trở nên thích thú âm nhạc ra sao.',
'Bạn cảm thấy như bị rút cạn năng lượng bởi công việc, gia đình và các mối quan hệ xung quanh mình? Bạn mệt mỏi khi luôn phải để ý tới nhu cầu của người khác, cố gắng làm vừa lòng tất cả mọi người? Để duy trì sự cân bằng lành mạnh trong cuộc sống, điều quan trọng là chúng ta phải biết cách chăm sóc bản thân, quan tâm nhiều hơn tới những cảm xúc và nhu cầu của chính mình. Thông qua những lời khuyên cũng như bài tập thực hành hữu ích, tác giả Megan Logan sẽ giúp chúng ta nhận biết và nuôi dưỡng sức mạnh trong mình, từ đó học cách yêu thương bản thân và tạo dựng một cuộc sống tràn đầy ý nghĩa.',
'Hơn bốn mươi câu chuyện trong sách xoay quanh các chủ đề tình yêu, hôn nhân, gia đình, sự nghiệp… đến từ chính cuộc sống của tác giả và những người xung quanh, vừa thực tế lại vừa gợi mở, dễ dàng giúp chúng ta liên hệ với tình huống của chính mình. Với những câu chuyện đó, Vãn Tình hi vọng có thể giúp các cô gái thoát khỏi tình cảnh khó khăn, tìm lại bản ngã, sống cuộc đời theo cách mà mình mong muốn. Đọc cuốn sách này, đôi khi bạn nên dừng lại và thành thực với bản thân, liệu bạn có đang là phiên bản mà bạn yêu thích nhất, phiên bản bạn mong muốn trở thành. Hãy thử trả lời các câu hỏi: Sự thỏa hiệp có làm bạn hạnh phúc hay không? Bạn có đang cố gắng lấy lòng tất cả mọi người? Bạn có dám thay đổi?... Và quan trọng nhất: "Bạn đắt giá bao nhiêu?"',
'Hàn Quốc năm 2063, con người đã sở hữu những công nghệ tân tiến ngoài sức tưởng tượng và thậm chí còn có thể du hành thời gian trở về quá khứ, tất nhiên với một cái giá không nhỏ: phải đánh cược mạng sống của mình. Lee Woo Hwan là phụ bếp một quán canh thịt bò hầm ở Busan đã hai mươi năm, sống cuộc đời tầm thường, không nơi nương tựa không người bấu víu, không quá khứ đẹp đẽ để hồi tưởng cũng không cả tương lai để trông mong. Nhận lời đề nghị của chủ quán, Woo Hwan lên tàu trở về quá khứ hòng tìm lại hương vị nguyên bản của món canh bò. Nhưng mục đích đơn thuần ban đầu dần nhường chỗ cho một khao khát ngày càng cháy bỏng trong anh. Khao khát một tương lai được sống bình thường và hạnh phúc như bao người, Woo Hwan liều lĩnh tìm cách biến quá khứ trở thành hiện tại, cam tâm đánh đổi không chỉ một mạng người…',
'Mở cuốn sách này ra, hẳn là bạn đã được đưa vào một trải nghiệm đầy mẫu thuẫn, như bước qua khu vườn đầy cây độc rực rỡ và thơm ngát hay mơ một cơn ác mộng toàn những cảnh tượng ngọt ngào. Những tác phẩm mà nhà kể chuyện thiên phú Kim Seong Joong mang tới đều tràn đầy khát vọng vẹn nguyên để không rơi vào bất cứ quán tính nào của thế giới này. Truyện của cô gợi lên đủ mọi cung bậc cảm xúc nhưng đồng thời cũng mang một chút không khí lạnh lẽo khiến cho người đọc không thể bớt căng thẳng dù chỉ trong chốc lát.',
'Với Sát nhân mạng, cây viết tiểu thuyết trinh thám nổi tiếng Jeffery Deaver đã khai thác một chủ đề mới về hacker và thế giới máy tính, những thứ vô cùng gắn bó với cuộc sống hiện đại. Câu chuyện xuất phát từ ý niệm rất giản đơn: Sẽ đáng sợ thế nào nếu ai đó có thể biết mọi điều về cuộc sống của chúng ta - những điều chúng ta nghĩ là bí mật của riêng mình, và sử dụng chính những thông tin ấy để sát hại chúng ta. Nỗi cô đơn và sự ruồng bỏ suốt thuở thiếu thời đã biến Phate thành một hacker máu lạnh. Hắn chui vào vỏ bọc của mình trong thế giới máy tính, và tin rằng thế giới thực chỉ là một trò chơi nhập vai, nơi hắn giết người như một nhân vật trong trò chơi để giành điểm số. Mỗi trang sách là một cuộc rượt đuổi đầy cam go trên thế giới máy tính và cả ngoài đời thực. Cứ mỗi lần tưởng chừng đã tóm được tay sát nhân hàng loạt, thì hắn lại vụt khỏi tầm tay.',
'Người Vô Hình là một trong những tiểu thuyết nổi tiếng nhất trong đời viết văn của H.G. Wells, tác gia lớn người Anh. Truyện kể về Griffin, nhà khoa học nghèo có tài năng thiên bẩm về vật lí, người đã tìm ra bí thuật tàng hình. Ảo mộng quyền lực cộng thêm hoàn cảnh đẩy đưa đã biến Griffin thành kẻ vĩ cuồng, mưu toan dùng khả năng vô hình để thống trị thiên hạ. Ngòi bút H. G. Wells khắc họa Griffin như một kẻ vừa đáng thương vừa đáng ghét, là sát thủ song đồng thời là nạn nhân, tài hoa nhưng thiếu từ tâm. Từng được đăng dài kì trên tạp chí Pearson’s Weekly, sau đó in thành sách năm 1897, Người Vô Hình đã nhiều lần được chuyển thể thành phim điện ảnh, phim truyền hình, và cả phim hoạt họa. Phim ảnh, sách truyện ăn theo hoặc dựa trên ý tưởng của Wells thì nhiều không kể xiết. Cho đến nay, đây vẫn là một trong các tác phẩm khoa học viễn tưởng mê hoặc và truyền cảm hứng tới đông đảo độc giả trên khắp toàn cầu.',
'Mỗi bức tranh trên thân thể ông ta là một câu chuyện. Một câu chuyện có thật, sống sít, đầy máu, cái chết, nỗi tuyệt vọng, sự day dứt. Những câu chuyện giả tưởng (hay chẳng giả tưởng cho lắm) về tương lai của loài người, một tương lai đầy ắp những phương tiện công nghệ mà với thời đại ngày nay là khó hình dung, một tương lai thiếu vắng tính người. Bằng giọng văn đơn sơ, chuẩn xác, lạnh lùng, với chút trào lộng quyện với ít nhiều u ẩn, một lần nữa, Ray Bradbury, tác giả của 451 độ F lừng danh, cho ta thấy rằng, về thực chất, khoa học viễn tưởng là một thể loại văn chương nghiêm túc và sâu thẳm như thế nào trong việc bắt con người phản tỉnh.',
'Nắm Bàn Tay Lạnh Giá là một trong những tuyển tập hay nhất của Aickman. Nó bao gồm tám câu chuyện đã thể hiện được trọn vẹn phong cách viết "kỳ lạ" và mơ hồ hơn chuyện ma thông thường của ông. Xuyên suốt các câu chuyện, người đọc được làm quen với nhiều loại nhân vật khác nhau, từ một người đàn ông qua đêm trong Nhà tế bần cho đến một quý tộc Đức và một người phụ nữ có thể nhìn thấy được hình ảnh của chính linh hồn cô ta. Cũng có ở đ câu chuyện về ma cà rồng thông thường nhưng qua cách kể chuyên khác thường, điều này lại khiến nó trở nên càng thêm phần hoảng hốt và gây cấn.',
'Ngày trước cứ nghĩ rằng lớn lên sẽ thích lắm, muốn làm gì cũng được, không ai quản. Đúng là như vậy, nhưng cái giá phải trả chính là sự cô đơn. Sự trưởng thành ập đến mà không báo trước, tựa cơn mưa ồ ạt đổ ngang, xối xả ồn ào, mãnh liệt gột trôi mọi nét ngây thơ non nớt của mỗi người. Buộc chúng ta phải mang một chiếc ô nhỏ chống đỡ cơn mưa, mang một cái mũ rộng vành che đi giọt nắng gay gắt. Nhưng dù có che chắn tốt đến đâu, vẫn ướt bởi những giọt mưa, vẫn để lại những vết sạm do nắng đi qua.',
'Cuốn sách này…Dành tặng những tâm hồn tan vỡ, đã yêu, đã chia ly, đã từ biệt…Và lời chúc cho một cuộc hạnh ngộ đủ đầy yêu thương.',
'Những người đàn ông không có đàn bà là tập truyện ngắn mới nhất ra đời sau chín năm kể từ tập truyện ngắn Những câu chuyện kỳ lạ ở Tokyo, xuất bản năm 2005. Những người đàn ông không có đàn bà không phải là những câu chuyện được viết lẻ tẻ rồi nhét đại thành một tập sách. Thay vào đó, các truyện ngắn được thiết lập theo một mô-típ, một chủ đề riêng, sắp xếp các truyện theo khái niệm. Mô-típ của tập truyện Tất cả con của Chúa đều nhảy là trận động đất Kobe năm 1995, còn của Những câu chuyện kỳ lạ ở Tokyo là những câu chuyện bí ẩn xung quanh những người sống ở đô thị. Mô-típ của tập truyện này là những người đàn ông không có đàn bà.',
'"Thiên tài bên trái, kẻ điên bên phải" là cuốn sách dành cho những người điên rồ, những kẻ gây rối, những người chống đối, những mảnh ghép hình tròn trong những ô vuông không vừa vặn… những người nhìn mọi thứ khác biệt, không quan tâm đến quy tắc. Bạn có thể đồng ý, có thể phản đối, có thể vinh danh hay lăng mạ họ, nhưng điều duy nhất bạn không thể làm là phủ nhận sự tồn tại của họ. Đó là những người luôn tạo ra sự thay đổi trong khi hầu hết con người chỉ sống rập khuôn như một cái máy. Đa số đều nghĩ họ thật điên rồ nhưng nếu nhìn ở góc khác, ta lại thấy họ thiên tài. Bởi chỉ những người đủ điên nghĩ rằng họ có thể thay đổi thế giới mới là những người làm được điều đó. Chào mừng đến với thế giới của những kẻ điên.',
'Ngày ấy… người có yêu ta? Cuộc đời này, có những khoảng trống sinh ra không phải để lấp đầy, giống như em trong những ngày hanh hao đột nhiên thấy lòng mình hoài nghi nhiều. Như Lê Cát Trọng Lý từng gọi nó là những “hoang mang cần thiết” em cần có để biết trái tim còn biết rung động, biết đau và biết yêu. Nếu có những ngày trong đời, lòng em băn khoăn điều ấy, thì cuốn tản văn của Minh Nhật – CHẮC GÌ TA ĐÃ YÊU NHAU sẽ giúp em tìm được đáp án cho những khúc mắc mà bấy lâu em vẫn giữ riêng mình.',
'Mười tám ngày của mùa hè năm hai mươi tuổi, đối với "tôi" là một kỳ nghỉ hè không sự kiện. Bất chấp những tối uống tràn ở quán Jays Bar cùng cậu bạn mang tên Chuột hay mối quen tình cờ với cô gái ở cửa hàng đĩa hát, thành phố quê hương ven biển mùa hè chỉ còn là gió trong "tôi". Nhưng chuyển kể về gió, tiếng gió hát bên bờ biển, và cảm giác tuổi thanh xuân trôi qua như gió. Mười tám ngày ấy đã gói ghém cả quá khứ, hiện tại, tương lai cùng với hoang mang, mất mát và cô đơn...',
'Ai trong chúng ta cũng có những nỗi ám ảnh. Họa sĩ truyện tranh Fran Krause đã dùng ý tưởng của bản thân và thu thập chia sẻ của độc giả khắp thế giới để tạo nên Deep dark fears - một tuyển tập minh họa những nỗi sợ sâu kín của con người - từng làm mưa làm gió trên mạng. Bạn sẽ tìm thấy trong tuyển tập này những nỗi sợ quen thuộc như nhìn thấy ma trong gương phòng ngủ, bị hút vào thang cuốn ở trung tâm thương mại,… cho đến những nỗi sợ kỳ quặc như sợ kiến làm tổ trong đầu khi ngậm kẹo mút đi ngủ, sợ tự tháo tung chính mình khi nhổ một sợi tóc, sợ thức giấc và nhận ra mình chỉ là một chú chó,… Và cả những nỗi sợ hài hước kiểu như: “Đôi khi trong lúc đi ị, tôi sợ rằng đấy chỉ là MỘT GIẤC MƠ. Và thực tế là tôi đang ị đùn ở đâu đó.” Nét minh họa sống động của Fran Krause cùng những tình huống rùng rợn trong mỗi trang sách sẽ dẫn bạn đi từ phen hú hồn này đến pha thót tim khác, và không ngừng kích thích óc tưởng tượng của bạn. Chúc bạn có những trải-nghiệm-để-đời với NHỮNG NỖI SỢ SÂU THẲM!',
'Trong Đời nhẹ khôn kham, sự biến mất cái tôi cá nhân không phải do máy móc kỹ thuật mà do nhà nước chuyên chế. Nhân vật Jan Prochazka và giáo sư Vaclav Cerny chơi thân với nhau, nhưng họ không thể ngờ rằng tất cả cuộc trò chuyện trong bàn tiệc đều được bí mật ghi âm lại. Vào năm 1970 hay 1971, muốn làm mất uy tín của Prochazka, cảnh sát cho phát những cuộc nói chuyện ấy trên đài phát thanh.',
'Đến tuổi cập kê, Tristran Thorn đem lòng si mê một thiếu nữ xinh đẹp trong ngôi làng Bức Tường nơi anh lớn lên. Vì lời hứa sẽ cùng cô sánh vai trong thánh đường, chàng trai trẻ khăn gói lên đường tiến vào Xứ Tiên để tìm một ngôi sao băng từ trên trời rơi xuống. Chuyến phiêu lưu ở xứ sở kỳ lạ, rùng rợn mà đầy nhiệm màu đã xoay chuyển con người và thế giới quan của Tristran theo những cách anh chưa từng ngờ đến, biến anh thành một người hùng chân chính trong câu chuyện của mình. Cổ quái và nhân văn, đen tối và giàu cảm xúc, Bụi sao đem đến vô khối những câu chuyện chưa kể đằng sau cuộc hành trình tầm mộng của một vị anh hùng trẻ tuổi, cốt để chứng tỏ rằng chuyện thần tiên thực chất cũng dành cho người lớn.',
'Kiến trúc sư Kazuto và người vợ Kiyomi đang sống bình yên với cậu con trai Tadashi học lớp 10, và con gái Miyabi chuẩn bị lên cấp ba. Một chấn thương khi chơi bóng đá khiến Tadashi không thể tiếp tục theo đuổi đam mê, từ đó cậu chán chường, đôi lúc chơi bời qua đêm bên ngoài. Không ngờ, vào một tối cuối tuần trước khi kỳ nghỉ hè kết thúc, Tadashi ra khỏi nhà đi chơi như mọi khi và không quay về. Hai ngày sau, một xác chết là thiếu niên cấp ba được phát hiện – cậu bé bị đánh hội đồng và là bạn của Tadashi. Người ta được biết còn một nạn nhân nữa chưa tìm thấy. Vợ chồng Kazuto đã trải qua đủ loại cung bậc cảm xúc. Họ hy vọng vào sự thực nào đây: đứa con trai duy nhất là nạn nhân hay hung thủ? Dù là trường hợp nào cũng đều quá cay đắng và nghiệt ngã.',
'Tâm lý học nói gì về nỗi đau?” là một cuốn sách nhân văn phân tích những phản ứng đa dạng của chúng ta khi mất đi một người thân yêu, cũng như đi sâu tìm hiểu cách các nhà tâm lý học giải thích về trải nghiệm này. Cuốn sách cũng khảo nghiệm các tập quán văn hóa - xã hội vốn đang định khung hoặc hạn chế hiểu biết về quá trình đau buồn, từ bộ môn phân tâm học tiên phong của Sigmund Freud cho tới quan niệm đã bị phủ nhận về các "giai đoạn" của nỗi đau. Ai trong đời cũng phải trải qua nỗi đau mất người thân, và “Tâm lý học nói gì về nỗi đau?” sẽ giúp bạn hiểu thêm về cảm xúc đau buồn đi cùng trải nghiệm ấy, của cả bản thân lẫn những người khác.',
'Gửi đến bạn, người vẫn thường cảm thấy tổn thương, cô đơn và mỏi mệt, hãy mở cuốn sách này ra để đón nhận sự an ủi, vỗ về và tìm thấy những phút giây khiến trái tim bạn hạnh phúc. “Thế giới không có người xấu” là cuốn sách gói gọn những tâm tình chưa thể giãi bày từ tác giả muốn gửi đến bạn đọc, đồng thời thể hiện cái nhìn sâu sắc của ông về cuộc đời. Bằng những trải nghiệm thực tế của bản thân, ông cho rằng giống như mọi căn bệnh đều có nguyên do, thực ra trên thế giới này vốn không có người xấu, chỉ là vẫn luôn có những điều bạn chưa biết mà thôi. Bạn hãy thử thay đổi góc nhìn của chính mình, sống bình thản hơn, tập biết ơn những điều nhỏ bé và tích cực lấp đầy cuộc sống bằng những khoảnh khắc tươi sáng nhất. Hy vọng cuốn sách này có thể giúp bạn vững tin bước đi trên hành trình cuộc đời nhiều chông gai.',
'Hiểu tâm lý rành tâm ý đánh dấu cột mốc quay trở lại của cây bút gây tiếng vang “Tại sao em ít nói thế?” - Huy Đức sau 3 năm vắng bóng. Tại đây, Huy Đức lí giải mọi thứ dưới góc nhìn tâm lý học, lột trần mọi điều bạn đang thực sự sợ hãi trong tình yêu, từ đó giúp bạn đối mặt và đón nhận một con người mới hơn của chính mình. Bạn có cơ hội mở rộng thế giới nội tâm dưới nhiều chiều khác nhau để tìm được bản chất của tình yêu mà mình đang thực sự tìm kiếm. Để hiểu rằng muốn có được hạnh phúc thì phải tranh đấu. Hơn cả, yêu là sự kết nối của cảm xúc, nhưng bạn cũng cần tỉnh táo và lý trí để giúp tình yêu luôn lành mạnh và rực rỡ sắc màu.',
'“Tâm lý học tính cách” lấy “chín kiểu hình tính cách” làm trọng tâm, với nền tảng là những lý luận của tâm lý học tính cách và tâm lý học chiều sâu , giới thiệu đến bạn đọc một cách chi tiết về đặc trưng và phương pháp cải thiện khuyết điểm dành cho chín kiểu hình tính cách của con người. Với ngôn từ dễ hiểu, ví dụ sinh động cùng nội dung chi tiết mang tính xác thực cao, tôi tin rằng cuốn sách này không chỉ giúp bạn đọc nhận thức được kiểu hình tính cách của bản thân, mà quan trọng hơn là giúp các bạn phát huy sở trường, đồng thời khắc phục khiếm khuyết của chính mình.',
'Năm 1982, Viv Delaney - một cô gái 20 tuổi - bị mất tích tại nhà nghỉ Sundown đúng vào lúc trên sóng truyền hình đang đưa tin về những vụ án mạng mà nạn nhân là những cô gái trẻ, những người được tìm thấy trong trạng thái không mảnh vải che thân. Vụ mất tích của Viv chìm vào quên lãng do không có một manh mối gì, cũng như những người trong gia đình cô bày tỏ một sự thờ ơ đến kì lạ và có chút gì đó chấp nhận. Năm 2017, cháu của Viv là Carly, khi ấy cũng là một cô gái 20 tuổi, không chấp nhận sự mất tích của bác mình lại chìm vào quên lãng như vậy, quyết định lên đường đến nhà nghỉ Sundown để giải mã bí mật. Tại đây, cô đã gặp những hiện tượng hết sức kì lạ và từng bước lần theo đó để giải mã bí ẩn này.',
'Lạc lối trên một con đường núi xa lạ, hai anh chàng sinh viên đại học Sakura và Takase buộc phải qua đêm tại một nhà ga không có nhân viên điều hành. Vào nửa đêm, khi đi ngang qua những căn nhà bỏ hoang, Takase vô tình nhìn thấy có một tiệm cắt tóc vẫn đang sáng đèn. Bị thôi thúc bởi sự tò mò, Takase lại gần cửa tiệm và kéo cánh cửa ra trước sự ngăn cản của Sakura. Điều gì đang chờ đón họ ở bên trong tiệm cắt tóc kỳ lạ ấy? Tất cả những bí ẩn và sự thật đằng sau nó sẽ được hé lộ trong TIỆM CẮT TÓC LÚC NỬA ĐÊM – Một cuốn sách được độc giả Nhật Bản nhận xét là KHÔNG THỂ ĐOÁN TRƯỚC ĐƯỢC CÁI KẾT!',
'Một “ngôi nhà thông minh” là mơ ước của Joe. Căn nhà ấy tọa lạc tại vùng quê hẻo lánh, nơi mọi thứ được điều khiển thông qua ứng dụng, từ hệ thống đèn cho đến khóa cửa. Sự hòa trộn hoàn hảo giữa nét quyến rũ cổ kính với công nghệ hiện đại. Còn nơi nào tốt hơn nơi này để giúp Lauren vượt qua những sang chấn trong quá khứ?Lauren muốn Joe được hạnh phúc nên cô không nói với anh rằng mình ghét việc phụ thuộc vào công nghệ.Và rồi những biến cố bắt đầu ập đến…',
'Hai mươi lăm năm trước, Maggie Holt cùng với cha mẹ mình chuyển đến Baneberry Hall – một căn nhà mang phong cách Victoria xưa cũ, tọa lạc trong khu rừng Vermont. Họ đã ở căn nhà đó khoảng 3 tuần trước khi cuốn gói chạy trốn trong đêm khuya. Những trải nghiệm này đã cha của cô là Evan tái hiện lại trong cuốn sách mang tên “Ngôi nhà rùng rợn”. Câu chuyện ấy kể lại những sự kiện ma quái và những cuộc gặp gỡ bất thường với các linh hồn độc ác cư ngụ trong căn nhà. Chính những điều đó, đã khiến cuốn sách trở nên nổi tiếng, trở thành hiện tượng xuất bản toàn cầu.',
'Nếu “Thương” của Thìa Đầy Thơ đã khơi dậy những xúc cảm trong lòng bạn theo một cách rất riêng: nhẹ nhàng, lắng đọng và đầy tinh tế thì trong “Và sao không thể hết yêu em” (Thương 2), Thìa Đầy Thơ sẽ cùng bạn đi qua những ngông cuồng, xốc nổi của tuổi trẻ đến ngày có được sự trầm ổn và sâu lắng khi đã trưởng thành.',
'“Có một nỗi buồn vừa ngang qua đây” là những nỗi niềm như thế, đầy chông chênh được cất gọn trong một góc nhỏ không ồn ào và từ từ chia sẻ chúng cho những kẻ có cùng bức tranh cảm xúc. Một chốn nghỉ ngơi đôi ba phút, trút hết những muộn phiền, tâm tư, rồi khi đã nhẹ lòng thì cất bước rời xa tìm kiếm một chốn yên ấm. Này những kẻ cô độc đang mải miết chạy theo vòng xoáy bất định của dòng đời, hãy nhớ rằng dù có bị vùi dập trong giông bão thì phía trước vẫn là bình yên đang chờ đợi chúng ta. Hy vọng cuốn sách này sẽ là vòng tay ấm ôm lấy bạn trên đoạn đường đơn độc, tiếp thêm niềm tin vào một ngày mai tươi đẹp hơn.',
'Cảm giác thật dễ chịu làm sao khi biết được từ mô tả những xúc cảm đã theo bạn cả đời – những xúc cảm mà bạn không hề hay biết người khác cũng cảm thấy. Việc này thậm chí, lạ thay, còn tiếp thêm cho bạn sức mạnh − để được gợi nhắc rằng bạn không hề đơn độc, bạn cũng chẳng điên khùng, bạn chỉ đơn giản là một con người bình thường, nỗ lực vượt qua hàng núi những tình cảnh kỳ lạ mà thôi. Cảm giác mất mát khi đọc xong một cuốn sách hay, cảm nhận được sức nặng của bìa sau cuốn sách đang khóa lại cuộc đời của những nhân vật mà bạn đã thấu hiểu tường tận.',
'Hãy đến với “những đứa trẻ chưa lớn”, độc giả sẽ như được chạm vào mỗi trang viết là mỗi mảnh ghép trong bức tranh cuộc đời, song bức tranh ấy vẫn cần được cảm nhận và vẽ tiếp... “những đứa trẻ chưa lớn” là tập tản văn với những góc nhìn rất riêng, rất khác mà cũng rất thật của tác giả trẻ Elvis Nguyễn được thể hiện bằng câu chữ, văn phong mới lạ, khác biệt. Nhưng kỳ lạ thay, khi người trẻ viết cho người trẻ, với những cảm nghiệm dễ mang đến sự đồng điệu, thấu hiểu từ tuổi thơ và gia đình, sự sống còn và sự ra đi, tình yêu và lòng người, đam mê và tham vọng, nắm và buông, cô độc và cả trầm cảm… để rồi từ đó, độc giả trẻ tự chiêm nghiệm cách sống, tự ráp nên bức tranh cuộc đời mình.',
]
if (localStorage.getItem('describe')==null){
    json=JSON.stringify(describe)
    localStorage.setItem('describe',json)
}
else{
    json=localStorage.getItem('describe')
    describe=JSON.parse(json)
}
let temp
let countPage=parseInt((product.length-1)/9)+1
let pageNumber=localStorage.getItem('pageNumber')
if (location.pathname=='/index.html'||location.pathname=='/') pageNumber=1
pageNumber=parseInt(pageNumber)
if (pageNumber!=null)
    localStorage.setItem('pageNumber',pageNumber)
else
localStorage.setItem('pageNumber',0)

let cardList=document.getElementById("card-list")
let a=product.length-9*(pageNumber-1);
if (a>9) a=9
for (let i=0;i<a;i++){
    if (product[i+(pageNumber-1)*9].realValue!=product[i+(pageNumber-1)*9].cost){
        cardList.innerHTML += `
        <div class="col-lg-3 m-5">
        <div class="card">
            <button class="m-0 p-0 btn btn-primary btn-modal" style="border: none;background: none;" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                <img class="card-img-top" src="${product[i+(pageNumber-1)*9].code}" alt="Card image">
            </button>
            <div class="card-body" >
                <h4 class="card-title" style="height:60px;margin-bottom:0px;">${product[i+(pageNumber-1)*9].name}</h4>
                <p class="card-text" style="text-decoration-line: line-through">${(parseInt(product[i+(pageNumber-1)*9].realValue)).toLocaleString()}đ</p>
                <div class="row">
                    <div class="col-5">
                        <h5 class="text-danger reduce-cost" style="margin-bottom:0px;margin-top:10px;">${(parseInt(product[i+(pageNumber-1)*9].cost)).toLocaleString()}đ</h5>
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
                <img class="card-img-top" src="${product[i+(pageNumber-1)*9].code}" alt="Card image">
            </button>
            <div class="card-body" >
                <h4 class="card-title" style="margin-bottom:20px;height:59px;">${product[i+(pageNumber-1)*9].name}</h4>
                <div class="row">
                    <div class="col-5" style="margin-top:10px;">
                        <h5 class="text-danger reduce-cost">${(parseInt(product[i+(pageNumber-1)*9].realValue)).toLocaleString()}đ</h5>
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

// Phân trang
let pageFooter=document.querySelector(".paging")
if (countPage>1){
    if (pageNumber!=1&&pageNumber!=2) 
        pageFooter.innerHTML+=`<li class="page-item"><a class="page-link page-before" href="./page${pageNumber-1}.html"><i class="ti-angle-left" style="font-size:12px;"></i></a></li>`
    if (pageNumber==2)
        pageFooter.innerHTML+=`<li class="page-item"><a class="page-link page-before" href="./index.html"><i class="ti-angle-left" style="font-size:12px;"></i></a></li>`
    pageFooter.innerHTML+=`<li class="page-item page-index"><a class="page-link" href="./index.html">1</a></li>`
    for (let i=2;i<=countPage;i++)
        pageFooter.innerHTML+=`<li class="page-item page"><a class="page-link" href="./page${i}.html">${i}</a></li>`
    if (pageNumber!=countPage)
        pageFooter.innerHTML+=`<li class="page-item"><a class="page-link page-after" href="./page${pageNumber+1}.html"><i class="ti-angle-right" style="font-size:12px;"></i></a></li>`
}
let pageIndex=document.querySelector('.page-index')
let page=document.querySelectorAll('.page')
let pageBefore=document.querySelector('.page-before')
let pageAfter=document.querySelector('.page-after')
pageIndex.addEventListener('click',function(){
    localStorage.setItem('pageNumber',1)
})

for (let i=0;i<page.length;i++){
    page[i].addEventListener('click',function(){
        localStorage.setItem('pageNumber',i+2)
    })
}
if (pageNumber!=countPage)
    pageAfter.addEventListener('click',function(){
        localStorage.setItem('pageNumber',pageNumber+1)
    })
if (pageNumber!=1)  
    pageBefore.addEventListener('click',function(){
        localStorage.setItem('pageNumber',pageNumber-1)
    })


// modal
let btnModals=document.querySelectorAll(".btn-modal")
let headerLogin=document.querySelector('.header-login')
let headerUser=document.querySelector('.header-user-name')
let headerLogout=document.querySelector('.header-log-out')
let status1=localStorage.getItem('status')

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
                    <img src="${product[i+(pageNumber-1)*9].code}" alt="" srcset="" style="float: left;width:20rem;">
                </div>
    `
    var btnCart=document.querySelector('.btn-cart')
    var btnMinus=document.querySelector(".minus")
    var btnPlus=document.querySelector(".plus")
    var cart=document.getElementById("number-cart")
    document.getElementById("book-name").innerText=product[i+(pageNumber-1)*9].name
    document.getElementById("book-info").innerText='Nhà xuất bản : '+ product[i+(pageNumber-1)*9].NXB+' | Tác giả : '+product[i+(pageNumber-1)*9].author+' | Thể loại : '+product[i+(pageNumber-1)*9].type
    if (product[i+(pageNumber-1)*9].number>0)
        document.getElementById("book-status").innerText='Tình trạng : Còn hàng'
    else
        document.getElementById("book-status").innerText='Tình trạng : Hết hàng'
    document.getElementById('book-content').innerText=describe[i+(pageNumber-1)*9]
    if (product[i+(pageNumber-1)*9].realValue!=product[i+(pageNumber-1)*9].cost)
        document.getElementById('realValue').innerText=(parseInt(product[i+(pageNumber-1)*9].realValue)).toLocaleString()+'đ'
    else
        document.getElementById('realValue').innerText=''

    document.getElementById('cost').innerText=(parseInt(product[i+(pageNumber-1)*9].cost)).toLocaleString()+'đ'
    cart.innerText=1
    btnMinus.addEventListener('click',function(){
        if (parseInt(cart.innerText)>1)
            cart.innerText=parseInt(cart.innerText)-1
        })
    btnPlus.addEventListener('click',function(){
        cart.innerText=(parseInt(cart.innerText)+1)+''
        })
    btnCart.addEventListener('click',function(){
        if (parseInt(cart.innerText)>product[i].number)
            alert('Hiện chỉ còn ' +product[i].number+' sản phẩm '+product[i].name)
        else{
            inCart[i+(pageNumber-1)*9]+=parseInt(cart.innerText);
            product[i+(pageNumber-1)*9].number=product[i+(pageNumber-1)*9].number-parseInt(cart.innerText)
            numberCart=parseInt(cart.innerText)+parseInt(document.querySelector('.cart span').innerText)
            localStorage.setItem('numberCart',numberCart)
            document.querySelector('.cart span').innerText = numberCart;
            json=JSON.stringify(inCart)
            localStorage.setItem('inCart',json)
            }
    })
    
})
}

// header,login
if (status1==1){
    headerLogin.classList.add('disappear')
    headerUser.classList.remove('disappear')
    headerLogout.classList.remove('disappear')
    headerUser.innerHTML=`<a class="nav-link me-lg-3" href=""><i class="ti-user"></i>${localStorage.getItem('username1')}</a>`
}

// Thêm sản phẩm vào giỏ hàng
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
        if ((product[i+(pageNumber-1)*9].number)>0){
            inCart[i+(pageNumber-1)*9]++;
            json=JSON.stringify(inCart)
            localStorage.setItem('inCart',json)
            numberCart=localStorage.getItem('numberCart')
            product[i+(pageNumber-1)*9].number--;
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


headerLogout.addEventListener('click',function(){
    localStorage.setItem('status',0)
    for (let i=0;i<product.length;i++){
        inCart[i]=0
    }
    localStorage.setItem('numberCart',0)
    json=JSON.stringify(inCart)
    localStorage.setItem('inCart',json)
    headerLogin.classList.remove('disappear')
    headerUser.classList.add('disappear')
    headerLogout.classList.add('disappear')
})

// search

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
