const passwordInput = document.querySelector("#password");
const passwordToggle = document.querySelector("#toggle-password");

passwordToggle.addEventListener("click", function () {
  const passwordType =
    passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", passwordType);
  passwordToggle
    .querySelector("i")
    .setAttribute(
      "data-feather",
      passwordType === "password" ? "eye" : "eye-off"
    );
  feather.replace();
});
