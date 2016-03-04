/**
 * @author Yosin Hasan
 * @version 0.0.1
 */

var form2 = document.querySelector(".form2");
var submit = document.querySelector("#submit")
var userName = document.querySelector(".form2 input[name='userName']");
var userSurname = document.querySelector(".form2 input[name='userSurname']");
var email = document.querySelector(".form2 input[name='email']");
var country = document.querySelector(".form2 select[name='country']");
var city = document.querySelector(".form2 select[name='city']");
var password = document.querySelector(".form2 input[name='password']");
var repeatPassword = document.querySelector(".form2 input[name='repeatPassword']");
var phone = document.querySelector(".form2 input[name='phone']");
var reset = document.querySelector(".form2 input[type='reset']");


/**
 * add event listener for element form2
 */
form2.addEventListener("click", function(event){
   if (event.target.name == "userName" || event.target.name == "userSurname") {
        event.target.addEventListener("blur", function() {
             validateString(event.target);
        }); 
   }
   if (event.target.name == "email") {
        event.target.addEventListener("blur", function() {
             validateEmail(event.target);
        }); 
   }
   if (event.target.name == "country") {
        event.target.addEventListener("change", function() {
             validatePlace(event.target);
        });  
   }
   if (event.target.name == "city") {
        event.target.addEventListener("change", function() {
             validatePlace(event.target);
        });  
   }
   if (event.target.name == "password") {
        event.target.addEventListener("blur", function() {
             validatePassword(event.target);
        }); 
   }
   if (event.target.name == "repeatPassword") {
        event.target.addEventListener("blur", function() {
             validatePassword(event.target, 0);
        }); 
   }
   if (event.target.name == "phone") {
      event.target.addEventListener("blur", function() {
         validatePhone(event.target);
      }); 
   }
});

/**
 * add event listener for element submit
 */
submit.addEventListener("click", function(event){
    var count = 0;
    if (!validateString(userName)) count++;
    if (!validateString(userSurname)) count++;
    if (!validateEmail(email)) count++;
    if (!validatePassword(password)) count++;
    if (!validatePassword(repeatPassword, 0)) count++;
    if (!validatePlace(country)) count++;
    if (!validatePlace(city)) count++;
    if (count > 0) {
        event.preventDefault();
        alert("error, unfortunately you didn't properly fill in requested fields, please make it right")       //code
    }
  
 });
/**
 * add event listener for element reset
 
reset.addEventListener("click", function() {
  var delElem = document.querySelectorAll(".emphasize");
   
  for (var i in delElem) {
      delElem[i].remove();
  }
  
});
*/
/**
 * string validation
 * @param input
 * @returns boolean
 */
function validateString(input) {
   var len = input.value.length;
   if (len < 4) {
        input.classList.remove("inputSuccess");
        input.classList.add("inputError");
        delMessage(input);
        addMessage(input, "The length of string should be more than 3 symbols, please make it right");
   } else {
         delMessage(input);
         input.classList.remove("inputError");
         input.classList.add("inputSuccess");
         return true;
    }
    return false;
}
/**
 * email validation
 * @param input
 * @returns boolean
 */
function validateEmail(input) {
    var str = input.value;
    var reg = /^([a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,4}$/;
    if (str.match(reg)) {
        delMessage(input);
        input.classList.remove("inputError");
        input.classList.add("inputSuccess");
    } else {
        delMessage(input);
        addMessage(input, "Not valid email, it should be something like: example@example.com");
        input.classList.remove("inputSuccess");
        input.classList.add("inputError");
        return false;
    }
    return true;
}
/**
 * date validation
 * @param input
 * @returns boolean
 */
function validatePhone(input) {
   var str = input.value;
   var reg=/(\+)*(\s)*(\-)*(\()*(\))*/g; 
   var result=str.replace(reg, "");
   if (result.length == 10 || result.length == 12) {
      var reg2 = /^(380(\d){9})|(0\d{9})$/;
      if (result.match(reg2)) {
         delMessage(input);
         input.classList.remove("inputError");
         input.classList.add("inputSuccess");
      } else {
         delMessage(input);
         addMessage(input,"Invalid phone format, it must have either +38 (xxx) xxx-xx-xx, (xxx) xxx xx xx or xxx xxx xx xx  format");
         input.classList.remove("inputSuccess");
         input.classList.add("inputError");
         return false;
      }
   
   } else {
         delMessage(input);
         addMessage(input,"Invalid phone format, it must have either +38 (xxx) xxx-xx-xx, (xxx) xxx xx xx or xxx xxx xx xx  format");
         input.classList.remove("inputSuccess");
         input.classList.add("inputError");
         return false;

   }
  
   return true;
}
/**
 * password validation
 * @param input
 * @param check
 * @returns boolean
 */
function validatePassword(input, check) {
    if (check != 0) {
        var len = input.value.length;
        if (len < 6 || len > 20) {
            delMessage(input);
            addMessage(input,"The length of password should be more than 5 symbols and less than 20, please make it right");
            input.classList.remove("inputSuccess");
            input.classList.add("inputError");
            return false;
        } else {
            delMessage(input);
            input.classList.remove("inputError");
            input.classList.add("inputSuccess");
        }
    } else {
        if (input.value.length > 5 && input.value.length < 20 ) {
            if (input.value != password.value) {
                delMessage(input);
                addMessage(input, "The passwords don't match, please input identical passwords into password fields");
                input.classList.remove("inputSuccess");
                input.classList.add("inputError");
                return false;
            } else {
                delMessage(input);
                input.classList.remove("inputError");
                input.classList.add("inputSuccess");
            }  
        } else {
            delMessage(input);
            addMessage(input, "The length of password should be more than 5 symbols and less than 20, please make it right"); 
            input.classList.remove("inputSuccess");
            input.classList.add("inputError");
            return false;
        }
    }
    return true;
}
/**
 * place validation
 * @param input
 * @param check
 * @returns boolean
 */
function validatePlace(input) {
   if (input.value == 0) {
      delMessage(input);
      addMessage(input,"pleace choose one option in selection field");
      input.classList.remove("inputSuccess");
      input.classList.add("inputError");
      return false;
   } else {
      delMessage(input);
      input.classList.remove("inputError");
      input.classList.add("inputSuccess");
   }
   return true;
}
/**
 * add error message after input element
 * @param input
 * @param msgText
 * @returns boolean
 */
function addMessage(input, msgText) {
   var message = document.createElement('div');
   message.classList.add(input.name);
   message.classList.add("emphasize");
   var content = document.createTextNode(msgText);
   message.appendChild(content);
   input.parentNode.appendChild(message);
   return true;
}
/**
 * delete error message after input element
 * @param input
 * @returns boolean
 */
function delMessage(input) {
   var del = document.querySelector("."+input.name);
   if (del !=null) {
      del.remove();   
   }
   return true;
}
