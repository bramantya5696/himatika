const setting = document.querySelector(
	" .navbar .navbar-right .setting .setting-icon"
);
const setting_menu = document.querySelector(
	".navbar .navbar-right .setting .setting-menu"
);
const sidebar_icon = document.querySelector(
	".navbar .navbar-left .sidebar-icon"
);
const sidebar = document.querySelector(".navbar .navbar-left .sidebar");
const sidebar_back = document.querySelector(
	".navbar .navbar-left .sidebar .sidebar-back"
);
const page = document.querySelector(".page");
const footer = document.querySelector(".footer");
const logout_btn = document.querySelector(
	".navbar .navbar-right .setting .setting-menu .sm-logout"
);
const modal_logout = document.querySelector(".modal-logout");
const logout_cancel = document.querySelector(
	" .modal-logout .modal-footer .cancel-btn"
);

setting.addEventListener("click", () => {
	setting_menu.classList.toggle("active");
});
sidebar_icon.addEventListener("click", () => {
	sidebar_back.classList.toggle("active");
	sidebar.classList.toggle("active");
	page.classList.toggle("active");
	footer.classList.toggle("active");
});

sidebar_back.addEventListener("click", () => {
	sidebar_back.classList.toggle("active");
	sidebar.classList.toggle("active");
	page.classList.toggle("active");
	footer.classList.toggle("active");
});

logout_btn.addEventListener("click", () => {
	modal_logout.classList.add("active");
});
logout_cancel.addEventListener("click", () => {
	modal_logout.classList.remove("active");
});

document.getElementById("year").innerHTML = new Date().getFullYear();
