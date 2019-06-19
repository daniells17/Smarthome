// JavaScript Document
             function xxx(alamaturl)
            {
			 var x = document.getElementById("toast")
                $.ajax({
                url: alamaturl,
                beforeSend: function( xhr ) {
                    xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
            		x.className = "show";
    			setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
			   }
			
                })
                .done(function( data ) {
                    if ( console && console.log ) {
                    console.log( "Sample of data:", data.slice( 0, 100 ) );
	                  }
                });
             }
			 
function launch_toast() {
    var x = document.getElementById("toast")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}