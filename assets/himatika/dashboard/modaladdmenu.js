const addmenu_button = document.querySelector(".menu-management .btn-addmenu");
const modal_addmenu = document.querySelector(".modal-addmenu");
const modal_addmenu_cancel = document.querySelector(
	".modal-addmenu form .cancel-btn"
);

addmenu_button.addEventListener("click", () => {
	modal_addmenu.classList.add("active");
});
modal_addmenu_cancel.addEventListener("click", () => {
	modal_addmenu.classList.remove("active");
});
