

<!--
//따로 함수를 생성 후 받아온 입력값 검증
//$id = injectionFilter($_POST['id']);





/*post 값들이 정상인지 아니면 비정상적인 데이터인지 이걸 체크하는거
id = 1111 ' or 1=1 select * from user';

쿠키 도 변조

쿠키로 로그인한다..

 임의 쿠키값을 임의로 만들어두고..

 cookies = '12123123akfnasldnflk123123';
 cookies2 = '123123123123ㄴㄻㅇㄹlk123123';

 user logincookie;

 cookies

 로그인 세션을 스고.. 장기 유지 할때.. 쿠키를 쓰는데.. 대신..쿠키값에  ip 시간

 체킹할때.. ip _로그인
*/
-->
<?php
require $_SERVER["DOCUMENT_ROOT"]."/testfile/project/login/loginsession.php";
require $_SERVER["DOCUMENT_ROOT"]."/testfile/project/db/dbconnMS.php";
require $_SERVER["DOCUMENT_ROOT"]."/testfile/project/login/password.php";



//입력값 검증  (입력한 값=받아온 값이 일치하냐)?
$id = $pass = $passcheck = $name = $email = $emailadress = "";




// 클라이언트에서 요청한 방식이 post가 맞냐(METHOD=방식)?
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$name=$_POST['name'];
	$email=$_POST['email'];

  
   //empty 빈값이면 true 아니면 false post_id 값이 비어 있냐? 그러면 공백이니까 입력하고 아니면 넘어가
   if(empty($_POST["id"])){
	echo "<script>history.back();</script>";
	return false; //return false 기존기능을 없애고 if다시 시작 하게(안하면 if만 체크하고 다음으로 넘어감)
   }else{
	 //입력한 아이디 값을 저장
    $id=$_POST['id'];
   }
   //아이디 유효성 체크 preg_match(정규식 표현작성,검색대상문자열,배열변수반환(매칭된 값을 배열로저장 반환값 trun=1 false=0)
   //정규식이 일치하면 통과 근데 나는 불일치를 원하니까 ! 붙여서 걸러야지
   if(!preg_match("/^[a-zA-z0-9]{6,12}$/",$id)){
      echo "<script>alert('아이디는 숫자+영문자로 조합 6~12자로 입력해주세요');history.back();</script>";
	   return false;
   }
   //id 중복 검사
   // mysqli_num_rows  sql문에 id값 총  개수를 구해준다 중복검사 total>0 total가 0보다 크면 중복된 값이 있다는 소리이기때문에 알림창 후 뒤로가기

	//pass 유효성
   if(!preg_match("/^[a-zA-z0-9]{6,12}$/",$pass)){
      echo "<script>alert('비번은 영문자+숫자로 입력');history.back();</script>";
	   return false;
   }
   //password 공백
  if(empty($_POST['pass'])){
	echo "<script>alert('비밀번호 입력해주세요');history.back();</script>";
   return false;
   }else{
    $pass=$_POST['pass'];
   }

   //passcheck 공백
   if(empty($_POST['passcheck'])){
	echo "<script>alert('비번입력');history.back();</script>";
    return false;
   }else{
    $pass=$_POST['passcheck'];
   }
   //name 공백
   if(empty($_POST['name'])){
	echo "<script>alert('이름입력');history.back();</script>";
   return false;
   }else{
    $name=$_POST['name'];
   }

   //email 공백
   if(empty($_POST['email'])){
	echo "<script>alert('메일 입력');history.back();</script>";
   return false;
   }else{
    $email=$_POST['email'];
   }
   //이메일주소 체크 공백
   if(empty($_POST['emailadress'])){
	echo "<script>alert('메일을 선택해주세요');history.back();</script>";
   return false;
   }else{
    $_POST['emailadress'];
   }

  
//아이디 중복 체크
   $sql="select id from USER where id='$id'";
	$row=mysqli_query($conn,$sql);
   $total = mysqli_num_rows($row);
   
	if($total>0){
	echo "<script>alert('아이디가 중복입니다');history.back();</script>";
	 return false;
	}

 //pass=passcheck 검증
   if($_POST['pass'] != $_POST['passcheck']){
    echo "<script>alert('비밀번호가 불일치 합니다 다시 확인');history.back();</script>";
	return false;
   }
//비밀번호 정규식
   if(!preg_match("/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{6,}$/",$pass)){
      echo "<script>alert('비밀번호는 숫자+영문자로 조합 6~12자로 입력해주세요');history.back();</script>";
	   return false;
   }



//mysqli_fetch_array 연관배열에서 키값,번호중 아무거나 잡아서 사용 가능하다 select 쿼리의 결과값으로 사용되고 한번에 한개의 데이터행을 배열의 행태로 가져옴
//더이상 반환 데이터가 없을 때 가지 true를 반환한다
//login디비에서 모든 데이터를 검사후 없으면 true를 반환 하게 된다 그러면 id와 동일한 값은 없다는 소리 false면 동일한 id 값이 있다는
## 애초에 sql문에 조건을 걸어놨는데 모든배열에 데이터를 다시 검사할 필요없이 있는지 없는지만 판단 하면 되니 fetch를 사용할 필요가 없다  




	// 비밀번호 암호화
	$encrypted_passwd = password_hash($pass,PASSWORD_DEFAULT);

     //  filter변수에  array생성  (위 쪽에 받아온 post값 그대로 사용해도 되지만 sql인젝션 방어 하기 위해 나중에 설정 할 예정)

	$filter= array(
	"id"=>addslashes($id),
    "pass"=>$encrypted_passwd,
	"name"=>addslashes($name),
	"email"=>addslashes($email)  .'@'.  $_POST['emailadress']
	);

	$sql="insert into USER (id,pass,name,date,email) values (	'{$filter['id']}',
																 '$encrypted_passwd',
																'{$filter['name']}',
																NOW(),
																'{$filter['email']}'
							 									)";
                                           

	$row=mysqli_query($conn,$sql);
   $result=mysqli_fetch_array($row);

    echo  "<script>
			console.log($result);
		</script>";

   }else{
      echo "<script>
			alert('값이 잘못 되었습니다');
			history.back;
		</script>";


}

?>
