
$(document).ready(function(){
    $('.dropdown_active').slideUp(10)
    $('.home').click(function(){
        $('.dropdown_active').slideToggle()
        $('.dropdown_active_shop').slideUp(10)
        $('.dropdown_coll_active').slideUp(10)
        $('.dropdown_page_active').slideUp(10)
        $('.dropdown_blog_active').slideUp(10)
    })
})

$(document).ready(function(){
    $('.dropdown_active_shop').slideUp(10)
    $('.shops').click(function(){
        $('.dropdown_active_shop').slideToggle()
        $('.dropdown_coll_active').slideUp(10)
        $('.dropdown_active').slideUp(10)
        $('.dropdown_page_active').slideUp(10)
        $('.dropdown_blog_active').slideUp(10)
    })
})

$(document).ready(function(){
    $('.dropdown_coll_active').slideUp(10)
    $('.collect').click(function(){
        $('.dropdown_coll_active').slideToggle()
        $('.dropdown_active').slideUp(10)
        $('.dropdown_active_shop').slideUp(10)
        $('.dropdown_page_active').slideUp(10)
        $('.dropdown_blog_active').slideUp(10)
    })
})

$(document).ready(function(){
    $('.dropdown_page_active').slideUp(10)
    $('.pages').click(function(){
        $('.dropdown_page_active').slideToggle()
        $('.dropdown_active').slideUp(10)
        $('.dropdown_active_shop').slideUp(10)
        $('.dropdown_coll_active').slideUp(10)
        $('.dropdown_blog_active').slideUp(10)
    })
})

$(document).ready(function(){
    $('.dropdown_blog_active').slideUp(10)
    $('.blogs').click(function(){
        $('.dropdown_blog_active').slideToggle()
        $('.dropdown_page_active').slideUp(10)
        $('.dropdown_active').slideUp(10)
        $('.dropdown_active_shop').slideUp(10)
        $('.dropdown_coll_active').slideUp(10)


    })
})

let drophomes=()=>{
    let dwon=document.querySelector('.dropdown_reponsive');
    dwon.style.transform="translateX(0%)"
}

let dropshops=()=>{
    let dwon=document.querySelector('.dropdown_reponsive_shop');
    dwon.style.transform="translateX(0%)"
}

let droppages=()=>{
    let dwon=document.querySelector('.dropdown_reponsive_page');
    dwon.style.transform="translateX(0%)"
}

let dropblog=()=>{
    let dwon=document.querySelector('.dropdown_reponsive_blog');
    dwon.style.transform="translateX(0%)"
}

let gohome=()=>{
    let dwon=document.querySelector('.dropdown_reponsive');
    dwon.style.transform="translateX(100%)"
}

let goshop=()=>{
    let dwon=document.querySelector('.dropdown_reponsive_shop');
    dwon.style.transform="translateX(100%)"
}

let gopage=()=>{
    let dwon=document.querySelector('.dropdown_reponsive_page');
    dwon.style.transform="translateX(100%)"
}

let goblog=()=>{
    let dwon=document.querySelector('.dropdown_reponsive_blog');
    dwon.style.transform="translateX(100%)";
}


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

