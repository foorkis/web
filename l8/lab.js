$(document).ready(function() {
 $('#myForm').validate({
	rules:{
    login:{ required:true,
          rangelength:[4,8]},
	email:{
		required:true,
		email:true	
		},
	pass:{
	    required:true,
		rangelength:[4,8]	
	},
	repass:{
	equalTo:'#pass'	
	}
	},//конец rules
	messages:{
        login:{
        required: "Вы не ввели логин",
	   rangelength:"Логин должен содержать от 4 до 8 символов"
        },
	email:{
	required: "Вы не ввели адрес электронной почты",
	email: "Вы ввели некорректный e-mail"	
	},
	pass:{
	required: "Вы не ввели пароль",
	rangelength:"Пароль должен содержать от 4 до 8 символов"	
	},
	repass:{
	equalTo:"Пароли не совпадают"	
	}
	},//конец messages
	errorPlacement:function(error,element){
	
	error.insertAfter(element);	
	
	}//конец errorPlacement
 });//конец validate    
});//конец ready