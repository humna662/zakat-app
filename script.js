// Register User
document.addEventListener("DOMContentLoaded", function () {
  const registerForm = document.getElementById("registerForm");
  if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(registerForm);
      fetch("php/register.php", {
        method: "POST",
        body: formData
      }).then(res => res.text())
        .then(data => {
          if (data === "success") {
            alert("Registration successful!");
            window.location.href = "login.html";
          } else {
            alert("Error in registration.");
          }
        });
    });
  }

  // Login User
  const loginForm = document.getElementById("loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(loginForm);
      fetch("php/login.php", {
        method: "POST",
        body: formData
      }).then(res => res.text())
        .then(data => {
          if (data === "success") {
            window.location.href = "dashboard.html";
          } else {
            alert("Login failed!");
          }
        });
    });
  }

  // Add Assets
  const assetForm = document.getElementById("assetForm");
  if (assetForm) {
    assetForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(assetForm);
      fetch("php/add-assets.php", {
        method: "POST",
        body: formData
      }).then(res => res.text())
        .then(data => {
          if (data === "success") {
            alert("Assets saved!");
            window.location.href = "result.html";
          } else {
            alert("Error saving assets.");
          }
        });
    });
  }

  // Load History
  const historyContainer = document.getElementById("historyContainer");
  if (historyContainer) {
    fetch("php/get-history.php")
      .then(res => res.json())
      .then(data => {
        historyContainer.innerHTML = data.map(item => `
          <div>
            <strong>Year:</strong> ${item.year}<br>
            Gold: ${item.gold}, Silver: ${item.silver}, Cash: ${item.cash}<br>
            Zakat Payable: ${item.zakat_payable}
            <hr>
          </div>
        `).join('');
      });
  }
});