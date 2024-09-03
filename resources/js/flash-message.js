function createFlashMessage(message, title = "Notification", type = "success") {
  const flashMessageContainer = document.querySelector(".flash-message-container") || createFlashMessageContainer();

  const flashMessage = document.createElement("div");
  flashMessage.className = `flash-message alert alert-${type} alert-dismissible bg-white show`;
  flashMessage.role = "alert";

  const icons = {
    success: `<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>`,
    danger: `<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>`,
    warning: `<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>`,
    info: `<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 9h.01"></path><path d="M11 12h1v4h1"></path></svg>`,
  };
  const icon = icons[type] || icons["warning"];

  const flashMessageContent = `
        <div class="d-flex">
            <div>${icon}</div>
            <div>
                <h4 class="alert-title">${title}</h4>
                <div class="text-secondary">${message}</div>
            </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>`;

  flashMessage.innerHTML = flashMessageContent;
  flashMessageContainer.appendChild(flashMessage);

  setTimeout(() => {
    flashMessage.classList.remove("show");
    setTimeout(() => flashMessage.remove(), 300);
  }, 3000);
}

function createFlashMessageContainer() {
  const container = document.createElement("div");
  container.className = "flash-message-container position-fixed top-0 end-0 p-3";
  document.body.appendChild(container);
  return container;
}

window.createFlashMessage = createFlashMessage;
