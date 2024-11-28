const csrfToken = $('meta[name="csrf-token"]').attr("content");

$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": csrfToken,
  },
});

$(document).ready(function () {
  if (window.TomSelect) {
    $(".tom-select").each(function () {
      new TomSelect(this, {
        maxOptions: null,
      });
    });
  }

  if (window.Litepicker) {
    $(".lite-picker").each(function () {
      this.picker = new Litepicker({
        element: this,
        format: "DD/MM/YYYY",
        buttonText: {
          previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
          nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
        },
      });
    });
  }

  $(".dropzone").each(function () {
    new Dropzone(this, {
      url: "/",
      maxFilesize: 2,
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      maxFiles: 1,
      dictRemoveFile: "Xóa",
      addRemoveLinks: true,
      autoProcessQueue: false,
      init: function () {
        let dz = this;
        dz.on("addedfile", function (file) {
          if (dz.files.length > 1) {
            dz.removeFile(dz.files[0]);
          }
        });
        dz.on("success", function (file, response) {
          console.log("File uploaded successfully");
        });
        dz.on("error", function (file, response) {
          console.error("Upload error:", response);
          dz.removeFile(file);
        });
      },
    });
  });
});


