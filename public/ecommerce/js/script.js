// const { event } = require("jquery");


$(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: [
        "<img class='img_owl' src='./images/bi_arrow-right-circle-fill.webp' alt='prev'>",
        "<img class='img_owl' src='./images/bi_arrow-right-circle-fill (1).webp' alt='next'>",
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 3,
        },
    },
});

function togglePopup() {
    document.getElementById("popup-1").classList.toggle("active");
    if (!document.getElementById("popup-1").classList[1]) {

        document.getElementById("overflow_body").style.overflow = "auto"
    } else {
        document.getElementById("overflow_body").style.overflow = "hidden"

    }
}
function togglePopupModal() {
    document.getElementById("popup-1_modal").classList.toggle("active");
    if (!document.getElementById("popup-1_modal").classList[1]) {
        document.getElementById("overflow_body").style.overflow = "auto"
    } else {
        document.getElementById("overflow_body").style.overflow = "hidden"
    }
}
function validateFormModal() {
   
    var status = true;
    // validation for Name
    const full_name = document.getElementById("full_name_modal").value;
    const company = document.getElementById("company_modal").value;
    const email = document.getElementById("email_modal").value;

    const specialFormat = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/;
    const specialFormatCompany = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

    if (full_name=== "" || full_name === null  ) {
        document.getElementById("name_text_modal").style.display = "block";
        document.getElementById("name_text_modal").style.visibility = "visible";
        document.getElementById("special_text_modal").style.visibility = "hidden";

        status = false;
    } else if (specialFormat.test(full_name) ) {
        document.getElementById("name_text_modal").style.display = "none";
        document.getElementById("special_text_modal").style.visibility = "visible";
        status = false;
    } else {
        document.getElementById("name_text_modal").style.visibility = "hidden";
        document.getElementById("special_text_modal").style.visibility = "hidden";

        status = true;
    }
    if (company=== "" || company === null  ) {
        document.getElementById("name_company_modal").style.display = "block";
        document.getElementById("name_company_modal").style.visibility = "visible";
        document.getElementById("special_company_modal").style.visibility = "hidden";

        status = false;
    } else if (specialFormatCompany.test(company) ) {
        document.getElementById("name_company_modal").style.display = "none";
        document.getElementById("special_company_modal").style.visibility = "visible";
        status = false;
    } else {
        document.getElementById("name_company_modal").style.visibility = "hidden";
        document.getElementById("special_company_modal").style.visibility = "hidden";
        status = true;
    }
    // validation for Email

    var pat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 

    if (email === "" || email === null) {
        document.getElementById("name_email_modal").style.display = "block";
        document.getElementById("name_email_modal").style.visibility = "visible";
        document.getElementById("special_email_modal").style.visibility = "hidden";

        status = false;
    } else if (!pat.test(email)) {
        document.getElementById("name_email_modal").style.display = "none";
        document.getElementById("special_email_modal").style.visibility = "visible";
        status = false;
    } else {
        document.getElementById("name_email_modal").style.visibility = "hidden";
        document.getElementById("special_email_modal").style.visibility = "hidden";
        status = true;
    }
    return status;
}

async function userCreateModal() {
    await validateFormModal()
    const full_name = document.getElementById("full_name_modal").value;
    const company = document.getElementById("company_modal").value;
    const email = document.getElementById("email_modal").value;
    const note = document.getElementById("note_modal").value;
    const specialFormat = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/;
    const specialFormatCompany = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    if (validateFormModal() && !specialFormat.test(full_name) && !specialFormatCompany.test(company) && company!== '' && full_name !== '' ) {
        togglePopupModal()
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "https://tso.vn/api/contact");
        xhttp.setRequestHeader(
            "Content-Type",
            "application/json;charset=UTF-8"
        );
        xhttp.send(
            JSON.stringify({
                full_name: full_name,
                company: company,
                email: email,
                note: note,
                type: "Ecommerce",
            })
        );
        xhttp.onreadystatechange = function () {
    
            if (this.readyState == 4 && this.status === 200) {
                const objects = JSON.parse(this.responseText);
                loadTable();
            }
        };
    }
}
// validate form
// validate form
function validateForm() {
    var status = true;
    // validation for Name
    const full_name = document.getElementById("full_name").value;
    const company = document.getElementById("company").value;
    const email = document.getElementById("email").value;

    const specialFormat = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/;
    const specialFormatCompany = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

    if (full_name=== "" || full_name === null  ) {
        document.getElementById("name_text").style.display = "block";
        document.getElementById("name_text").style.visibility = "visible";
        document.getElementById("special_text").style.visibility = "hidden";

        status = false;
    } else if (specialFormat.test(full_name) ) {
        document.getElementById("name_text").style.display = "none";
        document.getElementById("special_text").style.visibility = "visible";
        status = false;
    } else {
        document.getElementById("name_text").style.visibility = "hidden";
        document.getElementById("special_text").style.visibility = "hidden";

        status = true;
    }
    if (company=== "" || company === null  ) {
        document.getElementById("company_text").style.display = "block";
        document.getElementById("company_text").style.visibility = "visible";
        document.getElementById("special_company").style.visibility = "hidden";

        status = false;
    } else if (specialFormatCompany.test(company) ) {
        document.getElementById("company_text").style.display = "none";
        document.getElementById("special_company").style.visibility = "visible";
        status = false;
    } else {
        document.getElementById("company_text").style.visibility = "hidden";
        document.getElementById("special_company").style.visibility = "hidden";
        status = true;
    }
    // validation for Email

    var pat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 

    if (email === "" || email === null) {
        document.getElementById("email_text").style.display = "block";
        document.getElementById("email_text").style.visibility = "visible";
        document.getElementById("special_email").style.visibility = "hidden";

        status = false;
    } else if (!pat.test(email)) {
        document.getElementById("email_text").style.display = "none";
        document.getElementById("special_email").style.visibility = "visible";
        status = false;
    } else {
        document.getElementById("email_text").style.visibility = "hidden";
        document.getElementById("special_email").style.visibility = "hidden";
        status = true;
    }
    return status;
}

async function userCreate() {
    await validateForm();
    const full_name = document.getElementById("full_name").value;
    const company = document.getElementById("company").value;
    const email = document.getElementById("email").value;
    const note = document.getElementById("note").value;

    const specialFormat = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/;
    const specialFormatCompany = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    if (validateForm() && !specialFormat.test(full_name) && !specialFormatCompany.test(company) && company!== '' && full_name !== '' ) {
        togglePopup();
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "https://tso.vn/api/contact");
        xhttp.setRequestHeader(
            "Content-Type",
            "application/json;charset=UTF-8"
        );
        xhttp.send(
            JSON.stringify({
                full_name: full_name,
                company: company,
                email: email,
                note: note,
                type: "Ecommerce",
            })
        );
        xhttp.onreadystatechange = function () {
            
            if (this.readyState == 4 && this.status === 200) {
                const objects = JSON.parse(this.responseText);
                loadTable();
            }
        };

    }
}

$(document).ready(function () {
    // Transition effect for navbar and back-to-top icon
    $(window).scroll(function () {
        // checks if window is scrolled more than 500px, adds/removes solid class
        if ($(this).scrollTop() > 50) {
            $(".header__nav-container").addClass("header__nav-solid");
        } else {
            $(".header__nav-container").removeClass("header__nav-solid");
        }
    });
});

$(function () {
    let values = 0;
    if (window.innerWidth <= 1280) {
        values = 60;
    } else {
        values = 70;
    }
    $("a.header__nav-link").bind("click", function (event) {
        document.getElementById('menu').checked = !document.getElementById('menu').checked;
        var $anchor = $(this);
        $("html, body")
            .stop()
            .animate(
                {
                    scrollTop: $($anchor.attr("href")).offset().top - values,
                },
                0,
                "easeInOutExpo"
            );
        event.preventDefault();
    });
});

function openPopup() {
    $("body").addClass("showPopup");
  }
  function closePopup() {
    $("body").removeClass("showPopup removePopup");
  }
  function closePopupScreen() {
    $("body").addClass("removePopup");
    setTimeout(closePopup, 200);
  }
  
  $(".popup .close").on("click", function () {
    closePopupScreen();
  });
  
  // auto open popup
//   openPopup();
  // setTimeout(openPopup, 1000);
  
  // close popup
  $(document).keyup(function (e) {
    if (e.key === "Escape") {
      closePopup();
    }
  });

  function openPopupSecond() {
    console.log('a hi hi');
    $("body").addClass("showPopupSecond");
  }
  function closePopupSecond() {
    $("body").removeClass("showPopupSecond removePopupSecond");
  }
  function closePopupScreenSecond() {
    $("body").addClass("removePopupSecond");
    setTimeout(closePopupSecond, 200);
  }
  
  $(".popup-2 .close-2").on("click", function () {
    closePopupScreenSecond();
  });
  
  // close popup
  $(document).keyup(function (e) {
    if (e.key === "Escape") {
      closePopupSecond();
    }
  });

  function openPopupThirt() {
    $("body").addClass("showPopupThirt");
  }
  function closePopupThirt() {
    $("body").removeClass("showPopupThirt removePopupThirt");
  }
  function closePopupScreenThirt() {
    $("body").addClass("removePopupThirt");
    setTimeout(closePopupThirt, 200);
  }
  
  $(".popup-3 .close-3").on("click", function () {
    closePopupScreenThirt();
  });
  
  // close popup
  $(document).keyup(function (e) {
    if (e.key === "Escape") {
      closePopupThirt();
    }
  });
