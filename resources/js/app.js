import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import 'axios'
import { createApp } from 'vue'
import App from './components/Test/App.vue'
import store from './Vuex/store'

const app=createApp(App)
    app.use(store)
    app.mount('#app')

//////////////////////////////////////////////////////////////////////////////////////

let icon = document.querySelector("#mode .icon i")==null?document.querySelector("label .icon i"):document.querySelector("#mode .icon i");
let data;
if(icon!=null){
    icon.addEventListener('click', function() {
        if(document.body.classList.contains("dark-mode")){
            document.body.classList.remove("dark-mode")
            data=0
        }else{
            document.body.classList.add("dark-mode")
            data=1
        }
        localStorage.setItem('mode',data)
        mode_active()
    });
    //events body
    mode_active()
}

//function load body
function mode_active() {
    localStorage.getItem('mode')==1?document.body.classList.add('dark-mode'):document.body.classList.remove('dark-mode')

    if (document.querySelector('header')!=null) {
        let header = document.querySelector('#header');
        let dropdown = document.querySelector('.dropdown-menu');
        let dropdown_toggle = document.querySelector('.dropdown .dropdown-toggle');
        let footer = document.querySelector('footer');
        document.body.classList.contains("dark-mode") ? (header.classList.replace('navbar-light', 'navbar-dark') && header.classList.replace('bg-light', 'bg-dark') && footer.classList.replace('bg-light', 'bg-dark') && dropdown.classList.add('dropdown-menu-dark')) : (header.classList.replace('bg-dark', 'bg-light') && footer.classList.replace('bg-dark', 'bg-light') && header.classList.replace('navbar-dark', 'navbar-light') && dropdown.classList.remove('dropdown-menu-dark'));
    }

    document.body.classList.contains("dark-mode") ? icon.classList.replace("bi-brightness-high-fill", "bi-moon-stars-fill", ) : icon.classList.replace("bi-moon-stars-fill", "bi-brightness-high-fill");
}
if(document.querySelector(".sci li a")!=null){
setTimeout(() => {
    VanillaTilt.init(document.querySelectorAll(".sci li a"), {
        reverse: true,
        max: 20,
        transition: true,
        reset: true,
        scale: 0.9,
        glare: true,
        "max-glare": 1,
        speed: 400
    });
}, 2000);
}
if(document.querySelector('.navbar-toggler')!=null){
let btn_navbar = document.querySelector('.navbar-toggler');
let icon_nav = document.querySelector('.navbar-toggler i');
let navbar_collapse=document.querySelector('.navbar-collapse');
btn_navbar.addEventListener('click', nav_icon);
let i = 0;
function nav_icon() {
    if (i % 2 == 0) {
        icon_nav.classList.replace('fa-bars', 'fa-xmark')
        navbar_collapse.style.cssText='display:block;height: "213px"'
    } else {
        icon_nav.classList.replace('fa-xmark', 'fa-bars')
        navbar_collapse.style.cssText='height:0 !important'
        setTimeout(() => {
            navbar_collapse.style.cssText='display:none'
        }, 300);
    }
    i++;
}
}
//hide loadeing
window.scrollTo({
    top: 0,
    behavior: 'smooth'
});
setTimeout(() => {
            document.querySelector('.page').style.cssText='opacity:1 !important'
            document.querySelector('#loading').style.cssText='display:none !important'
            //document.querySelector('#loading .container .logo').style.cssText='opacity:0 !important'
            if(document.querySelector('.global')!=null)
                document.body.style.cssText='overflow-y:scroll !important'

        }, 2280);



