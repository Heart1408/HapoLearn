const menuList = document.getElementById("headerMenuList");
const button = document.getElementById("showMenu");

button.onclick = function () {
  menuList.classList.toggle("show-menu");
  document.querySelector(".fa-solid").classList.toggle("fa-xmark");
}
