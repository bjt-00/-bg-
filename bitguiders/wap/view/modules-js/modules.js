"use strict"; // for strict error tracking

var accountInfoList=[];
var accountNumber=0;
//(function(){})(); immediate call
(function(){
	
	window.onload=function(){
		var createButton = document.getElementById("create");
		var userConsole  = document.getElementById("userConsole");
		var accountName  = document.getElementById("accountName");
		var accountDeposit  = document.getElementById("accountDeposit");
		
		createButton.onclick = function(){
			userConsole.value="";
			var account = bank();
			accountInfoList.push(account);
			for (var i=0;i<accountInfoList.length;i++) {      
				userConsole.value +="Account Name: "+accountInfoList[i].name+"  Balance: "+accountInfoList[i].deposit+"\n";
			}

		};
		
		var bank = function(){
			var account ={
					name:accountName.value,
					deposit:accountDeposit.value
			};
			return account;
		};
	};//onload end
	
})();