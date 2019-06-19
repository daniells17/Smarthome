// JavaScript Document
    window.onload = setInterval(clock,1000);
    function clock()
    {
	  var d = new Date();
	  var date = d.getDate();
	  var month = d.getMonth();
	  var montharr =["January","February","March","April","May","June","July","August","September","October","November","December"];
	  month=montharr[month];
	  var year = d.getFullYear();
	  var day = d.getDay();
	  var dayarr =["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	  day=dayarr[day];
	  var hour = d.getHours();
      var min = d.getMinutes();
	  var sec = d.getSeconds();
	  var dn="AM"
	   if (hour>11)
	   {
        dn="PM"
        hour=hour-12
  	   }
	  if (hour==0)
		hour=12
	  if (min<=9)
		min="0"+min
	  if (sec<=9)
		sec="0"+sec
	  document.getElementById("date").innerHTML=day+" <br>"+date+" "+month+" "+year;
	  document.getElementById("time").innerHTML=hour+":"+min+""+ dn;
    }