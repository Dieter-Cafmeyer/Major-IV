var registerForm = document.querySelector('.register');
var loginForm = document.querySelector('.login');

const init = () => {
  var changeToLoginBtn = document.querySelector('.change_forms-register');
  var changeToRegisterBtn = document.querySelector('.change_forms-login');
  changeToLoginBtn.addEventListener('click', changeToLogin);
  changeToRegisterBtn.addEventListener('click', changeToRegister);
};

const changeToLogin = (e) =>{
  e.preventDefault();
  registerForm.classList.add("hidden");
  loginForm.classList.remove("hidden");
};

const changeToRegister = (e) =>{
  e.preventDefault();
  registerForm.classList.remove("hidden");
  loginForm.classList.add("hidden");
};

init();
