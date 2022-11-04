if (document.querySelectorAll("[data-counter]")) {
  const counter = (EL) => {
    const duration = 4000; // Animate all counters equally for a better UX

    const start = parseInt(EL.textContent, 10); // Get start and end values
    const end = parseInt(EL.dataset.counter, 10); // PS: Use always the radix 10!

    if (start === end) return; // If equal values, stop here.

    const range = end - start; // Get the range
    let curr = start; // Set current at start position

    const timeStart = Date.now();

    const loop = () => {
      let elaps = Date.now() - timeStart;
      if (elaps > duration) elaps = duration; // Stop the loop
      const frac = elaps / duration; // Get the time fraction
      const step = frac * range; // Calculate the value step
      curr = start + step; // Increment or Decrement current value
      EL.textContent = Math.trunc(curr); // Apply to UI as integer
      if (elaps < duration) requestAnimationFrame(loop); // Loop
    };

    requestAnimationFrame(loop); // Start the loop!
  };

  document.querySelectorAll("[data-counter]").forEach(counter);
}

// Homepage Slider
if (document.querySelector('.items')) {
  const slider = document.querySelector('.items');
  let isDown = false;
  let startX;
  let scrollLeft;

  slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });

  slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
  });

  slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
  });

  slider.addEventListener('mousemove', (e) => {
    if (!isDown) return;  // stop the fn from running
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 2;
    slider.scrollLeft = scrollLeft - walk;
  });


  //   touchEvents

  slider.addEventListener('touchstart', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });

  slider.addEventListener('touchend', () => {
    isDown = false;
    slider.classList.remove('active');
  });

  slider.addEventListener('touchcancel', () => {
    isDown = false;
    slider.classList.remove('active');
  });

  slider.addEventListener('touchmove', (e) => {
    if (!isDown) return;  // stop the fn from running
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 2;
    slider.scrollLeft = scrollLeft - walk;
  });
}


//-- Active menu
const mediaQuery = window.matchMedia('(max-width: 991px)');
if (mediaQuery.matches) {
  if (document.querySelector('.mobile-menu-toggle-icon')) {
    let openCLosemMenu = document.querySelector('.mobile-menu-toggle-icon');

    openCLosemMenu.addEventListener('click', function () {
      this.classList.toggle('close');
      let activeInactiveMenu = document.getElementById('primary-menu');
      activeInactiveMenu.classList.toggle('active');
    });
  }


  let openCLosemSubMenus = document.querySelectorAll('.menu-item-has-children');
  openCLosemSubMenus.forEach((openCLosemSubMenu) => {
    openCLosemSubMenu.addEventListener('click', function (ele) {
      openCLosemSubMenu.classList.toggle('active');
    });

  });


}



window.addEventListener("scroll", () => {
  scrollTopFunction();
  scrollFunction() 
});

//-- Active menu

//-- On scroll add clas sticky
function scrollFunction() {
  const mediaQuery2 = window.matchMedia('(min-width: 992px)');
  if (mediaQuery2.matches) {
    if (document.documentElement.scrollTop >= 250) {
      document.getElementById("header").classList.add('sticky');
    } else {
      document.getElementById("header").classList.remove('sticky');
    }
  }
}

// Scroll TOP
const scrollTopId = document.getElementById('scroll-top');
function scrollTopFunction() {
  if (window.scrollY > 400) {
    scrollTopId.style.visibility = "visible";
  } else {
    scrollTopId.style.visibility = "hidden";
  }
}
scrollTopId.addEventListener("click", () => {
  window.scrollTo(0, 0);		
});


if (document.getElementById('file')) {
  document.addEventListener('change', function (e) {
    if (e.target && e.target.id == 'file') {
      var fileName = e.target.files[0].name;
      var attach_ele = document.querySelector(".career-attach-main");
      if (attach_ele) {
        var attach_ele_children = document.querySelectorAll('.file-name');
        if (attach_ele_children.length) {
          attach_ele_children.forEach(e => e.remove());
        }
        attach_ele.insertAdjacentHTML('afterend', '<span class="file-name text-primary col-md-12 mb-3 pb-md-1 file-name font-14"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="20" cy="20" r="19.5" stroke="#A5A5A5"/><path d="M23.3449 9H12V30H28.45V14.1051L23.3449 9ZM23.55 10.1949L27.2551 13.9H23.55V10.1949ZM12.7 29.3V9.7H22.85V14.6H27.75V29.3H12.7Z" fill="#5C5B5B"/></svg>' + fileName + ' <a href="javascript:void(0);" class="text-primary" id="remove-file"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 0C4.03736 0 0 4.03736 0 9C0 13.9626 4.03736 18 9 18C13.9626 18 18 13.9626 18 9C18 4.03736 13.9626 0 9 0ZM9 16.7143C4.74636 16.7143 1.28571 13.2536 1.28571 9C1.28571 4.74636 4.74636 1.28571 9 1.28571C13.2536 1.28571 16.7143 4.74636 16.7143 9C16.7143 13.2536 13.2536 16.7143 9 16.7143Z" fill="black"/><path d="M12.7069 5.29317C12.3694 4.95573 11.8224 4.95573 11.4849 5.29317L9.00004 7.77809L6.51503 5.29308C6.17759 4.95563 5.63057 4.95563 5.29312 5.29308C4.95568 5.63053 4.95568 6.17755 5.29312 6.51499L7.77813 9.00001L5.29312 11.485C4.95568 11.8225 4.95568 12.3695 5.29312 12.7069C5.4618 12.8756 5.68299 12.96 5.90408 12.96C6.12517 12.96 6.34626 12.8756 6.51503 12.7069L9.00004 10.2219L11.485 12.7069C11.6537 12.8756 11.8749 12.96 12.096 12.96C12.3171 12.96 12.5382 12.8756 12.707 12.7069C13.0444 12.3695 13.0444 11.8225 12.707 11.485L10.2219 9.00001L12.707 6.51499C13.0443 6.17764 13.0443 5.63053 12.7069 5.29317Z" fill="black"/></svg></a></span>');
        //attach_ele.innerHTML = attach_ele.innerHTML + '<span class="file-name">'+fileName+' <a id="remove-file">X</a></span>';
      }
    }
  });
}

document.addEventListener('click', function (e) {
  if (e.target && e.target.id == 'remove-file') {
    document.getElementById("file").value = "";
    var attach_ele_children = document.querySelectorAll('.file-name');
    if (attach_ele_children.length) {
      attach_ele_children.forEach(e => e.remove());
    }
  }
});

/* Contact form double click issue */
if (document.querySelector(".wpcf7-submit")) {
  var elements = document.getElementsByClassName("wpcf7-form");
  elements[0].addEventListener('submit', function () {
    document.getElementsByClassName('wpcf7-submit')[0].disabled = true;
  }, false);

  document.addEventListener('wpcf7invalid', function () {
    document.getElementsByClassName('wpcf7-submit')[0].disabled = false;
  }, false);

  document.addEventListener('wpcf7mailsent', function () {
    document.getElementsByClassName('wpcf7-submit')[0].disabled = false;
    var attach_ele_children = document.querySelectorAll('.file-name');
    if (attach_ele_children.length) {
      attach_ele_children.forEach(e => e.remove());
    }
  }, false);
}

/* Comment Form Validation */
if (document.querySelector(".comment-form")) {
  document.querySelector(".comment-form").addEventListener("submit", function (e) {
    if (this.elements.author) {
      var author = this.elements.author.value;
    }
    if (this.elements.email) {
      var email = this.elements.email.value;
    }
    if (this.elements.comment) {
      var comment = this.elements.comment.value;
    }
    var author_ele = document.querySelector(".comment-form-author");
    var email_ele = document.querySelector(".comment-form-email");
    var comment_ele = document.querySelector(".comment-form-comment");
    if (author_ele) {
      var author_ele_children = author_ele.querySelectorAll('.form-error');
      if (author_ele_children.length) {
        author_ele_children.forEach(e => e.remove());
      }
      if (author == '') {
        author_ele.innerHTML = author_ele.innerHTML + '<span class="form-error">Please enter Name<span>';
        e.preventDefault();
      }
    }
    if (email_ele) {
      var email_ele_children = email_ele.querySelectorAll('.form-error');
      if (email_ele_children.length) {
        email_ele_children.forEach(e => e.remove());
      }
      if (email == '') {
        email_ele.innerHTML = email_ele.innerHTML + '<span class="form-error">Please enter Email<span>';
        e.preventDefault();
      }
      else {
        if (!MYSvalidateEmail(email)) {
          email_ele.innerHTML = email_ele.innerHTML + '<span class="form-error">Please enter Valid Email<span>';
          e.preventDefault();
        }
      }
    }
    if (comment_ele) {
      var comment_ele_children = comment_ele.querySelectorAll('.form-error');
      if (comment_ele_children.length) {
        comment_ele_children.forEach(e => e.remove());
      }


      if (comment == '') {
        comment_ele.innerHTML = comment_ele.innerHTML + '<span class="form-error">Please enter Comment<span>';
        e.preventDefault();
      }
    }
  });
}
function MYSvalidateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

window.addEventListener('DOMContentLoaded', (event) => {
  if (document.querySelector(".htoc__toggle")) {
    if (document.querySelector('[data-htoc-state="expanded"]')) {
      document.querySelector('.htoc__toggle').click();
    }

    const ht_toc_title = document.querySelector('.htoc__title');
    ht_toc_title.addEventListener('click', () => {
      document.querySelector('.htoc__toggle').click();
    });
  }
});

/*SLider JS*/
if (document.querySelector('.items')) {
  let isDown = false;
  let startX;
  let scrollLeft;
  const slider = document.querySelector('.items');

  const end = () => {
    isDown = false;
    slider.classList.remove('active');
  }

  const start = (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX || e.touches[0].pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  }

  const move = (e) => {
    if (!isDown) return;

    e.preventDefault();
    const x = e.pageX || e.touches[0].pageX - slider.offsetLeft;
    const dist = (x - startX);
    slider.scrollLeft = scrollLeft - dist;
  }

  (() => {
    slider.addEventListener('mousedown', start);
    slider.addEventListener('touchstart', start);

    slider.addEventListener('mousemove', move);
    slider.addEventListener('touchmove', move);

    slider.addEventListener('mouseleave', end);
    slider.addEventListener('mouseup', end);
    slider.addEventListener('touchend', end);
  })();
}
