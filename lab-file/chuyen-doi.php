<html>
<head>
<title>Ima nanji desuka?</title>
<?php include ("../labref.php");?>
<style>
div{
	width:350px;
	background:blue;
}	

</style>

<script>
//conver to English via number
function numToEn(num){
	var enOf = [
	'zero ','one ','two ','three ','four ','five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen ','twenty ',''];
	var enTy = [
	'','ten','twenty ','thirty ','forty ','fifty ','sixty ','seventy ','eighty ','ninety '
	];
	//num = read.num.value;
	if(num<0){num=num*(-1);}//number must be > 0
	//The maximum number of decimals is 17, parseInt will return wrong result if number >= 17
	num = parseInt(num);//filter number
	hundred='hundred ';thousand='thousand ';million='million ';billion='billion ';trillion='trillion ';quadrillion='quadrillion ';
	function dv2(n){
		if(n==0){return n=enOf[21];}
		if(n>0 && n<=20){
			if(n.toString().length==1) {return n = 'and '+enOf[n]}
			else {return n = enOf[n];}
		}
		if(n>20 && n<=99){
			hChuc=parseInt(n/10);hDv=n%10;
			if(hDv==0)hDv=21;
			return n = enTy[hChuc] + enOf[hDv];
		}
	}
	function dv3(n){
		if(n==0){return n='';}
		if(n.toString().length==1){return n='and '+ enOf[n];}
		if(n.toString().length==2){return n='and '+ dv2(n);}
		n1=parseInt(n/100);if(n1==0){n1=21;hundred="";}
		return n=enOf[n1] +hundred+ dv2(n%100);
	}
	function dv6(n){
		if(n==0){return n='';}
		if(n.toString().length==1){return n='and '+ enOf[n];}
		if(n.toString().length==2){return n='and '+ dv2(n);}
		n3a=parseInt(n/1000);n3b=n%1000;if(n3a==0){thousand='and ';}
		return n = dv3(n3a) + thousand + dv3(n3b);
	}
	function dv9(n){
		if(n==0){return n='';}
		if(n.toString().length==1){return n='and '+ enOf[n];}
		if(n.toString().length==2){return n='and '+ dv2(n);}
		n3=parseInt(n/1000000);n6=n%1000000;if(n3==0){million='';}
		return n = dv3(n3) + million + dv6(n6);
	}
	function dv12(n){
		if(n==0){return n='';}
		if(n.toString().length==1){return n=enOf[n];}
		if(n.toString().length==2){return n=dv2(n);}
		n3=parseInt(n/1000000000);n9=n%1000000000;if(n3==0){billion='';};
		if(n3==1){n3=0;billion='';}//check cho nay!!!! - da check - co ve dung
		return n = dv3(n3) + billion + dv9(n9);
	}
	function dv15(n){
		if(n==0){return n='';}
		if(n.toString().length==1){return n=enOf[n];}
		if(n.toString().length==2){return n=dv2(n);}
		n3=parseInt(n/1000000000000);n12=n%1000000000000;if(n3==0){trillion='';};
		//if(n3==1){n3=0;trillion='';} - neu cai nay chay, khi n3 =001 =1 thi bi sai
		return n = dv3(n3) + trillion + dv12(n12);
	}
	//read by length of number
	switch(num.toString().length){
	case 1:return num = enOf[num];break;
	case 2:return num = dv2(num);break;
	case 3:return num = dv3(num);break;
	case 4:
		n1=parseInt(num/1000);
		return num = enOf[n1] + thousand + dv3(num%1000);break;
	case 5:
		n2=parseInt(num/1000);n3=num%1000;
		return num = dv2(n2) + thousand + dv3(n3);break;
	case 6:return num = dv6(num);break;
	case 7:
		n1=parseInt(num/1000000);n6=num%1000000;
		return num = enOf[n1] + million + dv6(n6);break;
	case 8:
		n2=parseInt(num/1000000);n6=num%1000000;
		return num = dv2(n2) + million + dv6(n6);break;
	case 9:return num = dv9(num);break;//100.000.000
	case 10://1.000.000.000 - billion
		n1=parseInt(num/1000000000);n9=num%1000000000;
		return num = enOf[n1] + billion + dv9(n9);break;
	case 11://10.000.000.000 - ten billion
		n2=parseInt(num/1000000000);n9=num%1000000000;
		return num = dv2(n2) + billion + dv9(n9);break;
	case 12://100.000.000.000 - hundred billion
		return num = dv12(num);break;
		
	case 13://1.000.000.000.000 - trillion
		n1=parseInt(num/1000000000000);n12=num%1000000000000;
		return num = enOf[n1] + trillion + dv12(n12);break;
	case 14://10.000.000.000.000 - ten trillion
		n2=parseInt(num/1000000000000);n12=num%1000000000000;
		return num = dv2(n2) + trillion + dv12(n12);break;
	case 15://100.000.000.000.000 - hundred trillion
		return num = dv15(num);break;
		
	case 16://1.000.000.000.000.000 - quadrillion
		n1=parseInt(num/1000000000000000);n15=num%1000000000000000;
		return num = enOf[n1] + quadrillion + dv15(n15);break;
	/*case 17://10.000.000.000.000.000 - ten quadrillion
		//num nhan vao da sai -> n15 sai
		n2=parseInt(num/1000000000000000);n15=num%1000000000000000;
		return num = dv2(n2) + quadrillion + dv15(n15);break;
	case 18://100.000.000.000.000.000 - hundred quadrillion
		n3=parseInt(num/1000000000000000);n15=num%1000000000000000;
		return num = dv3(n3) + quadrillion + dv15(n15);break;*/
	default:return num ="Because of interger's limitation, 16 is the maximum decimals of number that this app support.";
	}
}

//convert to Vietnamese via English (depending on English)
function enToVi(car){
	//data array for translating
	var enCar = [	'and','quadrillion','trillion','eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen','twenty','thirty','forty','fifty','sixty','seventy','eighty','ninety','hundred','thousand','million','billion','zero','one','two','three','four','five','six','seven','eight','nine','ten'];
	var viCar = ['lẻ','triệu tỷ','nghìn tỷ','mười một','mười hai','mười ba','mười bốn','mười lăm','mười sáu','mười bảy','mười tám','mười chín','hai mươi','ba mươi','bốn mươi','năm mươi','sáu mươi','bảy mươi','tám mươi','chín mươi','trăm','1nghìn','triệu','tỷ','không','một','hai','ba','bốn','năm','sáu','bảy','tám','chín','mười'];
	//get en
	//car = read.en.value;
	//translate from eng to vi
	for(var i=0;i<enCar.length;i++){
		var re = new RegExp(enCar[i], "g");
		car = car.replace(re,viCar[i]);
	}
	//now we got vi, then fix some exception
	car = car.replace(/mươi năm/g,'mươi lăm');
	car = car.replace(/mươi một/g,'mươi mốt');
	car = car.replace(/Because of interger\'s limitation, 16 is the maximum decimals of number that this app support./g,'Vì giới hạn của kiểu dữ liệu số thực nên ứng dụng này chỉ hỗ trợ số có tối đa 16 kí tự.');
	car = car.replace(/thouslẻ/g,'nghìn');//something wrong so i have to use this to fix
	//set vi
	return car;
}

//add decimal points to number
function addDecimalPoints(str,dot) {
    str=str.replace(/\D/g, '');
	str = parseInt(str).toString();
    var inputValue = str.replace(".", '').split("").reverse().join(""); //xoa dau cham dang co va reverse
    var newValue = '';
    for (var i = 0; i < inputValue.length; i++) {
        if (i % dot == 0) { newValue += '.'; }
        newValue += inputValue[i];
    }
    str = newValue.split("").reverse().join("");
	str = str.slice(0,str.length-1);//xóa dấu chấm bị dư
	return str;
}

//loc ki tu tieng viet va khoang trang
function locKiTu(str){
	str= str.toLowerCase();
	str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
	str= str.replace(/đ/g,"d");
	str= str.replace(/ /g,"");
	str= str.replace(/k/g,"nghin");
	return str;
}

/*xac dinh don vi tien te cua nuoc nao
function isComma(num){
	var dot = ['vnd'];
	var comma = [
	'$','usd','dollar','dola','do',
	'yen','jpy','¥',
	'cny','ndt','nhandante',
	'won','krw','₩',
	'cda','aud',
	'gbp','pound','banganh',
	'hkd','sgd',
	'thb','฿','baththai','bath',
	'eur','€','euro'
	];
	for(var i = 0; i < dot.length; i++){
		if(num.indexOf(dot[i])>=0){
			return true;
		}
	}
	return false;
}*/

function tachSo(chuoi){
	var so = "0";
	for(var i=0;i<chuoi.length;i++){
		//lay so, dau cham, dau phay
		if(chuoi.charCodeAt(i)>=48 && chuoi.charCodeAt(i)<=57 || chuoi[i]=="."){
			so += chuoi[i];
		}
	}
	return parseFloat(so);
}

function tiGia(chuoi){
	var don_vi_ti_gia = [
		['$',22370,' đô la Mỹ'],['usd',22370,' đô la Mỹ'],['dollar',22370,' đô la Mỹ'],['dola',22370,' đô la Mỹ'],['do',22370,' đô la Mỹ'],
		['yen',215,' yên Nhật'],['jpy',215,' yên Nhật'],['¥',215,' yên Nhật'],
		['cny',3296,' nhân dân tệ'],['ndt',3296,' nhân dân tệ'],['nhandante',3296,' nhân dân tệ'],
		['won',20,' won'],['krw',20,' won'],['₩',20,' won'],['w',20,' won'],
		['cda',16855,' đô la Canada'],['aud',17108,'đô la Úc'],
		['gbp',27432,' bảng Anh'],['£',27432,' bảng Anh'],['pound',27432,' bảng Anh'],['banganh',27432,' bảng Anh'],
		['hkd',2898,' đô la HK'],
		['sgd',16126,' đô la Sing'],
		['thb',652,' bát Thái'],['฿',652,' bát Thái'],['baththai',652,' bát Thái'],['bath',652,' bát Thái'],
		['eur',24400,' euro'],['€',24400,' euro'],['euro',24400,' euro'],
		['nghin',1000,' nghìn']
	];
	for(var i = 0; i < don_vi_ti_gia.length; i++){
		//neu tim trong chuoi co ki tu tien te thi tra ve ti gia cua don vi do
		if(chuoi.indexOf(don_vi_ti_gia[i][0])>=0){
			return { "tigia" : don_vi_ti_gia[i][1], "tiente" : don_vi_ti_gia[i][2] };
			break;
		}
	}
	return { "tigia" : 1, "tiente" : "VND" };
}
function chuyenDoi(){
	chuoi = $("#input").val();
	chuoi = locKiTu(chuoi);
	input = tachSo(chuoi).toFixed(2).toString() + tiGia(chuoi).tiente + " = ";
	chuoi = (tachSo(chuoi)*tiGia(chuoi).tigia).toFixed(2);
	output = input + chuoi + ' VNĐ';
	$("#output").html(output);
	$("#rounded").html('Lam tron: '+Math.round(chuoi));
}


</script>
</head>
<body>
<div>
<h2 id="main">Công cụ chuyển đổi:</h2>
<input id="input" onKeyUp="chuyen()" type="text" name="numlen" autofocus/>
<h3 id="output"></h3>
<h3 id="rounded"></h3>
</div>
</body>
</html>