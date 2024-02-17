<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar justify-content-center bg-dark text-light">
        <div class="fs-3">ห้องสมุด</div>
    </nav>

    <input type="hidden" id="index" value="4">

    <div class="container">
        <div class="d-flex justify-content-center mt-4">
            <label for="" class="my-auto">ค้นหา: </label>
            <input type="text" class="form-control shadow mx-3" id="search" placeholder="พิมพ์คำที่ต้องการค้นหา">
        </div>

        <nav class="navbar mt-3">
            <div class="nav-item ">
                <a href="#" class=" fw-normal nav-link fs-4" data-type="4">ทั้งหมด</a>
            </div>
            <div class="nav-item">
                <a href="#" class=" fw-normal nav-link" data-type="1">รหัสหนังสือ</a>
            </div>
            <div class="nav-item">
                <a href="#" class=" fw-normal nav-link" data-type="2">ชื่อเรื่อง</a>
            </div>
            <div class="nav-item">
                <a href="#" class=" fw-normal nav-link" data-type="3">นักเขียน</a>
            </div>
        </nav>
    </div>
    <hr>
    <div class="container px-5">

        <div id="content">

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            search(4, "")
        })

        $(document).on("input", "#search", function () {
            var txt = $(this).val()
            var index = $('#index').val();
            search(index, txt);
        })


        $(document).on("click", ".nav-link", function () {
            var index = $(this).data("type")
            $('#index').val(index)
            $('.nav-link').removeClass('fs-4');
            $(this).addClass('fs-4');
            // var txt = $('#search').val()
            // search(index,txt)
        })

        const search = (index, txt) => {
            console.log("hi")
            var formdata = new FormData();
            formdata.append("index", index);
            formdata.append("txt", txt);

            $.ajax({
                url: "backend/search.php",
                type: "POST",
                data: formdata,
                dataType: "html",
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data)
                    $('#content').html(data);
                }
            })
        }
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>