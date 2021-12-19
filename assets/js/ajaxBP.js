var xhr;

function paginer(indice)
{
	xhr=new XMLHttpRequest();
    if (!xhr) {
        alert('Abandon :( Impossible de créer une instance de XMLHTTP');
        return;
    }
	xhr=new XMLHttpRequest();
	var input=document.getElementById("indicePage".concat(indice));
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4)
		 {
			if(xhr.status == 200)
			{
				var input=null;
				if(document.getElementsByClassName("page-item active")!=null)
				{
					var elts=document.getElementsByClassName("page-item active");
					for (elt of elts)
					{
						// console.log(elt.innerHTML);
						// console.log(elt.value);
						elt.className="page-item";

					}
					var input=document.getElementById("indicePage".concat(indice));
					console.log(input.value);
				}
				else
				{
					 input=document.getElementById("indicePage1");
				}
					input.className="page-item active";

				var res=JSON.parse(xhr.responseText);
				console.log(res);
				var page="";
				var element=document.getElementById("tableaux");
				var site = document.getElementById("site");
				for(var i=0;i<res.length;i++)
				{
					page+="<tr>";
					page+="<th scope='row'>"+(i+1)+"</th>";
					page+="<td>"+res[i]['nom']+""+res[i]['prenom']+"</td>";
					page+="<td>"+res[i]['idFichePaie']+"</td>";
					page+="<td>"+res[i]['dateMiseEnPlace']+"</td>";
					page+="<td>"+res[i]['net']+" AR</td>";
					page+="<td><a class='btn btn-info' href='"+site.value+"BPController/getBP?idFichePai="+res[i]['idFichePaie']+"' role='button'>INFO</a></td>";
					page+="</tr>";
				}
				element.innerHTML=page;

			}
			else
			{
				alert("Error code : " + xhr.status);
			}
		} else {
		// alert("en cours : " + xhr.readyState);
		// alert(xhr.responseText);

		}
	}

    xhr.open('POST', 'pagination');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('indicePage=' + encodeURIComponent(input.value));
}





// function changeCurrent(i)
// {
// 	if(xhr.readyState == 4)
// 	 {
// 		if(xhr.status == 200)
// 		{

// 			var elt=document.getElementsByClassName("page-item active");
// 			elt.className="page-item";
// 			var input=document.getElementById("indicePage".concat(i));
// 			input.className="page-item active";
// 		}
// 		else
// 		{
// 			alert("Error code : " + xhr.status);
// 		}
// 	} else {
// 	// alert("en cours : " + xhr.readyState);
// 	// alert(xhr.responseText);

// 	}
// }