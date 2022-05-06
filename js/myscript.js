// function del(){
//     var x= confirm("ایا میخواهید فیلد را حذف کنید؟!");
//     if(x==true){
//         document.getElementsByClassName('fild-customer').innerHtml=" ";
//     }
// }

// ایمن سازی کلمه عبور
function check(){

    var x1 = document.forms["myForm"]["fname"].value;
    var x2= document.forms["myForm"]["user"].value;
    var x3 = document.forms["myForm"]["email"].value;
    // var password = document.forms["myForm"]["pass"];
    // var password1 = document.forms["myForm"]["pass-2"];

    var password=document.getElementById('pass1').value;
    var password1=document.getElementById('pass2').value;

    // var x6 = document.getElementById('form').value;
    if (x1==null || x1=="")
  {
    document.getElementById('errrr').innerHTML="*نام را وارد کنید!";
  return false;
  }
  if (x2==null || x2=="")
  {
    document.getElementById('errrr').innerHTML="*نام کاربری را واردکنید!";
  return false;
  } if ( x3==null || x3=="" )
  {
    document.getElementById('errrr').innerHTML="*ایمیل را وارد کنید!";
  return false;
  }
  // چک کردن ایمیل
var x3=document.forms["myForm"]["email"].value;
var atpos=x3.indexOf("@");
var dotpos=x3.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x3.length)
  {
    document.getElementById('errrr').innerHTML="*ایمیل معتبری را وارد کنید!";

  return false;
  }
  if ( password==null || password=="")
  {
    document.getElementById('errrr').innerHTML="*کلمه عبور را وارد کنید!";
  return false;
  } 
  //چک کردن پسورد
  var errorToThrow="";
try{
  
    if(password.length<6){
        errorToThrow+="<br>* طول کلمه عبور کوتاه است";
    }
    if(/\d/.test(password)==false){
        errorToThrow+="<br>* کلمه عبور باید شامل حداقل یک عدد باشد ";
    }
    if(/[A-Z]/g.test(password)==false){
        errorToThrow+="<br>* کلمه عبور باید شامل حداقل یک حرف بزرگ باشد ";
    }
    if(password!=password1){
        errorToThrow+="<br> *کلمه های عبور شبیه نیستند ";
    }
 
    document.getElementById('errr').innerHTML= errorToThrow;
}

catch(err){
    document.getElementById('err').innerHTML=err;
}
  if ( password1==null || password1=="")
  {
    document.getElementById('errrr').innerHTML="*کلمه عبور را تکرار کنید!";
  return false;
  }
  //  if ( x6==null || x6=="" )
  // {
  //   document.getElementById('errrr').innerHTML="*شماره موبایل را وارد کنید!";
  // return false;
  // }
  else{
  alert('ثبتنام با موفقیت انجام شد');
  }


};
 
// حذف مشتری

function dell(){
  var x=confirm('ایا از حذف فیلد مطمئن هستید؟');
  if(x==true){
    var fild=document.getElementsByClassName('moth');
    var row=document.getElementsByClassName('roww');
    moth.appendChild(row);
    moth.removeChild(row);
  }
  else{
    alert('فیلد حذف نمیشود');
  }
}



// var del=document.createAttribute('onclick');
// del.value="this.parentNode.remove()";
// var p=document.getElementsByClassName('fild-customer').value;
// p.setAttributeNode(del);
//پایان

// حذف مشتری
//   var fild=document.getElementsByClassName('fild-customer');
//   // fild.appendChild(row);

// function dell(){ 
//    var row=document.getElementsByClassName('roww');

//   var x= confirm('ایا میخواهید فیلد را حذف کنید؟');
//   if(x==true){
//     tr.parentNode.removeChild(row);
//   }
// }


// از طریق جی کوری
$(document).ready(function(){
  $("button").click(function(){
      $(".roww").remove();
  });
});

