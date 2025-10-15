/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
 var pic4x4 = "pic";
 var picConvertible = "pic";
 var picCoupe = "pic";
 var picHatchback = "pic";
 var picMPV = "pic";
 var picPickup = "pic";
 var picSedan = "pic";
 var picSUV = "pic";


function myFunction() {
    var x = document.getElementById("myLinks");
    var y = document.getElementById("container");
    var z = document.getElementById("banner")
    
    if (x.style.display === "block" ) {
      x.style.display = "none";
      y.style.display = "block";
      // z.style.display = "flex";
      
    } else {
      x.style.display = "block";
      y.style.display = "none";
      x.style.position = "absolute";
      x.style.width = "100%";
      x.style.marginleft = "-10px"
    }
  }

// To show the container and hide the hamburger navigation menu when the 
  function showContainer() {
    var x = document.getElementById("myLinks");
    var y = document.getElementById("container");
    x.style.display = "none";
    y.style.display = "block";
  }

// Function to show information when image is clicked for each car type
  function showInfo(source){
    
    //console.log("Function Called")
    //console.log(source)
   
    
    if (source == "4x4Pic" && pic4x4 =="pic"){
      var image = document.getElementById("button1"); 
      image.src = "images/index/info/4x4.png";  
      pic4x4="text";    
    } 
    
    else if (pic4x4="text"){
      var image = document.getElementById("button1"); 
      image.src = "images/index/4x4.png";
      pic4x4="pic";
    }

    
    if (source == "convertiblePic" && picConvertible =="pic"){
      var image = document.getElementById("button2"); 
      console.log("Hai")
      image.src = "images/index/info/convertible.png";
      picConvertible="text";
      
    } 
    
    else if (picConvertible="text") {
      var image = document.getElementById("button2"); 
      image.src = "images/index/convertible.png";
      picConvertible="pic";
    }

   
    if (source == "coupePic" && picCoupe =="pic"){
      var image = document.getElementById("button3"); 
      image.src = "images/index/info/coupe.png";
      picCoupe="text";
      
    } 
    
    else if (picCoupe="text") {
      var image = document.getElementById("button3"); 
      image.src = "images/index/coupe.png";
      picCoupe="pic";
    }

    
    if (source == "hatchbackPic" && picHatchback =="pic"){
      var image = document.getElementById("button4"); 
      picHatchback="text";
      image.src = "images/index/info/hatchback.png";
      
    } else if (picHatchback="text"){
      var image = document.getElementById("button4"); 
      image.src = "images/index/hatchback.png";
      picHatchback="pic";
    }

    
    if (source == "mpvPic" && picMPV =="pic"){
      var image = document.getElementById("button5"); 
      picMPV="text";
      image.src = "images/index/info/mpv.png";
      
    } else if (picMPV="text") {
      var image = document.getElementById("button5"); 
      image.src = "images/index/mpv.png";
      picMPV="pic";
    }

    if (source == "pickupPic" && picPickup =="pic"){
      var image = document.getElementById("button6"); 
      picPickup="text";
      image.src = "images/index/info/pickup.png";
      
    } else if (picPickup="text") {
      var image = document.getElementById("button6"); 
      image.src = "images/index/pickup.png";
      picPickup="pic";
    }

    if (source == "sedanPic" && picSedan =="pic"){
      var image = document.getElementById("button7"); 
      picSedan="text";
      image.src = "images/index/info/sedan.png";
      
    } else if (picSedan="text") {
      var image = document.getElementById("button7"); 
      image.src = "images/index/sedan.png";
      picSedan="pic";
    }

    if (source == "suvPic" && picSUV =="pic"){
      var image = document.getElementById("button8"); 
      picSUV="text";
      image.src = "images/index/info/suv.png";
      
    } else if (picSUV="text"){
      var image = document.getElementById("button8"); 
      image.src = "images/index/suv.png";
      picSUV="pic";
    }

    else{
      console.log("Nice Try")
    }


  }

