
function ajaxp($url,$ventana)
   {    
        let xhr = new XMLHttpRequest();

        xhr.open('GET', $url);

        xhr.onload = () => {
        if (xhr.status != 200) { 
            console.log(`Error ${xhr.status}: ${xhr.statusText}`);
        } else {
            console.log(xhr.response.length);
        }
        };

        xhr.onreadystatechange = () => {
        if (xhr.readyState === 4) {

            document.getElementById($ventana).innerHTML = xhr.responseText;
        }
        };

        xhr.onerror = () => console.log("Request failed");

        xhr.send();
   }