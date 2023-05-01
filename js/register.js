let username = document.getElementById("nameinput");
let email = document.getElementById("form3Example3");
let password = document.getElementById("form3Example4");
let repassword = document.getElementById("form3Example4d");
let btnLogin = document.querySelector(".js-login-button");
btnLogin.addEventListener("click", (e) => {
  e.preventDefault();
  let user = {
    username: username.value,
    password: password.value,
  };
  let json = JSON.stringify(user);
  if (!username.value || !email.value || !password.value || !repassword.value) {
    alert("Vui lòng nhập đầy đủ thông tin");
  } else {
    if (email.value.indexOf('@gmail.com')==-1)
      alert("Email không hợp lệ")
    else{
      if (password.value != repassword.value)
        alert("Mật khẩu không khớp");
      else{
        localStorage.setItem(username.value, json);
        let user1 = {
          username: username.value,
          email:email.value,
          address:'',
          phonenumber:'',
          password: password.value,
          status:1,
        };
        json=localStorage.getItem('customerList')
        let customerList=JSON.parse(json)
        customerList.push(user1)
        json=JSON.stringify(customerList)
        localStorage.setItem('customerList',json)
        console.log(json)
        alert("Đăng ký thành công");
        window.location.href="login.html";
      }
      }
  }
});

