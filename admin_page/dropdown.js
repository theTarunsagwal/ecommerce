
let drophome=()=>{
    let dwon=document.querySelector('.dropdown');
    dwon.classList.toggle('dropdown_active');
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
    let dwonshop=document.querySelector('.search_box');
    dwonshop.classList.toggle('search_box_active');
}

let change=()=>{
    let dwonshop=document.querySelector('#x');
    let menu =document.querySelector('.menubar')
    let menusilde =document.querySelector('.menu_bar')
    dwonshop.classList.toggle('bx-x');
    menu.classList.toggle('menubar_active');
    menusilde.style.transform="translateX(0%)"
}