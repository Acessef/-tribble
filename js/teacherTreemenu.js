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
		object.style.backgroundColor = "#FFf";
		object.style.color = "#000";
	}
	else {
		object.style.backgroundColor = "";
		object.style.color = "#000";
	}
}

var myTree = new tree();

/*向html页面写入菜单导航树*/ 
function WriteTreeInfo(basePath) {
	openImg.src = basePath + "images/open.gif";
	closedImg.src = basePath + "images/closed.gif";  
	BASE_PATH = basePath;
	 
	var branches = new Array();
	branches[1] = new branch('branch1','用户管理');
	var branch1_leaf1 = new leaf('用户信息查询', 'student_TeacherQueryStudent.php'); 
 	branches[1].add(branch1_leaf1); 
 

	branches[2] = new branch('branch2','作业课程管理'); 
	var branch2_leaf1 = new leaf('添加作业课程', 'course_add.php');
		var branch2_leaf2 = new leaf('作业课程管理', 'course_QueryCourseInfo.php');

	branches[2].add(branch2_leaf1); 

	 	branches[2].add(branch2_leaf2); 

	
	branches[3] = new branch('branch3','作业作业管理');
	var branch3_leaf1 = new leaf('登记作业作业', 'zuoye_add.php');
	var branch3_leaf2 = new leaf('作业作业管理', 'zuoye.php');
	branches[3].add(branch3_leaf1);
	branches[3].add(branch3_leaf2); 

	branches[4] = new branch('branch4','作业批阅管理');
	var branch4_leaf1 = new leaf('未批阅管理', 'piyue.php?act=no');
	var branch4_leaf2 = new leaf('已批阅管理', 'piyued.php?act=yes');
	branches[4].add(branch4_leaf1);
	branches[4].add(branch4_leaf2);
	
	branches[5] = new branch('branch5','成绩管理统计');
	var branch5_leaf1 = new leaf('成绩信息查看', 'score_add.php');
	var branch5_leaf2 = new leaf('成绩信息统计', 'score_QueryScore.php');
	branches[5].add(branch5_leaf1);
	branches[5].add(branch5_leaf2);

	branches[6] = new branch('branch6','系统管理');
	var branch6_leaf1 = new leaf('修改密码',  'change_password.php');
	var branch6_leaf2 = new leaf('系统公告',  'gonggao.php');
	branches[6].add(branch6_leaf1);
	branches[6].add(branch6_leaf2); 
	
	myTree.add(branches[1]);
	myTree.add(branches[2]);
	myTree.add(branches[3]);
	myTree.add(branches[4]);  
	 myTree.add(branches[5]);
myTree.add(branches[6]);
	myTree.add(new leaf('退出系统', 'logout.php'));
	
	myTree.write();
}




 