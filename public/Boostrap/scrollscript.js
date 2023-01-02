// panggil navbar
// const navBar = document.getElementById("navbar");
// const navCont = document.getElementById("navCont");
// const btndashboard = document.getElementById("btndashboard");
const navbarNavDropdown = document.getElementById("navbarNavDropdown");

// buat function scroll
// function scroll() {
//   let calc = window.scrollY;
//   if (calc > 0) {
//     navBar.classList.replace("bg-transparent", "bg-white");
//     navBar.classList.replace("navbar-light", "navbar-white");
//     navCont.classList.replace("container", "container");
//   } else if (calc <= 0) {
//     navBar.classList.replace("bg-white", "bg-transparent");
//     navBar.classList.replace("navbar-white", "navbar-light");
//     navCont.classList.replace("container", "container");
//   }
// }

//panggil saat init
// scroll();

// panggil saat discroll
// window.onscroll = () => {
//   scroll();
// };

// on klik
// function klik() {
//   let calc = window.klik;
//   if (calc > 0) {
//     btndashboard.classList.replace("bg-transparent", "bg-white");
//     navbarNavDropdown.classList.replace("bg-transparent", "bg-white");
//   } else if (calc <= 0) {
//     btndashboard.classList.replace("bg-white", "bg-transparent");
//     navbarNavDropdown.classList.replace("bg-white", "bg-transparent");
//   }
// }

//panggil saat init
// klik();

// panggil saat diklik
// window.klik = () => {
//   klik();
// };

// hover navbar
document.addEventListener("DOMContentLoaded", function(){
    // make it as accordion for smaller screens
    if (window.innerWidth > 992) {
    
        document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
    
            everyitem.addEventListener('mouseover', function(e){
    
                let el_link = this.querySelector('a[data-bs-toggle]');
    
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }
    
            });
            everyitem.addEventListener('mouseleave', function(e){
                let el_link = this.querySelector('a[data-bs-toggle]');
    
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }
    
    
            })
        });
    
    }
    // end if innerWidth
    }); 
    // DOMContentLoaded  end
