function $(selector) {
    return document.querySelector(selector);
}
// function initMap() {
//     var map = new google.maps.Map(document.getElementById('map'), {
//         zoom: 10,
//         center: new google.maps.LatLng(-33.92, 151.25),
//     });
// }
// window.onload=function() {
//     initMap();
// }





document.addEventListener("DOMContentLoaded", function() {

   var submitButton =$('submit');
   var locationValue=$('location');


       var location = locationValue.value;

       var xhr = new XMLHttpRequest();
       xhr.open('GET', 'ajax.php?location='+location,true);
       xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
       xhr.onreadystatechange=function(){
           //todo write more server and status case

           if (xhr.readyState==4 && xhr.status==200){
               var result =xhr.responseText;
               console.log(result);

               //todo parse json and call functions to do stuff
           }
       }
       xhr.send();

});
