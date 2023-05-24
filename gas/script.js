const passwordInput = document.querySelector("#password");
const passwordToggle = document.querySelector("#tombol");

passwordToggle.addEventListener("click", function () {
  const passwordType =
    passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", passwordType);
  const icon = passwordToggle.querySelector("i");
  icon.setAttribute(
    "data-feather",
    passwordType === "password" ? "eye-off" : "eye"
  );
  feather.replace(icon);
});

function validateForm() {
  const inputs = document.querySelectorAll(
    "input[type=text], input[type=number], input[type=email], input[type=password]"
  );
  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].value.trim() === "") {
      alert(
        `Bidang ${inputs[i].previousElementSibling.innerText} belum diisi.`
      );
      return false;
    }
  }
  return true;
}
