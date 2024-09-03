const loginForm = $("#loginForm");
const showPassword = $("#showPassword");
const hidePassword = $("#hidePassword");
const emailField = $("input[name=email]");
const passwordField = $("input[name=password]");
const errorMessage = $("#errorMessage");
const loginButton = $("#loginButton");

loginForm.on("submit", function (e) {
  e.preventDefault();

  const url = route("login");
  const formData = new FormData(this);

  $.ajax({
    type: "post",
    url: url,
    data: formData,
    contentType: false,
    processData: false,
    beforeSend: function () {
      errorMessage.addClass("visually-hidden");
      loginButton.addClass("btn-loading");
    },
    success: function (response) {
      console.log(response);
    },
    error: function (xhr, status, error) {
      setTimeout(() => {
        errorMessage.removeClass("visually-hidden");
        loginButton.removeClass("btn-loading");
      }, 2000);
    },
  });
});

showPassword.on("click", function (e) {
  e.preventDefault();

  $(this).addClass("visually-hidden");
  hidePassword.removeClass("visually-hidden");

  passwordField.attr("type", "text");
});

hidePassword.on("click", function (e) {
  e.preventDefault();

  $(this).addClass("visually-hidden");
  showPassword.removeClass("visually-hidden");

  passwordField.attr("type", "password");
});
