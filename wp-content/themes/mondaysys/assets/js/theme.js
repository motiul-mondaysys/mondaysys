document.addEventListener("DOMContentLoaded", function() {
    const accordionItems = document.querySelectorAll(".service-accorion-item");

    accordionItems.forEach(item => {
        item.addEventListener("mouseenter", () => {
            const section = item.closest("section");
            let scopedItems;
            if (section) {
                scopedItems = section.querySelectorAll(".service-accorion-item");
            } else {
                scopedItems = accordionItems;
            }
            scopedItems.forEach(i => i.classList.remove("active"));
            item.classList.add("active");
        });
    });
});


document.addEventListener("DOMContentLoaded", function() {
  const menuItems = document.querySelectorAll(".primary-menu li.menu-item-has-children");

  menuItems.forEach(item => {
    const link = item.querySelector("a");
    const toggleBtn = document.createElement("button");
    toggleBtn.classList.add("submenu-toggle");
    toggleBtn.innerHTML = `
      <span class="arrow-down">
        <svg width="24" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M5.4004 5.61066L10.0466 0.73428C10.1242 0.652915 10.1675 0.544817 10.1675 0.432405C10.1675 0.319993 10.1242 0.211895 10.0466 0.130531L10.0414 0.12528C10.0038 0.0856996 9.95853 0.0541825 9.90837 0.0326452C9.8582 0.0111084 9.80418 1.93911e-06 9.74958 1.94388e-06C9.69499 1.94866e-06 9.64097 0.0111084 9.5908 0.0326453C9.54063 0.0541826 9.49537 0.0856996 9.45777 0.12528L5.08277 4.71728L0.709522 0.125281C0.67192 0.0857004 0.626659 0.0541834 0.576493 0.0326461C0.526327 0.0111092 0.472303 2.75493e-06 0.417709 2.7597e-06C0.363115 2.76447e-06 0.309092 0.0111093 0.258926 0.0326461C0.208759 0.0541834 0.163498 0.0857004 0.125897 0.125281L0.120646 0.130532C0.0430818 0.211896 -0.000187395 0.319994 -0.000187385 0.432406C-0.000187375 0.544818 0.0430818 0.652916 0.120646 0.734281L4.7669 5.61066C4.80776 5.65354 4.8569 5.68768 4.91135 5.71101C4.9658 5.73434 5.02441 5.74637 5.08365 5.74637C5.14288 5.74637 5.2015 5.73434 5.25595 5.71101C5.31039 5.68768 5.35954 5.65354 5.4004 5.61066Z" fill="currentColor"/>
        </svg>
      </span>
    `;
    link.appendChild(toggleBtn);

    toggleBtn.addEventListener("click", function(e) {
      e.preventDefault();
      e.stopPropagation();
      item.classList.toggle("active");
      const submenu = item.querySelector(".sub-menu, .mega-menu-wrapper");
      if (submenu) {
        submenu.classList.toggle("open");
      }
    });
  });
});




document.addEventListener('DOMContentLoaded', function() {
  const toggleItems = document.querySelectorAll('.toggle-item');

  toggleItems.forEach(item => {
    const header = item.querySelector('.toggle-header');

    header.addEventListener('click', () => {
      toggleItems.forEach(i => {
        if (i !== item) {
          i.classList.remove('active');
          i.querySelector('.toggle-content').style.maxHeight = null;
        }
      });

      item.classList.toggle('active');
      const content = item.querySelector('.toggle-content');

      if (item.classList.contains('active')) {
        content.style.maxHeight = content.scrollHeight + "px";
      } else {
        content.style.maxHeight = null;
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function() {
  const menuToggle = document.querySelector(".menu-toggle");
  const primaryMenu = document.querySelector(".primary-menu");

  if (menuToggle && primaryMenu) {
    menuToggle.addEventListener("click", function() {
      this.classList.toggle("active");
      primaryMenu.classList.toggle("show");

      // Update ARIA attribute for accessibility
      const expanded = this.classList.contains("active");
      this.setAttribute("aria-expanded", expanded);
    });
  }
});



class customCarousel extends HTMLElement {
  connectedCallback() {
    const swiperContainer = this.querySelector(".mondaysys_carousel");
    // Top and bottom titles **inside this carousel only**
    const slides = Array.from(swiperContainer.querySelectorAll('.swiper-slide'));
    const topContainer = this.querySelector('.top-titles') || this.parentElement.querySelector('.top-titles');
    const bottomContainer = this.querySelector('.bottom-titles') || this.parentElement.querySelector('.bottom-titles');


    const desktopSlides = parseInt(this.getAttribute('data-desktop'));
    const tabletSlides = parseInt(this.getAttribute('data-tablet'));
    const mobileSlides = parseInt(this.getAttribute('data-mobile'));   
    const extraSmallDevice = parseInt(this.getAttribute('data-extra-small'));

    const slideAutoplay = this.getAttribute('data-autoplay') === 'true';  
    const sliderInfiniteLoop = this.getAttribute('data-infinite-loop') === 'true'; 
    const slidesowCentermode = this.getAttribute('data-center-mode') === 'true';
    const pauseOnHover = this.getAttribute('data-pause-onhover') === 'true';

    const slidesowDesSpace = parseInt(this.getAttribute('data-deskitemspace')) || 10;
    const slidesowMobSpace = parseInt(this.getAttribute('data-mobitemspace')) || 10; 

    const slidesowItemSpeed = parseInt(this.getAttribute('data-item-speed')) || 1000;
    const autoplayDelay = parseInt(this.getAttribute('data-autoplay-delay')) || 5000;

    const paginationType = this.getAttribute('data-pagination-type') || 'bullets';

    const directionAttr = (this.getAttribute('data-direction') || 'left').toLowerCase();
    const isReverse = directionAttr === 'right'; 
    const mousewheelEnabled = this.getAttribute('data-mousewheel') === 'true';
    const directionAttr2 = (this.getAttribute('data-direction2') || 'horizontal').toLowerCase();

    // Offset attributes
    const rawOffsetBefore = this.getAttribute('data-offset-before') || '0';
    const rawOffsetAfter = this.getAttribute('data-offset-after') || '0';

    // Convert % offset → px based on container width
    const getOffsetValue = (value) => {
      if (value.includes('%')) {
        const percent = parseFloat(value) / 100;
        return swiperContainer.offsetWidth * percent;
      }
      return parseFloat(value);
    };

    let offsetBefore = getOffsetValue(rawOffsetBefore);
    let offsetAfter = getOffsetValue(rawOffsetAfter);

    const breakpoints = {
      0: { // all devices below 480px
        slidesPerView: extraSmallDevice,
        spaceBetween: slidesowMobSpace
      },
      480: { // small phones and up
        slidesPerView: mobileSlides,
        spaceBetween: slidesowMobSpace
      },
      768: { // tablets
        slidesPerView: tabletSlides,
        spaceBetween: slidesowDesSpace
      },
      1024: { // desktops
        slidesPerView: desktopSlides,
        spaceBetween: slidesowDesSpace
      }
    };

    const swiper = new Swiper(swiperContainer, {
      loop: sliderInfiniteLoop,
      spaceBetween: slidesowDesSpace,
      speed: slidesowItemSpeed, 
      direction: directionAttr2, // horizontal / vertical
      autoplay: slideAutoplay
        ? {
            delay: autoplayDelay, 
            disableOnInteraction: false,
            reverseDirection: isReverse
          }
        : false,
      pagination: {
        el: this.querySelector(".swiper-pagination"),
        clickable: true,
        type: paginationType
      },
      centeredSlides: slidesowCentermode,
      navigation: {
        nextEl: this.querySelector(".swiper-button-next"),
        prevEl: this.querySelector(".swiper-button-prev")
      },
      mousewheel: {
        enabled: mousewheelEnabled,
        releaseOnEdges: true,
        forceToAxis: true    
      }, 
      slidesOffsetAfter: offsetAfter,
      slidesOffsetBefore: offsetBefore,
      breakpoints
    });

    // Recalculate offset on resize if % used
    if (rawOffsetBefore.includes('%') || rawOffsetAfter.includes('%')) {
      window.addEventListener('resize', () => {
        swiper.params.slidesOffsetBefore = getOffsetValue(rawOffsetBefore);
        swiper.params.slidesOffsetAfter = getOffsetValue(rawOffsetAfter);
        swiper.update();
      });
    }

    // Pause autoplay on hover
    if (slideAutoplay && pauseOnHover) {
      swiperContainer.addEventListener("mouseenter", () => swiper.autoplay.stop());
      swiperContainer.addEventListener("mouseleave", () => swiper.autoplay.start());
    }

    // Only show titles if vertical + mousewheel
    if(directionAttr2 === 'vertical' && mousewheelEnabled && topContainer && bottomContainer) {
      const allTitles = slides.map((slide, i) => ({
        text: slide.dataset.title,
        index: i
      }));

      function updateTitles(activeIndex) {
        topContainer.innerHTML = '';
        bottomContainer.innerHTML = '';

        allTitles.forEach(item => {
          const div = document.createElement('div');
          div.classList.add('vertical-slide-title');
          div.textContent = item.text;
          div.dataset.index = item.index;

          if(item.index <= activeIndex) topContainer.appendChild(div);
          else bottomContainer.appendChild(div);
        });

        // Click bottom titles to navigate
        bottomContainer.querySelectorAll('.vertical-slide-title').forEach(t=>{
          t.addEventListener('click', ()=> swiper.slideTo(parseInt(t.dataset.index)));
        });
      }
      updateTitles(swiper.realIndex);
      swiper.on('slideChange', ()=> updateTitles(swiper.realIndex));
    }

  }
}

customElements.define('mondaysys-carousel', customCarousel);



class bannerSlideshow extends HTMLElement {
  connectedCallback() {
    const swiperContainer = this.querySelector(".banner-slideshow");
    let previousRealIndex = 0; 

    const swiper = new Swiper(swiperContainer, {
      loop: true,
      spaceBetween: 0,
      slidesPerView: 1,
      effect: 'fade',
      fadeEffect: { crossFade: true },
      speed: 500,
      autoplay: {
          delay: 7000,
          disableOnInteraction: false,
      },
      pagination: {
        el: this.querySelector(".swiper-pagination"),
        clickable: true,
      },
      on: {
        slideChangeTransitionStart() {
          const slides = this.slides;
          slides.forEach(slide => {
            const img = slide.querySelector('.slider_image img');
            if (img) img.classList.remove('slide-in-right', 'slide-in-left', 'slide-out-left', 'slide-out-right');
          });

          const activeSlide = this.slides[this.activeIndex];
          const prevSlide = this.slides[this.previousIndex];
          const activeRealIndex = this.realIndex;

          if (activeSlide) {
            const activeImg = activeSlide.querySelector('.slider_image img');
            if (activeImg) {
              activeImg.classList.add(
                activeRealIndex > previousRealIndex ? 'slide-in-right' :
                activeRealIndex < previousRealIndex ? 'slide-in-left' :
                'slide-in-right'
              );
            }
          }

          if (prevSlide) {
            const prevImg = prevSlide.querySelector('.slider_image img');
            if (prevImg) {
              prevImg.classList.add(
                activeRealIndex > previousRealIndex ? 'slide-out-left' :
                activeRealIndex < previousRealIndex ? 'slide-out-right' :
                'slide-out-left'
              );
            }
          }

          previousRealIndex = activeRealIndex;
        },

        slideChangeTransitionEnd() {
          const slides = this.slides;
          slides.forEach(slide => {
            const img = slide.querySelector('.slider_image img');
            if (!img) return;
            if (slide === slides[this.activeIndex]) {
              img.classList.remove('slide-in-right', 'slide-in-left', 'slide-out-left', 'slide-out-right');
              img.classList.add('enter-active');
            } else {
              img.classList.remove('enter-active', 'slide-in-right', 'slide-in-left', 'slide-out-left', 'slide-out-right');
            }
          });
        }
      }
    });

  }
}
customElements.define('banner-slideshow', bannerSlideshow);


document.addEventListener("DOMContentLoaded", function() {
    const arrowHTML = `
    <span class="btn_arrow_contain">
        <svg class="btn_arrow btn_normal_icon" width="35" height="35" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.63889 2.44444L0.305556 9.77778L1.22222 10.6944L8.86111 3.05556H9.47222V11H11V0H0V1.52778H7.63889V2.44444Z"></svg>

        <svg class="btn_arrow btn_hover_icon" width="35" height="35" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.63889 2.44444L0.305556 9.77778L1.22222 10.6944L8.86111 3.05556H9.47222V11H11V0H0V1.52778H7.63889V2.44444Z" /></svg>
    </span>`;

    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => {
        if (!btn.querySelector('.arrow-contain')) {
            btn.insertAdjacentHTML('beforeend', arrowHTML);
        }
    });
});

function counter(selector) {
  let elements = document.querySelectorAll(selector);
  elements.forEach((element) => {
    let start = 0,
      end = parseInt(element.getAttribute("ending-number")) || 80,
      duration = parseInt(element.getAttribute("counter-animation")) || 3000,
      current = start,
      range = end - start,
      increment = end > start ? 1 : -1,
      step = Math.abs(Math.floor(duration / range)),
      timer = setInterval(() => {
        current += increment;
        element.textContent = current;
        if (current == end) {
          clearInterval(timer);
        }
      }, step);
  });
}
counter(".counter_number");

class CaseStudyCarousel extends HTMLElement {
  connectedCallback() {
    const swiperContainer = this.querySelector(".casestudy_carousel");
    const contentWrapper = this.querySelector(".featured_case_studies_content");
    const titleEl = contentWrapper?.querySelector(".title");
    const descEl = contentWrapper?.querySelector(".slider_description");
    const catEl = contentWrapper?.querySelector(".casestudy_cat");
    const btnEl = contentWrapper?.querySelector(".btn");

    const currentSlideWrapper = this.querySelector("#current-slide-wrapper");
    const currentSlideNumber = this.querySelector("#current-slide");
    const totalSlideNumber = this.querySelector("#total-slides");

    if (!swiperContainer || !contentWrapper) return;

    const slides = swiperContainer.querySelectorAll(".swiper-slide");

    function updateSlideContent(swiper) {
      const currentSlide = slides[swiper.realIndex];
      if (!currentSlide) return;

      const title = currentSlide.dataset.title || "";
      const desc = currentSlide.dataset.description || "";
      const category = currentSlide.dataset.category || "";
      const link = currentSlide.dataset.link || "#";

      [titleEl, descEl, catEl, btnEl].forEach(el => {
        if (el) {
          el.style.opacity = 0;
          el.style.transform = "translateY(20px)";
          el.style.transition = "all 0.5s";
        }
      });

      setTimeout(() => {
        if (titleEl) titleEl.textContent = title;
        if (descEl) descEl.textContent = desc;
        if (catEl) catEl.textContent = category;
        if (btnEl) btnEl.href = link;
        [titleEl, descEl, catEl, btnEl].forEach(el => {
          if (el) {
            el.style.opacity = 1;
            el.style.transform = "translateY(0)";
          }
        });
      }, 500);
    }

    function animateSlideNumber(swiper) {
      if (!currentSlideNumber) return;

      currentSlideNumber.style.opacity = 0;
      currentSlideNumber.style.transform = "translateY(-100%)";
      currentSlideNumber.style.transition = "all 0.5s";

      setTimeout(() => {
        const current = swiper.realIndex + 1;
        currentSlideNumber.textContent = current < 10 ? "0" + current : current;

        currentSlideNumber.style.opacity = 1;
        currentSlideNumber.style.transform = "translateY(0)";
      }, 500);
    }

    const swiper = new Swiper(swiperContainer, {
      slidesPerView: 1,
      loop: true,
      speed: 1300,
      navigation: {
        nextEl: this.querySelector(".swiper-button-next"),
        prevEl: this.querySelector(".swiper-button-prev"),
      },
      breakpoints: {
        0: { slidesPerView: 1 },
        768: { slidesPerView: 1.3 },
        1024: { slidesPerView: 1.7 },
      },
      on: {
        init: function () {
          if (totalSlideNumber) {
            const total = slides.length;
            totalSlideNumber.textContent = total < 10 ? "0" + total : total;
          }

          updateSlideContent(this);
          animateSlideNumber(this);
        },
        slideChange: function () {
          updateSlideContent(this);
          animateSlideNumber(this);
        },
      },
    });
  }
}

customElements.define("casestudy-carousel", CaseStudyCarousel);



document.addEventListener('DOMContentLoaded', function() {
    const navigationLinks = document.querySelectorAll('.site-navigation > ul > li.mega_menu_enable');
    const siteHeader = document.querySelector('.site-header');
    if (siteHeader) { 
        navigationLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                siteHeader.classList.add('active-mega-menu');
            });

            link.addEventListener('mouseleave', function() {
                siteHeader.classList.remove('active-mega-menu');
            });
        });
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".faq-tab-btn");
    const contents = document.querySelectorAll(".faq-tab-content");
    if (tabs.length) {
        tabs[0].classList.add("active");
        contents[0].classList.add("active");
        tabs.forEach(tab => {
            tab.addEventListener("click", function () {

                let target = this.getAttribute("data-tab");

                tabs.forEach(t => t.classList.remove("active"));
                contents.forEach(c => c.classList.remove("active"));

                this.classList.add("active");
                document.getElementById(target).classList.add("active");
            });
        });
    }
});













