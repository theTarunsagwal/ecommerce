
$(document).ready(function(){
    $('.dropdown_active').slideUp(10)
    $('.home').click(function(){
        $('.dropdown_active').slideToggle()
        $('.dropdown_active_shop').slideUp(10)
        $('.dropdown_coll_active').slideUp(10)

    })
})

$(document).ready(function(){
    $('.dropdown_active_shop').slideUp(10)
    $('.shops').click(function(){
        $('.dropdown_active_shop').slideToggle()
        $('.dropdown_coll_active').slideUp(10)
        $('.dropdown_active').slideUp(10)
  
    })
})

$(document).ready(function(){
    $('.dropdown_coll_active').slideUp(10)
    $('.collect').click(function(){
        $('.dropdown_coll_active').slideToggle()
        $('.dropdown_active').slideUp(10)
        $('.dropdown_active_shop').slideUp(10)
 
    })
})

let search=()=>{
    let dwonshop=document.querySelector('.search_container');
    dwonshop.classList.toggle("search_box_active");
    dwonshop.classList.toggle("search_box");
}

let change=()=>{
    let dwonshop=document.querySelector('#x');
    let menu =document.querySelector('.menubar');
    menu.classList.toggle("menublock")
    let menusilde =document.querySelector('.menu_bar')
    dwonshop.classList.toggle('bx-x');
    menusilde.classList.toggle('menubar_active');
    // menusilde.style.transform="translateX(0%)"
}

