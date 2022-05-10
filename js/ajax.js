var XMLHttpReq;
 //����XMLHttpRequest����     
 function createXMLHttpRequest() {
      if(window.XMLHttpRequest) { //Mozilla �����
       XMLHttpReq = new XMLHttpRequest();
      }
      else if (window.ActiveXObject) { // IE�����
       try {
        XMLHttpReq = new ActiveXObject("Msxml2.XMLHTTP");
       } catch (e) {
        try {
          XMLHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {}
       }
      }
 }
 //����������
 /*
 function sendRequest(goodNo) {
  createXMLHttpRequest();
  var url = "GetGoodInfo?goodNo=" + goodNo;
  XMLHttpReq.open("GET", url, true);
  XMLHttpReq.onreadystatechange = processResponse;//ָ����Ӧ����
  XMLHttpReq.send(null);  // ��������
 }*/
 
 // ����ͻ���Ϣ���صĺ���
    function processCustomerResponse() {
     if (XMLHttpReq.readyState == 4) { // �ж϶���״̬
         if (XMLHttpReq.status == 200) { // ��Ϣ�Ѿ��ɹ����أ���ʼ������Ϣ
          DisplayCustomerInfo();
          //setTimeout("sendRequest()", 1000);
         } else { //ҳ�治����
		    alert(XMLHttpReq.status);
            window.alert("���������ҳ�����쳣��");
           }
         }
    }
     
 // ����Ӧ����Ϣ���صĺ���
    function processSupplyerResponse() {
     if (XMLHttpReq.readyState == 4) { // �ж϶���״̬
         if (XMLHttpReq.status == 200) { // ��Ϣ�Ѿ��ɹ����أ���ʼ������Ϣ
          DisplaySupplyerInfo();
          //setTimeout("sendRequest()", 1000);
         } else { //ҳ�治����
		    alert(XMLHttpReq.status);
            window.alert("���������ҳ�����쳣��");
           }
         }
    }
    
     // ����Ա����Ϣ���صĺ���
    function processEmployeeResponse() {
     if (XMLHttpReq.readyState == 4) { // �ж϶���״̬
         if (XMLHttpReq.status == 200) { // ��Ϣ�Ѿ��ɹ����أ���ʼ������Ϣ
          DisplayEmployeeInfo(); 
         } else { //ҳ�治����
		    alert(XMLHttpReq.status);
            window.alert("���������ҳ�����쳣��");
           }
         }
    }
    
    
    /*��ʾ�޸ĺ�Ŀͻ���Ϣ*/
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
   
      /*��ʾ�޸ĺ�Ĺ�Ӧ����Ϣ*/
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
   
    /*��ʾ�޸ĺ��Ա����Ϣ*/
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

/*ͨ��ajax��ȡ�ͻ���Ϣ*/
function Ajax_GetCustomer(basePath) { 
	var customername = document.getElementById("customername_" + current_index).innerHTML; 
	createXMLHttpRequest();  
	var url = basePath + "Customer/GetCustomerInfo.serlvet?customername=" + encodeURI(customername); 
  	XMLHttpReq.open("GET", url, true);
  	XMLHttpReq.onreadystatechange = processCustomerResponse;//ָ����Ӧ����
  	XMLHttpReq.send(null);  // ��������
}

/*ͨ��ajax��ȡ��Ӧ����Ϣ*/
function Ajax_GetSupplyer(basePath) { 
	
	var supplyername = document.getElementById("supplyername_" + current_index).innerHTML; 
	
	createXMLHttpRequest();  
	var url = basePath + "Supplyer/GetSupplyerInfo.serlvet?supplyername=" + encodeURI(supplyername); 
  	XMLHttpReq.open("GET", url, true);
  	XMLHttpReq.onreadystatechange = processSupplyerResponse;//ָ����Ӧ����
  	XMLHttpReq.send(null);  // ��������
}

/*ͨ��ajax��ȡԱ����Ϣ*/
function Ajax_GetEmployee(basePath) {
	var id = document.getElementById("id_" + current_index).innerHTML;
	createXMLHttpRequest();  
	var url = basePath + "Employee/GetEmployeeInfo.serlvet?id=" + encodeURI(id); 
  	XMLHttpReq.open("GET", url, true);
  	XMLHttpReq.onreadystatechange = processEmployeeResponse;//ָ����Ӧ����
  	XMLHttpReq.send(null);  // ��������
	
}