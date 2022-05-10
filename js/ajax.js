var XMLHttpReq;
 //创建XMLHttpRequest对象     
 function createXMLHttpRequest() {
      if(window.XMLHttpRequest) { //Mozilla 浏览器
       XMLHttpReq = new XMLHttpRequest();
      }
      else if (window.ActiveXObject) { // IE浏览器
       try {
        XMLHttpReq = new ActiveXObject("Msxml2.XMLHTTP");
       } catch (e) {
        try {
          XMLHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {}
       }
      }
 }
 //发送请求函数
 /*
 function sendRequest(goodNo) {
  createXMLHttpRequest();
  var url = "GetGoodInfo?goodNo=" + goodNo;
  XMLHttpReq.open("GET", url, true);
  XMLHttpReq.onreadystatechange = processResponse;//指定响应函数
  XMLHttpReq.send(null);  // 发送请求
 }*/
 
 // 处理客户信息返回的函数
    function processCustomerResponse() {
     if (XMLHttpReq.readyState == 4) { // 判断对象状态
         if (XMLHttpReq.status == 200) { // 信息已经成功返回，开始处理信息
          DisplayCustomerInfo();
          //setTimeout("sendRequest()", 1000);
         } else { //页面不正常
		    alert(XMLHttpReq.status);
            window.alert("您所请求的页面有异常。");
           }
         }
    }
     
 // 处理供应商信息返回的函数
    function processSupplyerResponse() {
     if (XMLHttpReq.readyState == 4) { // 判断对象状态
         if (XMLHttpReq.status == 200) { // 信息已经成功返回，开始处理信息
          DisplaySupplyerInfo();
          //setTimeout("sendRequest()", 1000);
         } else { //页面不正常
		    alert(XMLHttpReq.status);
            window.alert("您所请求的页面有异常。");
           }
         }
    }
    
     // 处理员工信息返回的函数
    function processEmployeeResponse() {
     if (XMLHttpReq.readyState == 4) { // 判断对象状态
         if (XMLHttpReq.status == 200) { // 信息已经成功返回，开始处理信息
          DisplayEmployeeInfo(); 
         } else { //页面不正常
		    alert(XMLHttpReq.status);
            window.alert("您所请求的页面有异常。");
           }
         }
    }
    
    
    /*显示修改后的客户信息*/
    function DisplayCustomerInfo() { 
     var customername = XMLHttpReq.responseXML.getElementsByTagName("customername")[0].firstChild.nodeValue;
     var customerAddress = XMLHttpReq.responseXML.getElementsByTagName("customerAddress")[0].firstChild.nodeValue;
     var connectPerson = XMLHttpReq.responseXML.getElementsByTagName("connectPerson")[0].firstChild.nodeValue;
     var connectPhone = XMLHttpReq.responseXML.getElementsByTagName("connectPhone")[0].firstChild.nodeValue;
     
     document.getElementById("customername_" + current_index).innerHTML = customername;
     document.getElementById("customerAddress_" + current_index).innerHTML = customerAddress;
     document.getElementById("connectPerson_" + current_index).innerHTML = connectPerson;
     document.getElementById("connectPhone_" + current_index).innerHTML = connectPhone; 
   }
   
      /*显示修改后的供应商信息*/
    function DisplaySupplyerInfo() { 
     var supplyername = XMLHttpReq.responseXML.getElementsByTagName("supplyername")[0].firstChild.nodeValue;
     var lawperson = XMLHttpReq.responseXML.getElementsByTagName("lawperson")[0].firstChild.nodeValue;
     var connectPhone = XMLHttpReq.responseXML.getElementsByTagName("connectPhone")[0].firstChild.nodeValue;
     var address = XMLHttpReq.responseXML.getElementsByTagName("address")[0].firstChild.nodeValue;
     
     document.getElementById("supplyername_" + current_index).innerHTML = supplyername;
     document.getElementById("lawperson_" + current_index).innerHTML = lawperson;
     document.getElementById("connectPhone_" + current_index).innerHTML = connectPhone;
     document.getElementById("address_" + current_index).innerHTML = address; 
   }
   
    /*显示修改后的员工信息*/
    function DisplayEmployeeInfo() { 
     var id = XMLHttpReq.responseXML.getElementsByTagName("id")[0].firstChild.nodeValue;
     var name = XMLHttpReq.responseXML.getElementsByTagName("name")[0].firstChild.nodeValue;
     var phone = XMLHttpReq.responseXML.getElementsByTagName("phone")[0].firstChild.nodeValue;
     var address = XMLHttpReq.responseXML.getElementsByTagName("address")[0].firstChild.nodeValue;
     
     document.getElementById("id_" + current_index).innerHTML = id;
     document.getElementById("name_" + current_index).innerHTML = name;
     document.getElementById("phone_" + current_index).innerHTML = phone;
     document.getElementById("address_" + current_index).innerHTML = address; 
   }

/*通过ajax获取客户信息*/
function Ajax_GetCustomer(basePath) { 
	var customername = document.getElementById("customername_" + current_index).innerHTML; 
	createXMLHttpRequest();  
	var url = basePath + "Customer/GetCustomerInfo.serlvet?customername=" + encodeURI(customername); 
  	XMLHttpReq.open("GET", url, true);
  	XMLHttpReq.onreadystatechange = processCustomerResponse;//指定响应函数
  	XMLHttpReq.send(null);  // 发送请求
}

/*通过ajax获取供应商信息*/
function Ajax_GetSupplyer(basePath) { 
	
	var supplyername = document.getElementById("supplyername_" + current_index).innerHTML; 
	
	createXMLHttpRequest();  
	var url = basePath + "Supplyer/GetSupplyerInfo.serlvet?supplyername=" + encodeURI(supplyername); 
  	XMLHttpReq.open("GET", url, true);
  	XMLHttpReq.onreadystatechange = processSupplyerResponse;//指定响应函数
  	XMLHttpReq.send(null);  // 发送请求
}

/*通过ajax获取员工信息*/
function Ajax_GetEmployee(basePath) {
	var id = document.getElementById("id_" + current_index).innerHTML;
	createXMLHttpRequest();  
	var url = basePath + "Employee/GetEmployeeInfo.serlvet?id=" + encodeURI(id); 
  	XMLHttpReq.open("GET", url, true);
  	XMLHttpReq.onreadystatechange = processEmployeeResponse;//指定响应函数
  	XMLHttpReq.send(null);  // 发送请求
	
}