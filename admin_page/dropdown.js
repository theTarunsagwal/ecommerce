
$(document).ready(function(){
    $('.dropdown_active').slideUp()
    $('.home').click(function(){
        $('.dropdown_active').slideToggle(1000)
        $('.dropdown_active_shop').slideUp()
        $('.dropdown_coll_active').slideUp()
        $('.dropdown_page_active').slideUp()
        $('.dropdown_blog_active').slideUp()
    })
})

$(document).ready(function(){
    $('.dropdown_active_shop').slideUp()
    $('.shops').click(function(){
        $('.dropdown_active_shop').slideToggle(1000)
        $('.dropdown_coll_active').slideUp()
        $('.dropdown_active').slideUp()
        $('.dropdown_page_active').slideUp()
        $('.dropdown_blog_active').slideUp()
    })
})

$(document).ready(function(){
    $('.dropdown_coll_active').slideUp()
    $('.collect').click(function(){
        $('.dropdown_coll_active').slideToggle(1000)
        $('.dropdown_active').slideUp()
        $('.dropdown_active_shop').slideUp()
        $('.dropdown_page_active').slideUp()
        $('.dropdown_blog_active').slideUp()
    })
})

$(document).ready(function(){
    $('.dropdown_page_active').slideUp()
    $('.pages').click(function(){
        $('.dropdown_page_active').slideToggle(1000)
        $('.dropdown_active').slideUp()
        $('.dropdown_active_shop').slideUp()
        $('.dropdown_coll_active').slideUp()
        $('.dropdown_blog_active').slideUp()
    })
})

$(document).ready(function(){
    $('.dropdown_blog_active').slideUp()
    $('.blogs').click(function(){
        $('.dropdown_blog_active').slideToggle(1000)
        $('.dropdown_page_active').slideUp()
        $('.dropdown_active').slideUp()
        $('.dropdown_active_shop').slideUp()
        $('.dropdown_coll_active').slideUp()


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

