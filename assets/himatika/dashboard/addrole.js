const addrole_button = document.querySelector(".role .btn-addrole");
const modal_addrole = document.querySelector(".modal-addrole");
const modal_addrole_cancel = document.querySelector(".modal-addrole form .cancel-btn");

addrole_button.addEventListener("click", () => {
    modal_addrole.classList.add("active");
})
modal_addrole_cancel.addEventListener("click", () => {
    modal_addrole.classList.remove("active");
})