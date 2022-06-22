const addsubmenu_button = document.querySelector(
	".submenu-management .btn-addsubmenu"
);
const modal_addsubmenu = document.querySelector(".modal-addsubmenu");
const modal_addsubmenu_cancel = document.querySelector(
	".modal-addsubmenu form .cancel-btn"
);


addsubmenu_button.addEventListener("click", () => {
	modal_addsubmenu.classList.add("active");
});
modal_addsubmenu_cancel.addEventListener("click", () => {
	modal_addsubmenu.classList.remove("active");
});
