function verificar() {
    var contra = document.getElementById("password");
    var confirm_contra = document.getElementById("confirm-password");
    confirm_contra.style.background = (contra.value != confirm_contra.value) ? "#c7c7c7" : "transparent";
}