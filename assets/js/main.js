(function($)
{
  "use strict";
  
  // menu 
  $('.siteBar-btn').click( function ()
  { 
    $('.mobile-menu').toggleClass('siteBar');   
  }); 

  // Scrolling status
  function ScrollingStatus() 
  { 
    if (document.querySelectorAll('.artical_area').length > 0 && document.querySelectorAll('.scro_lines').length > 0) 
    {        
      let selction = document.querySelector('.artical_area');
      let scroLines = document.querySelector('.scro_lines');
      window.addEventListener('scroll', (e) => {
                                                  if (window.scrollY > selction.offsetTop && selction.offsetTop + (selction.scrollHeight/2) > window.scrollY) 
                                                  {
                                                    scroLines.style.top = "7%";
                                                    scroLines.style.position = "fixed";
                                                    if (window.scrollY > selction.offsetTop + (selction.offsetTop / 50)) 
                                                    { 
                                                      scroLines.classList.add('active');
                                                    }
                                                    else 
                                                    if(selction.offsetTop + (selction.offsetTop / 1) > window.scrollY)
                                                    { 
                                                      scroLines.classList.remove('active');
                                                    }
                                                  }
                                                  else
                                                  {
                                                    scroLines.style.top = "7%";
                                                    scroLines.style.position = "absolute";
                                                  }
                                              })
    }
  }
  ScrollingStatus();

  var swiper = new Swiper(".mySwiper", {
                                          slidesPerView: 3,
                                          spaceBetween: 20,
                                          centeredSlides: true,
                                          loop: true,
                                          pagination: 
                                          {
                                            el: ".swiper-pagination",
                                            type: "fraction",
                                            clickable: true,
                                          },
                                          navigation: 
                                          {
                                            nextEl: ".swiper-button-next",
                                            prevEl: ".swiper-button-prev",
                                          },
                                          breakpoints: 
                                          {
                                            320: 
                                            {
                                              slidesPerView: 1
                                            },
                                            767: 
                                            {
                                              slidesPerView: 2
                                            },
                                            992: 
                                            {
                                              slidesPerView: 2.5
                                            },
                                            1100: 
                                            {
                                              slidesPerView: 3
                                            }
                                          }
                                        });

  var swiper = new Swiper(".pd_sub_sliders", {
                                                slidesPerView: 3,
                                                spaceBetween: 20,
                                                centeredSlides: true,
                                                loop: true,
                                                pagination: 
                                                {
                                                  el: ".swiper-pagination",
                                                  dynamicBullets: true,
                                                },
                                                breakpoints: 
                                                {
                                                  320: 
                                                  {
                                                    slidesPerView: 1
                                                  },
                                                  767: 
                                                  {
                                                    slidesPerView: 2
                                                  },
                                                  992: 
                                                  {
                                                    slidesPerView: 2.5
                                                  },
                                                  1100: 
                                                  {
                                                    slidesPerView: 3
                                                  }
                                                }
                                              });

  var swiper = new Swiper(".qe_slider", {
                                          slidesPerView: 3,
                                          spaceBetween: 20,
                                          centeredSlides: true,
                                          loop: true,
                                          pagination: 
                                          {
                                            el: ".swiper-pagination",
                                            dynamicBullets: true,
                                          },
                                          breakpoints: 
                                          {
                                            320: 
                                            {
                                              slidesPerView: 1
                                            },
                                            767: 
                                            {
                                              slidesPerView: 2
                                            },
                                            992: 
                                            {
                                              slidesPerView: 2.5
                                            },
                                            1100: 
                                            {
                                              slidesPerView: 3
                                            }
                                          }                                      
                                        });

  // modal ===========
  var input = document.querySelectorAll(".mobile_code");//buttons for the code Contry
  var input2 = document.querySelectorAll(".mobile_codee");//buttons for the code Contry
  var trigger = document.querySelectorAll(".trigger");//buttons for view the modal
  var btn_send = document.querySelectorAll(".thm_btn");//buttons for send the message
  var closeButton = document.querySelector(".close-button");//button for close the modal
  var modal = document.querySelector(".contact_modal");//this variable has all modal container
  
  for(var i=0;i<trigger.length;i++)
  {    
    trigger[i].addEventListener("click", toggleModal);
    btn_send[i].addEventListener("click",toggleModal);
    closeButton.addEventListener("click", toggleModal);  
    window.addEventListener("click", windowOnClick);    

    //Contry Code With Flag
    window.intlTelInput(input[i], {
                                    customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) 
                                    {
                                        return "e.g. " + selectedCountryPlaceholder;
                                    },
                                    separateDialCode: true,
                                  });
  }

  for(var o=0;o<input2.length;o++)
  {
    window.intlTelInput(input2[o], {
                                customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData)
                                {
                                    return "e.g. " + selectedCountryPlaceholder;
                                },separateDialCode: true,});
  }

  function toggleModal() 
  {
      modal.classList.toggle("show-modal");
  }

  function windowOnClick(event) 
  {
      if (event.target === modal) {
          toggleModal();
      }
  }
  
})(jQuery);
