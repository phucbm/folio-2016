<?php
session_start();
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}
include_once("../function.php");
save_guest_info();
if(@$_SESSION['admin']=='admin'){$tips = "<a href='Fire-To-The-Hole?sign=out'>Sign Out Admin</a>";} 
else {$tips = "Tips: Use shortcut to imrprove your experience ;)";}
?>

<!doctype html>
<html>
<head>
<title>Romaji - Hiranaga</title>
<?php include ("../labref.php");?>
<script>
/*      ******       **        **   ******       
        **    **     ****    ****   **    **     
        **    **     ** **  ** **   **    **     
        ********     **  ****  **   ******       
        **      **   **        **   **           
        **      **   **        **   **           
        ********     **  2016  **   **         feel free to copy */
		
function hiraToRoma() {
car = conv.hira.value;

//sign
car = car.replace(/。/g, ".");car = car.replace(/「/g, '[');car = car.replace(/」/g, "]");car = car.replace(/、/g, ",");
car = car.replace(/～/g, "~");car = car.replace(/‘/g, "`");car = car.replace(/’/g, "'");

//xúc âm (- n, m, r, w, y, g, b, d, z, h, j)
car = car.replace(/っきゃ/g, "kkya");car = car.replace(/っきゅ/g, "kkyu");car = car.replace(/っきょ/g, "kkyo");
car = car.replace(/っちゃ/g, "ccha");car = car.replace(/っちゅ/g, "cchu");car = car.replace(/っちょ/g, "ccho");
car = car.replace(/っしゃ/g, "ssha");car = car.replace(/っしゅ/g, "sshu");car = car.replace(/っしょ/g, "ssho");
car = car.replace(/っか/g, "kka");car = car.replace(/っき/g, "kki");car = car.replace(/っく/g, "kku");car = car.replace(/っけ/g, "kke");car = car.replace(/っこ/g, "kko");
car = car.replace(/っさ/g, "ssa");car = car.replace(/っし/g, "sshi");car = car.replace(/っす/g, "ssu");car = car.replace(/っせ/g, "sse");car = car.replace(/っそ/g, "sso");
car = car.replace(/った/g, "tta");car = car.replace(/っち/g, "cchi");car = car.replace(/っつ/g, "ttsu");car = car.replace(/って/g, "tte");car =car.replace(/っと/g, "tto");

//ảo âm
car = car.replace(/きゃ/g, "kya");car = car.replace(/きゅ/g, "kyu");car = car.replace(/きょ/g, "kyo");
car = car.replace(/にゃ/g, "nya");car = car.replace(/にゅ/g, "nyu");car = car.replace(/にょ/g, "nyo");
car = car.replace(/しゃ/g, "sha");car = car.replace(/しゅ/g, "shu");car = car.replace(/しょ/g, "sho");
car = car.replace(/ちゃ/g, "cha");car = car.replace(/ちゅ/g, "chu");car = car.replace(/ちょ/g, "cho");
car = car.replace(/ひゃ/g, "hya");car = car.replace(/ひゅ/g, "hyu");car = car.replace(/ひょ/g, "hyo");
car = car.replace(/みゃ/g, "mya");car = car.replace(/みゅ/g, "myu");car = car.replace(/みょ/g, "myo");
car = car.replace(/りゃ/g, "rya");car = car.replace(/りゅ/g, "ryu");car = car.replace(/りょ/g, "ryo");
car = car.replace(/ぎゃ/g, "gya");car = car.replace(/ぎゅ/g, "gyu");car = car.replace(/ぎょ/g, "gyo");
car = car.replace(/びゃ/g, "bya");car = car.replace(/びゅ/g, "byu");car = car.replace(/びょ/g, "byo");
car = car.replace(/ぴゃ/g, "pya");car = car.replace(/ぴゅ/g, "pyu");car = car.replace(/ぴょ/g, "pyo");
car = car.replace(/じゃ/g, "ja");car = car.replace(/じゅ/g, "ju");car = car.replace(/じょ/g, "jo");

//Mini hiragana characters
car = car.replace(/ぁ/g, "ā");car = car.replace(/ぃ/g, "ī");car = car.replace(/ぅ/g, "ū");car = car.replace(/ぇ/g, "ē");car = car.replace(/ぉ/g, "ō");

//âm thường và tenten maru

car = car.replace(/か/g, "ka");car = car.replace(/き/g, "ki");car = car.replace(/く/g, "ku");car = car.replace(/け/g, "ke");car = car.replace(/こ/g, "ko");
car = car.replace(/が/g, "ga");car = car.replace(/ぎ/g, "gi");car = car.replace(/ぐ/g, "gu");car = car.replace(/げ/g, "ge");car = car.replace(/ご/g, "go");
car = car.replace(/さ/g, "sa");car = car.replace(/し/g, "shi");car = car.replace(/す/g, "su");car = car.replace(/せ/g, "se");car = car.replace(/そ/g, "so");
car = car.replace(/ざ/g, "za");car = car.replace(/じ/g, "ji");car = car.replace(/ず/g, "zu");car = car.replace(/ぜ/g, "ze");car = car.replace(/ぞ/g, "zo");
car = car.replace(/た/g, "ta");car = car.replace(/ち/g, "chi");car = car.replace(/つ/g, "tsu");car = car.replace(/て/g, "te");car =car.replace(/と/g, "to");
car = car.replace(/だ/g, "da");car = car.replace(/で/g, "de");car = car.replace(/ど/g, "do");
car = car.replace(/な/g, "na");car = car.replace(/に/g, "ni");car = car.replace(/ぬ/g, "nu");car = car.replace(/ね/g, "ne");car = car.replace(/の/g, "no");
car = car.replace(/は/g, "ha");car = car.replace(/ひ/g, "hi");car = car.replace(/ふ/g, "fu");car = car.replace(/へ/g, "he");car = car.replace(/ほ/g, "ho");
car = car.replace(/ば/g, "ba");car = car.replace(/び/g, "bi");car = car.replace(/ぶ/g, "bu");car = car.replace(/べ/g, "be");car = car.replace(/ぼ/g, "bo");
car = car.replace(/ぱ/g, "pa");car = car.replace(/ぴ/g, "pi");car = car.replace(/ぷ/g, "pu");car = car.replace(/ぺ/g, "pe");car = car.replace(/ぽ/g, "po");
car = car.replace(/ま/g, "ma");car = car.replace(/み/g, "mi");car = car.replace(/む/g, "mu");car = car.replace(/め/g, "me");car = car.replace(/も/g, "mo");
car = car.replace(/や/g, "ya");car = car.replace(/ゆ/g, "yu");car = car.replace(/よ/g, "yo");
car = car.replace(/ら/g, "ra");car = car.replace(/り/g, "ri");car = car.replace(/ろ/g, "ro");car = car.replace(/る/g, "ru");car = car.replace(/れ/g, "re");
car = car.replace(/わ/g, "wa");car = car.replace(/うぃ/g, "wi");car = car.replace(/ヴ/g, "vu");car = car.replace(/うぇ/g, "we");car =car.replace(/を/g, "wo");
car = car.replace(/ん/g, "n");
car = car.replace(/あ/g, "a");car = car.replace(/い/g, "i");car = car.replace(/う/g, "u");car = car.replace(/え/g, "e");car = car.replace(/お/g, "o");

conv.roma.value=car;
Kount();
}

function romaToHira() {
car = conv.roma.value.toLowerCase();

//long vowel
car = car.replace(/ā/g, "ぁ");car = car.replace(/ī/g, "ぃ");car = car.replace(/ū/g, "ぅ");car = car.replace(/ē/g, "ぇ");car = car.replace(/ō/g, "ぉ");

//xúc âm (- n, m, r, w, y, g, b, d, z, h, j)
car = car.replace(/kka/g, "っか");car = car.replace(/kki/g, "っき");car = car.replace(/kku/g, "っく");car = car.replace(/kke/g, "っけ");car = car.replace(/kko/g, "っこ");
car = car.replace(/ssa/g, "っさ");car = car.replace(/sshi/g, "っし");car = car.replace(/ssu/g, "っす");car = car.replace(/sse/g, "っせ");car = car.replace(/sso/g, "っそ");
car = car.replace(/tta/g, "った");car = car.replace(/cchi/g, "っち");car = car.replace(/ttsu/g, "っつ");car = car.replace(/tte/g, "って");car =car.replace(/tto/g, "っと");
car = car.replace(/kkya/g, "っきゃ");car = car.replace(/kkyu/g, "っきゅ");car = car.replace(/kkyo/g, "っきょ");
car = car.replace(/ccha/g, "っちゃ");car = car.replace(/cchu/g, "っちゅ");car = car.replace(/ccho/g, "っちょ");
car = car.replace(/ssha/g, "っしゃ");car = car.replace(/sshu/g, "っしゅ");car = car.replace(/ssho/g, "っしょ");

//ảo âm
car = car.replace(/kya/g, "きゃ");car = car.replace(/kyu/g, "きゅ");car = car.replace(/kyo/g, "きょ");
car = car.replace(/nya/g, "にゃ");car = car.replace(/nyu/g, "にゅ");car = car.replace(/nyo/g, "にょ");
car = car.replace(/sha/g, "しゃ");car = car.replace(/shu/g, "しゅ");car = car.replace(/sho/g, "しょ");
car = car.replace(/cha/g, "ちゃ");car = car.replace(/chu/g, "ちゅ");car = car.replace(/cho/g, "ちょ");
car = car.replace(/hya/g, "ひゃ");car = car.replace(/hyu/g, "ひゅ");car = car.replace(/hyo/g, "ひょ");
car = car.replace(/mya/g, "みゃ");car = car.replace(/myu/g, "みゅ");car = car.replace(/myo/g, "みょ");
car = car.replace(/rya/g, "りゃ");car = car.replace(/ryu/g, "りゅ");car = car.replace(/ryo/g, "りょ");
car = car.replace(/gya/g, "ぎゃ");car = car.replace(/gyu/g, "ぎゅ");car = car.replace(/gyo/g, "ぎょ");
car = car.replace(/bya/g, "びゃ");car = car.replace(/byu/g, "びゅ");car = car.replace(/byo/g, "びょ");
car = car.replace(/pya/g, "ぴゃ");car = car.replace(/pyu/g, "ぴゅ");car = car.replace(/pyo/g, "ぴょ");
car = car.replace(/ja/g, "じゃ");car = car.replace(/ju/g, "じゅ");car = car.replace(/jo/g, "じょ");

//Mini hiragana characters
car = car.replace(/xa/g, "ぁ");car = car.replace(/xi/g, "ぃ");car = car.replace(/xu/g, "ぅ");car = car.replace(/xe/g, "ぇ");car = car.replace(/xo/g, "ぉ");
car = car.replace(/la/g, "ぁ");car = car.replace(/li/g, "ぃ");car = car.replace(/lu/g, "ぅ");car = car.replace(/le/g, "ぇ");car = car.replace(/lo/g, "ぉ");

//âm thường và tenten maru
car = car.replace(/ka/g, "か");car = car.replace(/ki/g, "き");car = car.replace(/ku/g, "く");car = car.replace(/ke/g, "け");car = car.replace(/ko/g, "こ");
car = car.replace(/ga/g, "が");car = car.replace(/gi/g, "ぎ");car = car.replace(/gu/g, "ぐ");car = car.replace(/ge/g, "げ");car = car.replace(/go/g, "ご");
car = car.replace(/ta/g, "た");car = car.replace(/chi/g, "ち");car = car.replace(/tsu/g, "つ");car = car.replace(/te/g, "て");car =car.replace(/to/g, "と");
car = car.replace(/sa/g, "さ");car = car.replace(/shi/g, "し");car = car.replace(/su/g, "す");car = car.replace(/se/g, "せ");car=car.replace(/so/g, "そ");
car = car.replace(/za/g, "ざ");car = car.replace(/ji/g, "じ");car = car.replace(/zu/g, "ず");car = car.replace(/ze/g, "ぜ");car = car.replace(/zo/g, "ぞ");
car = car.replace(/da/g, "だ");car = car.replace(/de/g, "で");car = car.replace(/do/g, "ど");
car = car.replace(/na/g, "な");car = car.replace(/ni/g, "に");car = car.replace(/nu/g, "ぬ");car = car.replace(/ne/g, "ね");car = car.replace(/no/g, "の");
car = car.replace(/ha/g, "は");car = car.replace(/hi/g, "ひ");car = car.replace(/fu/g, "ふ");car = car.replace(/he/g, "へ");car = car.replace(/ho/g, "ほ");
car = car.replace(/ba/g, "ば");car = car.replace(/bi/g, "び");car = car.replace(/bu/g, "ぶ");car = car.replace(/be/g, "べ");car = car.replace(/bo/g, "ぼ");
car = car.replace(/pa/g, "ぱ");car = car.replace(/pi/g, "ぴ");car = car.replace(/pu/g, "ぷ");car = car.replace(/pe/g, "ぺ");car = car.replace(/po/g, "ぽ");
car = car.replace(/ma/g, "ま");car = car.replace(/mi/g, "み");car = car.replace(/mu/g, "む");car = car.replace(/me/g, "め");car = car.replace(/mo/g, "も");
car = car.replace(/ya/g, "や");car = car.replace(/yu/g, "ゆ");car = car.replace(/yo/g, "よ");
car = car.replace(/ra/g, "ら");car = car.replace(/ri/g, "り");car = car.replace(/ru/g, "る");car = car.replace(/re/g, "れ");car = car.replace(/ro/g, "ろ");
car = car.replace(/wa/g, "わ");car = car.replace(/wi/g, "うぃ");car = car.replace(/vu/g, "ヴ");car = car.replace(/we/g, "うぇ");car =car.replace(/wo/g, "を");
car = car.replace(/n/g, "ん");
car = car.replace(/a/g, "あ");car = car.replace(/i/g, "い");car = car.replace(/u/g, "う");car = car.replace(/e/g, "え");car = car.replace(/o/g, "お");

//sign
car = car.replace(/\./g, "。");car = car.replace(/\"/g, "「");car = car.replace(/\"/g, "」");car = car.replace(/\[/g, "「");car = car.replace(/\]/g, "」");
car = car.replace(/\,/g, "、");car = car.replace(/\~/g, "～");car = car.replace(/\`/g, "‘");car = car.replace(/\'/g, "’");

conv.hira.value=car;
Kount();
}

function hiraFixHira() {
car = conv.hira.value.toLowerCase();

//long vowel
car = car.replace(/ā/g, "ぁ");car = car.replace(/ī/g, "ぃ");car = car.replace(/ū/g, "ぅ");car = car.replace(/ē/g, "ぇ");car = car.replace(/ō/g, "ぉ");

//xúc âm (- n, m, r, w, y, g, b, d, z, h, j)
car = car.replace(/kka/g, "っか");car = car.replace(/kki/g, "っき");car = car.replace(/kku/g, "っく");car = car.replace(/kke/g, "っけ");car = car.replace(/kko/g, "っこ");
car = car.replace(/ssa/g, "っさ");car = car.replace(/sshi/g, "っし");car = car.replace(/ssu/g, "っす");car = car.replace(/sse/g, "っせ");car = car.replace(/sso/g, "っそ");
car = car.replace(/tta/g, "った");car = car.replace(/cchi/g, "っち");car = car.replace(/ttsu/g, "っつ");car = car.replace(/tte/g, "って");car =car.replace(/tto/g, "っと");
car = car.replace(/kkya/g, "っきゃ");car = car.replace(/kkyu/g, "っきゅ");car = car.replace(/kkyo/g, "っきょ");
car = car.replace(/ccha/g, "っちゃ");car = car.replace(/cchu/g, "っちゅ");car = car.replace(/ccho/g, "っちょ");
car = car.replace(/ssha/g, "っしゃ");car = car.replace(/sshu/g, "っしゅ");car = car.replace(/ssho/g, "っしょ");

//ảo âm
car = car.replace(/kya/g, "きゃ");car = car.replace(/kyu/g, "きゅ");car = car.replace(/kyo/g, "きょ");
car = car.replace(/nya/g, "にゃ");car = car.replace(/nyu/g, "にゅ");car = car.replace(/nyo/g, "にょ");
car = car.replace(/sha/g, "しゃ");car = car.replace(/shu/g, "しゅ");car = car.replace(/sho/g, "しょ");
car = car.replace(/cha/g, "ちゃ");car = car.replace(/chu/g, "ちゅ");car = car.replace(/cho/g, "ちょ");
car = car.replace(/hya/g, "ひゃ");car = car.replace(/hyu/g, "ひゅ");car = car.replace(/hyo/g, "ひょ");
car = car.replace(/mya/g, "みゃ");car = car.replace(/myu/g, "みゅ");car = car.replace(/myo/g, "みょ");
car = car.replace(/rya/g, "りゃ");car = car.replace(/ryu/g, "りゅ");car = car.replace(/ryo/g, "りょ");
car = car.replace(/gya/g, "ぎゃ");car = car.replace(/gyu/g, "ぎゅ");car = car.replace(/gyo/g, "ぎょ");
car = car.replace(/bya/g, "びゃ");car = car.replace(/byu/g, "びゅ");car = car.replace(/byo/g, "びょ");
car = car.replace(/pya/g, "ぴゃ");car = car.replace(/pyu/g, "ぴゅ");car = car.replace(/pyo/g, "ぴょ");
car = car.replace(/ja/g, "じゃ");car = car.replace(/ju/g, "じゅ");car = car.replace(/jo/g, "じょ");

//Mini hiragana characters
car = car.replace(/xa/g, "ぁ");car = car.replace(/xi/g, "ぃ");car = car.replace(/xu/g, "ぅ");car = car.replace(/xe/g, "ぇ");car = car.replace(/xo/g, "ぉ");
car = car.replace(/la/g, "ぁ");car = car.replace(/li/g, "ぃ");car = car.replace(/lu/g, "ぅ");car = car.replace(/le/g, "ぇ");car = car.replace(/lo/g, "ぉ");

//âm thường và tenten maru
car = car.replace(/ka/g, "か");car = car.replace(/ki/g, "き");car = car.replace(/ku/g, "く");car = car.replace(/ke/g, "け");car = car.replace(/ko/g, "こ");
car = car.replace(/ga/g, "が");car = car.replace(/gi/g, "ぎ");car = car.replace(/gu/g, "ぐ");car = car.replace(/ge/g, "げ");car = car.replace(/go/g, "ご");
car = car.replace(/ta/g, "た");car = car.replace(/chi/g, "ち");car = car.replace(/tsu/g, "つ");car = car.replace(/te/g, "て");car =car.replace(/to/g, "と");
car = car.replace(/sa/g, "さ");car = car.replace(/shi/g, "し");car = car.replace(/su/g, "す");car = car.replace(/se/g, "せ");car=car.replace(/so/g, "そ");
car = car.replace(/za/g, "ざ");car = car.replace(/ji/g, "じ");car = car.replace(/zu/g, "ず");car = car.replace(/ze/g, "ぜ");car = car.replace(/zo/g, "ぞ");
car = car.replace(/da/g, "だ");car = car.replace(/de/g, "で");car = car.replace(/do/g, "ど");
car = car.replace(/na/g, "な");car = car.replace(/ni/g, "に");car = car.replace(/nu/g, "ぬ");car = car.replace(/ne/g, "ね");car = car.replace(/no/g, "の");
car = car.replace(/ha/g, "は");car = car.replace(/hi/g, "ひ");car = car.replace(/fu/g, "ふ");car = car.replace(/he/g, "へ");car = car.replace(/ho/g, "ほ");
car = car.replace(/ba/g, "ば");car = car.replace(/bi/g, "び");car = car.replace(/bu/g, "ぶ");car = car.replace(/be/g, "べ");car = car.replace(/bo/g, "ぼ");
car = car.replace(/pa/g, "ぱ");car = car.replace(/pi/g, "ぴ");car = car.replace(/pu/g, "ぷ");car = car.replace(/pe/g, "ぺ");car = car.replace(/po/g, "ぽ");
car = car.replace(/ma/g, "ま");car = car.replace(/mi/g, "み");car = car.replace(/mu/g, "む");car = car.replace(/me/g, "め");car = car.replace(/mo/g, "も");
car = car.replace(/ya/g, "や");car = car.replace(/yu/g, "ゆ");car = car.replace(/yo/g, "よ");
car = car.replace(/ra/g, "ら");car = car.replace(/ri/g, "り");car = car.replace(/ru/g, "る");car = car.replace(/re/g, "れ");car = car.replace(/ro/g, "ろ");
car = car.replace(/wa/g, "わ");car = car.replace(/wi/g, "うぃ");car = car.replace(/vu/g, "ヴ");car = car.replace(/we/g, "うぇ");car =car.replace(/wo/g, "を");
car = car.replace(/n/g, "ん");
car = car.replace(/a/g, "あ");car = car.replace(/i/g, "い");car = car.replace(/u/g, "う");car = car.replace(/e/g, "え");car = car.replace(/o/g, "お");

//sign
car = car.replace(/\./g, "。");car = car.replace(/\"/g, "「");car = car.replace(/\"/g, "」");car = car.replace(/\[/g, "「");car = car.replace(/\]/g, "」");
car = car.replace(/\,/g, "、");car = car.replace(/\~/g, "～");car = car.replace(/\`/g, "‘");car = car.replace(/\'/g, "’");

conv.hira.value=car;
Kount();
}

function romaFixRoma(){
car = conv.roma.value.toLowerCase();
car = car.replace(/la/g, "ā");car = car.replace(/li/g, "ī");car = car.replace(/lu/g, "ū");car = car.replace(/le/g, "ē");car = car.replace(/lo/g, "ō");
car = car.replace(/xa/g, "ā");car = car.replace(/xi/g, "ī");car = car.replace(/xu/g, "ū");car = car.replace(/xe/g, "ē");car = car.replace(/xo/g, "ō");
conv.roma.value=car;
Kount();
}

function Kount(){
	//lấy chuỗi
	ro_val = conv.roma.value;
	hi_val = conv.hira.value;
	
	//lấy và xuất độ dài
	switch(hi_val.length){
		case 0: conv.hiralen.value ='';break;
		case 1: conv.hiralen.value = "1 character";break;
		default: conv.hiralen.value = hi_val.length + ' characters';
	}
	switch(ro_val.length){
		case 0: conv.romalen.value ='';break;
		case 1: conv.romalen.value = "1 character";break;
		default: conv.romalen.value = ro_val.length + ' characters';
	}
}

function xoa_hira(){conv.hira.value = "";Kount();}
function xoa_roma(){conv.roma.value = "";Kount();}

</script>
<style>
textarea { resize: vertical; }
input#len {border:0;background:rgba(0,0,0,0.00)}
p {text-align:center}
</style>
</head>

<body>
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
<div class="main jumbotron">
  <h1 style="text-align:center">Romaji <i class="fa fa-exchange" aria-hidden="true"></i> Hiranaga</h1>
  <p style="text-align:center">Convert Romaji to ひらがな and vice versa</p>
  <button type="button" class="btn btn-info center-block btn-sm" data-toggle="collapse" data-target="#demo"><i class="fa fa-info" aria-hidden="true"></i> How to type with standard IME</button>
    
    <div id="demo" class="collapse">
    <br><p>せんせ<kbd data-toggle="tooltip" title="Mini a-i-u-e-o">ぃ</kbd> = sense<kbd>xi</kbd> / sense<kbd>li</kbd></p>
    <p>ざ<kbd data-toggle="tooltip" title="Mini tsu">っ</kbd>し = za<kbd>s</kbd>shi</p>
    <p><kbd>「</kbd>BMP<kbd>」</kbd> = <kbd>[</kbd>BMP<kbd>]</kbd></p>
    <p>せんせ<kbd>ぃ</kbd> = sense<kbd data-toggle="tooltip" title="Long vowel ā-ī-ū-ē-ō">ī</kbd></p>
    <p style="font-size:14px">This version is stable. But - of course - it's not perfect. So if you find any error or if you want to suggest some features. Please <a href="mailto:minhphuc1511one@gmail.com"> mail me</a>. ありがとうございます。</p>
    </div>
</div>
<div class="main container">
<form method="post" name="conv" action="">
<div class="row">

<!-- hira -->
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="form-group">
      <label for="num">in Hiragana: <input id="len" type="text" name="hiralen" value="" disabled/></label>
      
      <textarea class="form-control" onKeyUp="hiraToRoma();hiraFixHira();" id="hira" type="text" rows="8" name="hira" placeholder="Type or paste Hiragana here..."></textarea>
    </div>
    
    <!-- copy -->
    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <button class="btn btn-primary btn-block" type="button" id="hira_copy" data-clipboard-target="#hira">Copy</button>
      <script>(function(){new Clipboard('#hira_copy');})();</script>
    </div>
    
    <!-- clear -->
    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <button class="btn btn-warning btn-block" type="button" onClick="xoa_hira()">Clear</button>
    </div>
  </div>
  
<!-- romaji -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="form-group">
      <label for="num">in Romaji: <input id="len" type="text" name="romalen" value="" disabled/></label>
      <textarea class="form-control" onKeyUp="romaToHira();romaFixRoma()" type="text" rows="8" name="roma" id="roma" placeholder="Type or paste Romaji here..."></textarea>
    </div>
    
     <!-- copy -->
    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <button class="btn btn-primary btn-block" type="button" id="roma_copy" data-clipboard-target="#roma">Copy</button>
      <script>(function(){new Clipboard('#roma_copy');})();</script>
    </div>
    
    <!-- clear -->
    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <button class="btn btn-warning btn-block" type="button" onClick="xoa_roma()">Clear</button>
    </div>
    
  </div>
</div>
</form>
</div>
<script>
var tim = new Date();
//[1:00 - 10:30 - Ohayo gozaimasu] [10:30 - 19:00 - Konnichiwa] [19:00 - 0:00 - Konbanwa]
if(tim.getHours()>=1 && tim.getHours()<=10){conv.hira.value = "おはよぅ ございます";hiraToRoma()}
if(tim.getHours()>10 && tim.getHours()<19){conv.hira.value = "こんにちは";hiraToRoma()}
else {conv.hira.value = "こんばんは";hiraToRoma()}
</script>
<?php /*include ("../modal.php");?>
<?php include ("../footer.php");*/?>
</body>
</html>