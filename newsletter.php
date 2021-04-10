<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>



body {font-family: Arial, Helvetica, sans-serif;}
form {border: 0px;}

input[type=text], input[type=password] {
  width: 280px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  box-sizing: border-box;

  background-color: #eef;
  color: white;
  padding: 14px 20px;
  border: none;
  cursor: pointer;
}

button {
  background-color: #aac;
  color: white;
  padding: 14px 20px;
  border: none;
  cursor: pointer;
}

input:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: DodgerBlue;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
</head>     

<body>
<div class="imgcontainer">
    <img src="passport/newsletter.jpg" alt="Avatar" class="avatar">
  </div>
<br>
<br>
vendors <a href="mailto:bayswater@gmail.com">click here</a>

<br>
<br>
<h2>£0.02 Newsletter</h2>

<br>




<?php
// define variables and set to empty values
$nameErr = $emailErr = $lockerErr = $tixErr = "";
$name = $email = $locker = $tix =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tix = $_POST["tix"];
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
   }
  }

  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }

  }

  if (empty($_POST["locker"])) {
    $lockerErr = "locker is required";
  } else {
    $locker = test_input($_POST["locker"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$locker)) {
      $lockerErr = "Only letters and white space allowed";
    }
  }
file_put_contents("list.html",  $name.": ".$email . " @ " . $locker . " " .  $tix . "<br>", FILE_APPEND);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
<br><br>
 
<h2>Choose Locker:</h2>

<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
<div class="custom-select" style="width:200px;">
  <select name="locker" >
    <option value="achieve">achieve</option>
<option value="agate">agate</option>
<option value="alma">alma</option>
<option value="arbutus">arbutus</option>
<option value="ario">ario</option>
<option value="audio">audio</option>
<option value="awe">awe</option>
<option value="azuki">azuki</option>
<option value="back">back</option>
<option value="banjo">banjo</option>
<option value="bay">bay</option>
<option value="birch">birch</option>
<option value="bistre">bistre</option>
<option value="bitzer">bitzer</option>
<option value="black">black</option>
<option value="blitzen">blitzen</option>
<option value="blonde">blonde</option>
<option value="board">board</option>
<option value="bok">bok</option>
<option value="bole">bole</option>
<option value="bough">bough</option>
<option value="bow">bow</option>
<option value="branch">branch</option>
<option value="bret">bret</option>
<option value="brink">brink</option>
<option value="broad">broad</option>
<option value="brock">brock</option>
<option value="brunch">brunch</option>
<option value="bubba">bubba</option>
<option value="buoy">buoy</option>
<option value="cal">cal</option>
<option value="camel">camel</option>
<option value="can">can</option>
<option value="canary">canary</option>
<option value="caraway">caraway</option>
<option value="carlos">carlos</option>
<option value="cash">cash</option>
<option value="cedar">cedar</option>
<option value="celery">celery</option>
<option value="celeste">celeste</option>
<option value="chalice">chalice</option>
<option value="charlie">charlie</option>
<option value="cheer">cheer</option>
<option value="chicken">chicken</option>
<option value="chili">chili</option>
<option value="chin">chin</option>
<option value="chubby">chubby</option>
<option value="cinnamon">cinnamon</option>
<option value="claw">claw</option>
<option value="clear">clear</option>
<option value="cold">cold</option>
<option value="colomba">colomba</option>
<option value="colt">colt</option>
<option value="comet">comet</option>
<option value="concave">concave</option>
<option value="confit">confit</option>
<option value="connell">connell</option>
<option value="convex">convex</option>
<option value="crab">crab</option>
<option value="cranium">cranium</option>
<option value="cricklewood">cricklewood</option>
<option value="crisp">crisp</option>
<option value="cuddles">cuddles</option>
<option value="dali">dali</option>
<option value="dancer">dancer</option>
<option value="dasher">dasher</option>
<option value="degas">degas</option>
<option value="dim">dim</option>
<option value="dogrose">dogrose</option>
<option value="dot">dot</option>
<option value="doubt">doubt</option>
<option value="drizzle">drizzle</option>
<option value="ecstatic">ecstatic</option>
<option value="ed">ed</option>
<option value="edge">edge</option>
<option value="edimame">edimame</option>
<option value="elisha">elisha</option>
<option value="ember">ember</option>
<option value="fairy">fairy</option>
<option value="falcon">falcon</option>
<option value="faust">faust</option>
<option value="faye">faye</option>
<option value="fenella">fenella</option>
<option value="fiery">fiery</option>
<option value="finchley">finchley</option>
<option value="flash">flash</option>
<option value="flavin">flavin</option>
<option value="flex">flex</option>
<option value="flopsy">flopsy</option>
<option value="flower">flower</option>
<option value="forza">forza</option>
<option value="fraction">fraction</option>
<option value="fulton">fulton</option>
<option value="gaby">gaby</option>
<option value="gareth">gareth</option>
<option value="gaz">gaz</option>
<option value="gemini">gemini</option>
<option value="gemstone">gemstone</option>
<option value="gillip">gillip</option>
<option value="ginkgo">ginkgo</option>
<option value="glitter">glitter</option>
<option value="goblet">goblet</option>
<option value="golg">golg</option>
<option value="granger">granger</option>
<option value="grape">grape</option>
<option value="grin">grin</option>
<option value="guava">guava</option>
<option value="harp">harp</option>
<option value="hassium">hassium</option>
<option value="hayden">hayden</option>
<option value="haze">haze</option>
<option value="hinch">hinch</option>
<option value="holland">holland</option>
<option value="holmes">holmes</option>
<option value="hotel">hotel</option>
<option value="ice">ice</option>
<option value="india">india</option>
<option value="irina">irina</option>
<option value="jemma">jemma</option>
<option value="jersey">jersey</option>
<option value="jester">jester</option>
<option value="jewel">jewel</option>
<option value="jill">jill</option>
<option value="jive">jive</option>
<option value="jodie">jodie</option>
<option value="joey">joey</option>
<option value="jols">jols</option>
<option value="jolt">jolt</option>
<option value="jones">jones</option>
<option value="juliet">juliet</option>
<option value="jumanji">jumanji</option>
<option value="juniper">juniper</option>
<option value="justin">justin</option>
<option value="kale">kale</option>
<option value="katy">katy</option>
<option value="keen">keen</option>
<option value="khan">khan</option>
<option value="kick">kick</option>
<option value="kira">kira</option>
<option value="kiran">kiran</option>
<option value="laurel">laurel</option>
<option value="leah">leah</option>
<option value="lema">lema</option>
<option value="lilac">lilac</option>
<option value="lobster">lobster</option>
<option value="lomo">lomo</option>
<option value="lowery">lowery</option>
<option value="lucas">lucas</option>
<option value="lucilla">lucilla</option>
<option value="lyall">lyall</option>
<option value="lynden">lynden</option>
<option value="magpie">magpie</option>
<option value="master">master</option>
<option value="mint">mint</option>
<option value="monsoon">monsoon</option>
<option value="mutis">mutis</option>
<option value="myrtle">myrtle</option>
<option value="nathan">nathan</option>
<option value="nerve">nerve</option>
<option value="nest">nest</option>
<option value="newbury">newbury</option>
<option value="newt">newt</option>
<option value="niamh">niamh</option>
<option value="nikolai">nikolai</option>
<option value="nuha">nuha</option>
<option value="oat">oat</option>
<option value="oatcake">oatcake</option>
<option value="octagon">octagon</option>
<option value="onyx">onyx</option>
<option value="orchid">orchid</option>
<option value="orlick">orlick</option>
<option value="papa">papa</option>
<option value="parker">parker</option>
<option value="paul">paul</option>
<option value="pen">pen</option>
<option value="perseus">perseus</option>
<option value="ping">ping</option>
<option value="posie">posie</option>
<option value="post">post</option>
<option value="queen">queen</option>
<option value="raider">raider</option>
<option value="reznov">reznov</option>
<option value="ripley">ripley</option>
<option value="saffron">saffron</option>
<option value="samus">samus</option>
<option value="sarah">sarah</option>
<option value="sign">sign</option>
<option value="soap">soap</option>
<option value="solaire">solaire</option>
<option value="sorghum">sorghum</option>
<option value="sorrel">sorrel</option>
<option value="sphere">sphere</option>
<option value="spring">spring</option>
<option value="swan">swan</option>
<option value="tempo">tempo</option>
<option value="tony">tony</option>
<option value="topaz">topaz</option>
<option value="wesley">wesley</option>
<option value="yoma">yoma</option>
<option value="zinnia">zinnia</option>

  </select>
</div>

<br>

    <button type="submit"  name="submit" value="Submit">Amazon!</button>
    <label>
      <input type="checkbox"  name="tix" value="🎟" >do you have a ticket 🎟?
      
    </label>
  </div>
</form>


<br><br>

<?php
if ( $name != "" && $email != "" ) {
echo " Thanks! [ ";
echo $locker;
echo ":  ";
echo $name;
echo " @ ";
echo $email;
echo" ]<br><br>";
echo file_get_contents("list.html");

}
?>
<br><br>
<br><br><br>

<?php
$files = glob("prizes/*.*");
for ($i=1; $i<count($files); $i++)
{
	$num = $files[$i];
	echo '<img width=150 src="'.$num.'" alt="prize">'."&nbsp;&nbsp;";
	}
?>

<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

</body>
</html
