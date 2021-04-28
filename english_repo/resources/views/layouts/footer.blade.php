<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style> 
        .column {
        max-width: 33.33%;
        padding: 4px;
        }
        .column .form-control{
        width: 100%;
        }
        .column .input-group-append button {
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
    }
    .column .input-group-append button:hover{
    background: #ccc;
    }
    /* Clear float khác sau các cột */
    .footer:after {
    content: "";
    display: table;
    clear: both;
    }
    .column h4{
    text-align: center;
    }
    /* Bố cục linh hoạt: ba cột xếp chồng lên nhau thay vì cạnh nhau khi màn hình 
    có chiều rộng dưới 600px */
    @media screen and (max-width:600px) {
        .column {
        width: 33.33%;
    }
    }
    
    .footer {
    position: absolute;
    bottom: 0;
    background-color: rgb(19, 214, 188);
    display: flex;
    justify-content: space-around;
    }
    </style>
</head>
<body>
    @section('sidebar')
	@show

<div class="container">
		@yield('content')	
<footer class="footer">
    <div class="column">
        <a href=""> <img src="" alt="logo"> </a> 
        <h3> <i>Học, học nữa, học mãi </i> </h3>
    </div>
    
    <div class="column">
      <h4>Đăng kí nhận bản tin</h4>
      <p>Cập nhật thông tin một cách nhanh nhất để không bỏ lỡ thông báo mới nào về chúng tôi
      </p>
      <form action="home">
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder='Enter email address'
              onfocus="this.placeholder = ''"
              onblur="this.placeholder = 'Enter email address'">
            <div class="input-group-append">
              <button class="btn btn_1" type="button">Gửi</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="column">
        <h4>Kết nối với chúng tôi</h4>
        <div class="contact_info1">
        <p><span> Địa chỉ :</span> Số 3 Duy Tân, Cầu Giấy, Hà Nội </p>
          <p><span> Điện thoại :</span> +84 123456789</p>
          <p><span> Email : </span>liennguyen@gmail.com </p>
        </div>
    </div>               
  </footer>
  </div>
</body>
</html>