
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
     <!-- Meta Tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/build/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/front/build/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/front/new/style.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

    <title>OF Course</title>
  </head>
<!-- Body-->
<body>


@yield('content')

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('assets/front/build/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".swiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-b-next',
                prevEl: '.swiper-b-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1600: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".otp-form *:input[type!=hidden]:first").focus();
            let otp_fields = $(".otp-form .otp-field"),
            otp_value_field = $(".otp-form .otp-value");
            otp_fields
            .on("input", function (e) {
                $(this).val(
                    $(this)
                        .val()
                        .replace(/[^0-9]/g, "")
                );
                let opt_value = "";
                otp_fields.each(function () {
                    let field_value = $(this).val();
                    if (field_value != "") opt_value += field_value;
                });
                otp_value_field.val(opt_value);
            })
            .on("keyup", function (e) {
                let key = e.keyCode || e.charCode;
                if (key == 8 || key == 46 || key == 37 || key == 40) {
                    // Backspace or Delete or Left Arrow or Down Arrow
                    $(this).prev().focus();
                } else if (key == 38 || key == 39 || $(this).val() != "") {
                    // Right Arrow or Top Arrow or Value not empty
                    $(this).next().focus();
                }
            })
            .on("paste", function (e) {
                let paste_data = e.originalEvent.clipboardData.getData("text");
                let paste_data_splitted = paste_data.split("");
                $.each(paste_data_splitted, function (index, value) {
                    otp_fields.eq(index).val(value);
                });
            });
        });
    </script>
</body>
</html>
