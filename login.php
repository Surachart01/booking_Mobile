<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');
  *{font-family: 'Kanit', sans-serif;}
</style>
  </head>
  <body style="background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="bg-white p-5 rounded-5 shadow">
        <div class=" text-center"><i class="fa-regular fa-circle-user fa-5x"></i></div>
        <div class="text-center fs-2 fw-bold">ลงชื่อเข้าใช้</div>
        <div class="input-group mt-4">
          <div class="input-group-text bg-info"><i class="fa-solid fa-user"></i></div>
          <input class="form-control bg-light" id="Username" type="text" placeholder="ชื่อผู้ใช้">
        </div>
        <div class="input-group mt-2">
          <div class="input-group-text bg-info"><i class="fa-solid fa-lock"></i></div>
          <input class="form-control bg-light" id="password" type="password" placeholder="รหัสผ่าน">
        </div>
        <div class="btn btn-info text-white w-100 mt-4" id="login">ล็อกอิน</div>
      </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).on("click","#login",function(){
            var username = $('#Username').val()
            var password = $('#password').val()
            var formdata = new FormData();
            formdata.append("username",username)
            formdata.append("password",password)

            $.ajax({
                url:"backend/checkLogin.php",
                type:"POST",
                data:formdata,
                dataType:"json",
                contentType:false,
                processData:false,
                success:function(data){
                    if(data == 1){
                        Swal.fire({
                                title: "เข้าสู่ระบบเสร็จสิ้น",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1200
                            }).then((result) => {
                                window.location.href = "index.php"
                            });
                    }else{
                        Swal.fire({
                                title: "ไม่สามารถเข้าสู่่ระบบได้",
                                icon: "error",
                                showConfirmButton: false,
                                timer: 1200
                            })
                    }
                }
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>