document.addEventListener("DOMContentLoaded", function () {
  const currentLocation = window.location.hash // Récupère l'ancre actuelle
  const navLinks = document.querySelectorAll(".nav-links ul li a")
  const burgerBtn = document.getElementById("burger-btn")
  const burgerMenuContent = document.getElementById("burger-menu-content")
  const closeMenu = document.getElementById("close-menu")

  burgerBtn.addEventListener("click", function () {
    if (burgerMenuContent.classList.contains("active")) {
      burgerMenuContent.classList.remove("active")
    } else {
      burgerMenuContent.classList.add("active")
    }
  })

  closeMenu.addEventListener("click", function () {
    if (burgerMenuContent.classList.contains("active")) {
      burgerMenuContent.classList.remove("active")
    }
  })

  navLinks.forEach((link) => {
    if (link.getAttribute("href") === currentLocation) {
      link.classList.add("active")
    } else {
      link.classList.remove("active")
    }
  })

  navLinks.forEach((link) => {
    link.addEventListener("click", function () {
      navLinks.forEach((link) => link.classList.remove("active"))
      this.classList.add("active")
    })
  })

  const accordheader = document.querySelectorAll(".accord-header")

  accordheader.forEach((header) => {
    header.addEventListener("click", function () {
      const icon = this.querySelector("i")
      const content = this.nextElementSibling
      console.log(header, content, icon)
      if (content.classList.contains("active")) {
        content.classList.remove("active")
        icon.classList.replace("fa-minus", "fa-plus")
      } else {
        content.classList.add("active")
        icon.classList.replace("fa-plus", "fa-minus")
      }
    })
  })
})
