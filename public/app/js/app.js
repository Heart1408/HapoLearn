const menuList = document.querySelector("#header-menu-list");
const button = document.getElementById ("toggle");

button.onclick = function(){
  menuList.classList.toggle("show-menu");
  document.querySelector(".fa-solid").classList.toggle("fa-xmark");
}
