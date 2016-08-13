<html>
<header>

<!-- Jquery函式庫 -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<link rel=stylesheet type="text/css" href="main.css">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWSAImRXejAli-yp9vUlo3LhcsBNezx_Q"></script>
<script src="Location.js"></script>
</header>

<body>

<div id="pixnet">
<a href="https://www.pixnet.net/"><img src="Pixnet_logo.png"></img></a>
</div>

<div id="list">
	<form>

		<!-- 新增id -->
		<input type="text" name="search" id="contentBox"> 
		<select>
			<option>Brands</option>
			<option>Product Name</option>
		</select> 

		<!-- 2016/8/10 -->
		<!-- 透過按下search，將原本的熱門網站區隱藏，並顯示出搜尋結果(已寫死) -->
		<button type="button" onclick="showSearch()">SEARCH</button>
		<script type="text/javascript">
		function showSearch()
		{
			//利用Jquery做特效
			//顯示
			var contentSearch = document.getElementById("contentBox").value;
			if(contentSearch=="彩妝")
			{
				$("#article").fadeOut('fast',0);
				$("#searchBase2").fadeOut('fast',0);
				$("#searchBase1").fadeTo('normal',1);
			}
			if(contentSearch=="氣墊粉餅")
			{
				$("#article").fadeOut('fast',0);
				$("#searchBase1").fadeOut('fast',0);
				$("#searchBase2").fadeTo('normal',1);
			}	
		}
		function showHot()
		{
			// 隱藏
			$("#searchBase1").slideUp('slow',0);
			$("#searchBase2").slideUp('slow',0);
			$("#article").fadeTo('normal',1);
		}
		</script>
		<!-- ↑↑ -->

		<a href="member/index.php"><button type="button">Login</button></a>
		<a href="member/member_join_form.php"><button type="button">Register</button></a>
		<button type="button" onclick="getLocation()">Location</button>
		<button type="button" onclick='showHot()'>Hot</button>
	</form>
	
</div>


<!-- 熱門文章 -->
<div id="article">
  <!-- article_block是底部方塊，URL是網站連結，img是圖片，transparent是透明遮罩，title是title -->
  <div id="article_block">
  	<input type="image" class="button" src="collect.png"  alt="submit" id="LovButton1" >
  	<input type="image" class="button" src="locate.png"  alt="submit" id="LovButton2" >
  	<a id="URL0" target="_blank">
  		<img id="img0"  height="260" src="">
  		<div id="transparent">
  			<div id="title0">
  			</div>
  		</div>
  	</a>
  </div>
  <!-- 上面是下面這邊的拆開解析 -->
  <div id="article_block"><input type="image" class="button" src="collect.png"  alt="submit" id="LovButton1" >
  	<input type="image" class="button" src="locate.png"  alt="submit" id="LovButton2" ><a id="URL1" target="_blank"><img id="img1"  height="260" src=""><div id="transparent"><div id="title1"></div></div></a></div>

  <div id="article_block"><input type="image" class="button" src="collect.png"  alt="submit" id="LovButton1" >
  	<input type="image" class="button" src="locate.png"  alt="submit" id="LovButton2" ><a id="URL2" target="_blank"><img id="img2"  height="260" src=""><div id="transparent"><div id="title2"></div></div></a></div>

  <div id="article_block"><input type="image" class="button" src="collect.png"  alt="submit" id="LovButton1" >
  	<input type="image" class="button" src="locate.png"  alt="submit" id="LovButton2" ><a id="URL3" target="_blank"><img id="img3"  height="260" src=""><div id="transparent"><div id="title3"></div></div></a></div>

  <div id="article_block"><input type="image" class="button" src="collect.png"  alt="submit" id="LovButton1" >
  	<input type="image" class="button" src="locate.png"  alt="submit" id="LovButton2" ><a id="URL4" target="_blank"><img id="img4"  height="260" src=""><div id="transparent"><div id="title4"></div></div></a></div>

  <div id="article_block"><input type="image" class="button" src="collect.png"  alt="submit" id="LovButton1" >
  	<input type="image" class="button" src="locate.png"  alt="submit" id="LovButton2" ><a id="URL5" target="_blank"><img id="img5"  height="260" src=""><div id="transparent"><div id="title5"></div></div></a></div>

  <div id="article_block"><input type="image" class="button" src="collect.png"  alt="submit" id="LovButton1" >
  	<input type="image" class="button" src="locate.png"  alt="submit" id="LovButton2" ><a id="URL6" target="_blank"><img id="img6"  height="260" src=""><div id="transparent"><div id="title6"></div></div></a></div>

  <div id="article_block"><input type="image" class="button" src="collect.png"  alt="submit" id="LovButton1" >
  	<input type="image" class="button" src="locate.png"  alt="submit" id="LovButton2" ><a id="URL7" target="_blank"><img id="img7"  height="260" src=""><div id="transparent"><div id="title7"></div></div></a></div>
<!-- Json資料處理 ↓↓ -->
<script type="text/javascript">
  //利用jquery裡的ajax方式，從API中取得json資料檔
$.ajax({
    url: "https://emma.pixnet.cc/mainpage/blog/categories/hot/0?format=json&pretty_print=1&api_version=2&per_page=30",
    data: $('#sentToBack').serialize(),
    type:"GET",
    dataType:'json',
    success: function(callBack){
      
      //這裡註解的部分是參考資料。

      //字串化我們所得到的JSON資料
      //var dataStr = JSON.stringify(callBack,null,2);
      //alert(callBack.articles[6].thumb);
      //var dataObj = JSON.parse(back);  

      //呼叫JSON檔裡單獨欄位
      //alert(back.blog.name);
      //document.write(callBack.articles[6].thumb);

      //連結到對應的部落格
      var urls = new Array();
      for(i=0; i<8; i++)
      {
          urls[i] = callBack.articles[i].link;
      }  
      document.getElementById("URL0").href = urls[0];
      document.getElementById("URL1").href = urls[1];
      document.getElementById("URL2").href = urls[2];
      document.getElementById("URL3").href = urls[3];
      document.getElementById("URL4").href = urls[4];
      document.getElementById("URL5").href = urls[5];
      document.getElementById("URL6").href = urls[6];
      document.getElementById("URL7").href = urls[7];

      //透過json取得圖片，並顯示在html上
      var thumb = new Array();
      for(i=0; i<8; i++)
      {
          thumb[i] = callBack.articles[i].thumb;

          //修改url 改變圖片大小使清晰
		  var pic = thumb[i].split("zoomcrop/");
		  if(pic.length>1)
		  {
		    pic[0] += "zoomcrop/200x200.png";
			thumb[i] = pic[0];
		  }
		  else
		  {
		    pic = thumb[i].split("width=");
			if(pic.length>1)
			{
			  pic[0] += "width=200&height=200";
			  thumb[i] = pic[0];
			}
		  }	
      }  
      document.getElementById("img0").src = thumb[0];
      document.getElementById("img1").src = thumb[1];
      document.getElementById("img2").src = thumb[2];
      document.getElementById("img3").src = thumb[3];
      document.getElementById("img4").src = thumb[4];
      document.getElementById("img5").src = thumb[5];
      document.getElementById("img6").src = thumb[6];
      document.getElementById("img7").src = thumb[7];

      //透過json取得title，並顯示在html上
      document.getElementById("title0").textContent = callBack.articles[0].title;
      document.getElementById("title1").textContent = callBack.articles[1].title;
      document.getElementById("title2").textContent = callBack.articles[2].title;
      document.getElementById("title3").textContent = callBack.articles[3].title;
      document.getElementById("title4").textContent = callBack.articles[4].title;
      document.getElementById("title5").textContent = callBack.articles[5].title;
      document.getElementById("title6").textContent = callBack.articles[6].title;
      document.getElementById("title7").textContent = callBack.articles[7].title;

    },
    error:function(xhr, ajaxOptions, thrownError){ 
        alert(xhr.status); 
        alert(thrownError); 
    } 
});

  //利用jquery裡的ajax方式，把要加入「收藏文章」的文章傳送到資料庫內。
  


</script>
<!-- ↑↑ -->
</div>

<!-- 2016/8/10 -->
<!-- 搜尋文章(寫死)，一開始先讓他隱藏-->
<!-- 輸入彩妝 得到屈臣氏 -->
<div id="searchBase1" style='display:none' >

	<div id="article_block"><a href="https://styleme.pixnet.net/post/205205788" target="_blank"><img src="picture/picA1.png"  height="260" src=""><div id="transparent">[彩妝] 開箱屈臣氏購入line版Missha彩妝！</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/83873193" target="_blank"><img src="picture/picA2.png"  height="260" src=""><div id="transparent"> [彩妝] 只搶到1盒驚呆了!! 日本藥妝店超夯美妝VISEE進軍台灣屈臣氏摟</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/83873316" target="_blank"><img src="picture/picA3.png"  height="260" src=""><div id="transparent"> 【彩妝】美少女戰士20周年限量化妝品：防水眼線液筆太可愛了</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/83873607" target="_blank"><img src="picture/picA4.png"  height="260" src=""><div id="transparent"> 【彩妝】VISEE又回台灣囉!❤台灣上市新品VS日本限量商品</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/83873304" target="_blank"><img src="picture/picA5.png"  height="260" src=""><div id="transparent"> 【彩妝】Visee晶緞光漾眼影盒PK-2,PK3/CP值高，不輸專櫃的飽和顯色，最後一天77折</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/187927828" target="_blank"><img src="picture/picA6.png"  height="260" src=""><div id="transparent"> 【彩妝*】百變女孩。Monday to Friday Color Lips。上班日的唇色變化 #NH CC水亮絲緞豐唇筆</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/202265119" target="_blank"><img src="picture/picA7.png"  height="260" src=""><div id="transparent"> |美妝影音|屈臣氏小小戰利品＋ CLIO 光撩鏡感絲緞唇釉試色分享#05輕甜野莓  #06石英玫粉</div></a></div>	
	<div id="article_block"><a href="https://styleme.pixnet.net/post/201590665" target="_blank"><img src="picture/picA8.png"  height="260" src=""><div id="transparent"> （彩妝）MJ戀愛魔鏡－櫻花限定版：睫毛膏＋眼線液試色</div></a></div>

</div>

<!-- 輸入氣墊粉餅 得到innisfree -->
<div id="searchBase2" style='display:none'>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/202104541" target="_blank"><img src="picture/picB1.png"  height="260" src=""><div id="transparent"> 【底妝】韓國innisfree WATER GLOW CUSHION水感光透氣墊粉餅開箱實測心得!!</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/199696888" target="_blank"><img src="picture/picB2.png"  height="260" src=""><div id="transparent"> 底妝│超夯! 8款熱門氣墊粉餅大評比。</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/198006040" target="_blank"><img src="picture/picB3.png"  height="260" src=""><div id="transparent"> Maybelline 媚比琳純淨礦物水凝BB氣墊粉餅使用心得</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/199286371" target="_blank"><img src="picture/picB4.png"  height="260" src=""><div id="transparent"> 四款氣墊粉餅推薦-IOPE、innisfree、MISSHA、Lancôme</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/193010137" target="_blank"><img src="picture/picB5.png"  height="260" src=""><div id="transparent"> 可愛到大爆炸!!!innisfree X LINE Friends 聯名氣墊粉餅上市。詳細規則及購買方式</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/199704730" target="_blank"><img src="picture/picB6.png"  height="260" src=""><div id="transparent"> [美妝]Innisfree 全球唯一霧感氣墊粉餅 打造12小時霧感持久妝容!! innisfree  LINE FRIENDS聯名，LINE迷必敗!!</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/products/1330" target="_blank"><img src="picture/picB7.png"  height="260" src=""><div id="transparent">innisfree 霧感持妝舒芙蕾粉餅</div></a></div>
	<div id="article_block"><a href="https://styleme.pixnet.net/post/198620989" target="_blank"><img src="picture/picB8.png"  height="260" src=""><div id="transparent">很實用！這7個氣墊粉餅的蕊芯和外盒Size都通用。想裝什麼就裝什麼</div></a></div>		
</div>


<div id="store">
	<h2>  美食天地</h2>
	
	<div id="storeBoard" style='display:none'>
	<!-- <div id="storeBoard"> -->
	<!-- 華山附近美食文章(寫死) -->
		<div id="store_food_block"><a href="http://elsa30.pixnet.net/blog/post/43364422" >【華山文創園區美食】小器食堂@日系簡約風格、口味清爽日式套餐！</a></div>
		<div id="store_food_block"><a href="http://milktea721.pixnet.net/blog/post/29572503" >[台北] AlleyCat's Pizza@華山1914文創園區</a></div>
		<div id="store_food_block"><a href="http://ycy820108.pixnet.net/blog/post/298035689" >美食 [捷運忠孝新生站] 隱藏巷弄日式厚鬆餅，還能紅茶無限續 東京紅茶</a></div>
	</div>

</div>


<div id="googlemap">
	<h1>google map</h1>
	
</div>

<div style="width:100%; height:100%">
	<img src="ball.png" onClick="dialog(this);switchMenu(this,'collection')" onmousedown="grab(this)"></img>
</div>
	
<div id="collection" style="display:none; width:300px; height:300px;  background-image:url('menuback.png')">
    
    
    <!-- <h3 style="position:absolute; top:5px; left:25px;">收藏文章</h3> -->
   	<h4 id="myArticle">
   		
   	<!-- 球球內文的php資料，去資料庫撈資料 -->
  	<?php
		require_once("member/connMysql.php");
  		for($i=1; $i<=5; $i++)
  		{
  			$sql = "SELECT * FROM `loveart` WHERE `articleID`=$i";	
  			$searchLove = mysql_query($sql);
  			$row_searchLove = mysql_fetch_assoc($searchLove);
  			$titlePHP[$i] = $row_searchLove["title"];
  			$linkPHP[$i] = $row_searchLove["link"];
  		}
  		
  	?>

    	<!-- <div id="myArticle_block"><a id="lovURL1" target="_blank"><div id="title8"></div></a></div> -->
    	<div id="myArticle_block"><a href=<?php echo $linkPHP[1]; ?> target="_blank"><?php echo $titlePHP[1]; ?></a></div>
    	<div id="myArticle_block"><a href=<?php echo $linkPHP[2]; ?> target="_blank"><?php echo $titlePHP[2]; ?></a></div>
    	<div id="myArticle_block"><a href=<?php echo $linkPHP[3]; ?> target="_blank"><?php echo $titlePHP[3]; ?></a></div>
    	<div id="myArticle_block"><a href=<?php echo $linkPHP[4]; ?> target="_blank"><?php echo $titlePHP[4]; ?></a></div>
    	<div id="myArticle_block"><a href=<?php echo $linkPHP[5]; ?> target="_blank"><?php echo $titlePHP[5]; ?></a></div>

    </h4>
   
</div>


// <script >
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }
  //獲取目前位置
function showPosition(position)
  {
  var lat,lng;
  lat = position.coords.latitude;
  lng = position.coords.longitude;
  x.innerHTML="Latitude: " + lat + 
  "<br />Longitude: " + lng;
  initialize(lat,lng)  
  }
  function initialize(latitude,longitude) {
        var myLatlng = new google.maps.LatLng(latitude,longitude);
        var mapOptions = {
          center: { lat: latitude, lng: longitude},
          zoom: 15
        };
		//地圖設定
        var map = new google.maps.Map(
            document.getElementById('googlemap'),
            mapOptions);
		//畫出map
		var marker = new google.maps.Marker({
            position: myLatlng,
            title:"目前位置"
            });
		//標記地點
		marker.setMap(map);		
      }
 </script>

<script type="text/javascript"><!--寶貝球js code-->
		var mousex = 0;
		var mousey = 0;
		var grabx = 0;
		var graby = 0;
		var orix = 0;
		var oriy = 0;
		var elex = 0;
		var eley = 0;
		var algor = 0;
		var openimg = 0;

		var dragobj = null;



		function falsefunc() { return false; } // used to block cascading events
	
		function init()
		{
			document.onmousemove = update; // update(event) implied on NS, update(null) implied on IE
			update();
		}

		function getMouseXY(e) // works on IE6,FF,Moz,Opera7
		{ 
			if (!e) e = window.event; // works on IE, but not NS (we rely on NS passing us the event)

			if (e)
			{ 
				if (e.pageX || e.pageY)
				{ // this doesn't work on IE6!! (works on FF,Moz,Opera7)
					mousex = e.pageX;
					mousey = e.pageY;
					algor = '[e.pageX]';
					if (e.clientX || e.clientY) algor += ' [e.clientX] '
				}
			else if (e.clientX || e.clientY)
			{ // works on IE6,FF,Moz,Opera7
				mousex = e.clientX + document.body.scrollLeft;
				mousey = e.clientY + document.body.scrollTop;
				algor = '[e.clientX]';
				if (e.pageX || e.pageY) algor += ' [e.pageX] '
			}  
			}
		}

		function update(e)
		{
			if(openimg!=1)
			getMouseXY(e); // NS is passing (event), while IE is passing (null)
		}

		function grab(context)
		{
			document.onmousedown = falsefunc; // in NS this prevents cascading of events, thus disabling text selection
			dragobj = context;
			dragobj.style.zIndex = 10; // move it to the top
			document.onmousemove = drag;
			document.onmouseup = drop;
			grabx = mousex;
			graby = mousey;
			elex = orix = dragobj.offsetLeft;
			eley = oriy = dragobj.offsetTop;
			update();
		}

		function drag(e) // parameter passing is important for NS family 
		{
			if (dragobj)
			{
				elex = orix + (mousex-grabx);
				eley = oriy + (mousey-graby);
				dragobj.style.position = "absolute";
				dragobj.style.left = (elex).toString(10) + 'px';
				dragobj.style.top  = (eley).toString(10) + 'px';
			}
		update(e);
		return false; // in IE this prevents cascading of events, thus text selection is disabled
		}

		function drop()
		{
			if (dragobj)
			{
			dragobj.style.zIndex = 0;
			dragobj = null;
			}
			update();
			document.onmousemove = update;
			document.onmouseup = null;
			document.onmousedown = null;   // re-enables text selection on NS
		}
		
		function dialog(MyImage)
		{	
			if((mousex-grabx)==0&&(mousey-graby)==0){
				if (openimg == 0){
					MyImage.src = "open.png";
					this.openimg = 1;
					document.getElementById('SubMenu2');
				}
				else if (this.openimg == 1){
					MyImage.src = "ball.png";
					openimg = 0;

				}
			}
		}
		
		var VisibleMenu = ''; // 記錄目前顯示的子選單的 ID
		// 顯示或隱藏子選單
		function switchMenu( theMainMenu, theSubMenu, theEvent ){
		if((mousex-grabx)==0&&(mousey-graby)==0){
			var SubMenu = document.getElementById( theSubMenu );
			if( SubMenu.style.display == 'none' ){ // 顯示子選單
				SubMenu.style.minWidth = theMainMenu.clientWidth; // 讓子選單的最小寬度與主選單相同 (僅為了美觀)
				SubMenu.style.display = 'block';
				hideMenu(); // 隱藏子選單
				VisibleMenu = theSubMenu;
			}
			else{ // 隱藏子選單
				if( theEvent != 'MouseOver' || VisibleMenu != theSubMenu ){
					SubMenu.style.display = 'none';
					VisibleMenu = '';
				}
			}
			SubMenu.style.position='absolute';
			SubMenu.style.top=eley+30 + 'px';
			SubMenu.style.left=elex-300 + 'px';
		}
		}

		// 隱藏子選單
		function hideMenu(){
		if( VisibleMenu != '' ){
			document.getElementById( VisibleMenu ).style.display = 'none';
		}
		VisibleMenu = '';
		}
	</script>
</body>
</html>

