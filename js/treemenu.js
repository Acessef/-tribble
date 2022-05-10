var openImg = new Image(); 
var closedImg = new Image();
var BASE_PATH = ""; 

function showBranch(branch){ 
   var objBranch = document.getElementById(branch).style;
   if (objBranch.display=="block")
      objBranch.display="none";
   else
      objBranch.display="block";
   swapFolder('I' + branch);
}

function swapFolder(img){
   objImg = document.getElementById(img);
   if (objImg.src.indexOf('closed.gif')>-1)
      objImg.src = openImg.src;
   else
      objImg.src = closedImg.src;
}
function tree(){
   this.branches = new Array();
   this.add = addBranch;
   this.write = writeTree;
   
   this.GetBranchSize = GetBranchSize; 
}

function GetBranchSize() { 
       return this.branches.length; 
}

function addBranch(branch){
   this.branches[this.branches.length] = branch;
}

function writeTree(){
   var treeString = '';
   var numBranches = this.branches.length;
   for (var i=0;i <numBranches;i++)
      treeString += this.branches[i].write();
   document.write(treeString);
}
function branch(id, text){
   this.id = id;
   this.text = text;
   this.write = writeBranch;
   this.add = addLeaf;
   this.leaves = new Array();
}
function addLeaf(leaf){
   this.leaves[this.leaves.length] = leaf;
}

function writeBranch(){
 var branchString = '<span  class="branch"' + 'onClick="showBranch(\'' + this.id + '\')"';
branchString += '><img width=15 height=15 src="' + BASE_PATH +'images/closed.gif" id="I' + this.id + '" />&nbsp;&nbsp;' + this.text;

branchString += '</span>';
branchString += '<span class="leaf" id="';
branchString += this.id + '">';
var numLeaves = this.leaves.length;
for (var j=0;j<numLeaves;j++) branchString += this.leaves[j].write();
branchString += '</span>';
return branchString;
}
function leaf(text, link){
   this.text = text;
   this.link = link;
   this.write = writeLeaf;
}
function writeLeaf(){
   var leafString = '<img src="' + BASE_PATH + 'images/doc.gif" border="0" />&nbsp;&nbsp;<a onmouseover="ChangeBackColor(this,true)" onmouseout="ChangeBackColor(this,false)" href="' + this.link + '" target="OfficeMain">';
   leafString += this.text;
   leafString += '</a><br>';
   return leafString;
}

/*此函数用于当用户选择顶部的菜单导航时展开某个菜单*/
function ShowTreeNode(index) { 
	var branches_length = myTree.GetBranchSize(); 
	for(var i=1;i<branches_length;i++) {  
        		 var objBranch = document.getElementById("branch" + i).style;
        		 objImg = document.getElementById("Ibranch"+ i);
        		 if(index == i) {
        		 	objBranch.display="block";
        		 	objImg.src = openImg.src;
        		 } 
        		 else{
        			 objBranch.display="none";
        			 objImg.src = closedImg.src;
	        	 }  
	      	} 
} 

/*当鼠标移进或移出某个菜单上面时改变背景颜色*/
function ChangeBackColor(object,flag) { 
	if(flag){
		object.style.backgroundColor = "#FF0000";
		object.style.color = "#30F";
	}
	else {
		object.style.backgroundColor = "";
		object.style.color = "#F0F";
	}
}

var myTree = new tree();

/*向html页面写入菜单导航树*/ 
function WriteTreeInfo(basePath) {
	openImg.src = basePath + "images/open.gif";
	closedImg.src = basePath + "images/closed.gif";  
	BASE_PATH = basePath;
	 
	var branches = new Array();
	branches[1] = new branch('branch1','汽车采购管理');
	var branch1_leaf1 = new leaf('汽车采购登记',basePath + 'buy/buy_AddView.action');
	var branch1_leaf2 = new leaf('采购记录查询',basePath + 'buy/buy_QueryBuyInfo.action');
 	branches[1].add(branch1_leaf1);
	branches[1].add(branch1_leaf2);

	branches[2] = new branch('branch2','汽车销售管理');
	var branch2_leaf1 = new leaf('汽车销售登记',basePath + 'sell/sell_AddView.action');
	var branch2_leaf2 = new leaf('销售记录查询',basePath + 'sell/sell_QuerySellInfo.action');
	branches[2].add(branch2_leaf1);
	branches[2].add(branch2_leaf2);

	branches[3] = new branch('branch3','汽车库存管理');
	var branch3_leaf1 = new leaf('汽车库存查询',basePath + 'stock/stock_QueryStockInfo.action');
	var branch3_leaf2 = new leaf('汽车库存报警',basePath + 'stock/stock_StockWarning.action');
	branches[3].add(branch3_leaf1);
	branches[3].add(branch3_leaf2); 

	branches[4] = new branch('branch4','员工管理');
	var branch4_leaf1 = new leaf('添加员工信息',basePath + 'Employee/employee_add.jsp');
	var branch4_leaf2 = new leaf('员工信息管理',basePath + 'Employee/employee_manage.jsp');
	branches[4].add(branch4_leaf1)
	branches[4].add(branch4_leaf2);

	branches[5] = new branch('branch5','客户管理');
	var branch5_leaf1 = new leaf('添加客户信息',basePath + 'Customer/customer_add.jsp');
	var branch5_leaf2 = new leaf('客户信息管理',basePath + 'Customer/customer_manage.jsp');
	branches[5].add(branch5_leaf1)
	branches[5].add(branch5_leaf2);
	
	branches[6] = new branch('branch6','供应商管理');
	var branch6_leaf1 = new leaf('添加供应商', basePath + 'Supplyer/supplyer_add.jsp');
	var branch6_leaf2 = new leaf('供应商管理', basePath + 'Supplyer/supplyer_manage.jsp');
	branches[6].add(branch6_leaf1)
	branches[6].add(branch6_leaf2);
	
	
	branches[7] = new branch('branch7','系统管理');
	var branch7_leaf1 = new leaf('修改密码', basePath + 'System/change_password.jsp');
	var branch7_leaf2 = new leaf('名称管理', basePath + 'System/carname_manage.jsp');
	var branch7_leaf3 = new leaf('系统说明', basePath + 'desk.jsp');
	var branch7_leaf4 = new leaf('关于系统',basePath + 'about.html');
	branches[7].add(branch7_leaf1)
	branches[7].add(branch7_leaf2);
	branches[7].add(branch7_leaf3);
	branches[7].add(branch7_leaf4);
	
	myTree.add(branches[1]);
	myTree.add(branches[2]);
	myTree.add(branches[3]);
	myTree.add(branches[4]);
	myTree.add(branches[5]);
	myTree.add(branches[6]);
	myTree.add(branches[7]); 
	 
	myTree.add(new leaf('退出系统',basePath + 'logout.jsp'));
	
	myTree.write();
}




 