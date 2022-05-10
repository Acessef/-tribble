/*javascript对中文的unicode编码*/

var UTF_8 = {};

UTF_8.encode = function encode(s){ 
   var len=s.length; 
   var rs=""; 
   for(var i=0;i<len;i++){ 
      var k=s.substring(i,i+1); 
      rs+="&#"+s.charCodeAt(i)+";"; 
   } 
   return rs; 
} 

/*javascript对中文的unicode反编码*/
UTF_8.decode = function decode(s){ 
   var k=s.split(";"); 
   var rs=""; 
   for(i=0;i<k.length;i++){ 
      var m=k[i].replace(/&#/,""); 
      rs+=String.fromCharCode(m); 
   } 
   return rs; 
} 
