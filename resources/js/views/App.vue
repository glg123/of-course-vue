<template>
    <header class="container py-2 py-lg-4 header">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center order-lg-0">
                    <div class="toggle-button d-block d-lg-none me-2">
                        <button class="btn border-0 d-flex align-items-center flex-row-reverse" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <span class="d-none">القائمه</span>
                        </button>
                    </div>
                    <div class="lang">
                        <button class="btn rounded-pill border-0 d-flex align-items-center flex-row-reverse" type="button">
                            <img src="front/build/img/en.svg" alt=""> <span class="fw-bold me-2 d-none d-lg-flex">EN</span>
                        </button>
                    </div>
                </div>
                <div class="d-none d-lg-flex order-last order-lg-1 menu-toggle">
                    <ul class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center list-unstyled center-menu">
                        <li><router-link  :to="{name: 'home'}" class="menu_link ">الصفحة الرئيسية
                        </router-link></li>
                        <li><a href="#">قائـمة الطعــام</a></li>
                        <li class="logo"><a href="#"><img src="front/build/img/logo.svg" alt=""></a></li>
                        <li><a href="#">أخصــائي التغذيـة</a></li>
                        <li><a href="#">المشاهـير</a></li>
                    </ul>
                </div>
                <div class="d-flex d-lg-none">
                    <a href="">  <img src="front/build/img/logo.svg" alt=""></a>
                </div>
                <div class="d-none d-lg-block order-lg-3">
                    <h6>انضـــم إلينـــا الآن</h6>
                    <div class="d-flex align-items-center">
                        <a href="#">دخـول</a>
                        <span class="mx-1">/</span>
                        <a href="#">انشاء حساب</a>
                    </div>
                </div>
                <div class="d-flex d-lg-none user">
                    <a class="btn rounded-pill border-0 d-flex align-items-center flex-row-reverse" href="login.html">
                        <img src="front/build/img/user.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main class="py-4">
        <router-view @loggedIn="change"></router-view>
    </main>

</template>
<script>
    export default {
      data(){
          return {
            name        : null,
            user_type   : 0,
            isLoggedIn  : localStorage.getItem('jwt') != null
          }
      },
      mounted() {
        this.setDefaults()
      },
      methods : {
        setDefaults(){
          if(this.isLoggedIn){
            let user        = JSON.parse(localStorage.getItem('user'))
            this.name       = user.name
            this.user_type  = user.is_admin
          }
        },
        change(){
            this.isLoggedIn = localStorage.getItem('jwt') != null
            this.setDefaults()

        },
        logout(){
            localStorage.removeItem('jwt')
            localStorage.removeItem('user')
            this.change()
            this.$router.push('/')
        }
      }
    }
</script>
