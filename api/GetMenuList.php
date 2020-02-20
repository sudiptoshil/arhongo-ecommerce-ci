<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include("config.php");

     $sql="select * from product_category 
		where trash='0' and root_id='0'";	
     $result = $con->query($sql);
     $res["clist"]=array();	  
	  while($row= $result->fetch_assoc())
      {
            //echo "e<br>";
            $ara=array();
            $ara["id"]=$row["id"];
            $ara["root_id"]=$row["root_id"];
            $ara["category_name"]=$row["category_name"];
            $ara["home_page"]=$row["home_page"];
            $ara["category_image"]=$row["category_image"];
            $ara["clink"]=$row["category_link"];
            $ara["sub"]=array();

            $sql="select * from product_category where trash='0' and root_id='".$row["id"]."'";	
            $rr = $con->query($sql);
            while($r= $rr->fetch_assoc())
                {
                    $s_list=array();
                    $s_list["id"]=$r["id"];
                    $s_list["root_id"]=$r["root_id"];
                    $s_list["category_name"]=$r["category_name"];
                    $s_list["home_page"]=$r["home_page"];
                    $s_list["category_image"]=$r["category_image"];

                    array_push($ara["sub"],$s_list);
                }
        array_push($res["clist"],$ara);

      }
        $res["sliders"]=array();
        $sql="select * from sliders where trash='0' and status='1'";	
        $rr = $con->query($sql);
        while($r= $rr->fetch_assoc())
            {
                $s_list=array();
                $s_list["id"]=$r["id"];
                $s_list["slider_title"]=$r["slider_title"];
                $s_list["slider_image"]=$r["slider_image"];
                $s_list["content"]=$r["content"];
                array_push($res["sliders"],$s_list);
            }

      echo json_encode($res);

?>