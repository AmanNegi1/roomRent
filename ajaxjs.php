 function girls_fun(){
      var content='girls_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="girls.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }

      function family_fun(){
      var content='family_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="family.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }
    function boysorgirls_fun()(){
      var content='boysorgirls_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="boys_girls.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }
    function boysorfamilyfun(){
      var content='boysoffamily_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="boys_family.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }
    function girlsorfamily_fun(){
      var content='girlsorfamily_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="family_girls.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }