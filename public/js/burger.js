var burgerlogo = document.getElementById('burger');
var burgeropen = document.getElementById('burger-open-debut');
burgeropen.style.display = "none !important";


// burgerlogo.addEventListener('touchstart', function() {
//    burgeropen.classList.add('burger-open')
   
// });



var  cross = document.getElementById('cross');

// cross.addEventListener('touchstart', function() {
//    burgeropen.classList.remove("burger-open") 

// });


burgerlogo.addEventListener('click', function() {
   burgeropen.classList.add('burger-open')
   burgeropen.style.display = "block";
   setTimeout(function(){
      burgeropen.style.left = "0";
    }, 100);
});
cross.addEventListener('click', function() {
   burgeropen.style.left = "-100vw";
   setTimeout(function(){
      burgeropen.classList.remove("burger-open") 
      burgeropen.style.display = "none";
    }, 400);
});