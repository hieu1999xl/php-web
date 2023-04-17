// const { event } = require("jquery");

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
                type: "Blockchain",
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
                type: "Blockchain",
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
$(function(){
    $(".tabs").sp_tabs();
  });
  
  ;(function ( $, window, document, undefined ) {
  
    var pluginName = "sp_tabs",
        defaults = {
          propertyName: "value"
        };
  
  
    function Plugin( element, options ) {
      this.element = element;
      this.options = $.extend( {}, defaults, options) ;
      this._defaults = defaults;
      this._name = pluginName;
      this.elements = new Object();
      this.variables = new Object();
      this.init();
    }
  
    Plugin.prototype = {
  
      init: function() {     
  
        //get the elements
        var t = this;
        t.elements.gesture = $(t.element).find(".tab-gestures");
        t.elements.planes = $(t.element).find(".tab-planes");
        t.elements.planes.active = t.elements.planes.find(".tab-plane.active");
        t.elements.tabs = $(t.element).find(".tabhead");
        t.elements.tabs.amount = $(t.element).attr("data-tabs");
        t.elements.tabs.bar = $(t.element).find(".line .line-active");
        //get the variables
        t.variables.planeWidth = t.elements.planes.active.outerWidth();
        t.variables.slideBusy = false;
        t.variables.swipeEnabled = ($(t.element).attr("data-swipe") == "true")?true:false;
  
        //touch control
        if(t.variables.swipeEnabled){
          var mc = new Hammer(t.elements.gesture[0],{domEvents: true});
          mc.get("pan").set({ direction: Hammer.DIRECTION_HORIZONTAL, threshold: 41, domEvents: true});
          mc.on("panstart panend panleft panright", function(e){
            if(!t.variables.slideBusy)t.touchHandler(e,t);
          });
        }
  
        //click control
        t.elements.tabs.find("> li > a").on("click", function(e){
          e.preventDefault();
          if(!t.variables.slideBusy) t.clickHandler(t,this);
        });
  
      },
  
      clickHandler: function(t, tab){
        var tabName = $(tab).attr("href").replace(/\#/,"");
        t.elements.tabs.active = t.elements.tabs.find("> li.active");
        t.elements.tabs.newActive = $(tab).parent();
        t.elements.planes.active = t.elements.planes.find("> .tab-plane.active")
        t.elements.planes.newActive = t.elements.planes.find("> .tab-plane[data-tab='"+ tabName +"']");
  
        if(tabName != t.elements.tabs.active.find("> a").attr("href").replace(/\#/,"")){
          t.variables.slideBusy = true;
  
          if(t.elements.tabs.active.index() > t.elements.tabs.newActive.index()){
            t.setup.startClick(t,"left");
            TweenMax.to(t.elements.planes[0], 0.3, 
                        {"left":"-100%", ease: Power1.easeOut,
                         onComplete: function(){t.setup.endClick(t,"right");}});
          }else{
            t.setup.startClick(t,"right");
            TweenMax.to(t.elements.planes[0], 0.3, 
                        {"left":"0%", ease: Power1.easeOut,
                         onComplete: function(){t.setup.endClick(t,"left");}});
          }
          t.tabs.activate(t, t.elements.tabs.newActive.find("> a").attr("href").replace(/\#/,""));
          t.togglePlaneHeight(t,t.elements.planes.newActive);
        }
      },
  
      touchHandler: function(e,t){
        if(e.type == "panstart") {       
          t.elements.planes.active = t.elements.planes.find(".tab-plane.active");
          t.elements.planes.prev = t.elements.planes.active.prev();
          t.elements.planes.next = t.elements.planes.active.next();
          this.setup.startSlide(t);
        }else if(e.type == "panend"){
          //at the end, reset it all
          t.variables.slideBusy = true;
          var minPanValue = (t.variables.planeWidth / 2 / 5 * 3);
          if(e.deltaX < 0 - minPanValue && t.elements.planes.prev.length > 0){
            t.tabs.activate(t,t.elements.planes.prev.attr("data-tab"));
            TweenMax.to(t.elements.planes[0], 0.3, 
                        {"left":"-200%", ease: Power1.easeOut,
                         onComplete: function(){t.setup.endSlide(t,"left");}});
            t.togglePlaneHeight(t,t.elements.planes.prev);
          }else if(e.deltaX > 0 + minPanValue && t.elements.planes.next.length > 0){
            t.tabs.activate(t,t.elements.planes.next.attr("data-tab"));
            TweenMax.to(t.elements.planes[0], 0.3, 
                        {"left":"0%", ease: Power1.easeOut,
                         onComplete: function(){t.setup.endSlide(t,"right");}});
            t.togglePlaneHeight(t,t.elements.planes.next);
          }else{
            TweenMax.to(t.elements.planes[0], 0.3, 
                        {"left":"-100%", ease: Power1.easeOut, 
                         onComplete: function(){t.setup.endSlide(t);}});
          }
        }else{
          t.elements.planes.css({"left": 0 - t.variables.planeWidth + e.deltaX});
        }
      },
  
      tabs: {
        activate: function(t, tab){
          t.elements.tabs.active = t.elements.tabs.find("> li.active");
          t.elements.tabs.newActive = t.elements.tabs.find("> li a[href='#"+ tab +"']").parent();
  
          t.elements.tabs.active.removeClass("active");
          t.elements.tabs.newActive.addClass("active");
          var index = t.elements.tabs.newActive.index();
          var barLeft = 100 / t.elements.tabs.amount * (index);
          var barRight = 100 - (100 / t.elements.tabs.amount * (index + 1));
          TweenMax.to(t.elements.tabs.bar[0], 0.3, 
                      {"left":barLeft+"%", "right": barRight+"%", ease: Power1.easeOut});        
        }
      },
  
      togglePlaneHeight: function(t,newPlane){
        var h = newPlane.outerHeight();
        TweenMax.to(t.elements.planes[0], 0.3, 
                    {"height":h+"px", ease: Power1.easeOut});
      },
  
      setup: {
        startClick: function(t, direction){
          t.elements.planes.newActive.addClass("on-top");
          var left = (direction == 'left')?"0%":"-100%";
          var h = t.elements.planes.active.outerHeight();
          t.elements.planes.css({"width":"200%","left":left,"height": h});
          left = (direction == 'left')?"0%":"50%";
          t.elements.planes.active.css({"width":"50%","left":left});
          left = (direction == 'left')?"50%":"0%";
          t.elements.planes.newActive.css({"width":"50%","left":left});        
        },
        endClick: function(t, direction){
          t.elements.planes.active.removeClass("active").css({"width":"","left":""});
          t.elements.planes.newActive.removeClass("on-top").addClass("active").css({"width":"","left":""});
          t.elements.planes.css({"width":"","left":"", "height":""});
          setTimeout(function(){
            t.variables.slideBusy = false;
          },25);
        },
        startSlide: function(t){
          var h = t.elements.planes.active.outerHeight();
          t.elements.planes.css({"width":"300%","left":"-100%","height": h});
          t.elements.planes.active.css({"width":"33.3333%","left":"33.3333%"});
          t.elements.planes.next.addClass("on-top").css({"width":"33.3333%","left":"0"});
          t.elements.planes.prev.addClass("on-top").css({"width":"33.33333333%","left":"66.6666%"});
        },
        endSlide: function(t,direction){
          if(direction != null) t.elements.planes.active.removeClass("active");
          if(direction == "left") t.elements.planes.prev.addClass("active");
          if(direction == "right") t.elements.planes.next.addClass("active");
          t.elements.planes.css({"width":"","left":"", "height":""});
          t.elements.planes.active.css({"width":"","left":""});
          t.elements.planes.next.removeClass("on-top").css({"width":"","left":""});
          t.elements.planes.prev.removeClass("on-top").css({"width":"","left":""});
          setTimeout(function(){
            t.variables.slideBusy = false;
          },25);
        }
      }
    };
  
    $.fn[pluginName] = function ( options ) {
  
      return this.each(function () {
        if (!$.data(this, "plugin_" + pluginName)) {
          $.data(this, "plugin_" + pluginName,
                 new Plugin( this, options ));
        }
      });
    };
  
  })( jQuery, window, document );