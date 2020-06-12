<script>
   window.addEventListener('load', MyFunc, false);
    function MyFunc(){
       document.getElementById("loader").style.display = "none";
     }
</script>
	<div id="loader">

        <div id="fountainTextG">
             <script>
                 var name = "TheProcrastinators...";
				for (var i=0; i< name.length; i++){
                        document.write('<div id="fountainTextG_');
                        document.write((i+1));
                        document.write('"class="fountainTextG">');
                        document.write(name[i]);
                        document.write("</div>");
                }
             </script>
        </div>
    </div>
 
   
        
   