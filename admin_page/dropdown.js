
let drophome=()=>{
    let dwon=document.querySelector('.dropdown');
    dwon.classList.toggle('dropdown_active');
}

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

let dropshop=()=>{
    let dwonshop=document.querySelector('.dropdown_shop');
    dwonshop.classList.toggle('dropdown_active_shop');
}

let dropcollection=()=>{
    let dwonshop=document.querySelector('.dropdown_coll');
    dwonshop.classList.toggle('dropdown_coll_active');
}

let droppage=()=>{
    let dwonshop=document.querySelector('.dropdown_page');
    dwonshop.classList.toggle('dropdown_page_active');
}

let dropblogs=()=>{
    let dwonshop=document.querySelector('.dropdown_blog');
    dwonshop.classList.toggle('dropdown_blog_active');
}

let search=()=>{
    let dwonshop=document.querySelector('.search_container');
    dwonshop.classList.toggle("search_box_active");
    dwonshop.classList.toggle("search_box");
}

let change=()=>{
    let dwonshop=document.querySelector('#x');
    // let menu =document.querySelector('.menubar')
    let menusilde =document.querySelector('.menu_bar')
    dwonshop.classList.toggle('bx-x');
    menusilde.classList.toggle('menubar_active');
    // menusilde.style.transform="translateX(0%)"
}