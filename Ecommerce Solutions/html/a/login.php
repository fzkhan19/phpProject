<?

/*
 * Ecommerce solutions
 * Copyright (C) 2006-2100 Sandro Stracuzzi <info@persefone.it> <sandrostracuzzi@hotmail.com>
 *
 * http://www.ecommercesolutions.it
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * version 2.1 as published by the Free Software Foundation.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details at
 * http://www.gnu.org/copyleft/lgpl.html
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 * Note sulla licenza:
 * E' vietato distribuire il software dietro pagamento di denaro oppure ricevere un compenso
 * per la gestione del software. Il software ? personale e puoi essere distribuito solo gratuitamente.
 * L'autore del software ? sandro stracuzzi e va citato insieme al sito ufficiale http://www.ecommercesolutions.it
 * in ogni pagina del sito.
 * E' severamente vietato eliminare i riferimenti all'autore o al sito web dalle pagine del sito.
 *
 * Chiunque non accetti queste note o ? contrario ad esse ? pregato di non utilizzare il software altrimenti
 * verr? perseguito legalmente.
 *
*/

$cat=$_GET['cat'];
$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta name="author" content="Luka Cvrk (www.solucija.com)" />
        <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" href="html/a/images/style.css" type="text/css" />
        <script src="ajaxm.js"></script>
        <title><?echo nomesito();?></title>
</head>
<body>
        <div class="content">
                <div class="header">
                        <div class="top_info">
                        </div>
                        <div class="logo">
                                <img src="images/<?echo logosito();?>" border=0> <a href="index.php" title="<?echo nomesito();?>"><span class="dark"><?echo nomesito();?></span></a>
                        </div>
                </div>

                <div class="bar">
                      <?  include("topmenu.php");    ?>
                </div>
                <div class="search_field">
                        <form method="post" action="cerca.php">
                                <div class="search_form">
                                <p>Cerca articoli: <input type="text" name="search" class="search" /> <input type="submit" value="Cerca" class="submit" /></p>
                                </div>
                        </form>

                        <p>Carrello <a href="carrello.php">Vedi</a> o <a href="carrello.php?action=empty">Svuota</a></p>
                </div>

                <div class="left">
         <div class="left_box">

         <?if(strlen($temput)<=0 && strlen($temppass)<=0){?>

         <h3>Login</h3>
         <br>
         <form action="valida.php" method="post">
         <table>
         <tr><td>Username</td><td><input type="text" name="nu"></td></tr>
         <tr><td>Password</td><td><input type="password" name="ps"></td></tr>
         </table> <br>
         <input type="submit" value="Login">
         </form> <br>
         <h3>Password persa</h3>
         <br>
         <form name="theform" method="post">
         <table>
         <tr><td>Email</td><td><input type="text" name="email"></td><td><div id="dati"></div></td></tr>
         </table> <br>
         <input type="button" value="Invia" onclick="javascript:carica(document.theform.email.value);">
         </form> <br>
         <?}else{?>
         Utente <strong><?echo $temput;?></strong> gia loggato <br> <a href="logout.php">Esci</a>
         <?}?>
         </div>
                </div>
                <div class="right">
                        <h3>Categorie:</h3>
                        <?
                               $obj->connessione();
                               $dati=mysql_query("select * from categorie order by nome");
                               while($array=mysql_fetch_array($dati)){
                               echo"<div class=\"right_articles\"><a href=\"categorie.php?cat=$array[id]\">$array[nome]</a></div>" ;
                               }
                               $obj->disconnessione();
                        ?>
                        <br>
                         <?  include("lateralmenu.php");    ?>
                         <br>
                        <h3>Novita:</h3>
                        <?
                               $obj->connessione();
                               $dati=mysql_query("select * from prodotti where isnovita=1  limit 3");
                               while($array=mysql_fetch_array($dati)){
                                if(strlen($array[thumb])<=0)echo"<img src=\"images/no_disp.jpg\" border=0><br>";
                                else echo"<img src=\"uploads/$array[thumb]\" border=0><br>";
                               echo"<a href=\"dettaglio.php?id=$array[id]\">$array[nome]</a></a><br>" ;
                               echo $array[breve]."<br>";
                               if(isb2b()==1)echo"<strong>$array[prezzo]</strong> euro<br>";
                               }
                               $obj->disconnessione();
                        ?>
                        <br>
                        <h3>Newsletter:</h3>
                        <form name="form" action="newsletter.php" method="post">
                        <b>Tua e-mail:</b>
                        <input type="text" name="email" size="25">    <input type="submit" value="ok">
                        </form>
                        <br>
                        <img src="images/bancasella_visa.gif" border=0>
                </div>
                <div class="footer">
                                           <p><?include("footer.php");?></p>
                </div>
        </div>
</body>
</html>