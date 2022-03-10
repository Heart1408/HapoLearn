const menuList = document.querySelector("#header-menu-list");
const button = document.getElementById("show-menu");

button.onclick = function () {
  menuList.classList.toggle("show-menu");
  document.querySelector(".fa-solid").classList.toggle("fa-xmark");
}
